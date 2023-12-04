<?= $this->extend('layouts/main'); ?>
<?= $this->section('heads'); ?>
<link rel="stylesheet" href="<?= base_url('assets/css/user_login.css') ?>">
<?= $this->endSection(); ?>
<?= $this->section('content'); ?>
<div class="container-fluid">
    <div class="row no-gutter">
        <div class="col-md-7 d-none d-md-flex bg-image"></div>
        <div class="col-md-5 bg-light">
            <div class="login d-flex align-items-center py-5">
                <div class="container">
                    <div class="col-lg-10 col-xl-9 mx-auto">
                        <h1 class="fw-semibold fs-4 mb-4">Hallo selamat datang di <span class="text-danger">Event Organizer-FASILKOM</span>👋</h1>
                        <?= $this->include('/components/user/login_content'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>