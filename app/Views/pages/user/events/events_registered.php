<?= $this->extend('layouts/main_dashboard'); ?>

<?= $this->section('page_title'); ?>
<?= view_cell('\App\Libraries\HeadingPointer::show', ['title_header' => 'Your Events', 'description' => 'Event anda yang sedang aktif']); ?>
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
                        <th>Status</th>
                        <th>Harga</th>
                        <th>Tanggal</th>
                        <th>Banner</th>
                        <th>Tipe Event</th>
                        <th>Kategori</th>
                        <th>Alamat</th>
                        <th>Deskripsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($events as $event) :
                    ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $event->name ?></td>
                            <td>
                                <?php if ($event->status == 0) : ?>
                                    <span class="badge bg-primary">Belum Terverifikasi</span>
                                <?php else : ?>
                                    <span class="badge bg-success">Terverifikasi</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?= $event->price == 0 ? 'Free' : $event->price; ?>
                            </td>
                            <td>
                                <?= $event->date ?>
                            </td>
                            <td>
                                <img src="<?= base_url('assets/' . $event->banner); ?>" alt="banner" class="h-100 img-fluid object-fit-cover rounded">
                            </td>
                            <td>
                                <?php if ($event->event_type == 0) : ?>
                                    <span class="badge bg-primary">Online</span>
                                <?php else : ?>
                                    <span class="badge bg-success">Offline</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <span class="text-capitalize">
                                    <?= $event->category_name; ?>
                                </span>
                            </td>
                            <td>
                                <?= $event->street ?>
                            </td>
                            <td>
                                <div class="limit-text"><?= $event->description; ?></div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
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
<?= $this->endSection(); ?>