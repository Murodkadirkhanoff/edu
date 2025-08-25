<?php

namespace App\Services\Billing\Payme\Methods;

interface PaymeMethodHandler
{
    public function handle(array $params): array;
}
