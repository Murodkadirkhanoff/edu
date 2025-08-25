<?php

namespace App\Services\Billing;

use App\Services\Billing\Payme\Methods\CancelTransactionHandler;
use App\Services\Billing\Payme\Methods\CheckPerformTransactionHandler;
use App\Services\Billing\Payme\Methods\CheckTransactionHandler;
use App\Services\Billing\Payme\Methods\CreateTransactionHandler;
use App\Services\Billing\Payme\Methods\GetStatementHandler;
use App\Services\Billing\Payme\Methods\PerformTransactionHandler;


class PaymeService
{
    protected array $handlers;

    public function __construct(
        CheckPerformTransactionHandler $checkPerform,
        CreateTransactionHandler $create,
        PerformTransactionHandler $perform,
        CancelTransactionHandler $cancel,
        CheckTransactionHandler $check,
        GetStatementHandler $statement,
    ) {
        $this->handlers = [
            'CheckPerformTransaction' => $checkPerform,
            'CreateTransaction'       => $create,
            'PerformTransaction'      => $perform,
            'CancelTransaction'       => $cancel,
            'CheckTransaction'        => $check,
            'GetStatement'            => $statement,
        ];
    }

    public function handle(string $method, array $params): array
    {
        if (! isset($this->handlers[$method])) {
            throw new \Exception("Unsupported method: {$method}");
        }

        return $this->handlers[$method]->handle($params);
    }
}
