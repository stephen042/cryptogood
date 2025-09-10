<div style="max-width:1200px; margin:20px auto;">
    <div style="background:#111827; box-shadow:0 4px 6px rgba(0,0,0,0.1); border-radius:12px; overflow:hidden;">
        <!-- Header -->
        <div style="padding:24px; border-bottom:1px solid #374151; display:flex; align-items:center; justify-content:space-between;">
            <h2 style="font-size:20px; font-weight:600; color:white;">Trade History</h2>
        </div>

        <!-- Table -->
        <div style="overflow-x:auto;">
            <table style="width:100%; font-size:14px; text-align:left; color:white; border-collapse:collapse;">
                <thead>
                    <tr style="font-size:14px; font-weight:600; color:white;">
                        <th style="padding:16px;">S/N</th>
                        <th style="padding:16px;">Date</th>
                        <th style="padding:16px;">Buy / Sell</th>
                        <th style="padding:16px;">Trade Type</th>
                        <th style="padding:16px;">Trade Asset</th>
                        <th style="padding:16px;">Stake Amount ($)</th>
                        <th style="padding:16px;">Status</th>
                        <th style="padding:16px;">Profit ($)</th>
                        <th style="padding:16px;">Loss ($)</th>
                        <th style="padding:16px;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($trades as $index => $trade)
                    <tr style="border-bottom:1px solid #374151; transition:background 0.2s;">
                        <td style="padding:16px;">{{ $index + 1 }}</td>
                        <td style="padding:16px;">{{ $trade->created_at->format('d M, Y') }}</td>
                        <td style="padding:16px;">
                            @if ($trade->buy_sell == 2)
                                Sell
                            @elseif ($trade->buy_sell == 1)
                                Buy
                            @endif
                        </td>
                        <td style="padding:16px;">{{ $trade->trade_type }}</td>
                        <td style="padding:16px; font-weight:500;">{{ $trade->trade_asset }}</td>
                        <td style="padding:16px; font-weight:500;">{{ number_format($trade->trade_amount, 2) }}</td>
                        <td style="padding:16px;">
                            <span style="padding:4px 12px; font-size:12px; font-weight:600; border-radius:12px;
                                @if($trade->trade_status == 3) background:#059669; color:white;
                                @elseif($trade->trade_status == 1) background:#F59E0B; color:white;
                                @else background:#DC2626; color:white; @endif">
                                @if ($trade->trade_status == 3)
                                    Completed
                                @elseif ($trade->trade_status == 1)
                                    Ongoing
                                @else
                                    Denied
                                @endif
                            </span>
                        </td>

                        <!-- Profit -->
                        <td style="padding:16px;">
                            @if ($trade->trade_status == 1)
                                <input type="number" step="0.01" wire:model.defer="profits.{{ $trade->id }}"
                                    placeholder="Enter Profit"
                                    style="width:90px; background:#1F2937; color:#10B981; border:1px solid #059669; border-radius:6px; padding:4px 8px; font-size:13px; outline:none;">
                            @else
                                <span style="color:#10B981;">{{ number_format($trade->trade_profit, 2) }}</span>
                            @endif
                        </td>

                        <!-- Loss -->
                        <td style="padding:16px;">
                            @if ($trade->trade_status == 1)
                                <input type="number" step="0.01" wire:model.defer="losses.{{ $trade->id }}"
                                    placeholder="Enter Loss"
                                    style="width:90px; background:#1F2937; color:#EF4444; border:1px solid #DC2626; border-radius:6px; padding:4px 8px; font-size:13px; outline:none;">
                            @else
                                <span style="color:#EF4444;">{{ number_format($trade->trade_loss, 2) }}</span>
                            @endif
                        </td>

                        <!-- Actions -->
                        <td style="padding:16px;">
                            <div style="display:flex; gap:8px; flex-wrap:wrap;">
                                <!-- Delete Button -->
                                <button wire:click="deleteTrade({{ $trade->id }})"
                                    wire:confirm='Are you sure you want to delete this transaction ?'
                                    style="display:flex; align-items:center; gap:4px; padding:4px 12px; border:1px solid #DC2626; color:#DC2626; font-size:12px; font-weight:600; border-radius:6px; background:none; cursor:pointer;"
                                    onmouseover="this.style.background='#DC2626'; this.style.color='white';"
                                    onmouseout="this.style.background='none'; this.style.color='#DC2626';">
                                    <svg xmlns="http://www.w3.org/2000/svg" style="height:16px; width:16px;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                    </svg>
                                    <span>Delete</span>
                                </button>

                                @if ($trade->trade_status == 1)
                                <!-- Complete Button -->
                                <button wire:click="completeTrade({{ $trade->id }})" wire:loading.attr="disabled"
                                    wire:confirm='Are you sure you want to complete this trade ?'
                                    style="display:flex; align-items:center; gap:4px; padding:4px 12px; border:1px solid #059669; color:#059669; font-size:12px; font-weight:600; border-radius:6px; background:none; cursor:pointer;"
                                    onmouseover="this.style.background='#059669'; this.style.color='white';"
                                    onmouseout="this.style.background='none'; this.style.color='#059669';">
                                    <svg xmlns="http://www.w3.org/2000/svg" style="height:16px; width:16px;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                    </svg>
                                    <span>Complete</span>
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
        <div style="padding:24px; background:#111827; border-top:1px solid #374151;">
            {{ $trades->links('pagination::tailwind') }}
        </div>
    </div>
</div>

