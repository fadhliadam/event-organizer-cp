<?= $this->extend('layouts/user_dashboard'); ?>

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
        <div class="col-sm-12 col-lg-9">
            <h2>Event Detail</h2>
            <div class="p-3 bg-body-tertiary rounded-4 shadow-sm">
                <h4>Deskripsi</h4>
                <p><?= $event->description; ?></p>
            </div>
        </div>
        <div class="col-sm-12 col-lg-3 my-4">
            <div class="p-3 rounded-4 shadow-sm bg-body-tertiary">
                <p class="fs-5 mb-0 fw-medium">Harga</p>
                <h3><?= $event->price ?></h3>
                <div class="row p-2 my-1">
                    <?php
                    $buttonState = '';
                    $buttonText = 'Daftar';
                    if ($event->quota == 0) {
                        $buttonText = 'Tidak Tersedia';
                        $buttonState = 'disabled';
                    }
                    if ($user) {
                        if ($user[0]->status == 0 && !is_null($user[0]->deleted_at)) {
                            $buttonText = 'Ditolak';
                            $buttonState = 'disabled';
                        } elseif ($user[0]->status == 1) {
                            $buttonText = 'Sudah Terdaftar';
                            $buttonState = 'disabled';
                        } else {
                            $buttonText = 'Menunggu Persetujuan';
                            $buttonState = 'disabled';
                        }
                    }
                    ?>
                    <button class="btn btn-primary fw-semibold" data-bs-toggle="modal" data-bs-target="#registerEventModal" <?= $buttonState; ?>><?= $buttonText; ?></button>
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
                    <?php
                    $approval = 'Tidak';
                    if ($event->required_approval) $approval = 'Perlu';
                    ?>
                    <div class="col-6">
                        <label for="recipient-name" class="">Verifikasi Panitia</label>
                        <div class="p-2 border fw-bold"><?= $approval; ?></div>
                    </div>
                </div>
                <div class="mb-2">
                    <label for="event-name" class="">Harga</label>
                    <div class="p-2 border fw-bold"><?= $event->price; ?></div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal" id="daftar">Daftar</button>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>

<?= $this->section('scripts'); ?>
<script>
    $('#daftar').on('click', () => {
        const csrfToken = '<?= csrf_token(); ?>';
        const csrfHash = '<?= csrf_hash(); ?>';
        const data = {
            url: '<?= base_url('/events/register-process') ?>',
            redirectTo: '<?= base_url('/yourevents') ?>',
            method: "POST",
            data: {
                [csrfToken]: csrfHash,
                'eventId': '<?= $event->id; ?>',
                'requiredApproval': '<?= $event->required_approval; ?>'
            }
        }
        performAjaxRequest(data);
    })
</script>
<?= $this->endSection(); ?>