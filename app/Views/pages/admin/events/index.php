<?= $this->extend('layouts/main_dashboard'); ?>
<?= $this->section('page_title'); ?>
    <?= view_cell('\App\Libraries\HeadingPointer::show', ['title_header' => 'List Events', 'description' => 'Kelola data event Anda disini']); ?>
<?= $this->endSection(); ?>

<?= $this->section('main_dashboard_content'); ?>
<div class="card">
        <div class="card-header text-end">
            <a href="<?= base_url('/admin/events/new'); ?>" class="btn btn-sm icon icon-left btn-danger">
                <i class="bi bi-person-plus"></i>
                Tambah
            </a>
        </div>
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
                            <th>Tipe Event</th>
                            <th>Link</th>
                            <th>Harga</th>
                            <th>Tanggal</th>
                            <th>Sisa hari</th>
                            <th>Alamat</th>
                            <th>Host</th>
                            <th>Email Host</th>
                            <th>Required Approval</th>
                            <th>Kategori</th>
                            <th>Owner</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $no = 1;
                            function dayDifferent ($date)  {
                                $date = strtotime($date);
                                $current_date = strtotime(date('Y-m-d'));
                                $jarak = $date - $current_date;
                                $hari = $jarak / 60 / 60 / 24;
                                return $hari;
                              };
                            foreach($events as $event):
                         ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $event->name ?></td>
                            <td>
                                <div class="limit-text"><?= $event->description; ?></div>
                            </td>
                            <td>
                                <img src="<?= base_url('assets/'.$event->banner); ?>" alt="banner" class="h-100 img-fluid object-fit-cover rounded">
                            </td>
                            <td>
                               <?= $event->target_audience; ?>
                            </td>
                            <td>
                                <?= $event->quota; ?>
                            </td>
                            <td>
                                <?php if($event->event_type == 0): ?>
                                    <span class="badge bg-primary">Online</span>
                                <?php else: ?>
                                    <span class="badge bg-success">Offline</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if($event->link): ?>
                                    <a href="<?= $event->link; ?>" target="_blank" rel="noopener noreferrer"><?= $event->link; ?></a>
                                <?php else: ?>
                                    <span>Tidak ada</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?= $event->price == 0 ? 'Free' : $event->price; ?>
                            </td>
                            <td>
                                <?= $event->date ?>
                            </td>
                            <td>
                                <?= dayDifferent($event->date) > 0 ? dayDifferent($event->date) : '0' ?> hari
                            </td>
                            <td>
                                <?= $event->street. ', '. $event->city. ', '. $event->province. ', '. $event->country. '-'. $event->postal_code ?>
                            </td>
                            <td>
                                <?= $event->host; ?>
                            </td>
                            <td>
                                <?= $event->host_email; ?>
                            </td>
                            <td>
                               <?php if($event->required_approval == 1): ?>
                                    <span class="badge bg-success">Ya</span>
                                <?php else: ?>
                                    <span class="badge bg-danger">Tidak</span>
                               <?php endif; ?>
                            </td>
                            <td>
                                <span class="text-capitalize">
                                    <?= $event->category_name; ?>
                                </span>
                            </td>
                            <td>
                                <?= $event->username; ?>
                            </td>
                            <td>
                                <div class="d-flex gap-2">
                                    <a href="<?= base_url('/superadmin/users/edit/'.$event->id)?>" class="btn btn-sm icon icon-left btn-outline-success">
                                        <i class="bi bi-person-gear"></i>
                                        Edit
                                    </a>
                                    <?php if(is_null($event->deleted_at)): ?>
                                        <button onclick="return deleteEvent('<?= base_url('/superadmin/events/delete/'.$event->id)?>')"  class="btn btn-sm icon icon-left btn-outline-danger">
                                            <i class="bi bi-trash"></i>
                                            Hapus
                                        </button>
                                    <?php endif; ?>
                                </div>
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
    <script>
        const deleteEvent = (url) => {
            const data = {
                title: 'Hapus Event',
                text: 'Apakah kamu ingin menghapus event ini?',
                buttonText: 'Ya, hapus!',
                url,
                redirectTo: '<?= base_url('/superadmin/events')?>',
                method: 'DELETE'
            }
            confirmSwalHandler(data);
        }
        $(() => {
            <?php if(session()->has('success_message')):?>
                Swal.fire({
                    icon: 'success',
                    text: '<?= session()->getFlashdata('success_message')?>',
                    showConfirmButton: false,
                    timer: 2000
                })
            <?php endif;?>
        })
        $(() => {
            <?php if(session()->has('error_message')):?>
                Swal.fire({
                    icon: 'error',
                    text: '<?= session()->getFlashdata('error_message')?>',
                    showConfirmButton: false,
                    timer: 2000
                })
            <?php endif;?>
        })
    </script>
<?= $this->endSection(); ?>