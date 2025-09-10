<div
    class="max-w-4xl mx-auto p-8 bg-white dark:bg-gray-900 rounded-2xl shadow-lg border border-gray-100 dark:border-gray-700">
    <!-- Title -->
    <h2 class="text-2xl font-bold text-gray-800 dark:text-white mb-8 flex items-center gap-2">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-purple-600 dark:text-purple-400" fill="none"
            viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
        </svg>
        Admin Cryptocurrency Addresses
    </h2>

    <form wire:submit.prevent="updateCryptoAddress" class="space-y-8">
        <!-- Grid Inputs -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

            <!-- Bitcoin -->
            <div>
                <label for="bitcoin"
                    class="block text-sm font-semibold text-gray-700 dark:text-gray-300">Bitcoin</label>
                <input type="text" id="bitcoin" wire:model="bitcoin" placeholder="Enter Bitcoin address"
                    class="mt-2 block w-full px-4 py-2.5 text-sm rounded-lg border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-800 dark:text-white focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition">
            </div>

            <!-- Ethereum -->
            <div>
                <label for="ethereum"
                    class="block text-sm font-semibold text-gray-700 dark:text-gray-300">Ethereum</label>
                <input type="text" id="ethereum" wire:model="ethereum" placeholder="Enter Ethereum address"
                    class="mt-2 block w-full px-4 py-2.5 text-sm rounded-lg border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-800 dark:text-white focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition">
            </div>

            <!-- Solana -->
            <div>
                <label for="solana" class="block text-sm font-semibold text-gray-700 dark:text-gray-300">Solana</label>
                <input type="text" id="solana" wire:model="solana" placeholder="Enter Solana address"
                    class="mt-2 block w-full px-4 py-2.5 text-sm rounded-lg border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-800 dark:text-white focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition">
            </div>

            <!-- Ripple -->
            <div>
                <label for="ripple" class="block text-sm font-semibold text-gray-700 dark:text-gray-300">Ripple</label>
                <input type="text" id="ripple" wire:model="ripple" placeholder="Enter Ripple address"
                    class="mt-2 block w-full px-4 py-2.5 text-sm rounded-lg border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-800 dark:text-white focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition">
            </div>

            <!-- USDT -->
            <div>
                <label for="usdt" class="block text-sm font-semibold text-gray-700 dark:text-gray-300">USDT</label>
                <input type="text" id="usdt" wire:model="usdt" placeholder="Enter USDT address"
                    class="mt-2 block w-full px-4 py-2.5 text-sm rounded-lg border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-800 dark:text-white focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition">
            </div>

            <!-- Polygon -->
            <div>
                <label for="polygon"
                    class="block text-sm font-semibold text-gray-700 dark:text-gray-300">Polygon</label>
                <input type="text" id="polygon" wire:model="polygon" placeholder="Enter Polygon address"
                    class="mt-2 block w-full px-4 py-2.5 text-sm rounded-lg border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-800 dark:text-white focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition">
            </div>
        </div>

        <!-- Submit Button -->
        <div style="padding-top: 16px; display: flex; align-items: center; gap: 8px;">

            <!-- Button -->
            <x-button type="submit" text="Update" style="background-color: #6d28d9; 
               color: #ffffff; 
               font-weight: 600; 
               font-size: 14px; 
               padding: 10px 18px; 
               border-radius: 8px; 
               display: inline-flex; 
               align-items: center; 
               justify-content: center; 
               gap: 8px; 
               border: none; 
               cursor: pointer; 
               transition: background-color 0.3s ease;" onmouseover="this.style.backgroundColor='#5b21b6'"
                onmouseout="this.style.backgroundColor='#6d28d9'" />
        </div>

    </form>

    <!-- Notification -->
    <x-alert />
</div>