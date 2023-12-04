<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>
<div class="bg-white d-flex justify-content-center align-items-center w-full min-h-screen flex-column gap-2">
    <div>
        <img src="<?= base_url('assets/images/error-404.svg'); ?>" alt="not found" class="img-fluid" width="500px">
    </div>
    <h3 class="fw-semibold">Not Found</h3>
    <p class="fs-5">Opps, halaman yang Anda cari tidak ada</p>
</div>
<?= $this->endSection(); ?>