<?php

use App\Http\Controllers\Media\WasabiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post('/upload/create', [WasabiController::class, 'createMultipartUpload']);
Route::post('/upload/url', [WasabiController::class, 'getPresignedUrl']);
Route::post('/upload/complete', [WasabiController::class, 'completeMultipartUpload']);
Route::post('/lesson/{lesson}/attach-video', [WasabiController::class, 'attachVideo']);


Route::any('payme', function (Request $request) {

    $method = $request->get('method');

    if ($method == "CheckPerformTransaction") {
        $response = [
            "result" => [
                "allow" => true
            ]
        ];
    }

    return response()->json($response);
});
