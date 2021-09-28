<?php

namespace App\Jobs;

use App\Models\Comment;
use App\Models\Order;
use App\Services\GoogleDrive;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;

class ProcessGoogleDriveUploads implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(GoogleDrive $drive)
    {
        $this->uploadFilesInOrderFolders($drive);
        $this->deleteEmptyOrderFolders();
    }
    
    private function uploadFilesInOrderFolders(GoogleDrive $drive) {
        $ordersWithFiles = Storage::directories('orders');

        if (count($ordersWithFiles) == 0) {
            return;
        }
        
        foreach ($ordersWithFiles as $orderDir) {
            $orderId = basename($orderDir);
            $order = Order::find($orderId);

            if (empty($order->google_drive_in_folder_link)) {
                continue;
            }

            $googleDriveFolderId = $this->getFileIdFromGoogleDriveLink($order->google_drive_in_folder_link);

            $files = Storage::allFiles($orderDir);

            foreach($files as $file) {
                $name = basename($file);
                $result = $drive->createFile($name, Storage::get($file), $googleDriveFolderId);

                if ($result) {
                    Storage::delete($file);
                }
            }
        }
    }

    private function deleteEmptyOrderFolders() {
        $ordersWithFiles = Storage::directories('orders');

        foreach ($ordersWithFiles as $orderDir) {
            $files = Storage::allFiles($orderDir);

            if (count($files) == 0) {
                Storage::deleteDirectory($orderDir);
            }
        }
    }

    public function getFileIdFromGoogleDriveLink($link)
    {
        $parts = explode('/', $link);
        return $parts[count($parts) - 1];
    }
}
