<?php

namespace App\Services\Billing\Payme\Methods;

use App\Models\Transaction;
use Goodoneuz\PayUz\Models\PaymentSystem;

class CheckPerformTransactionHandler implements PaymeMethodHandler
{
    public function handle(array $params): array
    {
//        $this->validateParams($this->request->params);
        $id = $params['id'];
        $model = \App\Models\Transaction::where('provider_transaction_id', $id)->first();

        if ($model == null) {
            return [
                "error" => [
                    "code" => -31050,
                    "message" => [
                        "ru" => "Object not fount",
                        "uz" => "Object not fount",
                        "en" => "Object not fount"
                    ],
                    "data" => "timeout"
                ]
            ];
        }
//        if (!PaymentService::isProperModelAndAmount($model, $this->request->params['amount'])) {
//            $this->response->error(
//                Response::ERROR_INVALID_AMOUNT,
//                'Invalid amount for this object.'
//            );
//        }

        $active_transactions = $this->getActiveTransactions($model);
        if ((count($active_transactions) > 0)) {
            return [
                "error" => [
                    "code" => -31051,
                    "message" => [
                        "ru" => "There is other active transaction for this object.",
                        "uz" => "There is other active transaction for this object.",
                        "en" => "There is other active transaction for this object."
                    ],
                    "data" => "timeout"
                ]
            ];
        }

        $completed_transactions = $this->getComplatedTransactions($model);
        if ((count($completed_transactions) > 0)) {
            return [
                "error" => [
                    "code" => -31051,
                    "message" => [
                        "ru" => "There is other completed transaction for this object.",
                        "uz" => "There is other completed transaction for this object.",
                        "en" => "There is other completed transaction for this object."
                    ],
                    "data" => "timeout"
                ]
            ];
        }

//        PaymentService::payListener($model, null, 'before-pay');


//        $response = PaymentService::beforeResponse("Payme@CheckPerformTransaction", $this->request->params, $response);
        return [
            "result" => [
                "allow" => true
            ]
        ];
    }

    public function getActiveTransactions($model)
    {
        return Transaction::where('provider', 'payme')
            ->where('state', 1)
            ->get();
    }

    public function getComplatedTransactions($model)
    {
        return Transaction::where('provider', 'payme')
            ->where('state', 2)
            ->get();
    }
}
