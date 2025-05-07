@extends('index')

@section('title', 'GARBAGENEM | Dashboard')

@section('content')
    @if (session('login_success'))
        <div id="login-alert" style="position: fixed; top: 20px; right: 20px; z-index: 9999;"
            class="opacity-0 transition-opacity duration-500">
            <div class="flex items-center px-5 py-4 bg-green-100 text-green-700 shadow-lg rounded-md">
                <i data-feather="check" class="w-6 h-6 mr-2"></i>
                <span>{{ session('login_success') }}</span>
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const alertBox = document.getElementById('login-alert');
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
    <div class="grid grid-cols-12 gap-6">
        <div class="col-span-12 xxl:col-span-9 grid grid-cols-12 gap-6">
            <div class="col-span-12 mt-8">
                <div class="intro-y flex items-center h-10">
                    <h2 class="text-lg font-medium truncate mr-5">
                        General Report
                    </h2>

                </div>
                <div class="grid grid-cols-12 gap-6 mt-5">
                    <div class="col-span-12 sm:col-span-6 xl:col-span-6 intro-y">
                        <div class="report-box zoom-in">
                            <div class="box p-5">
                                <div class="flex">
                                    <i data-feather="users" class="report-box__icon text-theme-10"></i>

                                </div>
                                <div class="text-3xl font-bold leading-8 mt-6">5</div>
                                <div class="text-base text-gray-600 mt-1">Total Users</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-12 sm:col-span-6 xl:col-span-6 intro-y">
                        <div class="report-box zoom-in">
                            <div class="box p-5">
                                <div class="flex">
                                    <i data-feather="trash-2" class="report-box__icon text-theme-6"></i>

                                </div>
                                <div class="text-3xl font-bold leading-8 mt-6">3</div>
                                <div class="text-base text-gray-600 mt-1">Total Monitored Garbage</div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-span-12 mt-8">
            <div class="intro-y block sm:flex items-center h-10">
                <h2 class="text-lg font-medium truncate mr-5">
                    Garbage Bin Volume Chart
                </h2>
                {{-- <div class="sm:ml-auto mt-3 sm:mt-0 relative text-gray-700">
                    <i data-feather="calendar" class="w-4 h-4 z-10 absolute my-auto inset-y-0 ml-3 left-0"></i>
                    <input type="text" data-daterange="true" class="datepicker input w-full sm:w-56 box pl-10">
                </div> --}}
            </div>
            <div class="intro-y box p-5 mt-12 sm:mt-5">
                <div class="flex flex-col xl:flex-row xl:items-center">
                    <div class="dropdown relative xl:ml-auto mt-5 xl:mt-0">
                        <button
                            class="dropdown-toggle button font-normal border text-white relative flex items-center text-gray-700">
                            Filter by Day <i data-feather="chevron-down" class="w-4 h-4 ml-2"></i> </button>
                        <div class="dropdown-box mt-10 absolute w-40 top-0 xl:right-0 z-20">
                            <div class="dropdown-box__content box p-2 overflow-y-auto h-32"> <a href=""
                                    class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md">Senin</a>
                                <a href=""
                                    class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md">Selasa</a>
                                <a href=""
                                    class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md">Rabu</a>
                                <a href=""
                                    class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md">Kamis</a>
                                <a href=""
                                    class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md">Jum'at</a>
                                <a href=""
                                    class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md">Sabtu</a>
                                <a href=""
                                    class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md">Minggu</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="report-chart">
                    <canvas id="report-line-chart" height="160" class="mt-6"></canvas>
                </div>
            </div>
        </div>
    </div>
@endsection
