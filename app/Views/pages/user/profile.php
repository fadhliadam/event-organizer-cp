<?= $this->extend('layouts/main_dashboard'); ?>

<?= $this->section('page_title'); ?>
<?= view_cell('\App\Libraries\HeadingPointer::show', ['title_header' => 'Profile', 'description' => 'Data profile anda']); ?>
<?= $this->endSection(); ?>

<?= $this->section('main_dashboard_content'); ?>
<?= $this->endSection(); ?>