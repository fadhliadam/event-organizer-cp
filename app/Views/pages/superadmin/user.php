<?= $this->extend('layouts/main_dashboard'); ?>

<?= $this->section('page_title'); ?>
    <?= view_cell('\App\Libraries\HeadingPointer:show', ['title' => 'List Users', 'description' => 'Kelola data user Anda disini']); ?>
<?= $this->endSection(); ?>

<?= $this->section('main_dashboard_content'); ?>
    <div class="card">
        <div class="card-header text-end">
            <a href="#" class="btn btn-sm icon icon-left btn-danger">
                <i class="bi bi-person-plus"></i>
                Add User
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
                            <th>Image</th>
                            <th>Role</th>
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
                            ]
                         ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td>Username test</td>
                            <td>vehicula.aliquet@semconsequat.co.uk</td>
                            <td>
                                <div class="avatar avatar-lg me-3">
                                    <img src="<?= base_url('assets/images/profile.png'); ?>" alt="image-username" srcset="">
                                </div>
                            </td>
                            <td>
                                <?= $roles[1]; ?>
                            </td>
                            <td>
                                <span class="badge bg-success">Active</span>
                            </td>
                            <td>
                                <div class="d-flex gap-2">
                                    <a href="#" class="btn btn-sm icon icon-left btn-outline-success">
                                        <i class="bi bi-person-gear"></i>
                                        Edit
                                    </a>
                                    <a href="#" class="btn btn-sm icon icon-left btn-outline-danger">
                                        <i class="bi bi-trash"></i>
                                        Delete
                                    </a>
                                </div>
                            </td>
                        </tr>
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
<?= $this->endSection(); ?>