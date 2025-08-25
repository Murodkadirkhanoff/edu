<?php

namespace App\Services\Billing\Payme\Methods;



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
                    $transaction->updated_at = $perform_time;
                    $transaction->performed_at = $perform_time;
                    $transaction->update();

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
