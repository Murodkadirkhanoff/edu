<?php

namespace App\Services;

use App\Models\Order;
use Illuminate\Support\Facades\DB;

class OrderService
{
    public function createOrder($user, $items, $paymentMethod)
    {
        return DB::transaction(function () use ($user, $items, $paymentMethod) {
            $order = Order::create([
                'user_id' => $user->id,
                'status' => 'pending',
                'total_amount' => 0,
                'payment_method' => $paymentMethod,
            ]);

            $total = 0;

            // 2. Создаем order_items
            foreach ($validated['items'] as $item) {
                $model = $item['purchasable_type'] === 'course'
                    ? Course::findOrFail($item['purchasable_id'])
                    : Lesson::findOrFail($item['purchasable_id']);

                $price = $model->price * $item['quantity'];
                $total += $price;

                $order->items()->create([
                    'purchasable_type' => get_class($model),
                    'purchasable_id'   => $model->id,
                    'quantity'         => $item['quantity'],
                    'price'            => $model->price,
                ]);
            }

            $order->update(['total_amount' => $total]);

            return $order;
        });
    }
}
