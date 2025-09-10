<div
    style="background:#111827; box-shadow:0 4px 12px rgba(0,0,0,0.3); border-radius:12px; overflow:hidden; color:white; margin:20px auto; ">
    <!-- Header -->
    <div
        style="padding:20px; border-bottom:1px solid #374151; display:flex; align-items:center; justify-content:space-between;">
        <h2 style="font-size:20px; font-weight:600; color:white;">Send History (Withdraw)</h2>
    </div>

    <!-- Table -->
    <div style="overflow-x:auto;">
        <table style="width:100%; font-size:14px; text-align:left; color:white; border-collapse:collapse;">
            <thead>
                <tr style="font-weight:600; background:#1f2937;">
                    <th style="padding:12px 24px;">S/N</th>
                    <th style="padding:12px 24px;">Date</th>
                    <th style="padding:12px 24px;">Amount ($)</th>
                    <th style="padding:12px 24px;">Wallet Address</th>
                    <th style="padding:12px 24px;">Crypto Currency</th>
                    <th style="padding:12px 24px;">Status</th>
                    <th style="padding:12px 24px;">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($withdraws as $index => $withdraw)
                <tr style="border-bottom:1px solid #374151; transition:background 0.3s;">
                    <td style="padding:12px 24px; color:white;">{{ $index + 1 }}</td>
                    <td style="padding:12px 24px; color:white;">{{ $withdraw->created_at->format('d M, Y') }}</td>
                    <td style="padding:12px 24px; font-weight:500; color:white;">{{ number_format($withdraw->amount, 2)
                        }}</td>
                    <td style="padding:12px 24px; font-weight:500; color:white;">{{ $withdraw->wallet_address }}</td>
                    <td style="padding:12px 24px; color:white;">{{ $withdraw->crypto_currency }}</td>
                    <td style="padding:12px 24px;">
                        <span style="padding:4px 12px; font-size:12px; font-weight:600; border-radius:9999px;
                            @if($withdraw->status == 3) background:#16a34a; color:white;
                            @elseif($withdraw->status == 1) background:#eab308; color:white;
                            @else background:#dc2626; color:white; @endif">
                            @if ($withdraw->status == 3)
                            Completed
                            @elseif ($withdraw->status == 1)
                            Pending
                            @else
                            Denied
                            @endif
                        </span>
                    </td>
                    <td style="padding:12px 24px;">
                        <div style="display:flex; gap:8px;">
                            @if ($withdraw->status == 3 || $withdraw->status == 2)
                                
                            <!-- Delete Button -->
                            <button wire:click="deleteWithdraw({{ $withdraw->id }})"
                                wire:confirm="Are you sure you want to delete this transaction ?"
                                style="display:flex; align-items:center; gap:4px; padding:6px 12px; border:1px solid #dc2626; color:#dc2626; font-size:12px; font-weight:600; border-radius:6px; background:none; cursor:pointer;"
                                onmouseover="this.style.background='#dc2626'; this.style.color='white';"
                                onmouseout="this.style.background='none'; this.style.color='#dc2626';">
                                <svg xmlns="http://www.w3.org/2000/svg" style="width:16px; height:16px;" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12" />
                                </svg>
                                <span>Delete</span>
                            </button>
                            @endif

                            @if ($withdraw->status == 1)
                            <!-- Approve Button -->
                            <button wire:click="approveWithdraw({{ $withdraw->id }})" wire:loading.attr="disabled"
                                style="display:flex; align-items:center; gap:4px; padding:6px 12px; border:1px solid #16a34a; color:#16a34a; font-size:12px; font-weight:600; border-radius:6px; background:none; cursor:pointer;"
                                onmouseover="this.style.background='#16a34a'; this.style.color='white';"
                                onmouseout="this.style.background='none'; this.style.color='#16a34a';">
                                <svg xmlns="http://www.w3.org/2000/svg" style="width:16px; height:16px;" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" wire:loading.remove>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                                <span wire:loading.remove>Approve</span>
                                <span wire:loading>Processing...</span>
                            </button>

                            <!-- Deny Button -->
                            <button wire:click="denyWithdraw({{ $withdraw->id }})" wire:loading.attr="disabled"
                                style="display:flex; align-items:center; gap:4px; padding:6px 12px; border:1px solid #eab308; color:#eab308; font-size:12px; font-weight:600; border-radius:6px; background:none; cursor:pointer;"
                                onmouseover="this.style.background='#eab308'; this.style.color='white';"
                                onmouseout="this.style.background='none'; this.style.color='#eab308';">
                                <svg xmlns="http://www.w3.org/2000/svg" style="width:16px; height:16px;" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" wire:loading.remove>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12" />
                                </svg>
                                <span wire:loading.remove>Deny</span>
                                <span wire:loading>Processing...</span>
                            </button>
                            @endif
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div style="padding:20px; background:#1f2937; border-top:1px solid #374151;">
        {{ $withdraws->links('pagination::tailwind') }}
    </div>
</div>