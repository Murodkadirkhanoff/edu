<?php

namespace App\Services\Billing\Payme\Methods;

use App\Models\Transaction;
use Carbon\Carbon;

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
                // Уже создана ранее, возвращаем текущий статус
                return [
                    'result' => [
                        'create_time' => $transaction->provider_created_at,
                        'transaction' => (string)$transaction->id,
                        'state' => $transaction->provider_state,
                    ]
                ];
            }

            // Проверка таймаута (10 минут)
            $providerTime = Carbon::createFromTimestampMs($transaction->provider_created_at);
            if ($providerTime->lt(now()->subMinutes(10))) {
                $transaction->update([
                    'provider_state' => -1,
                    'reason' => 4,
                ]);

                throw new \Exception('Transaction timeout', -31008);
            }

            // Иначе — оставляем создание доступным
            return [
                'result' => [
                    'create_time' => $transaction->provider_created_at,
                    'transaction' => (string)$transaction->id,
                    'state' => $transaction->provider_state,
                ]
            ];
        }

        // Если транзакции нет — создаём новую
        $transaction = Transaction::create([
            'provider_transaction_id' => $id,
            'amount' => $amount,
            'provider_created_at' => $time,
            'provider_state' => 1,
            'provider_payload' => json_encode($params),
            'account' => json_encode($account),
            'receivers' => $receivers ? json_encode($receivers) : null,
        ]);

        return [
            'result' => [
                'create_time' => $transaction->provider_created_at,
                'transaction' => (string)$transaction->id,
                'state' => $transaction->provider_state,
            ]
        ];
    }
}
