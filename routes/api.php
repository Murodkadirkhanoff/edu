<?php

use App\Http\Controllers\Media\WasabiController;
use App\Models\Transaction;
use App\Services\Payment\Payme\Payme;
use Carbon\Carbon;
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

    $payme = new Payme;
    $payme->run();
});
