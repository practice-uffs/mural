<?php

namespace App\Http\Controllers\Livewire;

use Livewire\FileUploadConfiguration;
use Livewire\Controllers\FileUploadHandler as ControllersFileUploadHandler;

class FileUploadHandler extends ControllersFileUploadHandler
{
    public function handle()
    {
        $disk = FileUploadConfiguration::disk();

        $filePaths = $this->validateAndStore(request('files'), $disk);

        return ['paths' => $filePaths];
    }
}
