<?php

namespace App\Services\Billing\Payme\Methods;

use Goodoneuz\PayUz\Http\Classes\DataFormat;
use Goodoneuz\PayUz\Http\Classes\Payme\Response;
use Goodoneuz\PayUz\Models\Transaction;
use Goodoneuz\PayUz\Services\PaymentService;

class CancelTransactionHandler implements PaymeMethodHandler
{

    public function handle(array $params): array
    {
        $id = $params['id'];
        $transaction = \App\Models\Transaction::where('provider_transaction_id', $id)->first();

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

        switch ($transaction->provider_state) {
            case -1:
            case -2:
                return [
                    'result' => [
                        'transaction' => (string)$transaction->id,
                        'cancel_time' => 1 * $transaction->canceled_at,
                        'state' => 1 * $transaction->provider_state,
                    ]
                ];

            case 1:
                $transaction->cancel(1 * $params['reason']);

                $cancel_time =now()->valueOf();

                $transaction->update([
                    'canceled_at' => $cancel_time
                ]);

//                PaymentService::payListener(null, $transaction, 'cancel-pay');

                return [
                    'result' => [
                        'transaction' => (string)$transaction->id,
                        'cancel_time' => 1 * $transaction->canceled_at,
                        'state' => 1 * $transaction->provider_state,
                    ]
                ];

                break;

            case 2:
                $transaction->cancel(1 * $transaction->reason);


                $transaction->update([
                    'canceled_at' => now()->valueOf(),
                ]);

//                PaymentService::payListener(null, $transaction, 'cancel-pay');

                return [
                    'result' => [
                        'transaction' => (string)$transaction->id,
                        'cancel_time' => 1 * $transaction->canceled_at,
                        'state' => 1 * $transaction->provider_state,
                    ]
                ];

                break;

            default:
                return [
                    "error" => [
                        "code" => -31007,
                        "message" => [
                            "ru" => "Could not cancel transaction. Invalid state.",
                            "uz" => "Could not cancel transaction. Invalid state.",
                            "en" => "Could not cancel transaction. Invalid state."
                        ],
                        "data" => "timeout"
                    ]
                ];
                break;
        }
    }
}
