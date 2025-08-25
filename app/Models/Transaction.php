<?php

namespace App\Models;

use Goodoneuz\PayUz\Http\Classes\DataFormat;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'billings.transactions';

    public $guarded = [];

    public function isExpired()
    {
        return ($this->provider_state == 1) && ($this->updated_at < now()->subHours(12));
    }

    public function cancel($reason)
    {
        $updated_time = now()->valueOf();

        if ($this->state == 2) {
            // Scenario: CreateTransaction -> PerformTransaction -> CancelTransaction
            $this->state = -2;
        } else {
            // Scenario: CreateTransaction -> CancelTransaction
            $this->state = -1;
        }

        $this->reason = $reason;
        $this->canceled_at = $updated_time;

        $this->update();
    }
}
