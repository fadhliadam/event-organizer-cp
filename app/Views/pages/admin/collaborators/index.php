<?= $this->extend('layouts/main_dashboard'); ?>

<?= $this->section('heads'); ?>
<link rel="stylesheet" href="<?= base_url('assets/css/app.css'); ?>">
<link rel="stylesheet" href="<?= base_url('assets/css/simple-table.css'); ?>">
<link rel="stylesheet" href="<?= base_url('assets/css/simple-table-datatable.css'); ?>">
<?= $this->endSection(); ?>

<?= $this->section('page_title'); ?>
<?= view_cell('\App\Libraries\HeadingPointer:show', ['title_header' => 'Collaborators', 'description' => 'Kelola data collaborator Anda disini']); ?>
<?= $this->endSection(); ?>
<?= $this->section('main_dashboard_content'); ?>


<section class="section">
    <div class="card">
        <div class="card-body">
            <table class="table table-striped" id="simple-table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Event</th>
                        <th>City</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($collaborators as $collaborator) :
                        if ($collaborator->event_owner == session('id')) {
                    ?>
                            <tr>
                                <td><?= $collaborator->user_username; ?></td>
                                <td><?= $collaborator->user_email; ?></td>
                                <td><?= $collaborator->event_name; ?></td>
                                <td>Offenburg</td>
                                <td>
                                    <span class="badge bg-success">Active</span>
                                </td>
                            </tr>
                    <?php
                        }
                    endforeach
                    ?>
                </tbody>
            </table>
        </div>
    </div>

</section>

<?= $this->endSection(); ?>

<?= $this->section('scripts'); ?>
<script src="<?= base_url('assets/js/umd-simple-datatables.js') ?>"></script>
<script src="<?= base_url('assets/js/simple-datatables.js') ?>"></script>

<?= $this->endSection(); ?>