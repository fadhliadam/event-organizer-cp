<?= $this->extend('layouts/user_dashboard'); ?>
<?= $this->section('page_title'); ?>
<?= view_cell('\App\Libraries\HeadingPointer::show', ['title_header' => 'Dashboard', 'description' => 'Lihat list event yang tersedia'])  ?>
<?= $this->endSection(); ?>

<?= $this->section('user_dashboard_content'); ?>
<section class="row">

</section>
<?= $this->endSection(); ?>