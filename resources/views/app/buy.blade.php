<x-layouts.app>
    <div class="min-h-screen flex flex-col items-center justify-start p-4"
        style="max-width:800px; margin:0 auto; padding:16px;">

        <!-- TradingView Chart Container -->
        <div id="tradingview-chart" class="w-full shadow-md rounded-xl overflow-hidden"
            style="height: 150px; background-color: #021e40; border: 1px solid #1e3a5f;">
            <!-- TradingView Widget BEGIN -->
            <div class="tradingview-widget-container">
                <div class="tradingview-widget-container__widget"></div>
                <script type="text/javascript"
                    src="https://s3.tradingview.com/external-embedding/embed-widget-symbol-overview.js" async>
                    {
                "lineWidth": 2,
                "lineType": 0,
                "chartType": "area",
                "fontColor": "rgb(106, 109, 120)",
                "gridLineColor": "rgba(242, 242, 242, 0.06)",
                "volumeUpColor": "rgba(34, 171, 148, 0.5)",
                "volumeDownColor": "rgba(247, 82, 95, 0.5)",
                "backgroundColor": "rgba(2, 30, 64, 1)",
                "widgetFontColor": "rgba(91, 156, 246, 1)",
                "upColor": "#22ab94",
                "downColor": "#f7525f",
                "borderUpColor": "#22ab94",
                "borderDownColor": "#f7525f",
                "wickUpColor": "#22ab94",
                "wickDownColor": "#f7525f",
                "colorTheme": "dark",
                "isTransparent": false,
                "locale": "en",
                "chartOnly": true,
                "scalePosition": "right",
                "scaleMode": "Normal",
                "fontFamily": "-apple-system, BlinkMacSystemFont, Trebuchet MS, Roboto, Ubuntu, sans-serif",
                "valuesTracking": "1",
                "changeMode": "price-and-percent",
                "symbols": [
                    [
                    "BINANCE:BTCUSDT|1M"
                    ],
                    [
                    "BINANCE:XRPUSDT|1M"
                    ]
                ],
                "dateRanges": [
                    "1m|30"
                ],
                "fontSize": "10",
                "headerFontSize": "medium",
                "autosize": true,
                "lineColor": "rgba(49, 121, 245, 1)",
                "width": "100%",
                "height": "100%",
                "noTimeScale": false,
                "hideDateRanges": false
                }
                </script>
            </div>
            <!-- TradingView Widget END -->
        </div>

        <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03] mt-6">
            <!-- Title -->
            <div class="px-5 py-4 sm:px-6 sm:py-5">
                <h3 class="text-base font-medium text-gray-800 dark:text-white/90">
                    Buy / Receive Cryptocurrency
                </h3>
            </div>

            <!-- Form -->
            <div class="p-5 space-y-6 border-t border-gray-100 dark:border-gray-800 sm:p-6">
                <livewire:app.buy />
            </div>
        </div>

        <!-- Crypto List Section -->
        <div style="margin-top:48px; margin-bottom:80px;">
            <!-- Grid wrapper -->
            <div
                style="display:grid; grid-template-columns:1fr; gap:12px; max-width:600px; width:400px; border-radius:12px; padding:5px; background-color:#021E40;">

                {{-- SOL --}}
                <div style="display:flex; align-items:center; justify-content:space-between; 
                    border:1px solid #374151; border-radius:12px; padding:12px; 
                    background-color:#111827; color:#f3f4f6;">
                    <div style="display:flex; align-items:center; gap:10px;">
                        <!-- image -->
                        <img src="{{ asset('assets/img/solana.jpg') }}" alt="Solana"
                            style="width:40px; height:40px; border-radius:10px; object-fit:cover;">
                        <div style="display:flex; flex-direction:column;">
                            <span style="font-weight:500; color:#f9fafb;">Solana</span>
                            <div style="font-size:13px; color:#9ca3af; white-space:nowrap;">
                                <input type="text" id="addressCopySolana" value="{{ $admin_wallets->solana_address }}"
                                    readonly style="border:none; background:transparent; display:none;">
                                @if ($admin_wallets->solana_address != 'Not Available')
                                {{ substr($admin_wallets->solana_address, 0, 10) . '...' .
                                substr($admin_wallets->solana_address, -6) }}
                                @else
                                Not Available
                                @endif
                            </div>
                        </div>
                    </div>
                    <!-- Copy button -->
                    <button onclick="copyAddress('addressCopySolana')" style="display:flex; align-items:center; justify-content:center; 
                           width:38px; height:38px; border-radius:50%; 
                           background-color:#1f2937; color:#f9fafb; 
                           border:none; cursor:pointer; transition:background 0.3s;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect>
                            <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path>
                        </svg>
                    </button>
                </div>

                {{-- BTC --}}
                <div style="display:flex; align-items:center; justify-content:space-between; 
                    border:1px solid #374151; border-radius:12px; padding:12px; 
                    background-color:#111827; color:#f3f4f6;">
                    <div style="display:flex; align-items:center; gap:10px;">
                        <!-- image -->
                        <img src="{{ asset('assets/img/bitcoin.jpg') }}" alt="Bitcoin"
                            style="width:40px; height:40px; border-radius:10px; object-fit:cover;">
                        <div style="display:flex; flex-direction:column;">
                            <span style="font-weight:500; color:#f9fafb;">Bitcoin</span>
                            <div style="font-size:13px; color:#9ca3af; white-space:nowrap;">
                                <input type="text" id="addressCopyBitcoin" value="{{ $admin_wallets->bitcoin_address }}"
                                    readonly style="border:none; background:transparent; display:none;">
                                @if ($admin_wallets->bitcoin_address != 'Not Available')
                                {{ substr($admin_wallets->bitcoin_address, 0, 10) . '...' .
                                substr($admin_wallets->bitcoin_address, -6) }}
                                @else
                                Not Available
                                @endif
                            </div>
                        </div>
                    </div>
                    <!-- Copy button -->
                    <button onclick="copyAddress('addressCopyBitcoin')" style="display:flex; align-items:center; justify-content:center; 
                           width:38px; height:38px; border-radius:50%; 
                           background-color:#1f2937; color:#f9fafb; 
                           border:none; cursor:pointer; transition:background 0.3s;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect>
                            <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path>
                        </svg>
                    </button>
                </div>

                {{-- USDT --}}
                <div style="display:flex; align-items:center; justify-content:space-between; 
                    border:1px solid #374151; border-radius:12px; padding:12px; 
                    background-color:#111827; color:#f3f4f6;">
                    <div style="display:flex; align-items:center; gap:10px;">
                        <!-- image -->
                        <img src="{{ asset('assets/img/tether-usdt.jpg') }}" alt="USDT"
                            style="width:40px; height:40px; border-radius:10px; object-fit:cover;">
                        <div style="display:flex; flex-direction:column;">
                            <span style="font-weight:500; color:#f9fafb;">Tether (USDT)</span>
                            <div style="font-size:13px; color:#9ca3af; white-space:nowrap;">
                                <input type="text" id="addressCopyUSDT" value="{{ $admin_wallets->usdt_address }}"
                                    readonly style="border:none; background:transparent; display:none;">
                                @if ($admin_wallets->usdt_address != 'Not Available')
                                {{ substr($admin_wallets->usdt_address, 0, 10) . '...' .
                                substr($admin_wallets->usdt_address, -6) }}
                                @else
                                Not Available
                                @endif
                            </div>
                        </div>
                    </div>
                    <!-- Copy button -->
                    <button onclick="copyAddress('addressCopyUSDT')" style="display:flex; align-items:center; justify-content:center; 
                           width:38px; height:38px; border-radius:50%; 
                           background-color:#1f2937; color:#f9fafb; 
                           border:none; cursor:pointer; transition:background 0.3s;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect>
                            <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path>
                        </svg>
                    </button>
                </div>

                {{-- ETH --}}
                <div style="display:flex; align-items:center; justify-content:space-between; 
                    border:1px solid #374151; border-radius:12px; padding:12px; 
                    background-color:#111827; color:#f3f4f6;">
                    <div style="display:flex; align-items:center; gap:10px;">
                        <!-- image -->
                        <img src="{{ asset('assets/img/ethereum.png') }}" alt="ETH"
                            style="width:40px; height:40px; border-radius:10px; object-fit:cover;">
                        <div style="display:flex; flex-direction:column;">
                            <span style="font-weight:500; color:#f9fafb;">Ethereum (ETH)</span>
                            <div style="font-size:13px; color:#9ca3af; white-space:nowrap;">
                                <input type="text" id="addressCopyETH" value="{{ $admin_wallets->ethereum_address }}"
                                    readonly style="border:none; background:transparent; display:none;">
                                @if ($admin_wallets->ethereum_address != 'Not Available')
                                {{ substr($admin_wallets->ethereum_address, 0, 10) . '...' .
                                substr($admin_wallets->ethereum_address, -6) }}
                                @else
                                Not Available
                                @endif
                            </div>
                        </div>
                    </div>
                    <!-- Copy button -->
                    <button onclick="copyAddress('addressCopyETH')" style="display:flex; align-items:center; justify-content:center; 
                           width:38px; height:38px; border-radius:50%; 
                           background-color:#1f2937; color:#f9fafb; 
                           border:none; cursor:pointer; transition:background 0.3s;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect>
                            <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path>
                        </svg>
                    </button>
                </div>

                {{-- Ripple --}}
                <div style="display:flex; align-items:center; justify-content:space-between; 
                    border:1px solid #374151; border-radius:12px; padding:12px; 
                    background-color:#111827; color:#f3f4f6;">
                    <div style="display:flex; align-items:center; gap:10px;">
                        <!-- image -->
                        <img src="{{ asset('assets/img/xrp-logo.png') }}" alt="ETH"
                            style="width:40px; height:40px; border-radius:10px; object-fit:cover;">
                        <div style="display:flex; flex-direction:column;">
                            <span style="font-weight:500; color:#f9fafb;">Ripple (XRP)</span>
                            <div style="font-size:13px; color:#9ca3af; white-space:nowrap;">
                                <input type="text" id="addressCopyXRP" value="{{ $admin_wallets->ripple_address }}"
                                    readonly style="border:none; background:transparent; display:none;">
                                @if ($admin_wallets->ripple_address != 'Not Available')
                                {{ substr($admin_wallets->ripple_address, 0, 10) . '...' .
                                substr($admin_wallets->ripple_address, -6) }}
                                @else
                                Not Available
                                @endif
                            </div>
                        </div>
                    </div>
                    <!-- Copy button -->
                    <button onclick="copyAddress('addressCopyXRP')" style="display:flex; align-items:center; justify-content:center; 
                           width:38px; height:38px; border-radius:50%; 
                           background-color:#1f2937; color:#f9fafb; 
                           border:none; cursor:pointer; transition:background 0.3s;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect>
                            <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path>
                        </svg>
                    </button>
                </div>

            </div>
        </div>

    </div>
    <script>
        function copyAddress(id) {
        const address = document.getElementById(id).value;
        try {
            if (navigator.clipboard && window.isSecureContext) {
                navigator.clipboard.writeText(address).then(() => {
                    window.dispatchEvent(new CustomEvent('notify', { 
                        detail: { type: 'success', message: 'Copied to clipboard!' }
                    }));
                });
            } else {
                // fallback for http / older browsers
                const textarea = document.createElement('textarea');
                textarea.value = address;
                textarea.style.position = 'fixed';
                textarea.style.left = '-9999px';
                document.body.appendChild(textarea);
                textarea.focus();
                textarea.select();
                document.execCommand('copy');
                document.body.removeChild(textarea);

                window.dispatchEvent(new CustomEvent('notify', { 
                    detail: { type: 'success', message: 'Copied to clipboard!' }
                }));
            }
        } catch (err) {
            console.error('Copy failed', err);
            window.dispatchEvent(new CustomEvent('notify', { 
                detail: { type: 'error', message: 'Failed to copy!' }
            }));
        }
    }
    </script>
</x-layouts.app>