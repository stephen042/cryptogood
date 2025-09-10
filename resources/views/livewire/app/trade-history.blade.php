<div style="max-width: 100%; overflow-x: auto; margin: 50px auto;">
    <div style="width: auto; display: inline-block; min-width: 100%; background-color: #111827; border-radius: 10px; overflow: hidden;">

        <!-- Header -->
        <div style="padding: 16px; border-bottom: 1px solid #374151; display: flex; align-items: center; justify-content: space-between;">
            <h2 style="font-size: 18px; font-weight: 600; color: #e5e7eb;">Trade History</h2>
        </div>

        <!-- Table Header -->
        <div style="display: grid; grid-template-columns: 1fr 2fr 2fr 2fr 2fr 2fr 2fr 2fr 2fr; 
                    border-top: 1px solid #515d71; background-color: #1f2937; color: #d1d5db; font-weight: 600;">
            <div style="padding: 12px;">S/N</div>
            <div style="padding: 12px;">Trade Type</div>
            <div style="padding: 12px;">Trade Asset</div>
            <div style="padding: 12px;">Stake Amount ($)</div>
            <div style="padding: 12px;">Status</div>
            <div style="padding: 12px;">Buy / Sell</div>
            <div style="padding: 12px;">Profit ($)</div>
            <div style="padding: 12px;">Loss ($)</div>
            <div style="padding: 12px;">Date</div>
        </div>
        <!-- Table Body -->
        @foreach ($trades as $index => $trade)
        <div style="display: grid; grid-template-columns: 1fr 2fr 2fr 2fr 2fr 2fr 2fr 2fr 2fr;
                    border-top: 1px solid #8fadde; transition: background-color 0.2s; color: #f3f4f6;"
             onmouseover="this.style.backgroundColor='#1f2937'"
             onmouseout="this.style.backgroundColor='transparent'">

            <div style="padding: 8px;width:80px; margin-left: 5px">{{ $loop->iteration + ($trades->currentPage() - 1) * $trades->perPage() }}</div>
            <div style="padding: 8px;width:120px">{{ $trade->trade_type }}</div>
            <div style="padding: 8px;width:120px">{{ $trade->trade_asset }}</div>
            <div style="padding: 8px; font-weight: 500; color: #f9fafb;width:120px">
                {{ number_format($trade->trade_amount, 2) }}
            </div>
            <div style="padding: 8px;width:120px">
                <span style="padding: 4px 12px; font-size: 12px; font-weight: 600; border-radius: 9999px;
                    @if($trade->trade_status == 3) background-color: #059669; color: #fff;
                    @elseif($trade->trade_status == 1) background-color: #facc15; color: #000;
                    @else background-color: #dc2626; color: #fff; @endif">
                    @if ($trade->trade_status == 3)
                        Completed
                    @elseif ($trade->trade_status == 1)
                        Ongoing
                    @else
                        Denied
                    @endif
                </span>
            </div>
            <div style="padding: 8px;width:120px">
                @if ($trade->buy_sell == 2)
                    Sell
                @elseif ($trade->buy_sell == 1)
                    Buy
                @endif
            </div>
            <div style="padding: 8px; color: #10b981;width:120px">{{ number_format($trade->trade_profit, 2) }}</div>
            <div style="padding: 8px; color: #ef4444;width:120px">{{ number_format($trade->trade_loss, 2) }}</div>
            <div style="padding: 8px; color: #9ca3af;width:150px">{{ $trade->created_at->format('d M, Y') }}</div>
        </div>
        @endforeach

        <!-- Pagination -->
        <div style="padding: 16px; border-top: 1px solid #374151; background-color: #111827; text-align: center;">
            {{ $trades->links() }}
        </div>
    </div>
</div>

