<?= $this->extend('layouts/main_dashboard'); ?>

<?= $this->section('page_title'); ?>
<?= view_cell('\App\Libraries\HeadingPointer::show', ['title_header' => 'Your Events', 'description' => 'Event anda yang sedang aktif']); ?>
<?= $this->endSection(); ?>

<?= $this->section('main_dashboard_content'); ?>
<?= $this->endSection(); ?>