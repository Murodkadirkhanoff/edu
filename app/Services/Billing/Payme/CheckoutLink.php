<?php

namespace App\Services\Billing\Payme;

class CheckoutLink
{
    public function __construct(
        private readonly string $merchantId,
        private readonly string $host = 'https://test.paycom.uz' //'https://checkout.paycom.uz',
    ) {}

    /**
     * $amountTiyin — сумма в тийинах (500 = 5 сум)
     * $account — дополнительные поля аккаунта (будут как ac.<key>=<value>)
     *   минимум нужен ac.order_id
     */
    public function make(int|string $orderId, int $amountTiyin, array $account = []): string
    {
        if ($amountTiyin <= 0) {
            throw new \InvalidArgumentException('Amount must be > 0 (in tiyin).');
        }

        // Гарантируем обязательный параметр аккаунта
        $account = array_merge(['order_id' => (string)$orderId], $account);

        // Формируем строку параметров строго через ; без URL-кодирования
        $parts = [
            'm=' . $this->merchantId,
        ];

        foreach ($account as $k => $v) {
            $parts[] = 'ac.' . $k . '=' . (string)$v;
        }

        $parts[] = 'a=' . $amountTiyin;

        $payload = implode(';', $parts);

        // Обычный base64 (без url-safe). Padding оставляем как есть — Payme понимает оба варианта.
        $b64 = base64_encode($payload);

        // Собираем итоговый URL
        return rtrim($this->host, '/') . '/' . $b64;
    }

    public static function fromConfig(): self
    {
        return new self(
            merchantId: '68a6a47c8f3347fe8658d376',// config('payme.merchant_id'),
//            host: config('payme.checkout_host')
        );
    }
}
