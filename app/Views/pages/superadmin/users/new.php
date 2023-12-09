<?= $this->extend('layouts/main_dashboard'); ?>

<?= $this->section('page_title'); ?>
    <?= view_cell('\App\Libraries\HeadingPointer::show', ['title_header' => 'Form Tambah User', 'description' => 'Anda bisa menambah user baru disini.']); ?>
<?= $this->endSection(); ?>

<?= $this->section('main_dashboard_content'); ?>
    <div class="row">
        <div class="col-12 col-md-10 col-lg-9 col-xl-7">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                    <?= form_open_multipart(base_url('/superadmin/users/new'), ['class' => 'form form-vertical']); ?>
                        <?php if(isset($validation)): ?>
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group has-icon-left">
                                            <label for="username" class="form-label">Username</label>
                                            <div class="position-relative">
                                                <input type="text" name="username" class="form-control <?= $validation->hasError('username') ? 'is-invalid' : ''; ?>" placeholder="Isikan username" id="username" value="<?= set_value('username', old('username')); ?>">
                                                <div class="form-control-icon">
                                                    <i class="bi bi-person"></i>
                                                </div>
                                            </div>
                                            <div class="d-block invalid-feedback">
                                                <?= $validation->getError('username'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group has-icon-left">
                                            <label class="form-label" for="email">Email</label>
                                            <div class="position-relative">
                                                <input type="email" name="email" class="form-control <?= $validation->hasError('email') ? 'is-invalid' : ''; ?>" placeholder="Isikan email" id="email" value="<?= set_value('email', old('email')); ?>">
                                                <div class="form-control-icon">
                                                    <i class="bi bi-envelope"></i>
                                                </div>
                                            </div>
                                            <div class="d-block invalid-feedback">
                                                <?= $validation->getError('email'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group has-icon-left">
                                            <label class="form-label" for="password">Password</label>
                                            <div class="position-relative">
                                                <input type="password" name="password" class="form-control <?= $validation->hasError('password') ? 'is-invalid' : ''; ?>" placeholder="isikan password" id="password" value="<?= set_value('password', old('password')); ?>">
                                                <div class="form-control-icon">
                                                    <i class="bi bi-lock"></i>
                                                </div>
                                            </div>
                                            <div class="d-block invalid-feedback">
                                                <?= $validation->getError('password'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label fw-bold">Role</label>
                                        <?php foreach($roles as $role): ?>
                                        <div class="form-check form-check-danger">
                                            <input class="form-check-input" type="radio" name="role" value="<?= $role->id; ?>" id="<?= $role->name; ?>" <?= $role->id == 1 ? 'checked': ''; ?> >
                                            <label class="form-check-label text-capitalize" style="cursor: pointer;" for="<?= $role->name; ?>">
                                                <?= $role->name; ?>
                                            </label>
                                        </div>
                                        <?php endforeach; ?>
                                        <div class="d-block invalid-feedback">
                                            <?= $validation->getError('role'); ?>
                                        </div>
                                    </div>
                                    <div class="col-5 col-xl-4">
                                        <label for="image" class="form-label fw-bold">Image</label>
                                        <label for="image" class="position-relative overflow-hidden w-full h-75 w-75 p-3 py-xl-4 rounded text-center bg-secondary-subtle border d-flex align-items-center justify-content-center" style="cursor:pointer">
                                            <div class="fs-3">
                                                <i class="bi bi-plus-lg"></i>
                                            </div>
                                            <button id="btn-reset-image" title="Hapus gambar" class="position-absolute top-0 end-0 mt-1 d-none me-1 px-2 z-2 bg-danger text-white rounded-circle border-0" type="button">x</button>
                                            <img id="preview-image" src="" class="position-absolute z-1 img-fluid h-100 object-fit-cover">
                                        </label>
                                        <input type="file" id="image" name="image" class="d-none">
                                        <div class="d-block invalid-feedback">
                                            <?= $validation->getError('image'); ?>
                                        </div>
                                    </div>
                                    <div class="mt-5 col-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                        <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                        <?= form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?= $this->endSection(); ?>
<?= $this->section('scripts'); ?>
<script>
    function imagePreview(file) {
        const url = URL.createObjectURL(file);
        const AvailableTypes = ["image/jpeg", "image/jpg", "image/png"];
        const checkAvailableType = AvailableTypes.some((type) => type.toLowerCase().includes(file.type.toLowerCase()));
        if(checkAvailableType) {
            $('#preview-image').prop('src', url);
            if($('#preview-image').prop('src') !== '') {
                    $('#btn-reset-image').removeClass('d-none');
            }
        }
    }
    
    $('#btn-reset-image').on('click', () => {
        $('#btn-reset-image').addClass('d-none');
        $('#image').wrap('<form>').closest('form').get(0).reset();
        $('#image').unwrap();
        $('#preview-image').prop('src', "");
    })

    $('#image').on('change', ({target}) => {
        const file = target.files[0];
        imagePreview(file);
    })
</script>
<?= $this->endSection(); ?>