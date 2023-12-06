<?= $this->extend('layouts/main_dashboard'); ?>

<?= $this->section('heads'); ?>
    <link rel="stylesheet" href="<?= base_url('assets/css/quill.snow.css'); ?>">
<?= $this->endSection(); ?>

<?= $this->section('page_title'); ?>
    <?= view_cell('\App\Libraries\HeadingPointer::show', ['title_header' => 'Form Tambah Event', 'description' => 'Anda bisa menambah event baru disini.']); ?>
<?= $this->endSection(); ?>

<?= $this->section('main_dashboard_content'); ?>
    <div class="row">
        <div class="col-12 col-md-10 col-lg-9 col-xl-7">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <form class="form form-vertical" action="<?= base_url('/superadmin/events/new'); ?>" method="post" enctype="multipart/form-data">
                        <?php if(isset($validation)): ?>
                            <div class="form-body">
                                <div class="row">
                                <div class="col-12 mb-4">
                                        <label for="banner" class="form-label fw-bold">Banner</label>
                                        <label for="banner" class="position-relative overflow-hidden w-full h-100 p-3 py-xl-5 rounded text-center bg-secondary-subtle border d-flex align-items-center justify-content-center" style="cursor:pointer">
                                            <div class="fs-3">
                                                <i class="bi bi-plus-lg"></i>
                                            </div>
                                            <button id="btn-reset-image" title="Hapus banner" class="position-absolute top-0 end-0 mt-1 d-none me-1 px-2 z-2 bg-danger text-white rounded-circle border-0" type="button">x</button>
                                            <img id="preview-image" src="" class="position-absolute z-1 img-fluid h-100 object-fit-cover">
                                        </label>
                                        <input type="file" id="banner" name="banner" class="d-none">
                                        <div class="d-block invalid-feedback">
                                            <?= $validation->getError('banner'); ?>
                                        </div>
                                    </div>
                                    <div class="col-12 mt-5">
                                        <div class="form-group has-icon-left">
                                            <label for="name" class="form-label">Nama Event</label>
                                            <div class="position-relative">
                                                <input type="text" name="name" tabindex="1" class="form-control <?= $validation->hasError('name') ? 'is-invalid' : ''; ?>" placeholder="Isikan nama event" id="name" value="<?= set_value('name', old('name')); ?>">
                                                <div class="form-control-icon">
                                                    <i class="bi bi-balloon-heart"></i>
                                                </div>
                                            </div>
                                            <div class="d-block invalid-feedback">
                                                <?= $validation->getError('name'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group has-icon-left">
                                            <label class="form-label" for="target_audience">Target Audience</label>
                                            <div class="position-relative">
                                                <input type="text" name="target_audience" class="form-control <?= $validation->hasError('target_audience') ? 'is-invalid' : ''; ?>" placeholder="Isikan target audience" id="target_audience" value="<?= set_value('target_audience', old('target_audience')); ?>">
                                                <div class="form-control-icon">
                                                    <i class="bi bi-send"></i>
                                                </div>
                                            </div>
                                            <div class="d-block invalid-feedback">
                                                <?= $validation->getError('target_audience'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group has-icon-left">
                                            <label class="form-label" for="quota">Kuota</label>
                                            <div class="position-relative">
                                                <input type="text" name="quota" class="form-control <?= $validation->hasError('quota') ? 'is-invalid' : ''; ?>" placeholder="isikan kuota" id="quota" value="<?= set_value('quota', old('quota')); ?>">
                                                <div class="form-control-icon">
                                                    <i class="bi bi-123"></i>
                                                </div>
                                            </div>
                                            <div class="d-block invalid-feedback">
                                                <?= $validation->getError('quota'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label fw-bold">Tipe Event</label>
                                        <div class="form-check form-check-danger">
                                            <input class="form-check-input" type="radio" name="event_type" value="0" id="online" checked <?= set_radio('event_type', '0'); ?>>
                                            <label class="form-check-label text-capitalize" style="cursor: pointer;" for="online">
                                                Online
                                            </label>
                                        </div>
                                        <div class="form-check form-check-danger">
                                            <input class="form-check-input" type="radio" name="event_type" value="1" id="offline" <?= set_radio('event_type', '1'); ?>>
                                            <label class="form-check-label text-capitalize" style="cursor: pointer;" for="offline">
                                                Offline
                                            </label>
                                        </div>
                                        <div class="d-block invalid-feedback">
                                            <?= $validation->getError('event_type'); ?>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group has-icon-left">
                                            <label class="form-label" for="link">Link</label>
                                            <div class="position-relative">
                                                <input type="text" name="link" class="form-control <?= $validation->hasError('link') ? 'is-invalid' : ''; ?>" placeholder="isikan link" id="link" value="<?= set_value('link', old('link')); ?>">
                                                <div class="form-control-icon">
                                                    <i class="bi bi-link"></i>
                                                </div>
                                            </div>
                                            <div class="d-block invalid-feedback">
                                                <?= $validation->getError('link'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 row">
                                        <div class="col">
                                            <div class="form-group has-icon-left">
                                                <label class="form-label" for="price">Harga</label>
                                                <div class="position-relative">
                                                    <input type="number" name="price" class="form-control <?= $validation->hasError('price') ? 'is-invalid' : ''; ?>" placeholder="isikan harga" id="price" value="<?= set_value('price', old('price')); ?>">
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-currency-dollar"></i>
                                                    </div>
                                                </div>
                                                <div class="d-block invalid-feedback">
                                                    <?= $validation->getError('price'); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group has-icon-left">
                                                <label class="form-label" for="date">Tanggal</label>
                                                <div class="position-relative">
                                                    <input type="date" name="date" class="form-control <?= $validation->hasError('date') ? 'is-invalid' : ''; ?>" placeholder="isikan tanggal" id="date" value="<?= set_value('date', old('date')); ?>" min="<?= date('Y-m-d')?>">
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-calendar-event"></i>
                                                    </div>
                                                </div>
                                                <div class="d-block invalid-feedback">
                                                    <?= $validation->getError('date'); ?>
                                                </div>
                                            </div>
                                        </div>    
                                    </div>
                                    <div class="col-12 row">
                                        <div class="col-12 col-md">
                                            <div class="form-group has-icon-left">
                                                <label class="form-label" for="country">Negara</label>
                                                <div class="position-relative">
                                                    <input type="text" name="country" class="form-control <?= $validation->hasError('country') ? 'is-invalid' : ''; ?>" placeholder="isikan nama negara" id="country" value="<?= set_value('country', old('country')); ?>">
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-globe-americas"></i>      
                                                    </div>
                                                </div>
                                                <div class="d-block invalid-feedback">
                                                    <?= $validation->getError('country'); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md">
                                            <div class="form-group has-icon-left">
                                                <label class="form-label" for="province">Provinsi</label>
                                                <div class="position-relative">
                                                    <input type="text" name="province" class="form-control <?= $validation->hasError('province') ? 'is-invalid' : ''; ?>" placeholder="isikan nama provinsi" id="province" value="<?= set_value('province', old('province')); ?>">
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-globe-americas"></i>      
                                                    </div>
                                                </div>
                                                <div class="d-block invalid-feedback">
                                                    <?= $validation->getError('province'); ?>
                                                </div>
                                            </div>
                                        </div>    
                                    </div>
                                    <div class="col-12 row">
                                        <div class="col-12 col-md">
                                            <div class="form-group has-icon-left">
                                                <label class="form-label" for="city">Kota</label>
                                                <div class="position-relative">
                                                    <input type="text" name="city" class="form-control <?= $validation->hasError('city') ? 'is-invalid' : ''; ?>" placeholder="isikan nama kota" id="city" value="<?= set_value('city', old('city')); ?>">
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-globe-americas"></i>      
                                                    </div>
                                                </div>
                                                <div class="d-block invalid-feedback">
                                                    <?= $validation->getError('city'); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md">
                                            <div class="form-group has-icon-left">
                                                <label class="form-label" for="postal_code">Kode Pos</label>
                                                <div class="position-relative">
                                                    <input type="number" name="postal_code" class="form-control <?= $validation->hasError('postal_code') ? 'is-invalid' : ''; ?>" placeholder="isikan kode pos" id="postal_code" value="<?= set_value('postal_code', old('postal_code')); ?>">
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-mailbox-flag"></i>      
                                                    </div>
                                                </div>
                                                <div class="d-block invalid-feedback">
                                                    <?= $validation->getError('postal_code'); ?>
                                                </div>
                                            </div>
                                        </div>    
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group has-icon-left">
                                            <label class="form-label" for="street">Jalan</label>
                                            <div class="position-relative">
                                                <input type="text" name="street" class="form-control <?= $validation->hasError('street') ? 'is-invalid' : ''; ?>" placeholder="isikan nama jalan" id="street" value="<?= set_value('street', old('street')); ?>">
                                                <div class="form-control-icon">
                                                    <i class="bi bi-signpost-split"></i>
                                                </div>
                                            </div>
                                            <div class="d-block invalid-feedback">
                                                <?= $validation->getError('street'); ?>
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="col-12 row">
                                        <div class="col-12 col-md">
                                            <div class="form-group has-icon-left">
                                                <label class="form-label" for="host">Nama Host</label>
                                                <div class="position-relative">
                                                    <input type="text" name="host" class="form-control <?= $validation->hasError('host') ? 'is-invalid' : ''; ?>" placeholder="isikan nama host" id="host" value="<?= set_value('host', old('host')); ?>">
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-mic"></i>
                                                    </div>
                                                </div>
                                                <div class="d-block invalid-feedback">
                                                    <?= $validation->getError('host'); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md">
                                            <div class="form-group has-icon-left">
                                                <label class="form-label" for="host_email">Email Host</label>
                                                <div class="position-relative">
                                                    <input type="email" name="host_email" class="form-control <?= $validation->hasError('host_email') ? 'is-invalid' : ''; ?>" placeholder="isikan email host" id="host_email" value="<?= set_value('host_email', old('host_email')); ?>">
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-envelope-at-fill"></i>
                                                    </div>
                                                </div>
                                                <div class="d-block invalid-feedback">
                                                    <?= $validation->getError('host_email'); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="category" class="form-label">Kategori</label>
                                            <select class="form-select" name="category_id" id="category">
                                                <?php foreach($categories as $category): ?>
                                                    <option value="<?= $category->id; ?>" class="text-capitalize" <?= set_select('category_id', $category->id) ?>><?= $category->name; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <div class="d-block invalid-feedback">
                                                <?= $validation->getError('category_id'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group has-icon-left">
                                            <label class="form-label" for="collaborator">kolaborator</label>
                                            <div class="position-relative">
                                                <input type="email" name="collaborator" class="form-control <?= $validation->hasError('collaborator') ? 'is-invalid' : ''; ?>" placeholder="isikan email kolaborator event" id="collaborator" value="<?= set_value('collaborator', old('collaborator')); ?>">
                                                <div class="form-control-icon">
                                                    <i class="bi bi-envelope-at-fill"></i>
                                                </div>
                                            </div>
                                            <div class="d-block invalid-feedback">
                                                <?= $validation->getError('collaborator'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group has-icon-left">
                                            <label class="form-label" for="owner">Owner</label>
                                            <div class="position-relative">
                                                <input type="email" name="owner" class="form-control <?= $validation->hasError('owner') ? 'is-invalid' : ''; ?>" placeholder="isikan email pemilik event" id="owner" value="<?= set_value('owner', old('owner')); ?>">
                                                <div class="form-control-icon">
                                                    <i class="bi bi-envelope-at-fill"></i>
                                                </div>
                                            </div>
                                            <div class="d-block invalid-feedback">
                                                <?= $validation->getError('owner'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <input type="hidden" name="description" id="description" value="<?= set_value('description', old('description')); ?>">
                                        <div class="form-group">
                                            <label class="form-label">Deskripsi</label>
                                            <div class="d-flex flex-grow-1 flex-column" style="height: 12rem;">
                                                <div id="description-editor" class=" h-100"></div>
                                            </div>
                                        </div>
                                        <div class="d-block invalid-feedback">
                                            <?= $validation->getError('description'); ?>
                                        </div>
                                    </div>
                                    <div class="col-12 mb-2">
                                        <label class="form-label fw-bold" for="required_approval">Required Approval</label>
                                        <div class="form-check">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="form-check-input form-check-danger" name="required_approval" id="required_approval" checked>
                                                <label class="form-check-label" for="required_approval">Required</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-5 col-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                        <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?= $this->endSection(); ?>
<?= $this->section('scripts'); ?>
<script src="<?= base_url('assets/js/quill.min.js'); ?>"></script>
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
        $('#banner').wrap('<form>').closest('form').get(0).reset();
        $('#banner').unwrap();
        $('#preview-image').prop('src', "");
    })

    $('#banner').on('change', ({target}) => {
        const file = target.files[0];
        imagePreview(file);
    })

    // quill editor
    const descriptionEditor = new Quill("#description-editor", {
        theme: "snow",
        placeholder: 'Isikan deskripsi event'
    });
    const description = $('#description').val();
    if(description != '') {
        descriptionEditor.pasteHTML(description);
    }
    descriptionEditor.on("text-change", function (delta, odDelta, source) {
        $('#description').val(descriptionEditor.root.innerHTML);
    });
</script>
<?= $this->endSection(); ?>