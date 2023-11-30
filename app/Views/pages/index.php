<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>
    <!-- Navbar -->
    <?= $this->include('components/navbar'); ?>
        <!-- Jumbotron -->
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="<?= base_url('assets/images/konser.jpg'); ?>" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>First slide label</h5>
                    <p>Some representative placeholder content for the first slide.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="<?= base_url('assets/images/konser.jpg'); ?>" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Second slide label</h5>
                    <p>Some representative placeholder content for the second slide.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="<?= base_url('assets/images/konser.jpg'); ?>" class="d-block w-100" alt="...">
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
                    <img src="<?= base_url('assets/images/musik.jpg'); ?>" class="card-img" alt="...">
                    <div class="card-img-overlay" style="background: rgba(0, 0, 128, 0.25); position: absolute; bottom: 0; width: 100%; text-align: center;">
                        <h2 class="fw-bold">EVENT MUSIK</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-4" data-aos="fade-up">
                <div class="card text-bg-dark inner">
                    <img src="<?= base_url('assets/images/olahraga.jpg'); ?>" class="card-img" alt="...">
                    <div class="card-img-overlay" style="background: rgba(0, 0, 128, 0.25); position: absolute; bottom: 0; width: 100%; text-align: center;">
                        <h2 class="fw-bold">EVENT OLAHRAGA</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-4" data-aos="fade-up">
                <div class="card text-bg-dark inner">
                    <img src="<?= base_url('assets/images/kuliner.png'); ?>" class="card-img" alt="...">
                    <div class="card-img-overlay" style="background: rgba(0, 0, 128, 0.25); position: absolute; bottom: 0; width: 100%; text-align: center;">
                        <h2 class="fw-bold">EVENT KULINER</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="row  mt-3">
            <div class="col-md-4" data-aos="fade-up-right">
                <div class="card text-bg-dark inner">
                    <img src="<?= base_url('assets/images/budaya.jpg'); ?>" class="card-img" alt="...">
                    <div class="card-img-overlay" style="background: rgba(0, 0, 128, 0.25); position: absolute; bottom: 0; width: 100%; text-align: center;">
                        <h2 class="fw-bold">EVENT BUDAYA</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-4" data-aos="fade-up">
                <div class="card text-bg-dark inner">
                    <img src="<?= base_url('assets/images/karnaval.jpg'); ?>" class="card-img" alt="...">
                    <div class="card-img-overlay" style="background: rgba(0, 0, 128, 0.25); position: absolute; bottom: 0; width: 100%; text-align: center;">
                        <h2 class="fw-bold">EVENT KARNAVAL</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-4" data-aos="fade-up-left">
                <div class="card text-bg-dark inner">
                    <img src="<?= base_url('assets/images/seni.jpg'); ?>" class="card-img" alt="...">
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
                                        <img src="<?= base_url('assets/images/person.png'); ?>" alt="User Avatar" style="width: 50px; height: 50px; border-radius: 50%; margin-right: 10px;">
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
                                        <img src="<?= base_url('assets/images/person.png'); ?>" alt="User Avatar" style="width: 50px; height: 50px; border-radius: 50%; margin-right: 10px;">
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
                                        <img src="<?= base_url('assets/images/person.png'); ?>" alt="User Avatar" style="width: 50px; height: 50px; border-radius: 50%; margin-right: 10px;">
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
                                        <img src="<?= base_url('assets/images/person.png'); ?>" alt="User Avatar" style="width: 50px; height: 50px; border-radius: 50%; margin-right: 10px;">
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
                                        <img src="<?= base_url('assets/images/person.png'); ?>" alt="User Avatar" style="width: 50px; height: 50px; border-radius: 50%; margin-right: 10px;">
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
                                        <img src="<?= base_url('assets/images/person.png'); ?>" alt="User Avatar" style="width: 50px; height: 50px; border-radius: 50%; margin-right: 10px;">
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
                                        <img src="<?= base_url('assets/images/person.png'); ?>" alt="User Avatar" style="width: 50px; height: 50px; border-radius: 50%; margin-right: 10px;">
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
                                        <img src="<?= base_url('assets/images/person.png'); ?>" alt="User Avatar" style="width: 50px; height: 50px; border-radius: 50%; margin-right: 10px;">
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
                                        <img src="<?= base_url('assets/images/person.png'); ?>" alt="User Avatar" style="width: 50px; height: 50px; border-radius: 50%; margin-right: 10px;">
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
    <?= $this->include('components/footer'); ?>

<?= $this->endSection(); ?>