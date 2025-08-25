<?php

use App\Http\Controllers\Media\WasabiController;
use App\Models\Transaction;
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

    $method = $request->get('method');

    if ($method == "CheckPerformTransaction") {
        $response = [
            "result" => [
                "allow" => true
            ]
        ];
    }
    if ($method == "CreateTransaction") {
        $transaction_id = $request->input('params.id');
        $transaction = Transaction::where('provider_transaction_id',$transaction_id);

        if ($transaction){

            if ($transaction->provider_state == 1){

            }else{

            }

            $providerTime = Carbon::createFromTimestampMs($transaction->provider_created_at);

            if ($providerTime->lt(now()->subMinutes(10))) {
                $transaction->update([
                    'provider_state' => -1,
                    'reason' => 4
                ]);
            }else{
                return response()->json([
                    'result' => [
                        'create_time' => $transaction->created_at->valueOf(),
                        'transaction' => $transaction->id,
                        'state' => $transaction->provider_state,
                    ]
                ]);
            }

        }else{

        }

        $response = [
            "result" => [
                "allow" => $transaction_id
            ]
        ];
    }

    return response()->json($response);
});
