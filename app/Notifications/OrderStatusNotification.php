<?php

namespace App\Notifications;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class OrderStatusNotification extends Notification
{
    use Queueable;

    public function __construct(public Order $order, public bool $isAdmin = false)
    {
    }

    public function via(object $notifiable): array
    {
        return ['database'];
    }

    public function toArray(object $notifiable): array
    {
        return [
            'order_id' => $this->order->id,
            'status' => $this->order->status->value,
            'message' => $this->isAdmin
                ? "سفارش کاربر {$this->order->user->name} به وضعیت {$this->order->status->getLabel()} تغییر یافت."
                : "سفارش شما (شماره {$this->order->id}) به وضعیت {$this->order->status->getLabel()} تغییر یافت.",
        ];
    }
}
