<?php

namespace App\Http\Controllers\Common;

use App\Enums\CourseStatus;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\Order;
use App\Services\Billing\Payme\CheckoutLink;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function checkout(Request $request,Course $course)
    {
        if ($request->isMethod('POST')) {

            $validated = $request->validate([
                'items' => 'required|array|min:1',
                'items.*.purchasable_type' => 'required|string|in:course,lesson',
                'items.*.purchasable_id' => 'required|integer',
            ]);

            // 1. Создаем заказ
            $order = Order::create([
                'user_id' => auth()->id(),
                'status' => 'pending',
                'total_amount' => 0, // позже посчитаем
                'payment_method' => $request->payment_method
            ]);

            $total = 0;

            // 2. Создаем order_items
            foreach ($validated['items'] as $item) {

                $model = $item['purchasable_type'] === 'course'
                    ? Course::findOrFail($item['purchasable_id'])
                    : Lesson::findOrFail($item['purchasable_id']);

                $price = $model->whole_price_minor;
                $total += $price;

                $order->items()->create([
                    'purchasable_type' => get_class($model),
                    'purchasable_id'   => $model->id,
                    'price'            => $price,
                ]);
            }

            // 3. Обновляем сумму заказа
            $order->update(['total_amount' => $total]);

            $link = CheckoutLink::fromConfig()->make(
                orderId: $order->id,
                amountTiyin: $order->total_amount,
            );

            // Можно редиректить напрямую:
            return redirect()->away($link);
        }
        return view('pages.common.checkout', compact('course'));
    }
}
