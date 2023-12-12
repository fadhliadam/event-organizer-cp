<?= $this->extend('layouts/main_dashboard'); ?>

<?= $this->section('page_title'); ?>
    <?= view_cell('\App\Libraries\HeadingPointer:show', ['title_header' => 'List Users', 'description' => 'Kelola data user Anda disini']); ?>
<?= $this->endSection(); ?>

<?= $this->section('main_dashboard_content'); ?>
    <div class="card">
        <div class="card-header text-end">
            <a href="<?= base_url('/superadmin/users/new'); ?>" class="btn btn-sm icon icon-left btn-danger">
                <i class="bi bi-person-plus"></i>
                Tambah
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped" id="tableUser">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $no = 1;
                            foreach($users as $user):
                         ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $user->username ?></td>
                            <td><?= $user->email; ?></td>
                            <td>
                                <?= $user->role_name; ?>
                            </td>
                            <td>
                                <div class="avatar avatar-lg">
                                    <?php if(is_null($user->id_google)): ?>
                                        <img src="<?= base_url('assets/'.$user->image); ?>" alt="=<?= $user->username; ?>" srcset="">
                                    <?php else: ?>
                                        <img src="<?= $user->image ?>" alt="=<?= $user->username; ?>" srcset="">
                                    <?php endif; ?>
                                </div>
                            </td>
                            <td>
                                <?php if(is_null($user->deleted_at)): ?>
                                    <span class="badge bg-success">Active</span>
                                <?php else: ?>
                                        <span class="badge bg-danger">Non-active</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <div class="d-flex gap-2">
                                    <a href="<?= base_url('/superadmin/users/edit/'.$user->id)?>" class="btn btn-sm icon icon-left btn-outline-success">
                                        <i class="bi bi-person-gear"></i>
                                        Edit
                                    </a>
                                    <?php if(is_null($user->deleted_at)): ?>
                                    <button onclick="return deleteUser('<?= base_url('/superadmin/users/delete/'.$user->id)?>')"  class="btn btn-sm icon icon-left btn-outline-danger">
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
        const deleteUser = (url) => {
            const data = {
                title: 'Hapus User',
                text: 'Apakah kamu ingin menghapus user ini?',
                buttonText: 'Ya, hapus!',
                url,
                redirectTo: '<?= base_url('/superadmin/users')?>',
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