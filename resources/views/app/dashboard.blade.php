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
        <div class="p-4" style="margin-bottom:100px;">
            <!-- Header -->
            <div class="flex items-center justify-between mb-3">
                <h6 class="text-white font-semibold text-sm" style="letter-spacing:1.5px;">FAVORITES</h6>
                <a href="#" style="color:#3b82f6;" class="text-sm hover:underline">See All</a>
            </div>

            <!-- Bitcoin -->
            <div class="bg-gray-800 p-3 mb-4 flex items-center justify-between" style="height:98px;border-radius:5px;">

                <!-- Left: Coin Info -->
                <div class="flex items-center gap-2 mx-2">
                    <div class="w-7 h-7 rounded-full bg-gray-700 flex items-center justify-center">
                        <!-- Bitcoin Icon -->
                        <?xml version="1.0" encoding="UTF-8"?>
                        <!DOCTYPE svg
                            PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">
                        <!-- Creator: CorelDRAW 2019 (64-Bit) -->
                        <svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" width="100%" height="100%"
                            version="1.1" shape-rendering="geometricPrecision" text-rendering="geometricPrecision"
                            image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd"
                            viewBox="0 0 4091.27 4091.73" xmlns:xlink="http://www.w3.org/1999/xlink"
                            xmlns:xodm="http://www.corel.com/coreldraw/odm/2003">
                            <g id="Layer_x0020_1">
                                <metadata id="CorelCorpID_0Corel-Layer" />
                                <g id="_1421344023328">
                                    <path fill="#F7931A" fill-rule="nonzero"
                                        d="M4030.06 2540.77c-273.24,1096.01 -1383.32,1763.02 -2479.46,1489.71 -1095.68,-273.24 -1762.69,-1383.39 -1489.33,-2479.31 273.12,-1096.13 1383.2,-1763.19 2479,-1489.95 1096.06,273.24 1763.03,1383.51 1489.76,2479.57l0.02 -0.02z" />
                                    <path fill="white" fill-rule="nonzero"
                                        d="M2947.77 1754.38c40.72,-272.26 -166.56,-418.61 -450,-516.24l91.95 -368.8 -224.5 -55.94 -89.51 359.09c-59.02,-14.72 -119.63,-28.59 -179.87,-42.34l90.16 -361.46 -224.36 -55.94 -92 368.68c-48.84,-11.12 -96.81,-22.11 -143.35,-33.69l0.26 -1.16 -309.59 -77.31 -59.72 239.78c0,0 166.56,38.18 163.05,40.53 90.91,22.69 107.35,82.87 104.62,130.57l-104.74 420.15c6.26,1.59 14.38,3.89 23.34,7.49 -7.49,-1.86 -15.46,-3.89 -23.73,-5.87l-146.81 588.57c-11.11,27.62 -39.31,69.07 -102.87,53.33 2.25,3.26 -163.17,-40.72 -163.17,-40.72l-111.46 256.98 292.15 72.83c54.35,13.63 107.61,27.89 160.06,41.3l-92.9 373.03 224.24 55.94 92 -369.07c61.26,16.63 120.71,31.97 178.91,46.43l-91.69 367.33 224.51 55.94 92.89 -372.33c382.82,72.45 670.67,43.24 791.83,-303.02 97.63,-278.78 -4.86,-439.58 -206.26,-544.44 146.69,-33.83 257.18,-130.31 286.64,-329.61l-0.07 -0.05zm-512.93 719.26c-69.38,278.78 -538.76,128.08 -690.94,90.29l123.28 -494.2c152.17,37.99 640.17,113.17 567.67,403.91zm69.43 -723.3c-63.29,253.58 -453.96,124.75 -580.69,93.16l111.77 -448.21c126.73,31.59 534.85,90.55 468.94,355.05l-0.02 0z" />
                                </g>
                            </g>
                        </svg>
                    </div>
                    <div>
                        <div class="text-white font-semibold">Bitcoin</div>
                        <div class="text-gray-400 text-sm">BTC</div>
                    </div>
                </div>

                <!-- Middle: Chart -->
                <div class="flex-1 mx-4 h-full bg-gray-800 rounded overflow-hidden">
                    <x-charts.btc />
                </div>

                <!-- Right: Balance -->
                <div class="text-right mx-2">
                    <div class="text-white font-semibold">${{ Auth::user()->account->bitcoin_balance ?? 0}}</div>
                    <div class="text-sm" style="color: #34D399;">+{{ Auth::user()->account->bitcoin_balance ?? 0 * 2.05 }}%</div>
                </div>
            </div>

            <!-- ETH -->
            <div class="bg-gray-800 p-3 mb-4 flex items-center justify-between" style="height:98px;border-radius:5px;">

                <!-- Left: Coin Info -->
                <div class="flex items-center gap-2 mx-2">
                    <div class="w-7 h-7 rounded-full bg-gray-700 flex items-center justify-center">
                        <!-- Eth Icon -->
                        <?xml version="1.0" encoding="UTF-8"?>
                        <!DOCTYPE svg
                            PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">
                        <!-- Creator: CorelDRAW 2019 (64-Bit) -->
                        <svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" width="100%" height="100%"
                            version="1.1" shape-rendering="geometricPrecision" text-rendering="geometricPrecision"
                            image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd"
                            viewBox="0 0 784.37 1277.39" xmlns:xlink="http://www.w3.org/1999/xlink"
                            xmlns:xodm="http://www.corel.com/coreldraw/odm/2003">
                            <g id="Layer_x0020_1">
                                <metadata id="CorelCorpID_0Corel-Layer" />
                                <g id="_1421394342400">
                                    <g>
                                        <polygon fill="#343434" fill-rule="nonzero"
                                            points="392.07,0 383.5,29.11 383.5,873.74 392.07,882.29 784.13,650.54 " />
                                        <polygon fill="#8C8C8C" fill-rule="nonzero"
                                            points="392.07,0 -0,650.54 392.07,882.29 392.07,472.33 " />
                                        <polygon fill="#3C3C3B" fill-rule="nonzero"
                                            points="392.07,956.52 387.24,962.41 387.24,1263.28 392.07,1277.38 784.37,724.89 " />
                                        <polygon fill="#8C8C8C" fill-rule="nonzero"
                                            points="392.07,1277.38 392.07,956.52 -0,724.89 " />
                                        <polygon fill="#141414" fill-rule="nonzero"
                                            points="392.07,882.29 784.13,650.54 392.07,472.33 " />
                                        <polygon fill="#393939" fill-rule="nonzero"
                                            points="0,650.54 392.07,882.29 392.07,472.33 " />
                                    </g>
                                </g>
                            </g>
                        </svg>

                    </div>
                    <div>
                        <div class="text-white font-semibold" style="font-size: 13px">Ethereum</div>
                        <div class="text-gray-400 text-sm">ETH</div>
                    </div>
                </div>

                <!-- Middle: Chart -->
                <div class="flex-1 mx-4 h-full bg-gray-800 rounded overflow-hidden">
                    <x-charts.eth />
                </div>

                <!-- Right: Balance -->
                <div class="text-right mx-2">
                    <div class="text-white font-semibold">${{ Auth::user()->account->ethereum_balance ?? 0 }}</div>
                    <div class="text-sm" style="color: #34D399;">+{{ Auth::user()->account->ethereum_balance ?? 0 * 1.98 }}%</div>
                </div>
            </div>

            <!-- XRP -->
            <div class="bg-gray-800 p-3 mb-4 flex items-center justify-between" style="height:98px;border-radius:5px;">

                <!-- Left: Coin Info -->
                <div class="flex items-center gap-2 mx-2">
                    <div class="w-7 h-7 rounded-full bg-gray-700 flex items-center justify-center">
                        <!-- xrp Icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 424">
                            <defs>
                                <style>
                                    .cls-1 {
                                        fill: #23292f;
                                    }
                                </style>
                            </defs>
                            <title>x</title>
                            <g id="Layer_2" data-name="Layer 2">
                                <g id="Layer_1-2" data-name="Layer 1">
                                    <path class="cls-1"
                                        d="M437,0h74L357,152.48c-55.77,55.19-146.19,55.19-202,0L.94,0H75L192,115.83a91.11,91.11,0,0,0,127.91,0Z" />
                                    <path class="cls-1"
                                        d="M74.05,424H0L155,270.58c55.77-55.19,146.19-55.19,202,0L512,424H438L320,307.23a91.11,91.11,0,0,0-127.91,0Z" />
                                </g>
                            </g>
                        </svg>
                    </div>
                    <div>
                        <div class="text-white font-semibold" style="font-size: 13px">Ripple</div>
                        <div class="text-gray-400 text-sm">XRP</div>
                    </div>
                </div>

                <!-- Middle: Chart -->
                <div class="flex-1 mx-4 h-full bg-gray-800 rounded overflow-hidden">
                    <x-charts.xrp />
                </div>

                <!-- Right: Balance -->
                <div class="text-right mx-2">
                    <div class="text-white font-semibold">${{ Auth::user()->account->ripple_balance ?? 0 }}</div>
                    <div class="text-sm" style="color: #34D399;">+{{ Auth::user()->account->ripple_balance ?? 0 * 2.98 }}%</div>
                </div>
            </div>

            <!-- USDT -->
            <div class="bg-gray-800 p-3 mb-4 flex items-center justify-between" style="height:98px;border-radius:5px;">

                <!-- Left: Coin Info -->
                <div class="flex items-center gap-2 mx-2">
                    <div class="w-7 h-7 rounded-full bg-gray-700 flex items-center justify-center">
                        <!-- usdt Icon -->
                        <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 339.43 295.27">
                            <title>tether-usdt-logo</title>
                            <path
                                d="M62.15,1.45l-61.89,130a2.52,2.52,0,0,0,.54,2.94L167.95,294.56a2.55,2.55,0,0,0,3.53,0L338.63,134.4a2.52,2.52,0,0,0,.54-2.94l-61.89-130A2.5,2.5,0,0,0,275,0H64.45a2.5,2.5,0,0,0-2.3,1.45h0Z"
                                style="fill:#50af95;fill-rule:evenodd" />
                            <path
                                d="M191.19,144.8v0c-1.2.09-7.4,0.46-21.23,0.46-11,0-18.81-.33-21.55-0.46v0c-42.51-1.87-74.24-9.27-74.24-18.13s31.73-16.25,74.24-18.15v28.91c2.78,0.2,10.74.67,21.74,0.67,13.2,0,19.81-.55,21-0.66v-28.9c42.42,1.89,74.08,9.29,74.08,18.13s-31.65,16.24-74.08,18.12h0Zm0-39.25V79.68h59.2V40.23H89.21V79.68H148.4v25.86c-48.11,2.21-84.29,11.74-84.29,23.16s36.18,20.94,84.29,23.16v82.9h42.78V151.83c48-2.21,84.12-11.73,84.12-23.14s-36.09-20.93-84.12-23.15h0Zm0,0h0Z"
                                style="fill:#fff;fill-rule:evenodd" />
                        </svg>
                    </div>
                    <div>
                        <div class="text-white font-semibold" style="font-size: 13px">Tether</div>
                        <div class="text-gray-400 text-sm">USDT</div>
                    </div>
                </div>

                <!-- Middle: Chart -->
                <div class="flex-1 mx-4 h-full bg-gray-800 rounded overflow-hidden">
                    <x-charts.usdt />
                </div>

                <!-- Right: Balance -->
                <div class="text-right mx-2">
                    <div class="text-white font-semibold">${{ Auth::user()->account->usdt_balance ?? 0 }}</div>
                    <div class="text-sm" style="color: #34D399;">+{{ Auth::user()->account->usdt_balance ?? 0 * 2.98 }}%</div>
                </div>
            </div>

            <div class="text-center mt-6">
                <a href="#" style="color:#3b82f6;" class="text-sm">Show All Favorites</a>
            </div>
        </div>

    </div>
</x-layouts.main-app>