<?php

namespace App\Services\Billing\Payme\Methods;



use App\Models\Enrollment;
use App\Models\Order;

class PerformTransactionHandler implements PaymeMethodHandler
{

    public function handle(array $params): array
    {
        $id = $params['id'];
        $transaction =  \App\Models\Transaction::where('provider_transaction_id', $id)->first();

        // if transaction not found, send error
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
            case 1:
                if ($transaction->isExpired()) {
                    $transaction->cancel(4);
                    Order::find($transaction->order_id)->update([
                        'status' => 'cancelled'
                    ]);

                    return [
                        "error" => [
                            "code" => -31008,
                            "message" => [
                                "ru" => "Transaction is expired.",
                                "uz" => "Transaction is expired.",
                                "en" => "Transaction is expired."
                            ],
                            "data" => "timeout"
                        ]
                    ];
                } else {

                    $perform_time = now()->valueOf();
                    $transaction->provider_state = 2;

                    $transaction->performed_at = $perform_time;
                    $transaction->update();
                    Order::find($transaction->order_id)->update([
                        'status' => 'paid'
                    ]);
                    Enrollment::create([
                       'user_id' => $transaction->user_id,
                       'purchasable_type' => $transaction->order->order_items->first()->purchasable_type,
                       'purchasable_id' => $transaction->order->order_items->first()->purchasable_id,
                    ]);
//                    PaymentService::payListener(null, $transaction, 'after-pay');

                    return [
                        'result' => [
                            'transaction' => (string)$transaction->id,
                            'perform_time' => $transaction->performed_at,
                            'state' => (int) $transaction->provider_state,
                        ]
                    ];
                }

            case 2: // handle complete transaction
                return [
                    'result' => [
                        'transaction' => (string) $transaction->id,
                        'perform_time' => 1 * $transaction->performed_at,
                        'state' => 1 * $transaction->provider_state,
                    ]
                ];

            default:
                return [
                    "error" => [
                        "code" => -31008,
                        "message" => [
                            "ru" => "Could not perform this operation.",
                            "uz" => "Could not perform this operation.",
                            "en" => "Could not perform this operation."
                        ],
                        "data" => "timeout"
                    ]
                ];
        }
    }
}
