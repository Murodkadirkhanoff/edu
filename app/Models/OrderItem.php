<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    public $table = 'orders.order_items';

    protected $fillable = ['order_id', 'price', 'quantity', 'purchasable_id', 'purchasable_type'];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function purchasable()
    {
        return $this->morphTo();
    }
}
