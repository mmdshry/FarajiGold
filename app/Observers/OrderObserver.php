<?php

namespace App\Observers;

use App\Events\OrderStatusUpdated;
use App\Models\Order;

class OrderObserver
{
    public function created(Order $order): void
    {
        event(new OrderStatusUpdated($order));
    }

    public function updated(Order $order): void
    {
        if ($order->isDirty('status')) {
            event(new OrderStatusUpdated($order));
        }
    }
}
