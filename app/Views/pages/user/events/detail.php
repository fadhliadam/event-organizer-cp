<?= $this->extend('layouts/user_dashboard'); ?>
<?= $this->section('page_title'); ?>
    <?= view_cell('\App\Libraries\HeadingPointer::show', ['title_header' => 'List Events', 'description' => 'Kelola data event Anda disini']); ?>
<?= $this->endSection(); ?>

<?= $this->section('main_dashboard_content'); ?>
<?= $this->endSection(); ?>