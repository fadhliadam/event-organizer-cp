<?= $this->extend('layouts/main_dashboard'); ?>

<?= $this->section('heads'); ?>
<link rel="stylesheet" href="<?= base_url('assets/css/quill.snow.css'); ?>">
<?= $this->endSection(); ?>

<?= $this->section('page_title'); ?>
<?= view_cell('\App\Libraries\HeadingPointer::show', ['title_header' => 'Form Edit Event', 'description' => 'Anda bisa mengubah event disini.']); ?>
<?= $this->endSection(); ?>

<?= $this->section('main_dashboard_content'); ?>
<div class="row">
    <div class="col-12 col-md-10 col-lg-9 col-xl-7">
        <div class="card">
            <div class="card-content">
                <div class="card-body">
                    <?= form_open_multipart(base_url('/admin/collaborators/edit/' . $eventCollaborator->collaborator_id), ['class' => 'form form-vertical']); ?>
                    <?php if (isset($validation)) : ?>
                        <div class="form-body">
                            <div class="row">
                            <input type="hidden" name="_method" value="put">
                                <div class="col-12 mt-5">
                                    <div class="form-group has-icon-left">
                                        <label for="name" class="form-label">Nama Event</label>
                                        <div class="position-relative">
                                            <input type="text" name="name" tabindex="1" class="form-control <?= $validation->hasError('name') ? 'is-invalid' : ''; ?>" placeholder="Isikan nama event" id="name" value="<?= set_value('name', $eventCollaborator->event_name); ?>" disabled>
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
                                        <label class="form-label" for="collaborator">Kolaborator</label>
                                        <div class="position-relative">
                                            <input type="email" name="collaborator" class="form-control <?= $validation->hasError('collaborator') ? 'is-invalid' : ''; ?>" placeholder="isikan email kolaborator event" id="collaborator" value="<?= set_value('collaborator', $eventCollaborator->user_email); ?>">
                                            <div class="form-control-icon">
                                                <i class="bi bi-envelope-at-fill"></i>
                                            </div>
                                        </div>
                                        <div class="d-block invalid-feedback">
                                            <?= $validation->getError('collaborator'); ?>
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
                    <?= form_close(); ?>
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
        if (checkAvailableType) {
            $('#preview-image').prop('src', url);
            if ($('#preview-image').prop('src') !== '') {
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

    $('#banner').on('change', ({
        target
    }) => {
        const file = target.files[0];
        imagePreview(file);
    })

    // quill editor
    const descriptionEditor = new Quill("#description-editor", {
        theme: "snow",
        placeholder: 'Isikan deskripsi event'
    });
    const description = $('#description').val();
    if (description != '') {
        descriptionEditor.pasteHTML(description);
    }
    descriptionEditor.on("text-change", function(delta, odDelta, source) {
        $('#description').val(descriptionEditor.root.innerHTML);
    });
</script>
<?= $this->endSection(); ?>