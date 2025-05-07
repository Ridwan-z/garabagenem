<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <link href="dist/images/logo.svg" rel="shortcut icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
        content="Midone admin is super flexible, powerful, clean & modern responsive tailwind admin template with unlimited possibilities.">
    <meta name="keywords"
        content="admin template, Midone admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="LEFT4CODE">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('dist/css/app.css') }}" />
</head>

<body class="app">
    <div class="mobile-menu md:hidden">
        <div class="mobile-menu-bar">
            <a href="" class="flex mr-auto">
                <img alt="Midone Tailwind HTML Admin Template" class="w-6" src="{{ asset('dist/images/logo.svg') }}">
            </a>
            <a href="javascript:;" id="mobile-menu-toggler"> <i data-feather="bar-chart-2"
                    class="w-8 h-8 text-white transform -rotate-90"></i> </a>
        </div>
        @include('layout.hiddenmenu')
    </div>
    <div class="flex">
        @include('layout.menu')
        <div class="content">
            @include('layout.header')
            @yield('content')
        </div>
    </div>
    <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js">
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=[" your-google-map-api"]&libraries=places"></script>
    <script src="{{ asset('dist/js/app.js') }}"></script>
</body>

</html>
