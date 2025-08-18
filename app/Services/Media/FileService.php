<?php

namespace App\Services\Media;

use App\Contracts\Services\FileServiceInterface;
use App\Models\File;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;

class FileService implements FileServiceInterface
{
    public function upload(
        UploadedFile $uploadedFile,
        string       $type,
        ?object      $fileable = null,
        ?int         $userId = null,
        string       $disk = 'local',
        string       $pathPrefix = ''
    ): File
    {
        $storedPath = $uploadedFile->store($pathPrefix, $disk);

        return File::create([
            'path' => $storedPath,
            'type' => $type,
            'disk' => $disk,
            'fileable_type' => $fileable ? get_class($fileable) : null,
            'fileable_id' => $fileable?->id,
            'user_id' => $userId,
            'uploaded_by' => auth()->id(),
            'original_name' => $uploadedFile->getClientOriginalName(),
            'mime_type' => $uploadedFile->getClientMimeType(),
            'file_size' => $uploadedFile->getSize(),
            'extension' => $uploadedFile->getClientOriginalExtension(),
        ]);
    }

    public function delete(File $file): bool
    {
        if (!$file?->path) {
            return false;
        }

        Storage::disk($file->disk)->delete($file->path);

        return $file->delete();
    }


    public function getUrl(File $file): string
    {
        return Storage::disk($file->disk)->url($file->path);
    }

    public function update(File $file, array $data): bool
    {
        return $file->update($data);
    }
}
