<?= $this->extend('layouts/main_dashboard'); ?>

<?= $this->section('heads'); ?>
<link rel="stylesheet" href="<?= base_url('assets/css/quill.snow.css'); ?>">
<?= $this->endSection(); ?>

<?= $this->section('page_title'); ?>
<?= view_cell('\App\Libraries\HeadingPointer::show', ['title_header' => 'Approve Users Event', 'description' => 'Anda bisa menyetujui user yang ingin mendaftar di sini.']); ?>
<?= $this->endSection(); ?>

<?= $this->section('main_dashboard_content'); ?>
<div class="row">
    <div class="col">
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
    <div class="col">
        <div class="card" data-clickable="true" data-href="<?= base_url('events/' . $event->id); ?>">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="tableUser">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($users as $user) :
                            ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $user->username ?></td>
                                    <td><?= $user->email; ?></td>
                                    <td>
                                        <div class="avatar avatar-lg">
                                            <?php if (is_null($user->id_google)) : ?>
                                                <img src="<?= base_url('assets/' . $user->image); ?>" alt="=<?= $user->username; ?>" srcset="">
                                            <?php else : ?>
                                                <img src="<?= $user->image ?>" alt="=<?= $user->username; ?>" srcset="">
                                            <?php endif; ?>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <a href="<?= base_url('/superadmin/users/edit/' . $user->id) ?>" class="btn btn-sm icon icon-left btn-outline-success">
                                                <i class="bi bi-check-circle-fill"></i>
                                                Terima
                                            </a>
                                            <button onclick="" class="btn btn-sm icon icon-left btn-outline-danger">
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
<?= $this->endSection(); ?>