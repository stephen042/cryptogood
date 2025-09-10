<div class="grid"
    style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 24px; width: 100%;">

    <!-- Balance Card -->
    <div class="bg-white dark:bg-gray-800"
        style="background:#1f2937; padding:24px; border-radius:12px; box-shadow:0 4px 10px rgba(0,0,0,0.2); width:100%; box-sizing:border-box;">

        <!-- Credit User Balance -->
        <form wire:submit.prevent="credit_balance" style="margin-bottom:24px;">
            <label style="display:block; font-size:14px; margin-bottom:6px; color:white;">
                Credit User Balance Manually
            </label>
            <div style="display:flex; width:100%; min-width:0;">
                <input type="number" wire:model.live="credit_bal_amount" placeholder="Credit User Balance"
                    style="flex:1; padding:10px 14px; border:1px solid #374151; border-right:none; border-radius:8px 0 0 8px; background:#111827; color:white; font-size:14px;">
                <button type="submit"
                    style="padding:10px 14px; border:1px solid #16a34a; background:none; color:#16a34a; font-size:12px; font-weight:600; border-radius:0 8px 8px 0; cursor:pointer;"
                    onmouseover="this.style.background='#16a34a'; this.style.color='white';"
                    onmouseout="this.style.background='none'; this.style.color='#16a34a';">
                    Credit
                </button>
            </div>
            @error('credit_bal_amount')
            <p style="color:#ef4444; font-size:12px; margin-top:6px;">{{ $message }}</p>
            @enderror
        </form>

        <!-- Debit User Balance -->
        <form wire:submit.prevent="debit_balance">
            <label style="display:block; font-size:14px; margin-bottom:6px; color:white;">
                Debit User Balance Manually
            </label>
            <div style="display:flex; width:100%; min-width:0;">
                <input type="number" wire:model.live="debit_bal_amount" placeholder="Debit User Balance"
                    style="flex:1; padding:10px 14px; border:1px solid #374151; border-right:none; border-radius:8px 0 0 8px; background:#111827; color:white; font-size:14px;">
                <button type="submit"
                    style="padding:10px 14px; border:1px solid #dc2626; background:none; color:#dc2626; font-size:12px; font-weight:600; border-radius:0 8px 8px 0; cursor:pointer;"
                    onmouseover="this.style.background='#dc2626'; this.style.color='white';"
                    onmouseout="this.style.background='none'; this.style.color='#dc2626';">
                    Debit
                </button>
            </div>
            @error('debit_bal_amount')
            <p style="color:#ef4444; font-size:12px; margin-top:6px;">{{ $message }}</p>
            @enderror
        </form>
    </div>

    <!-- Sub Balance Card -->
    <div class="bg-white dark:bg-gray-800"
        style="background:#1f2937; padding:24px; border-radius:12px; box-shadow:0 4px 10px rgba(0,0,0,0.2); width:100%; box-sizing:border-box;">

        <!-- Credit User earns Balance -->
        <form wire:submit.prevent="credit_earn_balance" style="margin-bottom:24px;">
            <label style="display:block; font-size:14px; margin-bottom:6px; color:white;">
                Credit User Earnings Balance Manually 
            </label>
            <div style="display:flex; width:100%; min-width:0;">
                <input type="number" wire:model.live="credit_earn_bal_amount" placeholder="Credit User Sub Funds"
                    style="flex:1; padding:10px 14px; border:1px solid #374151; border-right:none; border-radius:8px 0 0 8px; background:#111827; color:white; font-size:14px;">
                <button type="submit"
                    style="padding:10px 14px; border:1px solid #16a34a; background:none; color:#16a34a; font-size:12px; font-weight:600; border-radius:0 8px 8px 0; cursor:pointer;"
                    onmouseover="this.style.background='#16a34a'; this.style.color='white';"
                    onmouseout="this.style.background='none'; this.style.color='#16a34a';">
                    Credit
                </button>
            </div>
            @error('credit_earn_bal_amount')
            <p style="color:#ef4444; font-size:12px; margin-top:6px;">{{ $message }}</p>
            @enderror
        </form>

        <!-- Debit User Earns Balance -->
        <form wire:submit.prevent="debit_earns_balance">
            <label style="display:block; font-size:14px; margin-bottom:6px; color:white;">
                Debit User Earnings Balance Manually
            </label>
            <div style="display:flex; width:100%; min-width:0;">
                <input type="number" wire:model.live="debit_earn_bal_amount" placeholder="Debit User Sub Funds"
                    style="flex:1; padding:10px 14px; border:1px solid #374151; border-right:none; border-radius:8px 0 0 8px; background:#111827; color:white; font-size:14px;">
                <button type="submit"
                    style="padding:10px 14px; border:1px solid #dc2626; background:none; color:#dc2626; font-size:12px; font-weight:600; border-radius:0 8px 8px 0; cursor:pointer;"
                    onmouseover="this.style.background='#dc2626'; this.style.color='white';"
                    onmouseout="this.style.background='none'; this.style.color='#dc2626';">
                    Debit
                </button>
            </div>
            @error('debit_earn_bal_amount')
            <p style="color:#ef4444; font-size:12px; margin-top:6px;">{{ $message }}</p>
            @enderror
        </form>
    </div>

    <!-- Network Fee -->
    <div class="bg-white dark:bg-gray-800"
        style="background:#1f2937; padding:24px; border-radius:12px; box-shadow:0 4px 10px rgba(0,0,0,0.2); width:100%; box-sizing:border-box;">

        <form wire:submit.prevent="network_fee_top_up">
            <label style="display:block; font-size:14px; margin-bottom:6px; color:white;">
                Network Fee
            </label>
            <div style="display:flex; width:100%; min-width:0;">
                <input type="number" wire:model.live="network_fee_amount" placeholder="Network Fee"
                    style="flex:1; padding:10px 14px; border:1px solid #374151; border-right:none; border-radius:8px 0 0 8px; background:#111827; color:white; font-size:14px;">
                <button type="submit"
                    style="padding:10px 14px; border:1px solid #16a34a; background:none; color:#16a34a; font-size:12px; font-weight:600; border-radius:0 8px 8px 0; cursor:pointer;"
                    onmouseover="this.style.background='#16a34a'; this.style.color='white';"
                    onmouseout="this.style.background='none'; this.style.color='#16a34a';">
                    Update
                </button>
            </div>
            @error('network_fee_amount')
            <p style="color:#ef4444; font-size:12px; margin-top:6px;">{{ $message }}</p>
            @enderror
        </form>
    </div>

    <!-- Account Status & Email Card -->
    <div class="bg-white dark:bg-gray-800"
        style="background:#1f2937; padding:24px; border-radius:12px; box-shadow:0 4px 10px rgba(0,0,0,0.2); width:100%; box-sizing:border-box;">

        <label style="display:block; font-size:14px; margin-bottom:6px; color:white;">
            Email User
        </label>
        <div style="display:flex; width:100%; min-width:0;">
            <input type="email" readonly value="{{ $user->email }}"
                style="flex:1; padding:10px 14px; border:1px solid #374151; border-right:none; border-radius:8px 0 0 8px; background:#374151; color:white; font-size:14px;">
            <a href="mailto:{{ $user->email }}"
                style="display:flex; align-items:center; justify-content:center; padding:10px 14px; border:1px solid #2563eb; background:none; color:#2563eb; font-size:12px; font-weight:600; border-radius:0 8px 8px 0; text-decoration:none; cursor:pointer;"
                onmouseover="this.style.background='#2563eb'; this.style.color='white';"
                onmouseout="this.style.background='none'; this.style.color='#2563eb';">
                📧 Send
            </a>
        </div>
    </div>
</div>