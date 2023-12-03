<?= $this->section('heads'); ?>
    <link rel="stylesheet" href="<?= base_url('assets/css/app.css'); ?>">
<?= $this->endSection(); ?>
<?= $this->include('layouts/head'); ?>

<div id="app">
    <?= $this->include('components/sidebar'); ?>
    <div id="main" class='layout-navbar navbar-fixed'>
        <?= $this->include('components/navbar_dashboard'); ?>
        <div id="main-content">
            <div class="page-heading">
                <?= $this->renderSection('page_title'); ?>
                <section class="section">
                    <?= $this->renderSection('main_dashboard_content'); ?>
                </section>
            </div>
        </div>
        <?= $this->include('components/footer_dashboard'); ?>
    </div>
</div>

<?= $this->section('scripts'); ?>
<script src="<?= base_url('assets/js/app.js')?>"></script>
<?= $this->endSection(); ?>
<?= $this->include('layouts/foot'); ?>