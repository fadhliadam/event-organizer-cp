<?= $this->section('heads'); ?>
<link rel="stylesheet" href="<?= base_url('assets/css/app.css'); ?>">
<style>
    .search-event>.form-control,
    .form-control:focus {
        border: 0 !important;
        outline: none !important;
        box-shadow: none !important;
        padding: 0;
        /* You may want to include this as bootstrap applies these styles too */
    }

    .del-input {
        border: 0;
        background-color: transparent;
    }
</style>
<?= $this->endSection(); ?>
<?= $this->include('layouts/head'); ?>

<div id="app">
    <div class='layout-navbar navbar-fixed'>
        <div id="main-content">
            <?= $this->include('components/user/navbar_dashboard'); ?>
            <div class="page-heading">
                <section class="section">
                    <?= $this->renderSection('main_dashboard_content'); ?>
                </section>
            </div>
        </div>
        <div class="container">
            <?= $this->include('components/footer_dashboard'); ?>
        </div>
    </div>
</div>

<?= $this->section('scripts'); ?>
<script src="<?= base_url('assets/js/app.js') ?>"></script>
<?= $this->endSection(); ?>
<?= $this->include('layouts/foot'); ?>