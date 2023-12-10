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
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Event</th>
                        <th>Alamat</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    function dayDifferent($date)
                    {
                        $date = strtotime($date);
                        $current_date = strtotime(date('Y-m-d'));
                        $jarak = $date - $current_date;
                        $hari = $jarak / 60 / 60 / 24;
                        return $hari;
                    };
                    foreach ($collaborators as $collaborator) :
                        if ($collaborator->event_owner == session('id')) {
                    ?>
                            <tr>
                                <td><?= $collaborator->user_username; ?></td>
                                <td><?= $collaborator->user_email; ?></td>
                                <td><?= $collaborator->event_name; ?></td>
                                <td><?= $collaborator->event_street . ', ' . $collaborator->event_city . ', ' . $collaborator->event_province . ', ' . $collaborator->event_country . ', ' . $collaborator->event_postal_code; ?></td>
                                <td>
                                    <?php if (dayDifferent($collaborator->event_date) < 0) : ?>
                                        <span class="badge bg-success">Selesai</span>
                                    <?php elseif (dayDifferent($collaborator->event_date) == 0) : ?>
                                        <span class="badge bg-warning">Sedang Berlangsung</span>
                                    <?php else : ?>
                                        <span class="badge bg-danger"><?= dayDifferent($collaborator->event_date) ?> Hari lagi</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <a href="<?= base_url('/admin/collaborators/edit/' . $collaborator->collaborator_id) ?>" class="btn btn-sm icon icon-left btn-outline-success">
                                            <i class="bi bi-person-gear"></i>
                                            Edit
                                        </a>
                                        <?php if (is_null($collaborator->deleted_at)) : ?>
                                            <button onclick="return deleteCollaborator('<?= base_url('/admin/collaborators/delete/' . $collaborator->collaborator_id) ?>')" class="btn btn-sm icon icon-left btn-outline-danger">
                                                <i class="bi bi-trash"></i>
                                                Hapus
                                            </button>
                                        <?php endif; ?>
                                    </div>
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
<script>
    const deleteCollaborator = (url) => {
        const data = {
            title: 'Hapus Event Collaborator',
            text: 'Apakah kamu ingin menghapus event collaborator ini?',
            buttonText: 'Ya, hapus!',
            url,
            redirectTo: '<?= base_url('/admin/collaborators') ?>',
            method: 'DELETE'
        }
        confirmSwalHandler(data);
    }
    $(() => {
        <?php if (session()->has('success_message')) : ?>
            Swal.fire({
                icon: 'success',
                text: '<?= session()->getFlashdata('success_message') ?>',
                showConfirmButton: false,
                timer: 2000
            })
        <?php endif; ?>
    })
    $(() => {
        <?php if (session()->has('error_message')) : ?>
            Swal.fire({
                icon: 'error',
                text: '<?= session()->getFlashdata('error_message') ?>',
                showConfirmButton: false,
                timer: 2000
            })
        <?php endif; ?>
    })
</script>

<?= $this->endSection(); ?>