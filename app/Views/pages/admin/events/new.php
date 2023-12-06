<?= $this->extend('layouts/main_dashboard'); ?>

<?= $this->section('page_title'); ?>
<?= view_cell('\App\Libraries\HeadingPointer::show', ['title_header' => 'Form Tambah Event', 'description' => 'Anda bisa menambah event baru disini.']); ?>
<?= $this->endSection(); ?>

<?= $this->section('main_dashboard_content'); ?>
<div class="row match-height">
    <div class="col-12">
        <div class="card">
            <div class="card-content">
                <div class="card-body">
                    <form class="form" action="<?= base_url('/admin/events/new'); ?>" method="post" enctype="multipart/form-data">
                        <?php if (isset($validation)) : ?>

                            <div class="row">
                                <h5>Tentang Event</h5>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="name" class="form-label">Judul</label>
                                        <div class="position-relative">
                                            <input type="text" name="name" class="form-control " placeholder="Isikan Nama Event" id="name" value="">
                                        </div>
                                        <div class="d-block invalid-feedback">
                                            <?= $validation->getError('name'); ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="description" class="form-label">Deskripsi</label>
                                        <textarea class="form-control" id="description" name="description" placeholder="Deskripsikan Eventmu" rows="3"></textarea>
                                        <div class="d-block invalid-feedback">
                                            <?= $validation->getError('description'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="link" class="form-label">Link</label>
                                        <div class="position-relative">
                                            <input type="text" name="link" class="form-control " placeholder="Link" id="link" value="">
                                        </div>
                                        <div class="d-block invalid-feedback">
                                            <?= $validation->getError('link'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="col-5 col-xl-4 form-group">
                                        <label for="banner" class="form-label fw-bold">Banner</label>
                                        <label for="banner" class="position-relative overflow-hidden w-full h-75 w-75 p-3 py-xl-4 rounded text-center bg-secondary-subtle border d-flex align-items-center justify-content-center" style="cursor:pointer">
                                            <div class="fs-3">
                                                <i class="bi bi-plus-lg"></i>
                                            </div>
                                            <button id="btn-reset-banner" title="Hapus banner" class="position-absolute top-0 end-0 mt-1 d-none me-1 px-2 z-2 bg-danger text-white rounded-circle border-0" type="button">x</button>
                                            <img id="preview-banner" src="" class="position-absolute z-1 img-fluid h-100 object-fit-cover">
                                        </label>
                                        <input type="file" id="banner" name="banner" class="d-none">
                                        <div class="d-block invalid-feedback">
                                            <?= $validation->getError('banner'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="host" class="form-label">Penyelenggara</label>
                                        <div class="position-relative">
                                            <input type="text" name="host" class="form-control " placeholder="Jumlah Penyelenggara" id="host" value="">
                                        </div>
                                        <div class="d-block invalid-feedback">
                                            <?= $validation->getError('host'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="host_email" class="form-label">Email Penyelenggara</label>
                                        <div class="position-relative">
                                            <input type="email" name="host_email" class="form-control " placeholder="Jumlah Email Penyelenggara" id="host_email" value="">
                                        </div>
                                        <div class="d-block invalid-feedback">
                                            <?= $validation->getError('host_email'); ?>
                                        </div>
                                    </div>
                                </div>
                                <h5 class="mt-4">Audience Event</h5>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="target_audience" class="form-label">Target Peserta</label>
                                        <div class="position-relative">
                                            <input type="number" name="target_audience" class="form-control " placeholder="Jumlah target peserta" id="target_audience" value="">
                                        </div>
                                        <div class="d-block invalid-feedback">
                                            <?= $validation->getError('target_audience'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="quota" class="form-label">Kuota Peserta</label>
                                        <div class="position-relative">
                                            <input type="number" name="quota" class="form-control " placeholder="Jumlah maksimal peserta" id="quota" value="">
                                        </div>
                                        <div class="d-block invalid-feedback">
                                            <?= $validation->getError('quota'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <label class="form-label fw-bold">Tipe Event</label>
                                    <div class="form-check form-check-danger">
                                        <input class="form-check-input" type="radio" name="event_type" value="0" id="public">
                                        <label class="form-check-label text-capitalize" style="cursor: pointer;" for="public">
                                            Public
                                        </label>
                                    </div>
                                    <div class="form-check form-check-danger">
                                        <input class="form-check-input" type="radio" name="event_type" value="1" id="private">
                                        <label class="form-check-label text-capitalize" style="cursor: pointer;" for="private">
                                            Private
                                        </label>
                                    </div>
                                    <div class="d-block invalid-feedback">
                                        <?= $validation->getError('event_type'); ?>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <label class="form-label fw-bold">Perlu Persetujuan</label>
                                    <div class="form-check form-check-danger">
                                        <input class="form-check-input" type="radio" name="required_approval" value="0" id="yes">
                                        <label class="form-check-label text-capitalize" style="cursor: pointer;" for="yes">
                                            Ya
                                        </label>
                                    </div>
                                    <div class="form-check form-check-danger">
                                        <input class="form-check-input" type="radio" name="required_approval" value="1" id="no">
                                        <label class="form-check-label text-capitalize" style="cursor: pointer;" for="no">
                                            Tidak
                                        </label>
                                    </div>
                                    <div class="d-block invalid-feedback">
                                        <?= $validation->getError('required_approval'); ?>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <label class="form-check-label text-capitalize fw-bold mb-2" style="cursor: pointer;" for="category_id">
                                        Kategori Event
                                    </label>
                                    <fieldset class="form-group">
                                        <select class="form-select" id="category_id" name="category_id">
                                            <option value="1">Seminar</option>
                                            <option value="2">Musik</option>
                                            <option value="3">Olahraga</option>
                                            <option value="4">Kuliner</option>
                                        </select>
                                    </fieldset>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="price" class="form-label">Harga</label>
                                        <div class="position-relative">
                                            <input type="number" name="price" class="form-control " placeholder="Harga tiket masuk (0 jika gratis)" id="price" value="">
                                        </div>
                                        <div class="d-block invalid-feedback">
                                            <?= $validation->getError('price'); ?>
                                        </div>
                                    </div>
                                </div>
                                <h5 class="mt-4">Pelaksanaan Event</h5>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="date" class="form-label">Tanggal Pelaksanaan</label>
                                        <div class="position-relative">
                                            <input type="date" name="date" id="date" class="form-control mb-3 flatpickr-no-config" placeholder="Pilih tanggal pelaksanaan" value="">
                                        </div>
                                        <div class="d-block invalid-feedback">
                                            <?= $validation->getError('date'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="country" class="form-label">Negara</label>
                                        <div class="position-relative">
                                            <input type="text" name="country" class="form-control " placeholder="Lokasi Negara Pelaksanaan Event" id="country" value="">
                                        </div>
                                        <div class="d-block invalid-feedback">
                                            <?= $validation->getError('country'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="province" class="form-label">Provinsi</label>
                                        <div class="position-relative">
                                            <input type="text" name="province" class="form-control " placeholder="Lokasi Provinsi Pelaksanaan Event" id="province" value="">
                                        </div>
                                        <div class="d-block invalid-feedback">
                                            <?= $validation->getError('province'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="city" class="form-label">Kota</label>
                                        <div class="position-relative">
                                            <input type="text" name="city" class="form-control " placeholder="Lokasi Kota Pelaksanaan Event" id="city" value="">
                                        </div>
                                        <div class="d-block invalid-feedback">
                                            <?= $validation->getError('city'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="postal_code" class="form-label">Kode Pos</label>
                                        <div class="position-relative">
                                            <input type="text" name="postal_code" class="form-control " placeholder="Lokasi Kode Pos Pelaksanaan Event" id="postal_code" value="">
                                        </div>
                                        <div class="d-block invalid-feedback">
                                            <?= $validation->getError('postal_code'); ?>
                                        </div>
                                    </div>
                                </div>

                                <h5 class="mt-4">Collaborator Event</h5>
                                <div class="col-md-6 col-12">
                                    <label class="form-check-label text-capitalize fw-bold mb-2" style="cursor: pointer;" for="collaborator">
                                        Penanggung Jawab Event
                                    </label>
                                    <fieldset class="form-group">
                                        <select class="form-select" id="collaborator" name="collaborator">
                                            <?php
                                            foreach ($users as $user) :
                                            ?>
                                                <option value="<?= $user->id ?>"> <?= $user->email ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </fieldset>
                                </div>
                                <div class="mt-5 col-12 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                    <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                </div>
                            </div>
                        <?php endif; ?>
                    </form>
                </div>
            </div>
            <div class="col-12 col-md-10 col-lg-9 col-xl-7">


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
        if (checkAvailableType) {
            $('#preview-image').prop('src', url);
            if ($('#preview-image').prop('src') !== '') {
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

    $('#image').on('change', ({
        target
    }) => {
        const file = target.files[0];
        imagePreview(file);
    })
</script>
<?= $this->endSection(); ?>