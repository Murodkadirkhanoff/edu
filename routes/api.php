<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post('/videos', function (Request $request) {
    // Валидация: принимаем только видеофайлы до ~2 ГБ (подправь под свои лимиты)
    $validated = $request->validate([
        'video' => ['required','file','mimetypes:video/mp4,video/quicktime,video/x-msvideo,video/x-matroska','max:2048000'], // max в КБ (2 ГБ)
    ]);

    $file = $validated['video'];

    // Генерим путь вида videos/2025/08/uuid.ext
    $path = sprintf(
        'videos/%s/%s/%s.%s',
        now()->format('Y'),
        now()->format('m'),
        (string) Str::uuid(),
        $file->getClientOriginalExtension() ?: 'mp4'
    );

    // Загружаем в Wasabi
    // public — если нужен публичный доступ; убери 'public', если приватно
    Storage::disk('wasabi')->put($path, file_get_contents($file->getRealPath()), 'public');

    // Публичная ссылка (для приватных файлов можно вернуть presigned URL)
    $url = Storage::disk('wasabi')->url($path);

    return response()->json([
        'message' => 'Uploaded',
        'key' => $path,
        'url' => $url,
        'size_bytes' => $file->getSize(),
        'mime' => $file->getMimeType(),
    ], 201);
});
