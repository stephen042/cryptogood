<x-layouts.admin>

    <div class="grid grid-cols-12 gap-4 md:gap-6 m-6">
        <div class="col-span-12 space-y-6">
            <div class="grid grid-cols-2 gap-3 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                <!-- Metric Item -->
                <div
                    class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03] p-6 flex flex-col items-center justify-center">
                    <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-gray-100 dark:bg-gray-800">
                        <!-- SVG Icon -->
                        <svg class="fill-gray-800 dark:fill-white/90" width="24" height="24" viewBox="0 0 24 24">
                            <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 
                1.79-4 4 1.79 4 4 4zm0 2c-2.67 
                0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z" />
                        </svg>
                    </div>
                    <span class="mt-3 text-sm text-gray-500 dark:text-gray-400">All Customers</span>
                    <h4 class="mt-1 text-xl font-bold text-gray-800 dark:text-white/90">{{ $totalUsers }}</h4>
                </div>

                <!-- Metric Item -->
                <div
                    class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03] p-6 flex flex-col items-center justify-center">
                    <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-gray-100 dark:bg-gray-800">
                        <svg class="fill-gray-800 dark:fill-white/90" width="24" height="24" viewBox="0 0 24 24">
                            <path d="M12 21.35l-1.45-1.32C5.4 
                15.36 2 12.28 2 8.5 2 5.42 
                4.42 3 7.5 3c1.74 0 3.41.81 
                4.5 2.09C13.09 3.81 14.76 3 
                16.5 3 19.58 3 22 5.42 22 
                8.5c0 3.78-3.4 6.86-8.55 
                11.54L12 21.35z" />
                        </svg>
                    </div>
                    <span class="mt-3 text-sm text-gray-500 dark:text-gray-400">Total Balance</span>
                    <h4 class="mt-1 text-xl font-bold text-gray-800 dark:text-white/90">${{ number_format($totalBalance, 2) }}</h4>
                </div>

                <!-- Metric Item -->
                <div
                    class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03] p-6 flex flex-col items-center justify-center">
                    <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-gray-100 dark:bg-gray-800">
                        <svg class="fill-gray-800 dark:fill-white/90" width="24" height="24" viewBox="0 0 24 24">
                            <path d="M12 17l-5-5h3V7h4v5h3zM5 
                19h14v2H5z" />
                        </svg>
                    </div>
                    <span class="mt-3 text-sm text-gray-500 dark:text-gray-400">Total Earns</span>
                    <h4 class="mt-1 text-xl font-bold text-gray-800 dark:text-white/90">${{ number_format($totalEarnings, 2) }}</h4>
                </div>

                <!-- Metric Item -->
                <div
                    class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03] p-6 flex flex-col items-center justify-center">
                    <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-gray-100 dark:bg-gray-800">
                        <svg class="fill-gray-800 dark:fill-white/90" width="24" height="24" viewBox="0 0 24 24">
                            <path d="M12 2a10 10 0 100 
                20 10 10 0 000-20zm1 
                15h-2v-2h2v2zm0-4h-2V7h2v6z" />
                        </svg>
                    </div>
                    <span class="mt-3 text-sm text-gray-500 dark:text-gray-400">Total Withdrawn</span>
                    <h4 class="mt-1 text-xl font-bold text-gray-800 dark:text-white/90">${{ number_format($totalWithdrawals, 2) }}</h4>
                </div>
            </div>

        </div>
    </div>

    <div style="margin: 20px auto">
        {{-- view all users --}}
        <livewire:admin.all-users />
    </div>
</x-layouts.admin>