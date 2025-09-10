<x-layouts.admin>
    <div class="grid grid-cols-12 gap-4 md:gap-6 m-6">
        <div class="col-span-12 space-y-6">
            <div class="grid grid-cols-2 gap-3 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">

                <!-- Balance -->
                <div
                    class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03] p-6 flex flex-col items-center justify-center">
                    <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-gray-100 dark:bg-gray-800">
                        <!-- Wallet Icon -->
                        <svg class="fill-gray-800 dark:fill-white/90" width="24" height="24" viewBox="0 0 24 24">
                            <path d="M21 7H5c-1.1 0-2 .9-2 2v9c0 1.1.9 2 
                            2 2h16c1.1 0 2-.9 
                            2-2V9c0-1.1-.9-2-2-2zm0 
                            11H5V9h16v9zm-2-5h-4v2h4v-2zM19 5H3c-1.1 
                            0-2 .9-2 2v10c0 1.1.9 2 
                            2 2h2V7h14V5z" />
                        </svg>
                    </div>
                    <span style="text-align:center;"
                        class="mt-3 text-sm text-gray-500 dark:text-gray-400">Balance</span>
                    <h4 style="text-align:center;" class="mt-1 text-xl font-bold text-gray-800 dark:text-white/90">
                        ${{ number_format($user_balance, 2) }}
                    </h4>
                </div>

                <!-- User Earnings -->
                <div
                    class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03] p-6 flex flex-col items-center justify-center">
                    <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-gray-100 dark:bg-gray-800">
                        <!-- Trending Up Icon -->
                        <svg class="fill-gray-800 dark:fill-white/90" width="24" height="24" viewBox="0 0 24 24">
                            <path d="M16 6l2.29 2.29-4.88 4.88-4-4L2 
                            17.59 3.41 19l6-6 
                            4 4 6.3-6.29L22 
                            12V6z" />
                        </svg>
                    </div>
                    <span style="text-align:center;" class="mt-3 text-sm text-gray-500 dark:text-gray-400">User
                        Earnings</span>
                    <h4 style="text-align:center;" class="mt-1 text-xl font-bold text-gray-800 dark:text-white/90">
                        ${{ number_format($userTotalEarnings, 2) }}
                    </h4>
                </div>

                <!-- Total Buy (Deposit/Receive) -->
                <div
                    class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03] p-6 flex flex-col items-center justify-center">
                    <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-gray-100 dark:bg-gray-800">
                        <!-- Download Icon -->
                        <svg class="fill-gray-800 dark:fill-white/90" width="24" height="24" viewBox="0 0 24 24">
                            <path d="M5 20h14v-2H5v2zm7-18l-5 5h3v4h4V7h3l-5-5z" />
                        </svg>
                    </div>
                    <span style="text-align:center;" class="mt-3 text-sm text-gray-500 dark:text-gray-400">Total Buy
                        (Deposit/Receive)</span>
                    <h4 style="text-align:center;" class="mt-1 text-xl font-bold text-gray-800 dark:text-white/90">
                        ${{ number_format($userTotalBuys, 2) }}
                    </h4>
                </div>

                <!-- Total Send (Withdrawn) -->
                <div
                    class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03] p-6 flex flex-col items-center justify-center">
                    <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-gray-100 dark:bg-gray-800">
                        <!-- Upload Icon -->
                        <svg class="fill-gray-800 dark:fill-white/90" width="24" height="24" viewBox="0 0 24 24">
                            <path d="M5 20h14v-2H5v2zm7-18l5 
                            5h-3v4h-4V7H7l5-5z" />
                        </svg>
                    </div>
                    <span style="text-align:center;" class="mt-3 text-sm text-gray-500 dark:text-gray-400">Total Send
                        (Withdrawn)</span>
                    <h4 style="text-align:center;" class="mt-1 text-xl font-bold text-gray-800 dark:text-white/90">
                        ${{ number_format($userTotalSends, 2) }}
                    </h4>
                </div>

            </div>
        </div>
    </div>

    <livewire:admin.edit-user.edit-crypto-accounts :user="$user" />
    <livewire:admin.edit-user.account-top-up :user="$user" />
    <livewire:admin.edit-user.edit-progress-bar :user="$user" />
    <livewire:admin.edit-user.edit-signal-strength :user="$user" />
    <livewire:admin.edit-user.edit-buy :user="$user" />
    <livewire:admin.edit-user.edit-send :user="$user" />
    <livewire:admin.edit-user.edit-trade :user="$user" />
</x-layouts.admin>