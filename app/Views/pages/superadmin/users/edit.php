<?= $this->extend('layouts/main_dashboard'); ?>

<?= $this->section('page_title'); ?>
    <?= view_cell('\App\Libraries\HeadingPointer::show', ['title_header' => 'Form Edit User', 'description' => 'Anda bisa mengubah user disini.']); ?>
<?= $this->endSection(); ?>

<?= $this->section('main_dashboard_content'); ?>
    <div class="row">
        <div class="col-12 col-md-10 col-lg-9 col-xl-7">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                    <?= form_open_multipart(base_url('/superadmin/users/edit/'.$user->id), ['class' => 'form form-vertical']); ?>
                        <?php if(isset($validation)): ?>
                            <input type="hidden" name="_method" value="put">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group has-icon-left">
                                            <label for="username" class="form-label">Username</label>
                                            <div class="position-relative">
                                                <input type="text" name="username" class="form-control <?= $validation->hasError('username') ? 'is-invalid' : ''; ?>" placeholder="Isikan username" id="username" value="<?= set_value('username', $user->username); ?>">
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
                                                <input type="email" name="email" disabled readonly class="form-control" placeholder="Isikan email" id="email" value="<?= set_value('email', $user->email); ?>">
                                                <div class="form-control-icon">
                                                    <i class="bi bi-envelope"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group has-icon-left">
                                            <label class="form-label" for="password">Password</label>
                                            <div class="position-relative">
                                                <input type="password" name="password" class="form-control <?= $validation->hasError('password') ? 'is-invalid' : ''; ?>" placeholder="isikan password" id="password" value="<?= set_value('password', $user->password); ?>">
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
                                        <?php if($user->role_id == 3 ): ?>
                                            <input type="text" readonly class="form-control disabled" name="role" value="<?= $user->role_id; ?>" />
                                        <?php else:
                                            foreach($roles as $role): 
                                            if($role->id != 3 ):?>
                                        <div class="form-check form-check-danger">
                                            <input class="form-check-input" type="radio" name="role" value="<?= $role->id; ?>" id="<?= $role->name; ?>" <?= $role->id == $user->role_id ? 'checked': ''; ?> >
                                            <label class="form-check-label text-capitalize" style="cursor: pointer;" for="<?= $role->name; ?>">
                                                <?= $role->name; ?>
                                            </label>
                                        </div>
                                        <?php endif; endforeach; endif;?>
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
                                            <button id="btn-reset-image" title="Hapus gambar" class="position-absolute top-0 end-0 mt-1 me-1 px-2 z-2 bg-danger text-white rounded-circle border-0" type="button">x</button>
                                            <?php $imagePreview = base_url('assets/'.$user->image);
                                                if(str_contains($user->image, 'http')) $imagePreview = $user->image; 
                                            ?>
                                            <img id="preview-image" src="<?= $imagePreview ?>" alt="image" class="position-absolute z-1 img-fluid h-100 object-fit-cover">
                                        </label>
                                        <input type="file" id="image" name="image" class="d-none">
                                        <div class="d-block invalid-feedback">
                                            <?= $validation->getError('image'); ?>
                                        </div>
                                    </div>
                                    <div class="col-12 mt-3">
                                        <div class="form-check">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="form-check-input form-check-danger" name="activateUser" id="activateUser" <?= set_checkbox('activateUser', 'on'); ?> <?= !$user->deleted_at? 'checked' : ''; ?>>
                                                <label class="form-check-label" for="activateUser">Activate User</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-11 rounded mt-3 border">
                                        <ul class="text-muted">
                                            <small class="fw-bold">Notes:</small>
                                            <li><small>Jika checked menandakan user active</small></li>
                                            <li><small>Jika tidak checked menandakan user non-active</small></li>
                                        </ul>
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