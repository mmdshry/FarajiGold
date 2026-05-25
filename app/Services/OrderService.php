<?php

namespace App\Services;

use App\Enums\OrderStatus;
use App\Models\Order;
use App\Models\Setting;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class OrderService
{
    /**
     * @throws Exception
     */
    public function createOrder(int $userId, float $weightInGrams): Order
    {
        $this->validateTradingRules($weightInGrams);

        return DB::transaction(function () use ($userId, $weightInGrams) {
            $order = Order::create([
                'user_id' => $userId,
                'weight_in_grams' => $weightInGrams,
                'status' => OrderStatus::PENDING_APPROVAL,
            ]);

            // event(new \App\Events\OrderStatusUpdated($order)); // To be uncommented in Step 5

            return $order;
        });
    }

    /**
     * @throws Exception
     */
    public function validateTradingRules(float $weightInGrams): void
    {
        $settings = Cache::remember('trading_settings', 60, function () {
            return Setting::whereIn('key', [
                'trading_start_time',
                'trading_end_time',
                'min_order_gram',
                'max_order_gram'
            ])->pluck('value', 'key');
        });

        $startTime = $settings['trading_start_time'] ?? '11:00';
        $endTime = $settings['trading_end_time'] ?? '18:00';
        $minGram = (float)($settings['min_order_gram'] ?? 10);
        $maxGram = (float)($settings['max_order_gram'] ?? 1000);

        $now = Carbon::now();
        $start = Carbon::createFromTimeString($startTime);
        $end = Carbon::createFromTimeString($endTime);

        if (!$now->between($start, $end)) {
            throw new Exception("ثبت سفارش تنها در ساعات {$startTime} الی {$endTime} امکان‌پذیر است.");
        }

        if ($weightInGrams < $minGram || $weightInGrams > $maxGram) {
            throw new Exception("وزن سفارش باید بین {$minGram} و {$maxGram} گرم باشد.");
        }
    }
}
