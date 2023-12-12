<?= $this->extend('layouts/main_dashboard'); ?>

<?= $this->section('heads'); ?>
<link rel="stylesheet" href="<?= base_url('assets/css/quill.snow.css'); ?>">
<?= $this->endSection(); ?>

<?= $this->section('page_title'); ?>
<?= view_cell('\App\Libraries\HeadingPointer::show', ['title_header' => 'Approve Users Event', 'description' => 'Anda bisa menyetujui user yang ingin mendaftar di sini.']); ?>
<?= $this->endSection(); ?>

<?= $this->section('main_dashboard_content'); ?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <img src="<?= base_url('assets/' . $event->banner); ?>" class="card-img-top">
            <div class="card-body">
                <?php
                function dayDifferent($date)
                {
                    $date = strtotime($date);
                    $current_date = strtotime(date('Y-m-d'));
                    $jarak = $date - $current_date;
                    $hari = $jarak / 60 / 60 / 24;
                    return $hari;
                };
                $price = '';
                if ($event->price == 0) {
                    $price = 'Gratis';
                } else {
                    $price = number_to_currency($event->price, 'IDR', 'id_ID');
                }
                ?>
                <p class="card-title small fw-bold mb-1 text-truncate"><?= $event->name; ?></p>
                <p class="card-text small mb-1">
                    <?php if ($event->event_type == 0) : ?>
                        <span class="badge bg-primary">Online</span>
                    <?php else : ?>
                        <span class="badge bg-success">Offline</span>
                    <?php endif; ?>
                    <?php if (dayDifferent($event->date) < 0) : ?>
                        <span class="badge bg-success">Selesai</span>
                    <?php elseif (dayDifferent($event->date) == 0) : ?>
                        <span class="badge bg-warning">Sedang Berlangsung</span>
                    <?php else : ?>
                        <span class="badge bg-danger"><?= dayDifferent($event->date) ?> Hari lagi</span>
                    <?php endif; ?>
                </p>
                <p class="card-text mb-1"><?= $event->date ?></p>
                <p class="card-text mb-1"><?= $event->street ?></p>
                <p class="card-text text-danger fs-6 mb-1"><?= $price; ?></p>
                <p class="card-text "><b>Quota:</b> <?= $event->quota; ?></p>
            </div>
        </div>
    </div>
    <div class="col-12">
        <div class="card" data-clickable="true" data-href="<?= base_url('events/' . $event->id); ?>">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="tableUser">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($usersEvent as $userEvent) :
                            ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $userEvent->username ?></td>
                                    <td><?= $userEvent->email; ?></td>
                                    <td>
                                        <?php if ($userEvent->status == 0) : ?>
                                            <?php if (is_null($userEvent->deleted_at)) : ?>
                                                <span class="badge bg-primary">Menunggu</span>
                                            <?php else : ?>
                                                <span class="badge bg-primary">Ditolak</span>
                                            <?php endif; ?>
                                        <?php else : ?>
                                            <span class="badge bg-success">Disetujui</span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <div class="avatar avatar-lg">
                                            <img src="<?= $userEvent->image ?>" alt="=<?= $userEvent->username; ?>" srcset="">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <?php
                                            $button = '';
                                            if ($userEvent->status != 0 || !is_null($userEvent->deleted_at)) $button = 'disabled';
                                            ?>
                                            <button onclick="return approveUser('<?= base_url('/events/manage/approve/accept/' . $userEvent->id) ?>')" class="btn btn-sm icon icon-left btn-outline-success" <?= $button; ?>>
                                                <i class="bi bi-check-circle-fill"></i>
                                                Setuju
                                            </button>
                                            <button onclick="return denyUser('<?= base_url('/events/manage/approve/deny/' . $userEvent->id) ?>')" class="btn btn-sm icon icon-left btn-outline-danger" <?= $button; ?>>
                                                <i class="bi bi-x-circle-fill"></i>
                                                Tolak
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>

<?= $this->section('scripts'); ?>
<script>
    let jquery_datatable = $("#tableUser").DataTable({
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
    const csrfToken = '<?= csrf_token(); ?>';
    const csrfHash = '<?= csrf_hash(); ?>';
    const approveUser = (url) => {
        const data = {
            title: 'Setujui User',
            text: 'Apakah kamu ingin menyetujui user ini?',
            buttonText: 'Setuju',
            url,
            redirectTo: '<?= base_url('/events/manage/approve/' . $event->id); ?>',
            method: 'PUT',
            data: {
                [csrfToken]: csrfHash
            }
        }
        confirmSwalHandler(data);
    }
    const denyUser = (url) => {
        const data = {
            title: 'Tolak User',
            text: 'Apakah kamu ingin menolak user ini?',
            buttonText: 'Tolak',
            url,
            redirectTo: '<?= base_url('/events/manage/approve/' . $event->id); ?>',
            method: 'DELETE',
            data: {
                [csrfToken]: csrfHash
            }
        }

        confirmSwalHandler(data);
    }
</script>
<?= $this->endSection(); ?>