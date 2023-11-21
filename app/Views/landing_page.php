<!-- app/Views/landing.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Organizer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <style>
        /* CSS khusus untuk latar belakang jumbotron */
        body {
            /* background: linear-gradient(180deg, #6a00ff, #ffffff); */
            color: white;
            margin: 0;
        }

        .navbar {
            background-color: #8A2BE2;
            color: white;
            padding: 15px 0;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
        }

        .content {
            margin-top: 80px;
        }

        .inner {
            overflow: hidden;
        }

        .inner img {
            transition: all 1.5s ease;
        }

        .inner:hover img {
            transform: scale(1.3);
        }

        .feedback-border {
            border: 2px solid;
            border-image: linear-gradient(90deg, #3498db, #ff66ff);
            border-image-slice: 1;
            border-radius: 30px;
            padding: 10px;
            /* Sesuaikan dengan kebutuhan */
        }

        .jumbotron {
            position: relative;
            background: linear-gradient(180deg, #8A2BE2, rgba(106, 0, 255, 0));
            /* Menggunakan rgba() untuk memberikan transparansi pada warna akhir jumbotron */
            background-size: cover;
            background-blend-mode: multiply;
            color: white;
            padding: 100px 0;
        }

        .jumbotron h1 {
            font-size: 5em;
            font-weight: bold;
        }


        .user-feedback {
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 15px;
            margin-top: 20px;
        }

        .user-avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            margin-right: 10px;
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <?php include('navbar.php'); ?>

    <!-- Jumbotron -->
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="<?= base_url('assets/konser.jpg'); ?>" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>First slide label</h5>
                    <p>Some representative placeholder content for the first slide.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="<?= base_url('assets/konser.jpg'); ?>" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Second slide label</h5>
                    <p>Some representative placeholder content for the second slide.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="<?= base_url('assets/konser.jpg'); ?>" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Third slide label</h5>
                    <p>Some representative placeholder content for the third slide.</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <!-- Services -->
    <div class="container mt-4">
        <h2 class="text-center mb-4 text-black fw-bold">Coming Event</h2>
        <div class="row d-flex justify-content-evenly" data-aos="zoom-in">
            <div class="card p-0" style="width: 18rem; height: 25rem; background-color: #f0f0f0;">
                <div class="card-header" style="background: linear-gradient(to right, #87CEEB, #98FB98);">
                    <h4 class="fw-bold">
                        <?php echo date('F Y', strtotime('2023-11-01')); ?>
                    </h4>
                </div>
                <div class="card-body" style="background-color: #f0f0f0; padding: 0;">
                    <ul class="list-group list-group-flush" style="border: none;">
                        <li class="list-group-item" style="background-color: #f0f0f0; border: none;"><i class="bi bi-calendar2-date"></i> Event 1</li>
                        <li class="list-group-item" style="background-color: #f0f0f0; border: none;"><i class="bi bi-calendar2-date"></i> Event 2</li>
                        <li class="list-group-item" style="background-color: #f0f0f0; border: none;"><i class="bi bi-calendar2-date"></i> Event 3</li>
                        <!-- Tambahkan lebih banyak item event jika diperlukan -->
                    </ul>
                </div>
            </div>
            <div class="card p-0" style="width: 18rem; height: 25rem; background-color: #f0f0f0;">
                <div class="card-header" style="background: linear-gradient(to right, #87CEEB, #98FB98);">
                    <h4 class="fw-bold">
                        <?php echo date('F Y', strtotime('2023-12-01')); ?>
                    </h4>
                </div>
                <div class="card-body" style="background-color: #f0f0f0; padding: 0;">
                    <ul class="list-group list-group-flush" style="border: none;">
                        <li class="list-group-item" style="background-color: #f0f0f0; border: none;"><i class="bi bi-calendar2-date"></i> Event 1</li>
                        <li class="list-group-item" style="background-color: #f0f0f0; border: none;"><i class="bi bi-calendar2-date"></i> Event 2</li>
                        <li class="list-group-item" style="background-color: #f0f0f0; border: none;"><i class="bi bi-calendar2-date"></i> Event 3</li>
                        <!-- Tambahkan lebih banyak item event jika diperlukan -->
                    </ul>
                </div>
            </div>
            <div class="card p-0" style="width: 18rem; height: 25rem; background-color: #f0f0f0;">
                <div class="card-header" style="background: linear-gradient(to right, #87CEEB, #98FB98);">
                    <h4 class="fw-bold">
                        <?php echo date('F Y', strtotime('2024-01-01')); ?>
                    </h4>
                </div>
                <div class="card-body" style="background-color: #f0f0f0; padding: 0;">
                    <ul class="list-group list-group-flush" style="border: none;">
                        <li class="list-group-item" style="background-color: #f0f0f0; border: none;"><i class="bi bi-calendar2-date"></i> Event 1</li>
                        <li class="list-group-item" style="background-color: #f0f0f0; border: none;"><i class="bi bi-calendar2-date"></i> Event 2</li>
                        <li class="list-group-item" style="background-color: #f0f0f0; border: none;"><i class="bi bi-calendar2-date"></i> Event 3</li>
                        <!-- Tambahkan lebih banyak item event jika diperlukan -->
                    </ul>
                </div>
            </div>
            <div class="card p-0" style="width: 18rem; height: 25rem; background-color: #f0f0f0;">
                <div class="card-header" style="background: linear-gradient(to right, #87CEEB, #98FB98);">
                    <h4 class="fw-bold">
                        <?php echo date('F Y', strtotime('2024-02-01')); ?>
                    </h4>
                </div>
                <div class="card-body" style="background-color: #f0f0f0; padding: 0;">
                    <ul class="list-group list-group-flush" style="border: none;">
                        <li class="list-group-item" style="background-color: #f0f0f0; border: none;"><i class="bi bi-calendar2-date"></i> Event 1</li>
                        <li class="list-group-item" style="background-color: #f0f0f0; border: none;"><i class="bi bi-calendar2-date"></i> Event 2</li>
                        <li class="list-group-item" style="background-color: #f0f0f0; border: none;"><i class="bi bi-calendar2-date"></i> Event 3</li>
                        <!-- Tambahkan lebih banyak item event jika diperlukan -->
                    </ul>
                </div>
            </div>

        </div>
    </div>

    <!-- Kategori -->
    <div class="container mt-4 mb-4">
        <h2 class="text-center mb-4 text-black fw-bold" data-aos="fade-up">Kategori Event</h2>
        <div class="row">
            <div class="col-md-4" data-aos="fade-up">
                <div class="card text-bg-dark inner">
                    <img src="<?= base_url('assets/musik.jpg'); ?>" class="card-img" alt="...">
                    <div class="card-img-overlay" style="background: rgba(0, 0, 128, 0.25); position: absolute; bottom: 0; width: 100%; text-align: center;">
                        <h2 class="fw-bold">EVENT MUSIK</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-4" data-aos="fade-up">
                <div class="card text-bg-dark inner">
                    <img src="<?= base_url('assets/olahraga.jpg'); ?>" class="card-img" alt="...">
                    <div class="card-img-overlay" style="background: rgba(0, 0, 128, 0.25); position: absolute; bottom: 0; width: 100%; text-align: center;">
                        <h2 class="fw-bold">EVENT OLAHRAGA</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-4" data-aos="fade-up">
                <div class="card text-bg-dark inner">
                    <img src="<?= base_url('assets/kuliner.png'); ?>" class="card-img" alt="...">
                    <div class="card-img-overlay" style="background: rgba(0, 0, 128, 0.25); position: absolute; bottom: 0; width: 100%; text-align: center;">
                        <h2 class="fw-bold">EVENT KULINER</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="row  mt-3">
            <div class="col-md-4" data-aos="fade-up-right">
                <div class="card text-bg-dark inner">
                    <img src="<?= base_url('assets/budaya.jpg'); ?>" class="card-img" alt="...">
                    <div class="card-img-overlay" style="background: rgba(0, 0, 128, 0.25); position: absolute; bottom: 0; width: 100%; text-align: center;">
                        <h2 class="fw-bold">EVENT BUDAYA</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-4" data-aos="fade-up">
                <div class="card text-bg-dark inner">
                    <img src="<?= base_url('assets/karnaval.jpg'); ?>" class="card-img" alt="...">
                    <div class="card-img-overlay" style="background: rgba(0, 0, 128, 0.25); position: absolute; bottom: 0; width: 100%; text-align: center;">
                        <h2 class="fw-bold">EVENT KARNAVAL</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-4" data-aos="fade-up-left">
                <div class="card text-bg-dark inner">
                    <img src="<?= base_url('assets/seni.jpg'); ?>" class="card-img" alt="...">
                    <div class="card-img-overlay" style="background: rgba(0, 0, 128, 0.25); position: absolute; bottom: 0; width: 100%; text-align: center;">
                        <h2 class="fw-bold">EVENT SENI</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Feedback -->
    <div class="container-sm" style="margin-bottom: 5rem;">
        <h2 class="text-center mb-4 text-black fw-bold" data-aos="fade-up">Apa Kata Mereka?</h2>
        <div id="carouselExample" class="carousel carousel-dark slide" data-aos="fade-up">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="container mt-4">
                        <div class="row d-flex justify-content-evenly">

                            <div class="card" style="width: 18rem; height: 25rem; background-color: #f0f0f0;">
                                <div class="card-body d-flex flex-column justify-content-between ">
                                    <div class="feedback-border">
                                        <h5 class="card-title">Card title</h5>
                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <img src="<?= base_url('assets/person.png'); ?>" alt="User Avatar" style="width: 50px; height: 50px; border-radius: 50%; margin-right: 10px;">
                                        <div>
                                            <h6 class="mb-1">Nama Pengguna</h6>
                                            <p class="mb-0">Jabatan</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card" style="width: 18rem; height: 25rem; background-color: #f0f0f0;">
                                <div class="card-body d-flex flex-column justify-content-between">
                                    <div class="feedback-border">
                                        <h5 class="card-title">Card title</h5>
                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <img src="<?= base_url('assets/person.png'); ?>" alt="User Avatar" style="width: 50px; height: 50px; border-radius: 50%; margin-right: 10px;">
                                        <div>
                                            <h6 class="mb-1">Nama Pengguna</h6>
                                            <p class="mb-0">Jabatan</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card" style="width: 18rem; height: 25rem; background-color: #f0f0f0;">
                                <div class="card-body d-flex flex-column justify-content-between">
                                    <div class="feedback-border">
                                        <h5 class="card-title">Card title</h5>
                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <img src="<?= base_url('assets/person.png'); ?>" alt="User Avatar" style="width: 50px; height: 50px; border-radius: 50%; margin-right: 10px;">
                                        <div>
                                            <h6 class="mb-1">Nama Pengguna</h6>
                                            <p class="mb-0">Jabatan</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="container mt-4">

                        <div class="row d-flex justify-content-evenly">
                            <div class="card" style="width: 18rem; height: 25rem; background-color: #f0f0f0;">
                                <div class="card-body d-flex flex-column justify-content-between">
                                    <div class="feedback-border">
                                        <h5 class="card-title">Card title</h5>
                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <img src="<?= base_url('assets/person.png'); ?>" alt="User Avatar" style="width: 50px; height: 50px; border-radius: 50%; margin-right: 10px;">
                                        <div>
                                            <h6 class="mb-1">Nama Pengguna</h6>
                                            <p class="mb-0">Jabatan</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card" style="width: 18rem; height: 25rem; background-color: #f0f0f0;">
                                <div class="card-body d-flex flex-column justify-content-between">
                                    <div class="feedback-border">
                                        <h5 class="card-title">Card title</h5>
                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <img src="<?= base_url('assets/person.png'); ?>" alt="User Avatar" style="width: 50px; height: 50px; border-radius: 50%; margin-right: 10px;">
                                        <div>
                                            <h6 class="mb-1">Nama Pengguna</h6>
                                            <p class="mb-0">Jabatan</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card" style="width: 18rem; height: 25rem; background-color: #f0f0f0;">
                                <div class="card-body d-flex flex-column justify-content-between">
                                    <div class="feedback-border">
                                        <h5 class="card-title">Card title</h5>
                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <img src="<?= base_url('assets/person.png'); ?>" alt="User Avatar" style="width: 50px; height: 50px; border-radius: 50%; margin-right: 10px;">
                                        <div>
                                            <h6 class="mb-1">Nama Pengguna</h6>
                                            <p class="mb-0">Jabatan</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="container mt-4">
                        <div class="row d-flex justify-content-evenly">
                            <div class="card" style="width: 18rem; height: 25rem; background-color: #f0f0f0;">
                                <div class="card-body d-flex flex-column justify-content-between">
                                    <div class="feedback-border">
                                        <h5 class="card-title">Card title</h5>
                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <img src="<?= base_url('assets/person.png'); ?>" alt="User Avatar" style="width: 50px; height: 50px; border-radius: 50%; margin-right: 10px;">
                                        <div>
                                            <h6 class="mb-1">Nama Pengguna</h6>
                                            <p class="mb-0">Jabatan</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card" style="width: 18rem; height: 25rem; background-color: #f0f0f0;">
                                <div class="card-body d-flex flex-column justify-content-between">
                                    <div class="feedback-border">
                                        <h5 class="card-title">Card title</h5>
                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <img src="<?= base_url('assets/person.png'); ?>" alt="User Avatar" style="width: 50px; height: 50px; border-radius: 50%; margin-right: 10px;">
                                        <div>
                                            <h6 class="mb-1">Nama Pengguna</h6>
                                            <p class="mb-0">Jabatan</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card" style="width: 18rem; height: 25rem; background-color: #f0f0f0;">
                                <div class="card-body d-flex flex-column justify-content-between">
                                    <div class="feedback-border">
                                        <h5 class="card-title">Card title</h5>
                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <img src="<?= base_url('assets/person.png'); ?>" alt="User Avatar" style="width: 50px; height: 50px; border-radius: 50%; margin-right: 10px;">
                                        <div>
                                            <h6 class="mb-1">Nama Pengguna</h6>
                                            <p class="mb-0">Jabatan</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>



    <!-- Footer -->
    <?php include('footer.php'); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>