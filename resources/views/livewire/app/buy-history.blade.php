<div>
    <div style="width: auto; display: inline-block; min-width: 100%; background-color: #111827; border-radius: 10px; overflow: hidden;">
        <div
            style="padding: 16px; border-bottom: 1px solid #374151; display: flex; align-items: center; justify-content: space-between;">
            <h2 style="font-size: 18px; font-weight: 600; color: #e5e7eb;">All BUY/RECEIVE HISTORY</h2>
        </div>
        <div style="width: auto; display: inline-block; min-width: 100%;">
            <!-- Table Header -->
            <div
                style="display: grid; grid-template-columns: 1fr 2fr 2fr 2fr; border-top: 1px solid #374151; background-color: #1f2937; color: #e5e7eb; font-weight: 600;">
                <div style="padding: 12px;">S/N</div>
                <div style="padding: 12px;">Date</div>
                <div style="padding: 12px;">Amount ($)</div>
                <div style="padding: 12px;">Status</div>
            </div>

            <!-- Table Body -->
            @foreach ($deposits as $index => $deposit)
            <div style="display: grid; grid-template-columns: 1fr 2fr 2fr 2fr; border-top: 1px solid #374151; transition: background-color 0.2s; color: #d1d5db;"
                onmouseover="this.style.backgroundColor='#1f2937'"
                onmouseout="this.style.backgroundColor='transparent'">

                <div style="padding: 8px; margin-left: 15px">{{ $loop->iteration + ($deposits->currentPage() - 1) * $deposits->perPage()
                    }}</div>
                <div style="padding: 8px;">{{ $deposit->created_at->format('d M, Y') }}</div>
                <div style="padding: 8px; font-weight: 500; color: #f9fafb;">
                    {{ number_format($deposit->amount, 2) }}
                </div>
                <div style="padding: 8px;">
                    <span style="padding: 4px 12px; font-size: 12px; font-weight: 600; border-radius: 9999px;
                    @if($deposit->status == 3) background-color: #059669; color: #fff;
                    @elseif($deposit->status == 1) background-color: #facc15; color: #000;
                    @else background-color: #dc2626; color: #fff; @endif">
                        @if ($deposit->status == 3)
                        Completed
                        @elseif ($deposit->status == 1)
                        Pending
                        @else
                        Denied
                        @endif
                    </span>
                </div>
            </div>
            @endforeach
        </div>
    </div>


    <!-- Pagination -->
    <div style="padding: 24px; background-color: #111827; border-top: 1px solid #374151;" class="text-white">
        {{ $deposits->links() }}
    </div>
</div>