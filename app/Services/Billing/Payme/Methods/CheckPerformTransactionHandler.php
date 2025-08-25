<?php

namespace App\Services\Billing\Payme\Methods;

class CheckPerformTransactionHandler implements PaymeMethodHandler
{
    public function handle(array $params): array
    {
        return [
            "result" => [
                "allow" => true
            ]
        ];
    }
}
