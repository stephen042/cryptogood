<x-layouts.main-app>
    <div class="text-white min-h-screen" style="max-width:800px; margin:0 auto; padding:16px;">
        <!-- Balance Section -->
        <div class="text-center py-2 mt-4">
            <h6 class="text-sm font-bold text-gray-400">TOTAL BALANCE</h6>
            <!-- Main Balance -->
            <div style="display:flex; align-items:center; justify-content:center; gap:2px;" class="mt-1">

                <span
                    style="font-size:23px;font-weight:500;letter-spacing:0.5px; color:#9ca3af; margin-left:4px; line-height:1;">$</span>
                <!-- Main Amount -->
                <h1 style="font-size:32px; font-weight:200; color:white; line-height:1;">{{
                    number_format(auth()->user()->balance, 2) }}</h1>

                <!-- USD -->
                <span
                    style="font-size:23px;font-weight:500;letter-spacing:0.5px; color:#9ca3af; margin-left:4px; line-height:1;">USD</span>
            </div>


            <!-- Percentage & Gains -->
            <div class="flex gap-3 mt-2 text-sm justify-center">
                <span style="color: #34D399;">+ ${{ number_format(auth()->user()->earnings_balance, 2) }}</span>
            </div>
        </div>

        <div
            style="display:flex; justify-content:space-evenly; align-items:center; margin-top:20px; margin-bottom:30px; gap:20px;">

            <!-- Buy -->
            <a href="/buy" style="text-decoration:none;">
                <div style="display:flex; flex-direction:column; align-items:center; text-align:center;">
                    <div
                        style="width:60px; height:60px; border-radius:50%; background:#3b82f6; display:flex; align-items:center; justify-content:center;">
                        <!-- Plus with circle -->
                        <svg xmlns="http://www.w3.org/2000/svg" style="width:30px; height:30px; color:white;"
                            fill="none" viewBox="0 0 24 24">
                            <circle cx="12" cy="12" r="9" stroke="currentColor" stroke-width="2" />
                            <path d="M12 8v8m-4-4h8" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                        </svg>
                    </div>
                    <span style="color:white; margin-top:6px; font-size:14px;">Buy</span>
                </div>
            </a>

            <!-- Send -->
            <a href="/send" style="text-decoration:none;">
                <div style="display:flex; flex-direction:column; align-items:center; text-align:center;">
                    <div
                        style="width:60px; height:60px; border-radius:50%; background:#3b82f6; display:flex; align-items:center; justify-content:center;">
                        <!-- Minus with circle -->
                        <svg xmlns="http://www.w3.org/2000/svg" style="width:30px; height:30px; color:white;"
                            fill="none" viewBox="0 0 24 24">
                            <circle cx="12" cy="12" r="9" stroke="currentColor" stroke-width="2" />
                            <path d="M8 12h8" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                        </svg>
                    </div>
                    <span style="color:white; margin-top:6px; font-size:14px;">Send</span>
                </div>
            </a>

            <!-- Swap -->
            <a href="/swap" style="text-decoration:none;">
                <div style="display:flex; flex-direction:column; align-items:center; text-align:center;">
                    <div
                        style="width:60px; height:60px; border-radius:50%; background:#3b82f6; display:flex; align-items:center; justify-content:center;">
                        <!-- Swap icon (circular arrows) -->
                        <svg xmlns="http://www.w3.org/2000/svg" style="width:30px; height:30px; color:white;"
                            fill="none" viewBox="0 0 24 24">
                            <path d="M4 4v6h6M20 20v-6h-6" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M20 4a9 9 0 00-16 6M4 20a9 9 0 0016-6" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </div>
                    <span style="color:white; margin-top:6px; font-size:14px;">Swap</span>
                </div>
            </a>

            <!-- Trade -->
            <a href="/trade" style="text-decoration:none;">
                <div style="display:flex; flex-direction:column; align-items:center; text-align:center;">
                    <div
                        style="width:60px; height:60px; border-radius:50%; background:#3b82f6; display:flex; align-items:center; justify-content:center;">
                        <!-- Trade icon (candlestick bars) -->
                        <svg xmlns="http://www.w3.org/2000/svg" style="width:30px; height:30px; color:white;"
                            fill="none" viewBox="0 0 24 24">
                            <path d="M6 4v16M10 9v11M14 6v14M18 3v18" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </div>
                    <span style="color:white; margin-top:6px; font-size:14px;">Trade</span>
                </div>
            </a>

        </div>

        <!-- Mother div -->
        <div class="p-4">
            <!-- Header -->
            <div class="flex items-center justify-between mb-3">
                <h6 class="text-white font-semibold text-sm" style="letter-spacing:1.5px;">FAVORITES</h6>
                <a href="/wallet" style="color:#3b82f6;" class="text-sm hover:underline">See All</a>
            </div>

            @php
            $favorites = [
            ['name'=>'Bitcoin','symbol'=>'BTC','img'=>'bitcoin.jpg','chart'=>'btc','balance'=>'bitcoin_balance','percent'=>2.05],
            ['name'=>'Ethereum','symbol'=>'ETH','img'=>'ethereum.png','chart'=>'eth','balance'=>'ethereum_balance','percent'=>1.98],
            ['name'=>'Ripple','symbol'=>'XRP','img'=>'Ripple.png','chart'=>'xrp','balance'=>'ripple_balance','percent'=>2.98],
            ['name'=>'Tether','symbol'=>'USDT','img'=>'tether-usdt.jpg','chart'=>'usdt','balance'=>'usdt_balance','percent'=>2.98],
            ];

            // Sort by user balance (highest first)
            $favorites = collect($favorites)->sortByDesc(function ($coin) {
            return Auth::user()->account->{$coin['balance']} ?? 0;
            })->toArray();
            @endphp

            @foreach ($favorites as $coin)
            <div class="bg-gray-800 p-3 mb-4 flex items-center justify-between" style="height:98px; border-radius:5px;">

                <!-- Left: Coin Info -->
                <div class="flex items-center gap-2 mx-2">
                    <div class="w-7 h-7 rounded-full bg-gray-700 flex items-center justify-center overflow-hidden">
                        <img src="{{ asset('assets/img/'.$coin['img']) }}" alt="{{ $coin['name'] }}"
                            class="w-full h-full object-cover">
                    </div>
                    <div>
                        <div class="text-white font-semibold" style="font-size: 13px">{{ $coin['name'] }}</div>
                        <div class="text-gray-400 text-sm">{{ $coin['symbol'] }}</div>
                    </div>
                </div>

                <!-- Middle: Chart -->
                <div class="flex-1 mx-4 h-full bg-gray-800 rounded overflow-hidden">
                    @include('components.charts.' . $coin['chart'])
                </div>

                <!-- Right: Balance -->
                <div class="text-right mx-2">
                    <div class="text-white font-semibold">
                        ${{ Auth::user()->account->{$coin['balance']} ?? 0 }}
                    </div>
                    {{-- <div class="text-sm" style="color: #34D399;">
                        +{{ (Auth::user()->account->{$coin['balance']} ?? 0) * $coin['percent'] }}%
                    </div> --}}
                </div>
            </div>
            @endforeach

            <div class="text-center mt-6">
                <a href="/wallet" style="color:#3b82f6;" class="text-sm">Show All Favorites</a>
            </div>
        </div>

    </div>
</x-layouts.main-app>