<?= $this->extend('layouts/main_dashboard'); ?>

<?= $this->section('page_title'); ?>
    <?= view_cell('\App\Libraries\HeadingPointer:show', ['title_header' => 'List Users', 'description' => 'Kelola data user Anda disini']); ?>
<?= $this->endSection(); ?>

<?= $this->section('main_dashboard_content'); ?>
    <div class="card">
        <div class="card-header text-end">
            <a href="#" class="btn btn-sm icon icon-left btn-danger">
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
                            $roles = [
                                1 => 'superadmin',
                                2 => 'admin'
                            ];
                            foreach($users as $user):
                         ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $user->username ?></td>
                            <td><?= $user->email; ?></td>
                            <td>
                                <?= $roles[$user->role_id]; ?>
                            </td>
                            <td>
                                <div class="avatar avatar-lg">
                                    <img src="<?= base_url('assets/images/profile.png'); ?>" alt="=<?= $user->username; ?>" srcset="">
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
                                    <a href="#" class="btn btn-sm icon icon-left btn-outline-success">
                                        <i class="bi bi-person-gear"></i>
                                        Edit
                                    </a>
                                    <?php if(is_null($user->deleted_at)): ?>
                                    <button onclick="return deleteUser('<?= base_url('/superadmin/users/delete/'.$user->id)?>')" class="btn btn-sm icon icon-left btn-outline-danger">
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
            text: 'Apakah kamu ingin user ini?',
            buttonText: 'Ya, hapus!',
            url,
            redirectTo: '<?= base_url('/superadmin/users')?>'
        }
        confirmSwalHandler(data);
    }
    </script>
<?= $this->endSection(); ?>