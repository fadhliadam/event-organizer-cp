<?= $this->extend('layouts/main_dashboard'); ?>

<?= $this->section('page_title'); ?>
<?= view_cell('\App\Libraries\HeadingPointer::show', ['title_header' => 'Manage Events', 'description' => 'Kelola events anda di sini']); ?>
<?= $this->endSection(); ?>

<?= $this->section('main_dashboard_content'); ?>
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped" id="tableEvent">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Deskripsi</th>
                        <th>Banner</th>
                        <th>Target Audience</th>
                        <th>Kuota</th>
                        <th>Harga</th>
                        <th>Tanggal</th>
                        <th>Sisa hari</th>
                        <th>Alamat</th>
                        <th>Required Approval</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    function dayDifferent($date)
                    {
                        $date = strtotime($date);
                        $current_date = strtotime(date('Y-m-d'));
                        $jarak = $date - $current_date;
                        $hari = $jarak / 60 / 60 / 24;
                        return $hari;
                    };
                    foreach ($events as $event) :
                        if (is_null($event->deleted_at)) :
                    ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $event->event_name ?></td>
                                <td>
                                    <div class="limit-text"><?= $event->event_description; ?></div>
                                </td>
                                <td>
                                    <img src="<?= base_url('assets/' . $event->event_banner); ?>" alt="banner" class="h-100 img-fluid object-fit-cover rounded">
                                </td>
                                <td>
                                    <?= $event->event_target_audience; ?>
                                </td>
                                <td>
                                    <?= $event->event_quota; ?>
                                </td>
                                <td>
                                    <?= $event->event_price == 0 ? 'Free' : $event->event_price; ?>
                                </td>
                                <td>
                                    <?= $event->event_date ?>
                                </td>
                                <td>
                                    <?php if (dayDifferent($event->event_date) < 0) : ?>
                                        <span class="badge bg-success">Selesai</span>
                                    <?php elseif (dayDifferent($event->event_date) == 0) : ?>
                                        <span class="badge bg-warning">Sedang Berlangsung</span>
                                    <?php else : ?>
                                        <span class="badge bg-danger"><?= dayDifferent($event->event_date) ?> Hari lagi</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?= $event->event_street . ', ' . $event->event_city . ', ' . $event->event_province . ', ' . $event->event_country . '-' . $event->event_postal_code ?>
                                </td>
                                <td>
                                    <?php if ($event->event_required_approval == 1) : ?>
                                        <span class="badge bg-success">Ya</span>
                                    <?php else : ?>
                                        <span class="badge bg-danger">Tidak</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <a href="<?= base_url('events/manage/edit/' . $event->event_id) ?>" class="btn btn-sm icon icon-left btn-outline-success">
                                            <i class="bi bi-person-gear"></i>
                                            Edit
                                        </a>
                                        <?php if ($event->event_required_approval == 1 && $event->is_completed != 1) : ?>
                                            <a href="<?= base_url('events/manage/approve/' . $event->event_id) ?>" class="btn btn-sm icon icon-left btn-outline-success">
                                                <i class="bi bi-person-check"></i>
                                                Approve User
                                            </a>
                                        <?php endif; ?>
                                    </div>
                                </td>
                            </tr>
                    <?php
                        endif;
                    endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>
<?= $this->section('scripts'); ?>
<script>
    let jquery_datatable = $("#tableEvent").DataTable({
        responsive: true
    })

    const setTableColor = () => {
        document.querySelectorAll('.dataTables_paginate .pagination').forEach(dt => {
            dt.classList.add('pagination-primary')
        })
    }
    setTableColor()
    jquery_datatable.on('draw', setTableColor)
</script>

<script>
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