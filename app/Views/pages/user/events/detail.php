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
                <span class="badge rounded-pill text-bg-primary">category</span>
                <i class="bi bi-geo-alt-fill"></i> <?php echo ($event->city . ', ' . $event->province) ?>
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
                <h3><?= number_to_currency($event->price, 'IDR', 'id_ID'); ?></h3>
                <div class="row p-2 my-1">
                    <button class="btn btn-primary fw-semibold">Daftar</button>
                </div>
                <div>
                    <i class="bi bi-calendar3"></i>
                    <span class="fw-bold small">Tanggal Event: </span>
                    <span class="fw-medium small"><?= $event->date; ?></span>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>