<!DOCTYPE html>
<html lang="en" class="dark">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>
        {{ config('app.name') }} - Admin Dashboard
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
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>

</head>

<body
    x-data="{ page: 'ecommerce', 'loaded': true, 'darkMode': false, 'stickyMenu': false, 'sidebarToggle': false, 'scrollTop': false }"
    x-init="
         darkMode = JSON.parse(localStorage.getItem('darkMode'));
         $watch('darkMode', value => localStorage.setItem('darkMode', JSON.stringify(value)))"
    :class="{'dark bg-gray-900': darkMode === true}" class="bg-gray-900 text-gray-100">


    <!-- ===== Page Wrapper Start ===== -->
    <div class="flex h-screen overflow-hidden bg-gray-900 text-gray-100">
        <!-- ===== Sidebar Start ===== -->
        <x-layouts.admin.sidebar />
        <!-- ===== Sidebar End ===== -->

        <!-- ===== Content Area Start ===== -->
        <div class="relative flex flex-col flex-1 overflow-x-hidden overflow-y-auto">
            <!-- Small Device Overlay Start -->
            <div :class="sidebarToggle ? 'block lg:hidden' : 'hidden'" class="fixed z-9 h-screen w-full bg-gray-900/50">
            </div>
            <!-- Small Device Overlay End -->

            <!-- ===== Main Content Start ===== -->
            <main>
                <!-- ===== Header Start ===== -->
                <x-layouts.admin.header />
                <!-- ===== Header End ===== -->
                <div class="p-4 mx-auto max-w-(--breakpoint-2xl) md:p-6">
                    {{ $slot }}
                </div>
            </main>
            <!-- ===== Main Content End ===== -->
        </div>
        <!-- ===== Content Area End ===== -->
    </div>
    <!-- ===== Page Wrapper End ===== -->
    <script>
        function confirmLogout(event) {
        event.preventDefault(); // prevent immediate submit
        if (confirm("Are you sure you want to log out?")) {
            document.getElementById('logout-form').submit();
        }
    }
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
        const sidebar = document.querySelector("aside.sidebar");
        const toggleBtn = document.querySelector("[data-sidebar-toggle]");

        if (!sidebar || !toggleBtn) return;

        toggleBtn.addEventListener("click", function (e) {
            e.preventDefault();

            // Toggle active class
            sidebar.classList.toggle("translate-x-0");
            sidebar.classList.toggle("-translate-x-full");

            // Optional: shrink/expand for large screens
            sidebar.classList.toggle("lg:w-[90px]");
        });

        // Close sidebar when clicking outside
        document.addEventListener("click", function (e) {
            if (!sidebar.contains(e.target) && !toggleBtn.contains(e.target)) {
                if (sidebar.classList.contains("translate-x-0")) {
                    sidebar.classList.remove("translate-x-0");
                    sidebar.classList.add("-translate-x-full");
                }
            }
        });
    });
    </script>

    <script defer="" src="{{ asset('assets/bundle.js') }}"></script>
    @livewireScripts
</body>

</html>