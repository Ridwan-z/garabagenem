@extends('index')

@section('title', 'Smart DustBIN | Dashboard')

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
        {{-- <div class="col-span-12 xxl:col-span-9 grid grid-cols-12 gap-6">
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
                                <div class="text-3xl font-bold leading-8 mt-6">1</div>
                                <div class="text-base text-gray-600 mt-1">Total Monitored Garbage</div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div> --}}
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

        </div>
        <div class="col-span-12 sm:col-span-6 xl:col-span-12 intro-y">
            <div class="box p-8">
                <div class="flex justify-center items-end mt-6">
                    <div class="trash-can mb-0">
                        <div class="trash-lid bg-gray-600"></div>
                        <div class="trash-handle bg-gray-600"></div>
                        <div class="trash-body bg-gray-400 border-2 border-gray-600">
                            <div class="trash-fill bg-green-500" id="trash-fill"></div>
                            <div class="trash-lines">
                                <div class="trash-line bg-gray-600"></div>
                                <div class="trash-line bg-gray-600"></div>
                                <div class="trash-line bg-gray-600"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <script>
        const trashFill = document.getElementById("trash-fill");

        function setProgress(sensorValue) {
            // Konversi value ke dalam persen dari maksimum 50
            let percentage = Math.max(0, Math.min(100, ((20 - sensorValue) / (20 - 3)) * 100));
            updateProgress(percentage);
        }

        function updateProgress(value) {
            trashFill.style.height = `${value}%`;

            if (value > 70) {
                trashFill.className = "trash-fill bg-red-500"; // Penuh
            } else if (value > 30) {
                trashFill.className = "trash-fill bg-yellow-500"; // Sedang
            } else {
                trashFill.className = "trash-fill bg-green-500"; // Kosong
            }
        }

        // Default untuk testing (hapus jika tidak diperlukan)
        // setProgress(10);
    </script>


    <script src="https://js.pusher.com/8.4.0/pusher.min.js"></script>
    <script>
        // Enable pusher logging - jangan gunakan ini di production
        Pusher.logToConsole = true;

        // Inisialisasi Pusher
        var pusher = new Pusher('c9ecbae8bfc47ce823dd', {
            cluster: 'mt1'
        });

        // Subscribe ke channel 'sensor-channel'
        var channel = pusher.subscribe('sensor-channel');

        // Mendengarkan event 'sensor-data'
        channel.bind('sensor-data', function(data) {

            const sensorValue = data.data.value;
            setProgress(sensorValue);
        });
    </script>
@endsection
