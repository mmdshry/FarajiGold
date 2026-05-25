<?php

namespace App\Livewire;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class MerchantDashboard extends Component
{
    protected $listeners = ['order-created' => '$refresh'];

    public function render()
    {
        // Add safety check if user is not authenticated yet.
        $orders = Auth::check() ? Order::where('user_id', Auth::id())->latest()->get() : collect();

        return view('livewire.merchant-dashboard', [
            'orders' => $orders
        ])->layout('layouts.app');
    }
}
