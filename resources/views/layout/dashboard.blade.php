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
        <div class="col-span-12 xxl:col-span-9 grid grid-cols-12 gap-6">
            <div class="col-span-12 mt-8">

                <div class="grid grid-cols-12 gap-6 mt-5">
                    <div class="col-span-12 sm:col-span-6 xl:col-span-6 intro-y">
                        <div class="report-box zoom-in">
                            <div class="box p-5">
                                <div class="flex">
                                    <i data-feather="upload" class="report-box__icon text-theme-10"></i>
                                </div>
                                <div class="text-3xl font-bold leading-8 mt-6" id="opened-count">0</div>
                                <div class="text-base text-gray-600 mt-1">Jumlah Tempat Sampah Dibuka Hari ini</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-12 sm:col-span-6 xl:col-span-6 intro-y">
                        <div class="report-box zoom-in">
                            <div class="box p-5">
                                <div class="flex">
                                    <i data-feather="download" class="report-box__icon text-theme-6"></i>
                                </div>
                                <div class="text-3xl font-bold leading-8 mt-6" id="closed-count">0</div>
                                <div class="text-base text-gray-600 mt-1">Jumlah Tempat Sampah Ditutup Hari ini</div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-span-12 mt-6">

            <div class="intro-y box p-5 mt-12 sm:mt-5">
                <div class="intro-y block sm:flex items-center h-10">
                    <h2 class="text-lg font-medium truncate mr-5">
                        History Penggunaan Smart DustBIN per-Hari
                    </h2>
                    <div class="sm:ml-auto mt-3 sm:mt-0 relative text-gray-700">
                        <i data-feather="calendar" class="w-4 h-4 z-10 absolute my-auto inset-y-0 ml-3 left-0"></i>
                        <input id="volume-date" class="input w-56 border pl-10" autocomplete="off">
                        <button id="btn-volume-filter" class="button text-white bg-theme-1 shadow-md mr-2">Filter</button>
                    </div>

                </div>
                <div class="report-chart">
                    <canvas id="report-line-chart" height="100" class="mt-6"></canvas>
                </div>
            </div>
        </div>
        <div class="col-span-12 mt-6">
            <div class="intro-y block sm:flex items-center h-10">
                <h2 class="text-lg font-medium truncate mr-5">
                    Volume Tempat Sampah
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
    <!DOCTYPE html>

    <head>
        <title>Pusher Test</title>
        <script src="https://js.pusher.com/8.4.0/pusher.min.js"></script>
        <script>
            // Enable pusher logging - don't include this in production
            Pusher.logToConsole = true;

            var pusher = new Pusher('c9ecbae8bfc47ce823dd', {
                cluster: 'mt1'
            });

            var channel = pusher.subscribe('sensor-channel');
            channel.bind('sensor-data', function(data) {
                const sensorValue = data.data.value;
                setProgress(sensorValue);
            });
        </script>
    </head>


    <script>
        const trashFill = document.getElementById("trash-fill");

        let progressTimeout;

        function setProgress(sensorValue) {
            clearTimeout(progressTimeout);
            progressTimeout = setTimeout(() => {
                let percentage = Math.max(0, Math.min(100, ((30 - sensorValue) / (30 - 2)) * 100));
                updateProgress(percentage);
            }, 100); // Tunggu 100ms sebelum update
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

        // setProgress(15);
    </script>
    <script src="https://cdn.jsdelivr.net/npm/litepicker/dist/bundle.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Fungsi untuk format YYYY-MM-DD
            function getTodayDateString() {
                const today = new Date();
                const yyyy = today.getFullYear();
                const mm = String(today.getMonth() + 1).padStart(2, '0'); // bulan mulai dari 0
                const dd = String(today.getDate()).padStart(2, '0');
                return `${yyyy}-${mm}-${dd}`;
            }

            // Set placeholder ke tanggal hari ini
            document.getElementById('volume-date').placeholder = getTodayDateString();

            // Inisialisasi Litepicker
            new Litepicker({
                element: document.getElementById('volume-date'),
                format: 'YYYY-MM-DD',
            });

            function fetchAndRenderVolumeChart(date = null) {
                const url = date ? `/api/chart/volume?date=${encodeURIComponent(date)}` : `/api/chart/volume`;

                console.log("Tanggal yang dikirim:", date);
                console.log("URL yang digunakan:", url);

                fetch(url)
                    .then((res) => res.json())
                    .then((volumeData) => {
                        const labels = [
                            "00:00", "02:00", "04:00", "06:00", "08:00", "10:00",
                            "12:00", "14:00", "16:00", "18:00", "20:00", "22:00"
                        ];

                        const filteredData = [];
                        for (let i = 0; i < 24; i += 2) {
                            const hour = String(i).padStart(2, '0');
                            filteredData.push(volumeData[hour] || 0);
                        }

                        const ctx = $("#report-line-chart")[0].getContext("2d");
                        if (window.volumeChartInstance) {
                            window.volumeChartInstance.data.datasets[0].data = filteredData;
                            window.volumeChartInstance.update();
                        } else {
                            window.volumeChartInstance = new Chart(ctx, {
                                type: "line",
                                data: {
                                    labels: labels,
                                    datasets: [{
                                        label: "Rata-rata Volume",
                                        data: filteredData,
                                        borderWidth: 2,
                                        borderColor: "#3160D8",
                                        backgroundColor: "transparent",
                                        pointBorderColor: "transparent",
                                    }],
                                },
                                options: {
                                    legend: {
                                        display: false
                                    },
                                    scales: {
                                        xAxes: [{
                                            ticks: {
                                                fontSize: "12",
                                                fontColor: "#777777",
                                            },
                                            gridLines: {
                                                display: false
                                            },
                                        }],
                                        yAxes: [{
                                            ticks: {
                                                fontSize: "12",
                                                fontColor: "#777777",
                                                beginAtZero: true,
                                                max: 100,
                                                stepSize: 20,
                                                callback: (value) => value + "%",
                                            },
                                            gridLines: {
                                                color: "#D8D8D8",
                                                zeroLineColor: "#D8D8D8",
                                                borderDash: [2, 2],
                                                zeroLineBorderDash: [2, 2],
                                                drawBorder: false,
                                            },
                                        }],
                                    },
                                },
                            });
                        }
                    })
                    .catch((error) => {
                        console.error("Gagal fetch data:", error);
                    });
            }

            // Load grafik awal dengan tanggal hari ini
            fetchAndRenderVolumeChart(getTodayDateString());

            // Event klik tombol Filter
            document.getElementById("btn-volume-filter").addEventListener("click", function() {
                const selectedDate = document.getElementById("volume-date").value;
                fetchAndRenderVolumeChart(selectedDate);
            });
        });
    </script>
    <script>
        function fetchOpenCloseCounts() {
            fetch('/api/open-close-count')
                .then(response => response.json())
                .then(data => {
                    document.getElementById('opened-count').textContent = data.opened;
                    document.getElementById('closed-count').textContent = data.closed;
                })
                .catch(error => console.error('Gagal mengambil data open/close:', error));
        }

        // Jalankan saat halaman dimuat
        document.addEventListener("DOMContentLoaded", function() {
            fetchOpenCloseCounts();

            // (Optional) refresh tiap 10 detik:
            setInterval(fetchOpenCloseCounts, 2000);
        });
    </script>

@endsection
