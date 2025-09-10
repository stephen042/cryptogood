<!DOCTYPE html>
<html lang="en" class="dark">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" />
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
    :class="{'dark bg-gray-900': darkMode === true}">

    {{ $slot }}
    <x-alert />
    <script defer="" src="{{ asset('assets/bundle.js') }}"></script>
    @livewireScripts
</body>

</html>