<?php

use App\Http\Middleware\EnsureMerchantIsActive;
use App\Livewire\MerchantDashboard;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth',
    EnsureMerchantIsActive::class,
    'throttle:60,1'
])->group(function () {
    Route::get('/dashboard', MerchantDashboard::class)->name('dashboard');
});
