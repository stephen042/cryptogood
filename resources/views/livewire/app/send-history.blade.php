<div style="max-width: 100%; overflow-x: auto; margin: 50px auto;">
    <div
        style="width: auto; display: inline-block; min-width: 100%; background-color: #111827; border-radius: 10px; overflow: hidden;">
        <!-- Header -->
        <div
            style="padding: 16px; border-bottom: 1px solid #374151; display: flex; align-items: center; justify-content: space-between;">
            <h2 style="font-size: 18px; font-weight: 600; color: #e5e7eb;">Send History</h2>
        </div>

        <!-- Table Header -->
        <div
            style="display: grid; grid-template-columns: 1fr 2fr 2fr 2fr 2fr 2fr; border-top: 1px solid #374151; background-color: #1f2937; color: #e5e7eb; font-weight: 600;">
            <div style="padding: 12px;">S/N</div>
            <div style="padding: 12px;">Date</div>
            <div style="padding: 12px;">Amount ($)</div>
            <div style="padding: 12px;">Wallet Address</div>
            <div style="padding: 12px;">Crypto Currency</div>
            <div style="padding: 12px;">Status</div>
        </div>

        <!-- Table Body -->
        @foreach($withdraws as $index => $withdraw)
        <div style="display: grid; grid-template-columns: 1fr 2fr 2fr 2fr 2fr 2fr; border-top: 1px solid #374151; transition: background-color 0.2s; color: #d1d5db;"
            onmouseover="this.style.backgroundColor='#1f2937'" onmouseout="this.style.backgroundColor='transparent'">

            <div style="padding: 8px; margin-left: 15px;width:50px">{{ $loop->iteration + ($withdraws->currentPage() - 1) *
                $withdraws->perPage() }}</div>
            <div style="padding: 8px;width:120px">{{ $withdraw->created_at->format('d M, Y') }}</div>
            <div style="padding: 8px; font-weight: 500; color: #f9fafb;width:120px">{{ number_format($withdraw->amount, 2) }}
            </div>
            <div style="padding: 8px; font-weight: 500; color: #f9fafb;width:150px">
                {{ substr($withdraw->wallet_address, 0, 6) . '...' . substr($withdraw->wallet_address, -6) }}
            </div>
            <div style="padding: 8px;width:120px">{{ $withdraw->crypto_currency }}</div>
            <div style="padding: 8px;width:120px">
                <span style="padding: 4px 12px; font-size: 12px; font-weight: 600; border-radius: 9999px;
                    @if($withdraw->status == 3) background-color: #059669; color: #fff;
                    @elseif($withdraw->status == 1) background-color: #facc15; color: #000;
                    @else background-color: #dc2626; color: #fff; @endif">
                    @if ($withdraw->status == 3)
                    Completed
                    @elseif ($withdraw->status == 1)
                    Pending
                    @else
                    Denied
                    @endif
                </span>
            </div>
        </div>
        @endforeach

        <!-- Pagination -->
        <div style="padding: 24px; background-color: #111827; border-top: 1px solid #374151;" class="text-white">
            {{ $withdraws->links() }}
        </div>

    </div>


</div>