<?php

namespace App\Services\Billing\Payme\Methods;

use App\Models\Order;
use App\Models\Transaction;
use Carbon\Carbon;
use Goodoneuz\PayUz\Http\Classes\PaymentException;
use Illuminate\Support\Facades\Auth;

class CreateTransactionHandler implements PaymeMethodHandler
{
    public function handle(array $params): array
    {
        // Ожидаемые параметры из запроса Payme
        $id = $params['id'];
        $time = $params['time'];       // timestamp в миллисекундах
        $amount = $params['amount'];     // сумма в тийинах
        $account = $params['account'] ?? null;
        $receivers = $params['receivers'] ?? null;

        // Пытаемся найти существующую транзакцию
        $transaction = Transaction::where('provider_transaction_id', $id)->first();

        if ($transaction) {
            if ($transaction->provider_state == 1) {

                $providerTime = Carbon::createFromTimestampMs($transaction->provider_created_at);
                if ($providerTime->lt(now()->subMinutes(10))) {
                    $transaction->update([
                        'provider_state' => -1,
                        'reason' => 4,
                    ]);

                    return [
                        "error" => [
                            "code" => -31008,
                            "message" => [
                                "ru" => "Transaction timeout",
                                "uz" => "Transaction timeout",
                                "en" => "Transaction timeout"
                            ],
                            "data" => "timeout"
                        ]
                    ];
                } else {
                    return [
                        'result' => [
                            'create_time' => $transaction->provider_created_at,
                            'transaction' => (string)$transaction->id,
                            'state' => (int) $transaction->provider_state,
                        ]
                    ];
                }
            }else{
                return [
                    "error" => [
                        "code" => -31008,
                        "message" => [
                            "ru" => "Transaction timeout",
                            "uz" => "Transaction timeout",
                            "en" => "Transaction timeout"
                        ],
                        "data" => "timeout"
                    ]
                ];
            }

            // Проверка таймаута (10 минут)


            // Иначе — оставляем создание доступным

        }else{
            try {
                (new CheckPerformTransactionHandler)->handle($account);
            } catch (\Exception $e) {
                if ($e->response->response['error'] != null) {
                    throw $e;
                }
            }
        }
        $model = Order::find($account['order_id']);
        // Если транзакции нет — создаём новую
        $transaction = Transaction::create([
            'provider_transaction_id' => $id,
            'user_id' => 1,
            'order_id' => 1,
            'provider' => "payme",
            'amount' => $amount,
            'provider_created_at' => $time,
            'provider_state' => 1,
            'provider_payload' => json_encode($params),
            'transactionable_type' => get_class($model),
            'transactionable_id' => $model->id
            //'account' => json_encode($account),
//            'receivers' => $receivers ? json_encode($receivers) : null,
        ]);

        return [
            'result' => [
                'create_time' => $transaction->provider_created_at,
                'transaction' => (string)$transaction->id,
                'state' => (int) $transaction->provider_state,
            ]
        ];
    }
}
