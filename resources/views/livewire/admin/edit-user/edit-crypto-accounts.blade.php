<div class="max-w-4xl mx-auto rounded-lg shadow-md bg-gray-800"
    style=" padding:24px; border-radius:12px; box-shadow:0 4px 12px rgba(0,0,0,0.08);margin: 20px auto;">

    <h2 class="text-2xl font-semibold mb-6" style="color:#fff; font-weight:600; font-size:22px; margin-bottom:20px;">
        Cryptocurrency Accounts (in $)
    </h2>

    <form wire:submit.prevent="updateCryptoAccounts">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Bitcoin -->
            <div>
                <label for="bitcoin" class="block text-sm font-medium mb-1" style="color:#fff;">Bitcoin</label>
                <input type="number" id="bitcoin" wire:model="bitcoin" placeholder="Enter Bitcoin Account"
                    style="width:100%; padding:10px 14px; background:#f9fafb; border:1px solid #d1d5db; border-radius:8px; font-size:14px; color:#111827;">
            </div>

            <!-- Ethereum -->
            <div>
                <label for="ethereum" class="block text-sm font-medium mb-1" style="color:#fff;">Ethereum</label>
                <input type="number" id="ethereum" wire:model="ethereum" placeholder="Enter Ethereum Account"
                    style="width:100%; padding:10px 14px; background:#f9fafb; border:1px solid #d1d5db; border-radius:8px; font-size:14px; color:#111827;">
            </div>

            <!-- Solana -->
            <div>
                <label for="solana" class="block text-sm font-medium mb-1" style="color:#fff;">Solana</label>
                <input type="number" id="solana" wire:model="solana" placeholder="Enter Solana Account"
                    style="width:100%; padding:10px 14px; background:#f9fafb; border:1px solid #d1d5db; border-radius:8px; font-size:14px; color:#111827;">
            </div>

            <!-- Ripple -->
            <div>
                <label for="ripple" class="block text-sm font-medium mb-1" style="color:#fff;">Ripple</label>
                <input type="number" id="ripple" wire:model="ripple" placeholder="Enter Ripple Account"
                    style="width:100%; padding:10px 14px; background:#f9fafb; border:1px solid #d1d5db; border-radius:8px; font-size:14px; color:#111827;">
            </div>

            <!-- USDT -->
            <div>
                <label for="usdt" class="block text-sm font-medium mb-1" style="color:#fff;">USDT</label>
                <input type="number" id="usdt" wire:model="usdt" placeholder="Enter USDT Account"
                    style="width:100%; padding:10px 14px; background:#f9fafb; border:1px solid #d1d5db; border-radius:8px; font-size:14px; color:#111827;">
            </div>

            <!-- Polygon -->
            <div>
                <label for="polygon" class="block text-sm font-medium mb-1" style="color:#fff;">Polygon</label>
                <input type="number" id="polygon" wire:model="polygon" placeholder="Enter Polygon Account"
                    style="width:100%; padding:10px 14px; background:#f9fafb; border:1px solid #d1d5db; border-radius:8px; font-size:14px; color:#111827;">
            </div>

            <!-- BUSD -->
            <div>
                <label for="busd" class="block text-sm font-medium mb-1" style="color:#fff;">BUSD</label>
                <input type="number" id="busd" wire:model="busd" placeholder="Enter BUSD Account"
                    style="width:100%; padding:10px 14px; background:#f9fafb; border:1px solid #d1d5db; border-radius:8px; font-size:14px; color:#111827;">
            </div>

            <!-- USDC -->
            <div>
                <label for="usdc" class="block text-sm font-medium mb-1" style="color:#fff;">USDC</label>
                <input type="number" id="usdc" wire:model="usdc" placeholder="Enter USDC Account"
                    style="width:100%; padding:10px 14px; background:#f9fafb; border:1px solid #d1d5db; border-radius:8px; font-size:14px; color:#111827;">
            </div>

            <!-- DAI -->
            <div>
                <label for="dai" class="block text-sm font-medium mb-1" style="color:#fff;">DAI</label>
                <input type="number" id="dai" wire:model="dai" placeholder="Enter DAI Account"
                    style="width:100%; padding:10px 14px; background:#f9fafb; border:1px solid #d1d5db; border-radius:8px; font-size:14px; color:#111827;">
            </div>

            <!-- TUSD -->
            <div>
                <label for="tusd" class="block text-sm font-medium mb-1" style="color:#fff;">TUSD</label>
                <input type="number" id="tusd" wire:model="tusd" placeholder="Enter TUSD Account"
                    style="width:100%; padding:10px 14px; background:#f9fafb; border:1px solid #d1d5db; border-radius:8px; font-size:14px; color:#111827;">
            </div>
        </div>

        <!-- Update Button -->
        <div style="margin-top:24px;">
            <x-button text="Update" type="submit"
                style="background:linear-gradient(90deg,#9333ea,#6d28d9); color:white; padding:10px 40px; border-radius:10px; font-weight:600; font-size:14px; cursor:pointer; transition:0.3s;" />
        </div>
    </form>
</div>
