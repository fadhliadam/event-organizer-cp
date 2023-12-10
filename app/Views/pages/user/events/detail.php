<?= $this->extend('layouts/user_dashboard'); ?>

<?= $this->section('page_title'); ?>
<?= view_cell('\App\Libraries\HeadingPointer::show', ['title_header' => 'List Events', 'description' => 'Kelola data event Anda disini']); ?>
<?= $this->endSection(); ?>

<?= $this->section('main_dashboard_content'); ?>
<div class="container">
    <div class="row my-4">
        <div class="p-4 bg-body-tertiary rounded-4 shadow-sm">
            <h3><?= $event->name; ?></h3>
            <div class="fw-medium">
                <span class="badge rounded-pill text-bg-primary"><?= $category; ?></span>
                <i class="bi bi-geo-alt-fill"></i> <?= $location; ?>
            </div>
            <div class="row my-3 justify-content-center">
                <div class="col-8">
                    <img src="<?= base_url('assets/' . $event->banner); ?>" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
    <div class="row my-4">
        <div class="col-9">
            <h2>Event Detail</h2>
            <div class="p-3 bg-body-tertiary rounded-4 shadow-sm">
                <h4>Deskripsi</h4>
                <p><?= $event->description; ?></p>
            </div>
        </div>
        <div class="col-3">
            <div class="p-3 rounded-4 shadow-sm bg-body-tertiary">
                <p class="fs-5 mb-0 fw-medium">Harga</p>
                <h3><?= $event->price ?></h3>
                <div class="row p-2 my-1">
                    <button class="btn btn-primary fw-semibold" data-bs-toggle="modal" data-bs-target="#registerEventModal">Daftar</button>
                </div>
                <div>
                    <i class="bi bi-calendar3"></i>
                    <span class="fw-bold small">Tanggal Event: </span>
                    <span class="fw-medium small"><?= $event->date; ?></span>
                </div>
                <div>
                    <i class="bi bi-person-fill"></i>
                    <span class="fw-bold small">Dibuka Untuk: </span>
                    <span class="fw-medium small"><?= $event->target_audience; ?></span>
                </div>
                <?php
                $approval = "Tidak Butuh Persetujuan";
                if ($event->required_approval) {
                    $approval = "Butuh Persetujuan";
                }
                ?>
                <div>
                    <i class="bi bi-clipboard2-check-fill"></i>
                    <span class="fw-bold small"><?= $approval; ?></span>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="registerEventModal" tabindex="-1" aria-labelledby="registerEventModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Detail Pendaftaran</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-2">
                    <label for="name" class="">Nama Lengkap</label>
                    <div class="p-2 border"><?= session()->get('name'); ?></div>
                </div>
                <div class="mb-2">
                    <label for="event-name" class="">Nama Event</label>
                    <div class="p-2 border"><?= $event->name; ?></div>
                </div>
                <div class="row mb-2">
                    <div class="col-6">
                        <label for="recipient-name" class="">Kategori</label>
                        <div class="p-2 border"><?= $category; ?></div>
                    </div>
                    <div class="col-6">
                        <label for="recipient-name" class="">Tanggal</label>
                        <div class="p-2 border"><?= $event->date; ?></div>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-6">
                        <label for="recipient-name" class="">Lokasi</label>
                        <div class="p-2 border"><?= $location; ?></div>
                    </div>
                    <div class="col-6">
                        <label for="recipient-name" class="">Harga</label>
                        <div class="p-2 border fw-bold"><?= $event->price; ?></div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary" data-bs-target="#approvalModal" data-bs-toggle="modal" data-bs-dismiss="modal">Daftar</button>
            </div>
        </div>
    </div>
</div>
<?php
if ($event->required_approval) {
    echo '
<div class="modal fade" id="approvalModal" aria-hidden="true" aria-labelledby="approvalModalLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalToggleLabel2">Butuh Persetujuan</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Pendaftaran event ini memerlukan persetujuan dari panitia, tekan lanjut untuk mendaftar dan menunggu persetujuan.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button class="btn btn-primary" data-bs-dismiss="modal" id="daftar">Lanjut</button>
            </div>
        </div>
    </div>
</div>
';
} ?>
<div>

</div>

<?= $this->endSection(); ?>

<?= $this->section('scripts'); ?>
<script>
    $('#daftar').on('click', () => {
        const data = {
            url: '<?= base_url('/events/register-process') ?>',
            redirectTo: '<?= base_url('/yourorder') ?>',
            method: "POST",
        }
        performAjaxRequest(data);
    })
</script>
<?= $this->endSection(); ?>