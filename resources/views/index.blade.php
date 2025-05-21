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
    <style>
        .trash-can {
            position: relative;
            width: 220px;
            height: 260px;
        }

        .trash-lid {
            position: absolute;
            width: 240px;
            height: 30px;
            border-radius: 6px;
            left: -10px;
            top: -20px;
            z-index: 2;
        }

        .trash-handle {
            position: absolute;
            width: 50px;
            height: 30px;
            border-radius: 4px;
            left: 85px;
            top: -35px;
            z-index: 1;
        }

        .trash-body {
            position: relative;
            width: 100%;
            height: 100%;
            border-radius: 8px;
            overflow: hidden;
        }

        .trash-lines {
            position: absolute;
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: space-evenly;
            z-index: 3;
            pointer-events: none;
        }

        .trash-line {
            width: 6px;
            height: 70%;
            margin-top: 15%;
            border-radius: 3px;
        }

        .trash-fill {
            position: absolute;
            bottom: 0;
            width: 100%;
            transition: height 0.5s ease-in-out;
        }
    </style>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
   
</body>

</html>
