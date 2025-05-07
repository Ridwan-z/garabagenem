<!DOCTYPE html>
<!--
Template Name: Midone - HTML Admin Dashboard Template
Author: Left4code
Website: http://www.left4code.com/
Contact: muhammadrizki@left4code.com
Purchase: https://themeforest.net/user/left4code/portfolio
Renew Support: https://themeforest.net/user/left4code/portfolio
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<html lang="en">
<!-- BEGIN: Head -->

<head>
    <meta charset="utf-8">
    <link href="dist/images/logo.svg" rel="shortcut icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
        content="Midone admin is super flexible, powerful, clean & modern responsive tailwind admin template with unlimited possibilities.">
    <meta name="keywords"
        content="admin template, Midone admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="LEFT4CODE">
    <title>GARBAGE | Login </title>
    <!-- BEGIN: CSS Assets-->
    <link rel="stylesheet" href="{{ asset('dist/css/app.css') }}" />
    <!-- END: CSS Assets-->
</head>
<!-- END: Head -->

<body class="login">
    @if (session('logout_success'))
        <div id="logout-alert" style="position: fixed; top: 20px; right: 20px; z-index: 9999;"
            class="opacity-0 transition-opacity duration-500">
            <div class="flex items-center px-5 py-4 bg-green-100 text-green-700 shadow-lg rounded-md">
                <i data-feather="check" class="w-6 h-6 mr-2"></i>
                <span>{{ session('logout_success') }}</span>
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const alertBox = document.getElementById('logout-alert');
                if (alertBox) {
                    setTimeout(() => {
                        alertBox.classList.remove('opacity-0');
                        alertBox.classList.add('opacity-100');
                    }, 100);

                    setTimeout(() => {
                        alertBox.classList.remove('opacity-100');
                        alertBox.classList.add('opacity-0');

                        setTimeout(() => {
                            alertBox.remove();
                        }, 500);
                    }, 2500);
                }
            });
        </script>
    @endif

    <div class="container sm:px-10">
        <div class="block xl:grid grid-cols-2 gap-4">
            <!-- BEGIN: Login Info -->
            <div class="hidden xl:flex flex-col min-h-screen">
                <a href="" class="-intro-x flex items-center pt-5">
                    <img alt="Midone Tailwind HTML Admin Template" class="w-6" src="dist/images/logo.svg">
                    <span class="text-white text-lg ml-3"> GARBAG<span class="text-md font-medium">ENEM</span> </span>
                </a>
                <div class="my-auto">
                    <img alt="Midone Tailwind HTML Admin Template" class="-intro-x w-1/2 -mt-16"
                        src="{{ asset('dist/images/illustration.svg') }}">
                    <div class="-intro-x text-white font-medium text-2xl leading-tight mt-10">
                        Just a few more clicks to
                        <br>
                        sign in to the waste monitoring system.
                    </div>
                    <div class="-intro-x mt-5 text-lg text-white">
                        Monitor and manage garbage bin volumes efficiently in one place.
                    </div>

                </div>
            </div>
            <!-- END: Login Info -->
            <!-- BEGIN: Login Form -->

            <div class="h-screen xl:h-auto flex py-5 xl:py-0 my-10 xl:my-0">
                <div
                    class="my-auto mx-auto xl:ml-20 bg-white xl:bg-transparent px-5 sm:px-8 py-8 xl:p-0 rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">
                    <h2 class="intro-x font-bold text-2xl xl:text-3xl text-center xl:text-left">
                        Sign In
                    </h2>
                    <div class="intro-x mt-2 text-gray-500 xl:hidden text-center">A few more clicks to sign in to your
                        account. Manage all your e-commerce accounts in one place</div>
                    <form class="user" method="POST" action="{{ route('loginProses') }}">
                        @csrf
                        <div class="intro-x mt-8">
                            <input type="email" name="email"
                                class="intro-x login__input input input--lg border block @error('email') border-red-500 @else border-gray-500 @enderror"
                                placeholder="Email" value="{{ old('email') }}">
                            @error('email')
                                <small class="text-red-500">{{ $message }}</small>
                            @enderror
                            <input type="password" name="password"
                                class="intro-x login__input input input--lg border @error('email') border-red-500 @else border-gray-500 @enderror block mt-4"
                                placeholder="Password">
                            @error('password')
                                <small class="text-red-500">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="intro-x flex justify-between items-center text-gray-700 text-xs sm:text-sm mt-4">
                            <button
                                class="button button--lg w-full xl:w-32 text-white bg-theme-1 xl:mr-3">Login</button>
                            <a href="">Forgot Password?</a>
                        </div>
                    </form>
                </div>
            </div>
            <!-- END: Login Form -->
        </div>
    </div>
    <!-- BEGIN: JS Assets-->
    <script src="{{ asset('dist/js/app.js') }}"></script>
    <!-- END: JS Assets-->
</body>

</html>
