<div>
    <!-- Trade Form -->
    <form style="padding:24px; border-radius:16px; box-shadow:0 4px 10px rgba(0,0,0,0.4); width:100%; max-width:600px; margin: 0 auto 150px auto;" class="bg-gray-800">

        <!-- Type Select -->
        <div style="margin-bottom:20px;">
            <label for="type"
                style="display:block; color:#d1d5db; font-size:14px; font-weight:500; margin-bottom:8px;">Select
                Type</label>
            <select id="type" wire:model.live="type"
                style="width:100%; padding:12px; border-radius:10px; background:#111827; color:#fff; outline:none; border:none; font-size:14px;">
                <option value="">Select Trade type</option>
                <option value="Forex">Forex</option>
                <option value="Crypto">Crypto</option>
                <option value="Stocks">Stocks</option>
            </select>
            @error('type')
            <span style="color:#f87171; font-size:13px; margin-top:8px; display:block;">{{ $message }}</span>
            @enderror
        </div>

        <!-- Assets Select -->
        <div style="margin-bottom:20px;">
            <label for="assets"
                style="display:block; color:#d1d5db; font-size:14px; font-weight:500; margin-bottom:8px;">Select
                Asset</label>
            <select id="assets" wire:model.live="assets"
                style="width:100%; padding:12px; border-radius:10px; background:#111827; color:#fff; outline:none; border:none; font-size:14px;">
                @forelse ($data as $key => $value)
                <option value="{{ $key }}">{{ $value }}</option>
                @empty
                <option disabled>Please select trade type above</option>
                @endforelse
            </select>
            @error('assets')
            <span style="color:#f87171; font-size:13px; margin-top:8px; display:block;">{{ $message }}</span>
            @enderror
        </div>

        <!-- Amount Input -->
        <div style="margin-bottom:20px;">
            <label for="amount"
                style="display:block; color:#d1d5db; font-size:14px; font-weight:500; margin-bottom:8px;">Amount</label>
            <input id="amount" type="number" wire:model.live="amount" placeholder="1000"
                style="width:100%; padding:12px; border-radius:10px; background:#111827; color:#fff; font-size:14px; border:none; outline:none;" />
            @error('amount')
            <span style="color:#f87171; font-size:13px; margin-top:8px; display:block;">{{ $message }}</span>
            @enderror
        </div>

        <!-- Duration Select -->
        <div style="margin-bottom:24px;">
            <label for="duration"
                style="display:block; color:#d1d5db; font-size:14px; font-weight:500; margin-bottom:8px;">Duration</label>
            <select id="duration" wire:model.live="duration"
                style="width:100%; padding:12px; border-radius:10px; background:#111827; color:#fff; outline:none; border:none; font-size:14px;">
                <option value="">Select trade duration</option>
                <option value="2 minutes">2 minutes</option>
                <option value="5 minutes">5 minutes</option>
                <option value="10 minutes">10 minutes</option>
                <option value="30 minutes">30 minutes</option>
                <option value="1 hour">1 hour</option>
                <option value="2 hours">2 hours</option>
                <option value="4 hours">4 hours</option>
                <option value="6 hours">6 hours</option>
                <option value="8 hours">8 hours</option>
                <option value="10 hours">10 hours</option>
                <option value="20 hours">20 hours</option>
                <option value="1 day">1 day</option>
                <option value="2 days">2 days</option>
                <option value="3 days">3 days</option>
                <option value="4 days">4 days</option>
                <option value="5 days">5 days</option>
                <option value="6 days">6 days</option>
                <option value="1 week">1 week</option>
                <option value="2 weeks">2 weeks</option>
            </select>
            @error('duration')
            <span style="color:#f87171; font-size:13px; margin-top:8px; display:block;">{{ $message }}</span>
            @enderror
        </div>

        <!-- Buttons -->
        <div style="display:flex; justify-content:space-between; gap:12px; margin-top:20px;">
            <!-- Buy Button -->
            <button type="button" wire:click="trade(1)" wire:loading.attr="disabled" wire:target="trade" style="flex:1; padding:9.6px; border-radius:10px; font-weight:600; font-size:13px; 
               background:#2563eb; color:#fff; border:none; cursor:pointer; transition:0.3s;
               display:flex; align-items:center; justify-content:center; gap:8px;"
                onmouseover="this.style.background='#1d4ed8'" onmouseout="this.style.background='#2563eb'">

                <span wire:loading.remove wire:target="trade(1)">
                    <i class="fa-solid fa-arrow-up"></i> Buy
                </span>

                <span wire:loading wire:target="trade(1)">
                    Processing...
                </span>
            </button>

            <!-- Sell Button -->
            <button type="button" wire:click="trade(2)" wire:loading.attr="disabled" wire:target="trade" style="flex:1; padding:9.6px; border-radius:10px; font-weight:600; font-size:13px; 
               background:#dc2626; color:#fff; border:none; cursor:pointer; transition:0.3s;
               display:flex; align-items:center; justify-content:center; gap:8px;"
                onmouseover="this.style.background='#b91c1c'" onmouseout="this.style.background='#dc2626'">

                <span wire:loading.remove wire:target="trade(2)">
                    <i class="fa-solid fa-arrow-down"></i> Sell
                </span>

                <span wire:loading wire:target="trade(2)">
                    Processing...
                </span>
            </button>
        </div>


    </form>

</div>