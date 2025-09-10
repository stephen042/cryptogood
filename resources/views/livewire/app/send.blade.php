<div>
    <form wire:submit.prevent="send" class="space-y-6">

        <!-- Select Crypto -->
        <div>
            <label class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">
                Select Crypto
            </label>
            <select wire:model="crypto" class="w-full px-4 py-3 text-sm border border-gray-300 rounded-lg bg-transparent shadow-theme-xs 
                           focus:border-brand-300 focus:outline-hidden focus:ring-3 focus:ring-brand-500/10 
                           dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 
                           dark:focus:border-brand-800">
                <option value="">-- Choose Crypto --</option>
                <option value="bitcoin">Bitcoin</option>
                <option value="ethereum">Ethereum</option>
                <option value="usdt">USDT</option>
                <option value="solana">Solana</option>
                <option value="polygon">Polygon</option>
                <option value="ripple">Ripple</option>
            </select>
            @error('crypto')
            <p style="color:rgb(235, 66, 66); font-size:12px; margin-top:4px;">{{ $message }}</p>
            @enderror
        </div>

        <!-- Amount Input -->
        <div>
            <label class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">
                Amount (USD)
            </label>
            <div class="relative">
                <span class="absolute text-gray-500 -translate-y-1/2 left-4 top-1/2 dark:text-gray-400">$</span>
                <input type="number" wire:model="amount" placeholder="Enter amount" class="w-full px-4 py-3 text-sm text-gray-800 bg-transparent border border-gray-300 rounded-lg 
                   dark:bg-dark-900 h-11 pl-11 shadow-theme-xs placeholder:text-gray-400 
                   focus:border-brand-300 focus:outline-hidden focus:ring-3 focus:ring-brand-500/10 
                   dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 
                   dark:focus:border-brand-800">
            </div>
            @error('amount')
            <p style="color:rgb(235, 66, 66); font-size:12px; margin-top:4px;">{{ $message }}</p>
            @enderror

            {{-- Balance Display --}}
            @if(auth()->user()->earnings_balance !== null)
                @if(auth()->user()->earnings_balance >= 1000)
                <p style="color:rgb(44, 220, 44); font-size:13px; margin-top:6px;">Withdrawable Balance: ${{ number_format(auth()->user()->earnings_balance, 2) }}</p>
                @else
                <p style="color:rgb(247, 110, 110); font-size:13px; margin-top:6px;">Withdrawable Balance: ${{ number_format(auth()->user()->earnings_balance, 2) }}</p>
                @endif
            @endif
        </div>


        <!-- Wallet Address Input -->
        <div>
            <label class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">
                Receiver Wallet Address
            </label>
            <input type="text" wire:model="walletAddress" class="w-full px-4 py-3 text-sm border border-gray-300 rounded-lg bg-gray-100 
                           dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 shadow-theme-xs">
            @error('walletAddress')
            <p style="color:rgb(235, 66, 66); font-size:12px; margin-top:4px;">{{ $message }}</p>
            @enderror
        </div>

        <!-- Submit Button -->
        <div>
            <x-button text="Send" type="submit" class="flex items-center justify-center w-full px-4 py-3 text-sm font-medium text-white transition rounded-lg 
                           bg-brand-500 shadow-theme-xs hover:bg-brand-600" />
        </div>
    </form>
</div>