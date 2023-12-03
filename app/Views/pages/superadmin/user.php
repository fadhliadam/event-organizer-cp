<?= $this->extend('layouts/main_dashboard'); ?>

<?= $this->section('page_title'); ?>
    <?= view_cell('\App\Libraries\HeadingPointer:show', ['title' => 'List Users', 'description' => 'Kelola data user Anda disini']); ?>
<?= $this->endSection(); ?>

<?= $this->section('main_dashboard_content'); ?>
    <h1>User</h1>
<?= $this->endSection(); ?>