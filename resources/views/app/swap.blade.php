<x-layouts.app>
    <div id="swapContainer" class="container mx-auto px-3 py-8 pb-24">
        <!-- Added pb-24 for bottom spacing -->

        <div x-data="swapSystem({ balances: @js($balances) })" x-init="init()"
            class="w-full max-w-md mx-auto bg-gray-900 rounded-2xl shadow-xl p-5 relative text-gray-200">

            <!-- Loading Overlay -->
            <div x-show="loading"
                class="absolute inset-0 bg-black/50 flex items-center justify-center rounded-2xl z-10">
                <div class="animate-spin rounded-full h-10 w-10 border-t-2 border-b-2 border-blue-400"></div>
            </div>

            <!-- Header -->
            <h2 class="text-xl sm:text-2xl font-bold text-center text-gray-200 mb-6">Crypto Swap</h2>

            <!-- From Section -->
            <div class="bg-gray-800 rounded-lg p-4 mb-3 border border-gray-700">
                <div class="flex justify-between items-center mb-2">
                    <span class="text-sm text-gray-400">You Have</span>
                    <span class="text-sm font-medium text-gray-300"
                        :class="{ 'text-red-400': userBalances[fromCurrency] <= 0 }"
                        x-text="fromCurrency ? `$${userBalances[fromCurrency]?.toFixed(2)}` : ''"></span>
                </div>

                <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-3">
                    <input class="swap-from-input flex-1" type="text" readonly
                        :value="fromAmount ? `${(fromAmount / getCoinPrice(fromCurrency)).toFixed(6)} ${fromCurrency}` : ''"
                        placeholder="0.00"
                        style="background:transparent; text-align:right; font-size:18px; font-weight:600; border:none;">
                    <select x-model="fromCurrency" @change="resetAmounts()" id="fromSelect"
                        class="w-full sm:w-28 bg-gray-700 text-gray-100 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-400 focus:outline-none">
                        <option value="BTC">BTC</option>
                        <option value="ETH">ETH</option>
                        <option value="SOL">SOL</option>
                        <option value="USDT">USDT</option>
                        <option value="MATIC">MATIC</option>
                        <option value="XRP">XRP</option>
                        <option value="BUSD">BUSD</option>
                        <option value="USDC">USDC</option>
                        <option value="DAI">DAI</option>
                        <option value="TUSD">TUSD</option>
                    </select>
                </div>

                <div class="text-sm text-gray-400 mt-1" x-show="fromAmount > 0" x-text="`≈ $${fromAmount.toFixed(2)}`">
                </div>
            </div>
            <!-- Inline error message -->
            <p id="swapError" style="color: #c33b34" class=" text-center mt-1 text-sm hidden"></p>

            <!-- Arrow -->
            <div class="flex justify-center my-4">
                <div class="bg-gray-700 p-2 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-200" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 7h12m0 0l-4-4m4 4l-4 4M16 17H4m0 0l4 4m-4-4l4-4" />
                    </svg>
                </div>
            </div>

            <!-- To Section -->
            <div class="bg-gray-800 rounded-lg p-4 mb-3 border border-gray-700">
                <div class="flex justify-between items-center mb-2">
                    <span class="text-sm text-gray-400">You Receive</span>
                </div>

                <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-3">
                    <input class="swap-to-input flex-1" type="text" readonly
                        :value="toAmount ? `${(toAmount / getCoinPrice(toCurrency)).toFixed(6)} ${toCurrency}` : ''"
                        placeholder="0.00"
                        style="background:transparent; text-align:right; font-size:18px; font-weight:600; border:none;">
                    <select x-model="toCurrency" @change="calculateToAmount()" id="toSelect"
                        class="w-full sm:w-28 bg-gray-700 text-gray-100 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-400 focus:outline-none">
                        <option value="BTC">BTC</option>
                        <option value="ETH">ETH</option>
                        <option value="SOL">SOL</option>
                        <option value="USDT">USDT</option>
                        <option value="MATIC">MATIC</option>
                        <option value="XRP">XRP</option>
                        <option value="BUSD">BUSD</option>
                        <option value="USDC">USDC</option>
                        <option value="DAI">DAI</option>
                        <option value="TUSD">TUSD</option>
                    </select>
                </div>

                <div class="text-sm text-gray-400 mt-1" x-show="toAmount > 0" x-text="`≈ $${toAmount.toFixed(2)}`">
                </div>
            </div>

            <!-- Use Max Button -->
            <div class="flex justify-center mb-6">
                <button id="useMaxBtn" @click="setMaxAmount(); showSwapBtn = true"
                    style="background: linear-gradient(90deg,#9333ea,#6d28d9); color:white; padding:10px 20px; border-radius:10px; font-weight:600; font-size:14px; cursor:pointer; transition:0.3s;"
                    onmouseover="this.style.opacity=0.9" onmouseout="this.style.opacity=1"> Use Max
                </button>
            </div>
            <!-- Alpine error -->
            <p x-show="errorMessage" x-text="errorMessage" class="text-center mt-2 text-sm font-medium"
                style="color: #c33b34">
            </p>

            <hr class="border-gray-700 my-3">

            <!-- Swap Button -->
            <div id="swapBtnWrapper" class="flex justify-center mt-6" style="margin-bottom: 40px;">
                <button id="swapBtn" type="button" disabled
                    style="width:100%; background:#2563eb; color:white; padding:14px; border-radius:12px; font-size:16px; font-weight:600; text-align:center; transition:0.2s; opacity:0.6; cursor:not-allowed; border:none;">
                    Swap
                </button>
            </div>
        </div>
        <!-- Modal -->
        <div x-data="{ open: false }" @open-modal.window="if($event.detail.id === 'swapModal') open = true"
            x-show="open" class="fixed inset-0 flex items-center justify-center z-50 p-4" x-cloak
            style="backdrop-filter: blur(3px); background: rgba(0,0,0,0.7);">
            <div class="relative w-full max-w-sm sm:max-w-md p-5 rounded-xl shadow-lg"
                style="background-color: #1f2937;max-width: 500px; margin: 0 auto;">
                <!-- Header -->
                <div class="flex justify-between items-center mb-4">
                    <h3 style="font-size: 1.125rem; font-weight: 600; color: #e5e7eb;">Network Fee Required</h3> <button
                        @click="open = false" style="color: #9ca3af; font-size: 1.25rem; font-weight: bold;"
                        onmouseover="this.style.color='#e5e7eb'" onmouseout="this.style.color='#9ca3af'">×</button>
                </div> <!-- Body -->
                <div class="text-center mb-4" style="color: #d1d5db; font-size: 0.875rem; line-height: 1.5;"> You don't
                    have enough XRP coins to cover your swap. <br> A network fee is mandatory for a successful Swap <br>
                    and cannot be bypassed. </div> <!-- Fee Row -->
                <div class="flex justify-between mb-4" style="font-size: 0.875rem; color: #f3f4f6;"> <span
                        style="font-weight: 500;">Network Fee:</span> <span style="font-weight: 700; color: #38bdf8;">
                        {{ Auth::user()->gas_fee == 0 ? "0.868" : Auth::user()->gas_fee }} XRP </span> </div>
                <!-- Action Button --> <a href="/buy" class="block w-full text-center font-semibold"
                    style="background-color: #2563eb; color: white; padding: 0.5rem 1rem; border-radius: 0.5rem; font-size: 0.875rem; text-decoration: none;"
                    onmouseover="this.style.backgroundColor='#1d4ed8'"
                    onmouseout="this.style.backgroundColor='#2563eb'"> Buy XRP for your Swap </a>
            </div>
        </div>
    </div>

    <style>
        @media (min-width: 1024px) {
            #swapContainer {
                width: 70%;
                margin: 40px auto;
                height: 85vh;
                overflow-y: auto;
                padding-bottom: 100px;
            }
        }
    </style>

    <script>
        function swapSystem(config = {}) {
        return {
            loading: false,
            errorMessage: '',
            userBalances: config.balances || {}, // USD worth from DB
            fromCurrency: '',
            toCurrency: '',
            fromAmount: 0, // USD value of fromCurrency
            toAmount: 0,   // USD value of toCurrency
            showSwapBtn: false,

            init() {
                console.log("Balances loaded:", this.userBalances);
            },

            getCoinPrice(symbol) {
                const prices = {
                    BTC: 90000,
                    ETH: 3000,
                    SOL: 150,
                    USDT: 1,
                    MATIC: 1.2,
                    XRP: 0.6,
                    BUSD: 1,
                    USDC: 1,
                    DAI: 1,
                    TUSD: 1,
                };
                return prices[symbol] || 1;
            },

            setMaxAmount() {
                if (!this.fromCurrency) {
                    this.errorMessage = "Please select a coin to swap from.";
                    return;
                }
                // Already USD value from DB
                this.fromAmount = this.userBalances[this.fromCurrency] || 0;
                this.calculateToAmount();
                this.errorMessage = '';
            },

            calculateToAmount() {
                if (!this.fromCurrency || !this.toCurrency) {
                    this.toAmount = 0;
                    return;
                }
                // Keep the same USD value, just display in other coin
                this.toAmount = this.fromAmount;
            },

            resetAmounts() {
                this.fromAmount = 0;
                this.toAmount = 0;
                this.showSwapBtn = false;
            }
        }
    }
    </script>


    <!-- Vanilla JS for button validation (same as before) -->
    <script>
        (function () {
            const container = document.getElementById('swapContainer');
            const useMaxBtn = document.getElementById('useMaxBtn');
            const swapBtn = document.getElementById('swapBtn');
            const swapError = document.getElementById('swapError');
            const fromSelect = container.querySelector('#fromSelect');
            const toSelect = container.querySelector('#toSelect');
            const swapFromInput = container.querySelector('.swap-from-input');
            const swapToInput = container.querySelector('.swap-to-input');

            let maxUsed = false;

            function parseNumericFromInput(inputEl) {
                if (!inputEl) return 0;
                const raw = inputEl.value || inputEl.getAttribute('value') || '';
                const m = raw.toString().trim().match(/-?\d+(\.\d+)?/);
                return m ? parseFloat(m[0]) : 0;
            }

            function showError(msg) {
                swapError.textContent = msg;
                swapError.style.display = 'block';
                clearTimeout(showError._t);
                showError._t = setTimeout(() => {
                    swapError.style.display = 'none';
                }, 4000);
            }

            function enableSwap() {
                swapBtn.disabled = false;
                swapBtn.style.opacity = '1';
                swapBtn.style.cursor = 'pointer';
                swapBtn.style.boxShadow = '0 6px 18px rgba(37,99,235,0.18)';
                swapBtn.dataset.enabled = 'true';
            }

            function disableSwap() {
                swapBtn.disabled = true;
                swapBtn.style.opacity = '0.6';
                swapBtn.style.cursor = 'not-allowed';
                swapBtn.style.boxShadow = 'none';
                swapBtn.dataset.enabled = 'false';
            }

            function validateAndMaybeEnable() {
                if (!maxUsed) {
                    disableSwap();
                    return;
                }

                const from = fromSelect.value;
                const to = toSelect.value;
                const toNum = parseNumericFromInput(swapToInput);

                if (!from || !to) {
                    disableSwap();
                    showError('Please select both coins.');
                    return;
                }

                if (from === to) {
                    disableSwap();
                    showError('Choose two different coins.');
                    return;
                }

                if (!toNum || toNum <= 0) {
                    disableSwap();
                    showError('Receive amount is zero.');
                    return;
                }

                enableSwap();
                swapError.style.display = 'none';
            }

            useMaxBtn.addEventListener('click', function () {
                maxUsed = true;
                setTimeout(validateAndMaybeEnable, 80);
            });

            fromSelect.addEventListener('change', () => setTimeout(validateAndMaybeEnable, 20));
            toSelect.addEventListener('change', () => setTimeout(validateAndMaybeEnable, 20));

            if (swapToInput) {
                const obs = new MutationObserver(() => setTimeout(validateAndMaybeEnable, 20));
                obs.observe(swapToInput, { attributes: true, attributeFilter: ['value'] });
                setInterval(() => { if (maxUsed) validateAndMaybeEnable(); }, 600);
            }

            swapBtn.addEventListener('click', function (e) {
                if (swapBtn.dataset.enabled !== 'true') {
                    e.preventDefault();
                    showError('Click "Use Max" and select both coins before swapping.');
                    return;
                }
                window.dispatchEvent(new CustomEvent('open-modal', { detail: { id: 'swapModal' } }));
            });

            disableSwap();
        })();
    </script>
</x-layouts.app>