<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Partner Dashboard') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/html2canvas.min.js') }}" defer></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    {{-- <script src="{{ asset('/assets/bundles/libscripts.bundle.js') }}"></script> --}}
    {{-- <script src="{{ asset('/assets/bundles/vendorscripts.bundle.js') }}"></script> --}}
    <script src="{{ asset('/assets/bundles/c3.bundle.js') }}" defer></script>
    <script src="{{ asset('/assets/vendor/DataTables/datatables.min.js') }}" defer></script>
    <script src="{{ asset('js/printThis.js') }}" defer></script>
    <script src="{{ asset('js/custom.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('/assets/vendor/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/vendor/animate-css/vivify.min.css') }}">

    <link rel="stylesheet" href="{{ asset('/assets/vendor/c3/c3.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('/assets/vendor/DataTables/datatables.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('/assets/vendor/chartist/css/chartist.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/vendor/chartist-plugin-tooltip/chartist-plugin-tooltip.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/vendor/jvectormap/jquery-jvectormap-2.0.3.css') }}">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/site.min.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <main class="py-4 dashboard">
            @yield('content')
        </main>
    </div>
</body>
</html>
