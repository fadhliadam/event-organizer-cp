<?= $this->extend('layouts/main_dashboard'); ?>

<?= $this->section('page_title'); ?>
<?= view_cell('\App\Libraries\HeadingPointer::show', ['title_header' => 'Profile', 'description' => 'Data profile anda']); ?>
<?= $this->endSection(); ?>

<?= $this->section('main_dashboard_content'); ?>
<div class="row">
    <div class="col-12 col-md-10 col-lg-9 col-xl-7">
        <div class="card">
            <div class="card-content">
                <div class="card-body">
                    <div class="row">
                        <div class="col-5 col-xl-4 mb-4">
                            <label for="image" class="form-label fw-bold">Image</label>
                            <label for="image" class="position-relative overflow-hidden w-full h-75 w-75 p-3 py-xl-4 rounded text-center bg-secondary-subtle border d-flex align-items-center justify-content-center">
                                <img id="preview-image" src="<?= session()->get('image'); ?>" class="position-absolute z-1 img-fluid h-100 object-fit-cover">
                            </label>
                            <div class="d-block invalid-feedback">
                            </div>
                        </div>
                        <div class="col-12 mb-2">
                            <label class="form-label" for="email">Username</label>
                            <div class="position-relative">
                                <div class="p-2 border border-1 rounded border-danger ">
                                    <i class="bi bi-person-fill"> </i>
                                    <?= session()->get('username'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <label class="form-label" for="email">Email</label>
                            <div class="position-relative">
                                <div class="p-2 border border-1 rounded border-danger">
                                    <i class="bi bi-envelope"> </i>
                                    <?= session()->get('email'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>