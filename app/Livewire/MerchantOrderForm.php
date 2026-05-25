<?php

namespace App\Livewire;

use App\Services\OrderService;
use Exception;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class MerchantOrderForm extends Component
{
    public $weight_in_grams;
    public $errorMessage = null;
    public $successMessage = null;

    public function submitOrder(OrderService $orderService)
    {
        $this->validate([
            'weight_in_grams' => 'required|numeric|min:0.001',
        ]);

        $this->errorMessage = null;
        $this->successMessage = null;

        try {
            $orderService->createOrder(Auth::id(), (float)$this->weight_in_grams);
            $this->successMessage = 'سفارش شما با موفقیت ثبت شد.';
            $this->weight_in_grams = null;

            $this->dispatch('order-created');
        } catch (Exception $e) {
            $this->errorMessage = $e->getMessage();
        }
    }

    public function render()
    {
        return view('livewire.merchant-order-form');
    }
}
