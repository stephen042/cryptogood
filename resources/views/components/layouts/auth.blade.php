<!DOCTYPE html>
<html lang="en" class="dark">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" />
    <meta name="description"
        content="We are Leading global, FCA regulated broker, providing trading services in Forex, CFDs and Commodities. Trade with tight spreads and fast execution." />
    <meta property="og:title" content="Global FCA Regulated Broker | Trade Forex, CFDs & Commodities">
    <meta property="og:description"
        content="We are a leading global FCA-regulated broker, providing trading services in Forex, CFDs, and Commodities. Trade with tight spreads and fast execution.">
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>{{ config('app.name') }} | Sign Up</title>
    {{--
    <link rel="icon" type="image/svg+xml" href="{{ asset('assets/src/images/logo/logo.svg') }}" /> --}}
    <link rel="icon" type="image/png" href="{{ asset('assets/src/images/logo/favicon.png') }}" />
    <link href="{{ asset('assets/style.css') }}" rel="stylesheet" />
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
    @livewireStyles

</head>

<body
    x-data="{ page: 'comingSoon', 'loaded': true, 'darkMode': false, 'stickyMenu': false, 'sidebarToggle': false, 'scrollTop': false }"
    x-init="
         darkMode = JSON.parse(localStorage.getItem('darkMode'));
         $watch('darkMode', value => localStorage.setItem('darkMode', JSON.stringify(value)))"
    :class="{'dark bg-gray-900': darkMode === true}" style="background-color: #021E40;">
    <!-- ===== Page Wrapper Start ===== -->
    <div class="relative p-6 bg-white z-1 dark:bg-gray-900 sm:p-0">
        <div class="relative flex flex-col justify-center w-full h-screen dark:bg-gray-900 sm:p-0 lg:flex-row">
            {{ $slot }}

            <div class="relative items-center hidden w-full h-full bg-brand-950 dark:bg-white/5 lg:grid lg:w-1/2">
                <div class="flex items-center justify-center z-1">
                    <!-- ===== Common Grid Shape Start ===== -->
                    <div class="absolute right-0 top-0 -z-1 w-full max-w-[250px] xl:max-w-[450px]">
                        <img src="{{ asset('assets/src/images/logo/banner.png') }}" alt="grid"
                            style="filter: blur(5px); opacity: 0.7;" />
                    </div>
                    <div class="absolute bottom-0 left-0 -z-1 w-full max-w-[250px] rotate-180 xl:max-w-[450px]">
                        <img src="{{ asset('assets/src/images/logo/banner.png') }}" alt="grid"
                            style="filter: blur(5px); opacity: 0.7;" />
                    </div>

                    <div class="flex flex-col items-center max-w-xs">
                        <a href="index.htm" class="block mb-4">
                            <img src="{{ asset('assets/src/images/logo/banner.png') }}" alt="Logo" />
                        </a>
                    </div>
                </div>
            </div>


        </div>
    </div>

    <x-alert />
    <script defer="" src="{{ asset('assets/bundle.js') }}"></script>
    <script src="//code.jivosite.com/widget/GKwIssrJXQ" async></script>
    @livewireScripts
</body>

</html>