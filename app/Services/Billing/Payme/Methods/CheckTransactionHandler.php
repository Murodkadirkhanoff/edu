<?php

namespace App\Services\Billing\Payme\Methods;

use App\Models\Transaction;
use Goodoneuz\PayUz\Http\Classes\Payme\Response;

class CheckTransactionHandler implements PaymeMethodHandler
{

    public function handle(array $params): array
    {
        $id = $params['id'];

        $transaction = Transaction::where('provider_transaction_id',$id)->first();
        if (!$transaction) {
            return [
                "error" => [
                    "code" => -31003,
                    "message" => [
                        "ru" => "Transaction not found",
                        "uz" => "Transaction not found",
                        "en" => "Transaction not found"
                    ],
                    "data" => "timeout"
                ]
            ];
        }

        return [
            'result' => [
                'create_time' => 1 * $transaction->provider_created_at,
                'perform_time' => 0,
                'cancel_time' => 0,
                'transaction' => (string)$transaction->id,
                'state' => 1 * $transaction->provider_state,
                'reason' => null,
            ]
        ];
    }
}
