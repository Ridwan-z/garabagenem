<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Smart DustBIN</title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- Favicons -->
    <link href="{{ asset('assets/img/favicon.png ') }}" rel="icon">
    <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">

    <!-- =======================================================
  * Template Name: FlexStart
  * Template URL: https://bootstrapmade.com/flexstart-bootstrap-startup-template/
  * Updated: Nov 01 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="index-page">

    <header id="header" class="header d-flex align-items-center fixed-top">
        <div class="container-fluid container-xl position-relative d-flex align-items-center">

            <a href="{{ url('/') }}" class="logo d-flex align-items-center me-auto">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <h1 class="sitename">Smart DustBIN</h1>
            </a>

            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="#hero" class="active">Beranda<br></a></li>
                    <li><a href="#about">Tentang</a></li>
                    <li><a href="#features">Fitur</a></li>
                    <li><a href="#benefits">Manfaat</a></li>
                    <li><a href="#team">Tim</a></li>
                    <li><a href="#gallery">Galeri</a></li>
                    <a class="btn-getstarted flex-md-shrink-0" href="{{ route('dashboard') }}">Dashboard</a>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>

        </div>
    </header>

    <main class="main">

        <!-- Hero Section -->
        <section id="hero" class="hero section">

            <div class="container">
                <div class="row gy-4">
                    <div class="col-lg-7 order-2 order-lg-1 d-flex flex-column justify-content-center">
                        <h1 data-aos="fade-up">Solusi Cerdas untuk Monitoring Tempat Sampah</h1>
                        <p data-aos="fade-up" data-aos-delay="100">Smart DustBIN membantu masyarakat dalam mengelola
                            sampah secara efisien dengan sistem pemantauan real-time berbasis teknologi sensor.</p>
                        <div class="d-flex flex-column flex-md-row" data-aos="fade-up" data-aos-delay="200">
                            <a href="#about" class="btn-get-started">Mulai<i class="bi bi-arrow-right"></i></a>
                            <a href="https://www.youtube.com/watch?v=Y7f98aduVJ8"
                                class="glightbox btn-watch-video d-flex align-items-center justify-content-center ms-0 ms-md-4 mt-4 mt-md-0"><i
                                    class="bi bi-play-circle"></i><span>Tonton Video</span></a>
                        </div>
                    </div>
                    <div class="col-lg-5 order-1 order-lg-2 hero-img" data-aos="zoom-out">
                        <img src="{{ asset('assets/img/dustbin.png') }}" class="img-fluid animated" alt="">
                    </div>
                </div>
            </div>

        </section><!-- /Hero Section -->

        <!-- About Section -->
        <section id="about" class="about section">
            <div class="container section-title" data-aos="fade-up">
                <h2>Tentang</h2>
            </div>
            <div class="container" data-aos="fade-up">
                <div class="row gx-0">

                    <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up"
                        data-aos-delay="200">
                        <div class="content">
                            <h3>APA ITU Smart DustBIN?</h3>
                            <h2>Solusi Cerdas untuk Monitoring Tempat Sampah secara Real-Time</h2>
                            <p>
                                Smart DustBIN adalah sistem inovatif berbasis teknologi sensor yang dirancang untuk
                                memantau kapasitas tempat sampah secara otomatis dan real-time.
                                Dengan integrasi Internet of Things (IoT), produk ini mampu memberikan notifikasi saat
                                tempat sampah hampir penuh, sehingga pengelolaan sampah menjadi lebih efisien, cepat,
                                dan ramah lingkungan.
                            </p>
                            {{-- <div class="text-center text-lg-start">
                                <a href="#about"
                                    class="btn-read-more d-inline-flex align-items-center justify-content-center align-self-center">
                                    <span>Read More</span>
                                    <i class="bi bi-arrow-right"></i>
                                </a>
                            </div> --}}
                        </div>

                    </div>

                    <div class="col-lg-6 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="200">
                        <img src="{{ asset('assets/img/tim.jpg') }}" class="img-fluid" alt="">
                    </div>

                </div>
            </div>

        </section><!-- /About Section -->

        <!-- Features Section -->
        <section id="features" class="features section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Fitur</h2>
                <p>Beberapa Fitur Smart DustBIN<br></p>
            </div><!-- End Section Title -->

            <div class="container">

                <div class="row gy-5">

                    <div class="col-xl-6" data-aos="zoom-out" data-aos-delay="100">
                        <img src="{{ asset('assets/img/features.png') }}" class="img-fluid" alt="">
                    </div>

                    <div class="col-xl-6 d-flex">
                        <div class="row align-self-center gy-4">

                            <div class="col-md-6" data-aos="fade-up" data-aos-delay="200">
                                <div class="feature-box d-flex align-items-center">
                                    <i class="bi bi-check"></i>
                                    <h3>Pemantauan Kapasitas Real-Time</h3>
                                </div>
                            </div><!-- End Feature Item -->

                            <div class="col-md-6" data-aos="fade-up" data-aos-delay="300">
                                <div class="feature-box d-flex align-items-center">
                                    <i class="bi bi-check"></i>
                                    <h3>Integrasi IoT</h3>
                                </div>
                            </div><!-- End Feature Item -->

                            <div class="col-md-6" data-aos="fade-up" data-aos-delay="400">
                                <div class="feature-box d-flex align-items-center">
                                    <i class="bi bi-check"></i>
                                    <h3>Tampilan Responsif</h3>
                                </div>
                            </div><!-- End FeHemat Energiature Item -->

                            <div class="col-md-6" data-aos="fade-up" data-aos-delay="500">
                                <div class="feature-box d-flex align-items-center">
                                    <i class="bi bi-check"></i>
                                    <h3>Hemat Energi</h3>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </section><!-- /Features Section -->

        <!-- Alt Features Section -->
        <section id="benefits" class="alt-features section">
            <div class="container section-title" data-aos="fade-up">
                <h2>Manfaat</h2>
                <p>Beberapa Manfaat Smart DustBIN</p>
            </div><!-- End Section Title -->
            <div class="container">

                <div class="row gy-5">

                    <div class="col-xl-7 d-flex order-2 order-xl-1" data-aos="fade-up" data-aos-delay="200">

                        <div class="row align-self-center gy-5">

                            <div class="col-md-6 icon-box">
                                <i class="bi bi-speedometer2"></i>
                                <div>
                                    <h4>Pemantauan Kapasitas Real-Time</h4>
                                    <p>Mempermudah petugas kebersihan dalam memantau kondisi tempat sampah tanpa harus
                                        mengeceknya secara langsung. Menghemat waktu dan meningkatkan efisiensi
                                        pengelolaan sampah.</p>
                                </div>
                            </div><!-- End Feature Item -->

                            <div class="col-md-6 icon-box">
                                <i class="bi bi-gear"></i>
                                <div>
                                    <h4>Integrasi IoT</h4>
                                    <p>Memungkinkan sistem bekerja secara otomatis dengan mengirim data melalui jaringan
                                        WiFi, tanpa perlu campur tangan manual. Hal ini mempercepat pengambilan
                                        keputusan berbasis data.</p>
                                </div>
                            </div><!-- End Feature Item -->

                            <div class="col-md-6 icon-box">
                                <i class="bi bi-display"></i>
                                <div>
                                    <h4>Tampilan Responsif</h4>
                                    <p>Sistem dapat diakses dengan nyaman melalui berbagai perangkat seperti smartphone,
                                        tablet, dan komputer, sehingga pengguna dapat memantau kondisi tempat sampah
                                        kapan saja dan di mana saja.
                                    </p>
                                </div>
                            </div><!-- End Feature Item -->

                            <div class="col-md-6 icon-box">
                                <i class="bi bi-battery-half"></i>
                                <div>
                                    <h4>Hemat Energi</h4>
                                    <p>Menggunakan sensor dan perangkat berdaya rendah untuk memastikan sistem dapat
                                        berjalan dalam jangka waktu lama tanpa perlu sering diganti atau diisi ulang
                                        daya.

                                    </p>
                                </div>
                            </div><!-- End Feature Item -->


                        </div>

                    </div>

                    <div class="col-xl-5 d-flex align-items-center order-1 order-xl-2" data-aos="fade-up"
                        data-aos-delay="100">
                        <img src="{{ asset('assets/img/alt-features.png') }}" class="img-fluid" alt="">
                    </div>

                </div>

            </div>

        </section><!-- /Alt Features Section -->

        <!-- Team Section -->
        <section id="team" class="team section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Tim</h2>
                <p>Tim yang membuat Smart DustBIN</p>
            </div><!-- End Section Title -->

            <div class="container">

                <div class="row gy-4">

                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up"
                        data-aos-delay="100">
                        <div class="team-member">
                            <div class="member-img">
                                <img src="{{ asset('assets/img/man.jpg') }}" class="img-fluid" alt="">
                                <div class="social">

                                    <a href=""><i class="bi bi-instagram"></i></a>
                                </div>
                            </div>
                            <div class="member-info">
                                <h4>Bayu</h4>
                                <span>Ketua TIM</span>
                            </div>
                        </div>
                    </div><!-- End Team Member -->

                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up"
                        data-aos-delay="200">
                        <div class="team-member">
                            <div class="member-img">
                                <img src="{{ asset('assets/img/woman.jpg') }}" class="img-fluid" alt="">
                                <div class="social">

                                    <a href=""><i class="bi bi-instagram"></i></a>
                                </div>
                            </div>
                            <div class="member-info">
                                <h4>Arta</h4>
                                <span>Anggota</span>

                            </div>
                        </div>
                    </div><!-- End Team Member -->

                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up"
                        data-aos-delay="300">
                        <div class="team-member">
                            <div class="member-img">
                                <img src="{{ asset('assets/img/man.jpg') }}" class="img-fluid" alt="">
                                <div class="social">

                                    <a href=""><i class="bi bi-instagram"></i></a>
                                </div>
                            </div>
                            <div class="member-info">
                                <h4>Aidil</h4>
                                <span>Anggota</span>

                            </div>
                        </div>
                    </div><!-- End Team Member -->

                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up"
                        data-aos-delay="400">
                        <div class="team-member">
                            <div class="member-img">
                                <img src="{{ asset('assets/img/man.jpg') }}" class="img-fluid" alt="">
                                <div class="social">

                                    <a href=""><i class="bi bi-instagram"></i></a>
                                </div>
                            </div>
                            <div class="member-info">
                                <h4>Ridwan</h4>
                                <span>Anggota</span>

                            </div>
                        </div>
                    </div><!-- End Team Member -->

                </div>

            </div>

        </section><!-- /Team Section -->

        <section id="gallery" class="recent-posts section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Galeri</h2>
                <p>Proses pengerjaan Smart DustBIN</p>
            </div><!-- End Section Title -->

            <div class="container">

                <div class="row gy-5">

                    <div class="col-xl-3 col-md-6">
                        <div class="post-item position-relative h-100" data-aos="fade-up" data-aos-delay="100">

                            <div class="post-img position-relative overflow-hidden">
                                <img src="{{ asset('assets/img/ngoding.jpg') }}" class="img-fluid" alt="">
                                <span class="post-date">25 Mei</span>
                            </div>

                            <div class="post-content d-flex flex-column">
                                <h3 class="post-title">Pengembangan Website Smart DustBIN</h3>
                            </div>

                        </div>
                    </div><!-- End post item -->

                    <div class="col-xl-3 col-md-6">
                        <div class="post-item position-relative h-100" data-aos="fade-up" data-aos-delay="200">

                            <div class="post-img position-relative overflow-hidden">
                                <img src="{{ asset('assets/img/bor.jpg') }}" class="img-fluid" alt="">
                                <span class="post-date">28 Mei</span>
                            </div>

                            <div class="post-content d-flex flex-column">
                                <h3 class="post-title">Proses Pengeboran pada PCB yang Telah Dibuat</h3>
                            </div>

                        </div>
                    </div><!-- End post item -->

                    <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
                        <div class="post-item position-relative h-100">

                            <div class="post-img position-relative overflow-hidden">
                                <img src="{{ asset('assets/img/rangkai.jpg') }}" class="img-fluid" alt="">
                                <span class="post-date">28 Mei</span>
                            </div>

                            <div class="post-content d-flex flex-column">
                                <h3 class="post-title">Perakitan PCB Setelah Proses Penyolderan</h3>
                            </div>

                        </div>
                    </div><!-- End post item -->
                    <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
                        <div class="post-item position-relative h-100">

                            <div class="post-img position-relative overflow-hidden">
                                <img src="{{ asset('assets/img/evaluasi.jpg') }}" class="img-fluid" alt="">
                                <span class="post-date">28 Mei</span>
                            </div>

                            <div class="post-content d-flex flex-column">
                                <h3 class="post-title">Proses Diskusi dan Pengujian proyek Smart DustBIN </h3>
                            </div>

                        </div>
                    </div><!-- End post item -->

                </div>


            </div>

        </section><!-- /Recent Posts Section -->

    </main>

    <footer id="footer" class="footer">



        <div class="container copyright text-center mt-4">
            <p>© <span>Copyright</span> <strong class="px-1 sitename">Smart DustBIN</strong> <span>All Rights
                    Reserved</span></p>

        </div>

    </footer>

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
    <script src="{{ asset('assets/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>

    <!-- Main JS File -->
    <script src="{{ asset('assets/js/main.js') }}"></script>

</body>

</html>
