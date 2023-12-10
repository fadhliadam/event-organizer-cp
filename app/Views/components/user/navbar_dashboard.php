<header>
    <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="searchModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="container-fluid">
                        <?= $this->include('components/user/search_bar'); ?>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="text-center">
                        <div class="row align-items-center">
                            <div class="col">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-body-tertiary border-bottom">
        <nav class="navbar navbar-expand-lg bg-body-tertiary border-bottom">
            <div class="container">
                <div class="logo">
                    <a class="fs-5" href="<?= base_url('/dashboard'); ?>"><span class="fs-2">E</span>vent Organizer</a>
                </div>
                <div class="row ms-auto align-items-center">
                    <button class="col-auto navbar-toggler border-0" type="button" data-bs-toggle="modal" data-bs-target="#searchModal" aria-controls="searchEvent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="bi bi-search"></span>
                    </button>
                    <button class="col-auto navbar-toggler border-0" type="button" data-bs-toggle="modal" data-bs-target="#" aria-controls="historyEvent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="bi bi-clock-history"></span>
                    </button>
                    <div class="col-auto collapse navbar-collapse" id="searchEvent">
                        <?= $this->include('components/user/search_bar'); ?>
                    </div>
                    <div class="col-auto collapse navbar-collapse" id="historyEvent">
                        <a class="nav-link" href="#">History Event</a>
                    </div>
                    <div class="col-auto">
                        <div class="dropdown">
                            <a href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                <div class="user-menu d-flex">
                                    <div class="user-img d-flex align-items-center">
                                        <div class="avatar avatar-md">
                                            <img src="<?= session()->get('image'); ?>" alt="profile">
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton" style="min-width: 11rem;">
                                <li>
                                    <h6 class="dropdown-header">Hello, <?= session()->get('username') ?>!</h6>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#"><i class="icon-mid bi bi-person me-2"></i> My
                                        Profile
                                    </a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><button type="button" id="logout" class="dropdown-item"><i class="icon-mid bi bi-box-arrow-left me-2"></i> Logout</button></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</header>
<?= $this->section('scripts'); ?>
<script>
    const myModal = document.getElementById('searchModal')
    const myInput = document.getElementById('myInput')

    myModal.addEventListener('shown.bs.modal', () => {
        myInput.focus()
    })

    $('#logout').on('click', () => {
        const data = {
            title: 'Logout',
            text: 'Apakah kamu ingin keluar dari aplikasi?',
            buttonText: 'Ya, logout!',
            url: '<?= base_url('/logout') ?>',
            redirectTo: '<?= base_url('/login') ?>',
            method: "DELETE"
        }
        confirmSwalHandler(data);
    })
</script>
<?= $this->endSection(); ?>