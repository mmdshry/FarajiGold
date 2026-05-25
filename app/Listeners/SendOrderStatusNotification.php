<?php

namespace App\Listeners;

use App\Events\OrderStatusUpdated;
use App\Models\User;
use App\Notifications\OrderStatusNotification;
use Filament\Notifications\Notification;

class SendOrderStatusNotification
{
    public function handle(OrderStatusUpdated $event): void
    {
        $order = $event->order;

        // Notify Merchant
        $order->user->notify(new OrderStatusNotification($order));

        // Notify Admins
        $admins = User::where('role', 'admin')->get();
        foreach ($admins as $admin) {
            $admin->notify(new OrderStatusNotification($order, true));

            // Native Filament Notification for Admin Topbar
            Notification::make()
                ->title('وضعیت سفارش تغییر کرد')
                ->body("سفارش #{$order->id} به وضعیت {$order->status->getLabel()} تغییر یافت.")
                ->info()
                ->sendToDatabase($admin);
        }

        $this->sendSmsNotification($order->user->phone ?? '09120000000', $order);
    }

    protected function sendSmsNotification(string $phone, $order): void
    {
        // SMS Integration Placeholder
    }
}
