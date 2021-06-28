<?php

namespace App\Observers;

use App\Models\Order;
use Illuminate\Support\Str;

class OrderObserver
{
    /**
     * Handle the Order "creating" event.
     *
     * @param  \App\Models\Order  $order
     * @return void
     */
    public function creating(Order $order)
    {
        $order->uuid = Str::uuid();
    }
}
