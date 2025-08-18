<?php

namespace App\Contracts\Services;

use App\Models\File;
use Illuminate\Http\UploadedFile;

interface FileServiceInterface
{
    public function upload(
        UploadedFile $uploadedFile,
        string       $type,
        ?object      $fileable = null,
        ?int         $userId = null,
        string       $disk = 'local',
        string       $pathPrefix = ''
    ): File;

    public function delete(File $file): bool;

    public function getUrl(File $file): string;

    public function update(File $file, array $data): bool;
}
