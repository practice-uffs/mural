<?php

namespace App\Http\Controllers\Livewire;

use Livewire\Controllers\CanPretendToBeAFile;
use Livewire\Controllers\FilePreviewHandler as ControllersFilePreviewHandler;
use Livewire\FileUploadConfiguration;

class FilePreviewHandler extends ControllersFilePreviewHandler
{
    use CanPretendToBeAFile;

    public function handle($filename)
    {
        return $this->pretendResponseIsFile(
            FileUploadConfiguration::storage()->path(FileUploadConfiguration::path($filename)),
            FileUploadConfiguration::mimeType($filename)
        );
    }
}
