<div>
    @if($successMessage)
        <div
            class="flex items-center gap-2 p-4 mb-5 text-sm text-emerald-700 dark:text-emerald-300 bg-emerald-100 dark:bg-emerald-900/40 border border-emerald-200 dark:border-emerald-700/50 rounded-xl">
            <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
            <span>{{ $successMessage }}</span>
        </div>
    @endif

    @if($errorMessage)
        <div
            class="flex items-center gap-2 p-4 mb-5 text-sm text-red-700 dark:text-red-300 bg-red-100 dark:bg-red-900/40 border border-red-200 dark:border-red-700/50 rounded-xl">
            <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z"/>
            </svg>
            <span>{{ $errorMessage }}</span>
        </div>
    @endif

    <form wire:submit.prevent="submitOrder" class="space-y-5">
        <div>
            <label class="block text-sm font-bold text-surface-700 dark:text-surface-300 mb-2">وزن طلا (گرم)</label>
            <input
                type="number"
                step="0.001"
                wire:model.defer="weight_in_grams"
                placeholder="مثلاً ۱۰۰"
                class="w-full px-4 py-3 bg-surface-50 dark:bg-surface-900 border border-surface-200 dark:border-surface-700 rounded-xl text-surface-900 dark:text-surface-100 placeholder-surface-400 dark:placeholder-surface-500 focus:outline-none focus:ring-2 focus:ring-gold-500/50 focus:border-gold-500 transition-all"
                required
            >
            @error('weight_in_grams')
            <span class="text-red-500 dark:text-red-400 text-xs mt-1.5 block">{{ $message }}</span>
            @enderror
        </div>

        <button
            type="submit"
            class="w-full flex items-center justify-center gap-2 px-6 py-3 text-sm font-bold text-white bg-gradient-to-l from-gold-500 to-gold-600 hover:from-gold-600 hover:to-gold-700 rounded-xl shadow-lg shadow-gold-500/25 hover:shadow-gold-500/40 transition-all duration-300"
        >
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/>
            </svg>
            ثبت سفارش
        </button>
    </form>
</div>
