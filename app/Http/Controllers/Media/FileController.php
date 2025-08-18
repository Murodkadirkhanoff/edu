<?php

namespace App\Http\Controllers\Media;

use App\Http\Controllers\Controller;
use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;

class FileController extends Controller
{
    public function show(string $id)
    {
        $file = File::findOrFail($id);

        // Проверка доступа (если нужно) через policy
        // $this->authorize('view', $file);

        if (!Storage::disk($file->disk)->exists($file->path)) {
            abort(404, 'Файл не найден');
        }

        $content = Storage::disk($file->disk)->get($file->path);
        $mime = Storage::disk($file->disk)->mimeType($file->path);

        return Response::make($content)->header('Content-Type', $mime);
    }

    public function download(string $id)
    {
        $file = File::findOrFail($id);

        // Проверка доступа
        // $this->authorize('download', $file);

        if (!Storage::disk($file->disk)->exists($file->path)) {
            abort(404);
        }

        return Storage::disk($file->disk)->download(
            $file->path,
            $file->original_name ?? basename($file->path)
        );
    }
}
