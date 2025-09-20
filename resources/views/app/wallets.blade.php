<x-layouts.app>
    <div style="max-width:800px; margin:0 auto; padding:16px;">
        <div class="text-center mt-6" style="margin-top: 24px; text-align: center;">
            <a href="{{ route('app.swap') }}"
                style="display: inline-block; padding: 8px 16px; border-radius: 6px; background-color: #4B5563; color: #fff; font-weight: 600; text-decoration: none; transition: background 0.2s;"
                onmouseover="this.style.backgroundColor='#374151';" onmouseout="this.style.backgroundColor='#4B5563';">
                <i class="fas fa-exchange-alt" style="margin-right: 8px;"></i>
                Click to Swap your coins
            </a>
        </div>
        <div class="p-4 my-4">

            @php
            $coins = [
            ['name'=>'Bitcoin','symbol'=>'BTC','img'=>'bitcoin.jpg','chart'=>'btc','balance'=>'bitcoin_balance','percent'=>1.05],
            ['name'=>'Ethereum','symbol'=>'ETH','img'=>'ethereum.png','chart'=>'eth','balance'=>'ethereum_balance','percent'=>1.98],
            ['name'=>'Ripple','symbol'=>'XRP','img'=>'Ripple.png','chart'=>'xrp','balance'=>'ripple_balance','percent'=>3.98],
            ['name'=>'Tether','symbol'=>'USDT','img'=>'tether-usdt.jpg','chart'=>'usdt','balance'=>'usdt_balance','percent'=>2.98],
            ['name'=>'Binance
            USD','symbol'=>'BUSD','img'=>'busd.png','chart'=>'busd','balance'=>'busd_balance','percent'=>1.05],
            ['name'=>'USD
            Coin','symbol'=>'USDC','img'=>'usdc.png','chart'=>'usdc','balance'=>'usdc_balance','percent'=>1.25],
            ['name'=>'Solana','symbol'=>'SOL','img'=>'solana.jpg','chart'=>'sol','balance'=>'solana_balance','percent'=>2.1],
            ['name'=>'Dai','symbol'=>'DAI','img'=>'dai.png','chart'=>'dai','balance'=>'dai_balance','percent'=>0.98],
            ['name'=>'TrueUSD','symbol'=>'TUSD','img'=>'tusd.png','chart'=>'tusd','balance'=>'tusd_balance','percent'=>1.15],
            ['name'=>'Polygon','symbol'=>'MATIC','img'=>'polygon.png','chart'=>'matic','balance'=>'polygon_balance','percent'=>1.7],
            ];

            // Sort coins by user balance (highest first)
            usort($coins, function ($a, $b) {
            $balanceA = Auth::user()->account->{$a['balance']} ?? 0;
            $balanceB = Auth::user()->account->{$b['balance']} ?? 0;
            return $balanceB <=> $balanceA; // descending
                });
                @endphp

                @foreach ($coins as $coin)
                <div class="bg-gray-800 p-3 mb-4 flex items-center justify-between"
                    style="height:98px;border-radius:10px;">

                    <!-- Left: Coin Info -->
                    <div class="flex items-center gap-2 mx-2">
                        <div
                            class="w-10 h-10 rounded-full bg-gray-700 flex items-center justify-center overflow-hidden">
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

        </div>
    </div>
</x-layouts.app>