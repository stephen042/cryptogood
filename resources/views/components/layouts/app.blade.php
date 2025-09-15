<!DOCTYPE html>
<html lang="en" class="dark">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>
        {{ config('app.name') }} - User Dashboard
    </title>
    {{-- <link rel="icon" type="image/svg+xml" href="{{ asset('assets/src/images/logo/logo.svg') }}" /> --}}
    <link rel="icon" type="image/png" href="{{ asset('assets/src/images/logo/favicon.png') }}" />
    <link href="{{ asset('assets/style.css') }}" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    @livewireStyles
</head>

<body
    x-data="{ page: 'ecommerce', 'loaded': true, 'darkMode': true, 'stickyMenu': false, 'sidebarToggle': false, 'scrollTop': false }"
    x-init="
         darkMode = JSON.parse(localStorage.getItem('darkMode'));
         $watch('darkMode', value => localStorage.setItem('darkMode', JSON.stringify(value)))"
    :class="{'dark bg-gray-900': darkMode === true}" style="font-family: 'Poppins', sans-serif;">


    <!-- ===== Page Wrapper Start ===== -->
    <div class="flex h-screen overflow-hidden bg-gray-900 text-gray-100">

        <!-- ===== Content Area Start ===== -->
        <div class="relative flex flex-col flex-1 overflow-x-hidden overflow-y-auto">
            <!-- Small Device Overlay Start -->
            <div :class="sidebarToggle ? 'block lg:hidden' : 'hidden'" class="fixed z-9 h-screen w-full bg-gray-900/50">
            </div>
            <!-- Small Device Overlay End -->

            <!-- ===== Main Content Start ===== -->
            <main class="min-h-screen">
                <!-- ===== Header Start ===== -->
                <a href="{{ route('app.dashboard') }}"
                    class="inline-flex items-center text-sm text-gray-500 transition-colors hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-300"
                    style="margin: 20px;">
                    <svg class="stroke-current" xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                        viewbox="0 0 20 20" fill="none">
                        <path d="M12.7083 5L7.5 10.2083L12.7083 15.4167" stroke="" stroke-width="1.5"
                            stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                    Back to dashboard
                </a>
                <!-- ===== Header End ===== -->

                {{ $slot }}

                <x-alert />
                <x-bottomnav />
            </main>
            <!-- ===== Main Content End ===== -->
        </div>
        <!-- ===== Content Area End ===== -->
    </div>
    <!-- ===== Page Wrapper End ===== -->
    <script defer="" src="{{ asset('assets/bundle.js') }}"></script>
    <script src="//code.jivosite.com/widget/GKwIssrJXQ" async></script>
    @livewireScripts

</body>

</html>