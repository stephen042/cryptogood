<x-layouts.app>
    <div>
        <!-- TradingView Widget BEGIN -->
        <div class="tradingview-widget-container">
            <div class="tradingview-widget-container__widget"></div>
            <script type="text/javascript"
                src="https://s3.tradingview.com/external-embedding/embed-widget-ticker-tape.js" async>
                {
                "symbols": [
                    {
                    "proName": "FOREXCOM:SPXUSD",
                    "title": "S&P 500 Index"
                    },
                    {
                    "proName": "FOREXCOM:NSXUSD",
                    "title": "US 100 Cash CFD"
                    },
                    {
                    "proName": "FX_IDC:EURUSD",
                    "title": "EUR to USD"
                    },
                    {
                    "proName": "BITSTAMP:BTCUSD",
                    "title": "Bitcoin"
                    },
                    {
                    "proName": "BITSTAMP:ETHUSD",
                    "title": "Ethereum"
                    }
                ],
                "colorTheme": "dark",
                "locale": "en",
                "largeChartUrl": "",
                "isTransparent": true,
                "showSymbolLogo": true,
                "displayMode": "adaptive"
                }
            </script>
        </div>
        <hr>
        <div class="w-full max-w-2xl mx-auto px-4 py-10 bg-gray-900 rounded-2xl shadow-lg my-6" style="max-width:600px; margin-bottom:150px;">
            <!-- Trade Progress -->
            <div style="margin-bottom:24px;">
                <p style="color:#d1d5db; font-size:14px; font-weight:500; margin-bottom:8px;">Trade Progress</p>
                <div
                    style="width:100%; background:#374151; border-radius:9999px; height:20px; position:relative; overflow:hidden;">
                    <div
                        style="background:#2563eb; height:100%; border-radius:9999px; width:{{ Auth::user()->progress_bar_status }}%; display:flex; align-items:center; justify-content:center; color:#fff; font-size:12px; font-weight:600;">
                        {{ Auth::user()->progress_bar_status }}%
                    </div>
                </div>
            </div>

            <!-- Signal Strength -->
            <div style="margin-bottom:32px;">
                <p style="color:#d1d5db; font-size:14px; font-weight:500; margin-bottom:8px;">Signal Strength</p>
                <div
                    style="width:100%; background:#374151; border-radius:9999px; height:20px; position:relative; overflow:hidden;">
                    <div style="height:100%; border-radius:9999px; width:{{ Auth::user()->signal_strength }}%;
            background: repeating-linear-gradient(
                45deg, 
                #16a34a, 
                #16a34a 10px, 
                #22c55e 10px, 
                #22c55e 20px
            );
            display:flex; align-items:center; justify-content:center; color:#fff; font-size:12px; font-weight:600;">
                        {{ Auth::user()->signal_strength }}%
                    </div>
                </div>
            </div>
            <hr>
            <br>

            <livewire:app.trade />
        </div>

    </div>
</x-layouts.app>