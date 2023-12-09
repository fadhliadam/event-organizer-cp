<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Event Organizer</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.svg" />

    <!-- ========================= CSS here ========================= -->
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/css/LineIcons.2.0.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/css/animate.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('tiny-slider.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/css/glightbox.min.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/css/main-landing.css') ?>" />

</head>

<body>
    <!--[if lte IE 9]>
      <p class="browserupgrade">
        You are using an <strong>outdated</strong> browser. Please
        <a href="https://browsehappy.com/">upgrade your browser</a> to improve
        your experience and security.
      </p>
    <![endif]-->

    <!-- Preloader -->
    <div class="preloader">
        <div class="preloader-inner">
            <div class="preloader-icon">
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    <!-- /End Preloader -->

    <!-- Start Header Area -->
    <header class="header navbar-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="nav-inner">
                        <!-- Start Navbar -->
                        <nav class="navbar navbar-expand-lg">
                            <a class="navbar-brand fw-bold" href="index.html">
                                <span class="fs-2">E</span>vent Organizer
                            </a>
                            <button class="navbar-toggler mobile-menu-btn" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                                <ul id="nav" class="navbar-nav ms-auto">
                                    <li class="nav-item">
                                        <a href="#home" class="page-scroll active" aria-label="Toggle navigation">Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#event" class="page-scroll" aria-label="Toggle navigation">Events</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#kategori" class="page-scroll" aria-label="Toggle navigation">Kategori</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="javascript:void(0)" aria-label="Toggle navigation">Contact Us</a>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                        <!-- End Navbar -->
                    </div>
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </header>
    <!-- End Header Area -->

    <!-- Start Hero Area -->
    <section id="home" class="hero-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5 col-md-12 col-12">
                    <div class="hero-content">
                        <h1 class="wow fadeInLeft" data-wow-delay=".4s">Jelajahi Warna Baru Ilmu dan Keseruan di
                            Fakultas Ilmu Komputer</h1>
                        <p class="wow fadeInLeft" data-wow-delay=".6s">
                            Ramaikan acara-acara seru di Fakultas Ilmu Komputer, Universitas Singaperbangsa Karawang!
                            Temukan keseruan dan pengetahuan baru yang pasti bikin hari-harimu lebih berwarna! Ayo
                            bergabung dan tingkatkan kebahagiaanmu bersama kami!</p>
                        <div class="button wow fadeInLeft" data-wow-delay=".8s">
                            <a href="javascript:void(0)" class="btn">Sign In</a>
                            <a href="javascript:void(0)" class="btn btn-alt">Sign Up</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 col-md-12 col-12">
                    <div class="hero-image wow fadeInRight" data-wow-delay=".4s">
                        <img src="<?= base_url('assets/images/phone.png'); ?>" alt="#">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Hero Area -->

    <!-- Start Pricing Table Area -->
    <section id="kategori" class="pricing-table section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2 class="wow fadeInUp" data-wow-delay=".4s">Event Terdekat</h2>
                        <p class="wow fadeInUp" data-wow-delay=".6s">Antisipasi Keseruan! Event Terdekat di Fakultas
                            Ilmu Komputer Universitas Singaperbangsa Karawang Menantimu. Segera Bergabung dan Rasakan
                            Pengalaman Ilmu yang Mendalam serta Kegembiraan yang Tidak Terlupakan. Jangan Lewatkan Momen
                            Menarik Ini!</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Single Table -->
                    <div class="single-table wow fadeInUp" data-wow-delay=".2s">
                        <!-- Table Head -->
                        <div class="table-head">
                            <h4 class="title">Job Fair</h4>
                            <img src="<?= base_url('assets/images/musik.jpg'); ?>" class="card-img" alt="...">
                            <p>All the basics for starting a new business</p>
                            <div class="price">
                                <h2 class="amount">Free</h2>
                            </div>
                            <div class="button">
                                <a href="javascript:void(0)" class="btn">Register</a>
                            </div>
                        </div>
                        <!-- End Table Head -->
                        <!-- Start Table Content -->
                        <div class="table-content">
                            <h4 class="middle-title">Details</h4>
                            <!-- Table List -->
                            <ul class="table-list">
                                <li><i class="lni lni-checkmark-circle"></i> Seminar</li>
                                <li><i class="lni lni-checkmark-circle"></i> Online</li>
                                <li><i class="lni lni-checkmark-circle"></i> 23 Desember 2023</li>
                                <li><i class="lni lni-checkmark-circle"></i> Jl. Ronggo Waluyo</li>
                            </ul>
                            <!-- End Table List -->
                        </div>
                        <!-- End Table Content -->
                    </div>
                    <!-- End Single Table-->
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Single Table -->
                    <div class="single-table wow fadeInUp" data-wow-delay=".4s">
                        <!-- Table Head -->
                        <div class="table-head">
                            <h4 class="title">Compfair</h4>
                            <p>All the basics for starting a new business</p>
                            <div class="price">
                                <h2 class="amount">$24<span class="duration">/mo</span></h2>
                            </div>
                            <div class="button">
                                <a href="javascript:void(0)" class="btn">Register</a>
                            </div>
                        </div>
                        <!-- End Table Head -->
                        <!-- Start Table Content -->
                        <div class="table-content">
                            <h4 class="middle-title">Details</h4>
                            <!-- Table List -->
                            <ul class="table-list">
                                <li><i class="lni lni-checkmark-circle"></i> Seminar</li>
                                <li><i class="lni lni-checkmark-circle"></i> Online</li>
                                <li><i class="lni lni-checkmark-circle"></i> 23 Desember 2023</li>
                                <li><i class="lni lni-checkmark-circle"></i> Jl. Ronggo Waluyo</li>
                            </ul>
                            <!-- End Table List -->
                        </div>
                        <!-- End Table Content -->
                    </div>
                    <!-- End Single Table-->
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Single Table -->
                    <div class="single-table wow fadeInUp" data-wow-delay=".6s">
                        <!-- Table Head -->
                        <div class="table-head">
                            <h4 class="title">Diesnatalis</h4>
                            <p>All the basics for starting a new business</p>
                            <div class="price">
                                <h2 class="amount">$32<span class="duration">/mo</span></h2>
                            </div>
                            <div class="button">
                                <a href="javascript:void(0)" class="btn">Register</a>
                            </div>
                        </div>
                        <!-- End Table Head -->
                        <!-- Start Table Content -->
                        <div class="table-content">
                            <h4 class="middle-title">Details</h4>
                            <!-- Table List -->
                            <ul class="table-list">
                                <li><i class="lni lni-checkmark-circle"></i> Seminar</li>
                                <li><i class="lni lni-checkmark-circle"></i> Online</li>
                                <li><i class="lni lni-checkmark-circle"></i> 23 Desember 2023</li>
                                <li><i class="lni lni-checkmark-circle"></i> Jl. Ronggo Waluyo</li>
                            </ul>
                            <!-- End Table List -->
                        </div>
                        <!-- End Table Content -->
                    </div>
                    <!-- End Single Table-->
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Single Table -->
                    <div class="single-table wow fadeInUp" data-wow-delay=".8s">
                        <!-- Table Head -->
                        <div class="table-head">
                            <h4 class="title">LKMM</h4>
                            <p>All the basics for starting a new business</p>
                            <div class="price">
                                <h2 class="amount">$48<span class="duration">/mo</span></h2>
                            </div>
                            <div class="button">
                                <a href="javascript:void(0)" class="btn">Register</a>
                            </div>
                        </div>
                        <!-- End Table Head -->
                        <!-- Start Table Content -->
                        <div class="table-content">
                            <h4 class="middle-title">Details</h4>
                            <!-- Table List -->
                            <ul class="table-list">
                                <li><i class="lni lni-checkmark-circle"></i> Seminar</li>
                                <li><i class="lni lni-checkmark-circle"></i> Online</li>
                                <li><i class="lni lni-checkmark-circle"></i> 23 Desember 2023</li>
                                <li><i class="lni lni-checkmark-circle"></i> Jl. Ronggo Waluyo</li>
                            </ul>
                            <!-- End Table List -->
                        </div>
                        <!-- End Table Content -->
                    </div>
                    <!-- End Single Table-->
                </div>
            </div>
        </div>
    </section>
    <!--/ End Pricing Table Area -->


    <!-- Start Achievement Area -->
    <section class="our-achievement section">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1 col-md-12 col-12">
                    <div class="title">
                        <h2>Temukan Serunya Banyak Event Menarik yang Siap Menghibur dan Memperkaya Pengetahuanmu</h2>
                        <p>Ikuti dan Raih Pengalaman Seru dari Setiap Event yang Tersedia. Jangan Sampai Ketinggalan</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 offset-lg-2 col-md-12 col-12">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-12">
                            <div class="single-achievement wow fadeInUp" data-wow-delay=".2s">
                                <h3 class="counter"><span id="secondo1" class="countup" cup-end="100">100</span>%</h3>
                                <p>satisfaction</p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-12">
                            <div class="single-achievement wow fadeInUp" data-wow-delay=".4s">
                                <h3 class="counter"><span id="secondo2" class="countup" cup-end="120">120</span>K</h3>
                                <p>Seminar</p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-12">
                            <div class="single-achievement wow fadeInUp" data-wow-delay=".6s">
                                <h3 class="counter"><span id="secondo3" class="countup" cup-end="125">125</span>k+</h3>
                                <p>Events</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Achievement Area -->

    <!-- Start Features Area -->
    <section id="event" class="features section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2 class="wow fadeInUp" data-wow-delay=".4s">Kategori Event
                        </h2>
                        <p class="wow fadeInUp" data-wow-delay=".6s">Explorasi Event dengan Beragam Kategori Sesuai Minatmu! Temukan Pengalaman Seru dan Ilmu Baru. Jelajahi Setiap Kategori dan Nikmati Keberagaman Acara yang Tersedia!</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 col-12">
                    <!-- Start Single Feature -->
                    <div class="single-feature wow fadeInUp" data-wow-delay=".2s">
                        <!-- <i class="lni lni-cloud-upload"></i> -->
                        <i class="lni lni-apartment"></i>
                        <h3>Seminar</h3>
                        <p>It is a long established fact that a reader will be distracted by the readable content of a
                            page at its layout.</p>
                    </div>
                    <!-- End Single Feature -->
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <!-- Start Single Feature -->
                    <div class="single-feature wow fadeInUp" data-wow-delay=".4s">
                        <i class="lni lni-crown"></i>
                        <h3>Lomba</h3>
                        <p>It is a long established fact that a reader will be distracted by the readable content of a
                            page at its layout.</p>
                    </div>
                    <!-- End Single Feature -->
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <!-- Start Single Feature -->
                    <div class="single-feature wow fadeInUp" data-wow-delay=".6s">
                        <i class="lni lni-music"></i>
                        <h3>Musik</h3>
                        <p>It is a long established fact that a reader will be distracted by the readable content of a
                            page at its layout.</p>
                    </div>
                    <!-- End Single Feature -->
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <!-- Start Single Feature -->
                    <div class="single-feature wow fadeInUp" data-wow-delay=".2s">
                        <i class="lni lni-shield"></i>
                        <h3>Kaderisasi</h3>
                        <p>It is a long established fact that a reader will be distracted by the readable content of a
                            page at its layout.</p>
                    </div>
                    <!-- End Single Feature -->
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <!-- Start Single Feature -->
                    <div class="single-feature wow fadeInUp" data-wow-delay=".4s">
                        <i class="lni lni-cog"></i>
                        <h3>Upgrading</h3>
                        <p>It is a long established fact that a reader will be distracted by the readable content of a
                            page at its layout.</p>
                    </div>
                    <!-- End Single Feature -->
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <!-- Start Single Feature -->
                    <div class="single-feature wow fadeInUp" data-wow-delay=".6s">
                        <i class="lni lni-layers"></i>
                        <h3>Forum</h3>
                        <p>It is a long established fact that a reader will be distracted by the readable content of a
                            page at its layout.</p>
                    </div>
                    <!-- End Single Feature -->
                </div>
            </div>
        </div>
    </section>
    <!-- End Features Area -->

    <!-- Start Footer Area -->
    <footer class="footer mt-auto py-3" style="background-color: #001f3f;">
        <div class="container text-center">

            <!-- Informasi Perusahaan -->
            <p class="text-white">PT Fasilkom Sejahtera</p>

            <!-- Tautan Media Sosial -->
            <div>
                <a href="https://www.instagram.com/yourcompany" class="text-white me-3" target="_blank" style="text-decoration: none;"><i class="bi bi-instagram"></i> @fasilkomsejahtera</a>
                <a href="https://www.youtube.com/c/yourcompany" class="text-white me-3" target="_blank" style="text-decoration: none;"><i class="bi bi-youtube"></i> Fasilkom Sejahtera Official</a>
                <a href="https://www.facebook.com/yourcompany" class="text-white me-3" target="_blank" style="text-decoration: none;"><i class="bi bi-facebook"></i> Fasilkom Sejahtera</a>
            </div>

            <!-- Alamat Email -->
            <p class="text-white">Email: <i class="bi bi-envelope"></i> info@fasilkomsejahtera.com</p>

            <!-- Hak Cipta -->
            <p class="text-white">&copy;
                2023 PT Fasilkom Sejahtera
            </p>

            <!-- Nomor Kontak -->
            <p class="text-white">Contact us: <i class="bi bi-whatsapp"></i> 089699754015</p>
        </div>
    </footer>
    <!--/ End Footer Area -->

    <!-- ========================= scroll-top ========================= -->
    <a href="#" class="scroll-top">
        <i class="lni lni-chevron-up"></i>
    </a>

    <!-- ========================= JS here ========================= -->

    <script src="<?= base_url('assets/js/bootstrap.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/wow.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/tiny-slider.js'); ?>"></script>
    <script src="<?= base_url('assets/js/glightbox.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/count-up.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/main.js'); ?>"></script>
    <script type="text/javascript">
        //====== counter up 
        var cu = new counterUp({
            start: 0,
            duration: 2000,
            intvalues: true,
            interval: 100,
            append: " ",
        });
        cu.start();
    </script>
</body>

</html>