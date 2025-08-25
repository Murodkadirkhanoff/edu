<?php

namespace App\Services\Billing\Payme\Methods;

use App\Models\Order;
use App\Models\Transaction;
use Goodoneuz\PayUz\Models\PaymentSystem;

class CheckPerformTransactionHandler implements PaymeMethodHandler
{
    public function handle(array $params): array
    {
//        $this->validateParams($this->request->params);
        $model = Order::find($params['account']['order_id']);

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
            ->where('provider_state', 1)
            ->where('transactionable_type', get_class($model))
            ->where('transactionable_id', $model->id)
            ->get();
    }

    public function getComplatedTransactions($model)
    {
        return Transaction::where('provider', 'payme')
            ->where('provider_state', 2)
            ->where('transactionable_type', get_class($model))
            ->where('transactionable_id', $model->id)
            ->get();
    }
}
