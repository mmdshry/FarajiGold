<div>
    <h1 class="text-2xl font-black text-surface-900 dark:text-white mb-8">داشبورد فروشنده</h1>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        {{-- Order Form Card --}}
        <div class="lg:col-span-1">
            <div
                class="bg-white dark:bg-surface-800/50 p-6 rounded-2xl border border-surface-200/60 dark:border-surface-700/60 shadow-sm">
                <div class="flex items-center gap-3 mb-6">
                    <div
                        class="w-10 h-10 rounded-xl bg-gradient-to-br from-gold-400 to-gold-600 flex items-center justify-center shadow-lg shadow-gold-500/20">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" stroke-width="2"
                             viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/>
                        </svg>
                    </div>
                    <h2 class="text-lg font-bold text-surface-900 dark:text-white">ثبت سفارش جدید</h2>
                </div>
                <livewire:merchant-order-form/>
            </div>
        </div>

        {{-- Order History --}}
        <div class="lg:col-span-2">
            <div
                class="bg-white dark:bg-surface-800/50 p-6 rounded-2xl border border-surface-200/60 dark:border-surface-700/60 shadow-sm overflow-x-auto">
                <div class="flex items-center gap-3 mb-6">
                    <div
                        class="w-10 h-10 rounded-xl bg-gradient-to-br from-gold-400 to-gold-600 flex items-center justify-center shadow-lg shadow-gold-500/20">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" stroke-width="2"
                             viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M8.25 6.75h12M8.25 12h12m-12 5.25h12M3.75 6.75h.007v.008H3.75V6.75zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zM3.75 12h.007v.008H3.75V12zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm-.375 5.25h.007v.008H3.75v-.008zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z"/>
                        </svg>
                    </div>
                    <h2 class="text-lg font-bold text-surface-900 dark:text-white">تاریخچه سفارشات</h2>
                </div>

                <table class="w-full text-right border-collapse whitespace-nowrap">
                    <thead>
                    <tr class="border-b border-surface-200 dark:border-surface-700">
                        <th class="py-3 px-3 text-xs font-bold text-surface-500 dark:text-surface-400 uppercase tracking-wider">
                            شماره
                        </th>
                        <th class="py-3 px-3 text-xs font-bold text-surface-500 dark:text-surface-400 uppercase tracking-wider">
                            وزن (گرم)
                        </th>
                        <th class="py-3 px-3 text-xs font-bold text-surface-500 dark:text-surface-400 uppercase tracking-wider">
                            وضعیت
                        </th>
                        <th class="py-3 px-3 text-xs font-bold text-surface-500 dark:text-surface-400 uppercase tracking-wider">
                            تاریخ
                        </th>
                    </tr>
                    </thead>
                    <tbody class="divide-y divide-surface-100 dark:divide-surface-700/50">
                    @forelse($orders as $order)
                        <tr class="hover:bg-surface-50 dark:hover:bg-surface-800 transition-colors">
                            <td class="py-3.5 px-3 text-sm font-medium text-surface-900 dark:text-surface-100">
                                #{{ $order->id }}</td>
                            <td class="py-3.5 px-3 text-sm font-bold text-surface-900 dark:text-surface-100">{{ $order->weight_in_grams }}</td>
                            <td class="py-3.5 px-3">
                                @php
                                    $statusColors = [
                                        'pending_approval' => 'bg-amber-100 text-amber-700 dark:bg-amber-900/40 dark:text-amber-300 border-amber-200 dark:border-amber-700/50',
                                        'initial_approval' => 'bg-blue-100 text-blue-700 dark:bg-blue-900/40 dark:text-blue-300 border-blue-200 dark:border-blue-700/50',
                                        'final_approval' => 'bg-emerald-100 text-emerald-700 dark:bg-emerald-900/40 dark:text-emerald-300 border-emerald-200 dark:border-emerald-700/50',
                                        'rejected' => 'bg-red-100 text-red-700 dark:bg-red-900/40 dark:text-red-300 border-red-200 dark:border-red-700/50',
                                    ];
                                @endphp
                                <span
                                    class="inline-flex items-center px-2.5 py-1 rounded-lg text-xs font-semibold border {{ $statusColors[$order->status->value] ?? '' }}">
                                    {{ $order->status->getLabel() }}
                                </span>
                            </td>
                            <td class="py-3.5 px-3 text-sm text-surface-500 dark:text-surface-400"
                                dir="ltr">{{ $order->created_at->format('Y-m-d H:i') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="py-12 text-center">
                                <svg class="w-12 h-12 mx-auto text-surface-300 dark:text-surface-600 mb-3" fill="none"
                                     stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5m6 4.125l2.25 2.25m0 0l2.25 2.25M12 13.875l2.25-2.25M12 13.875l-2.25 2.25M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z"/>
                                </svg>
                                <p class="text-sm text-surface-400 dark:text-surface-500">سفارشی یافت نشد.</p>
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
