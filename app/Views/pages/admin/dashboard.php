<?= $this->extend('layouts/main_dashboard'); ?>

<?= $this->section('page_title'); ?>
<?= view_cell('\App\Libraries\HeadingPointer:show', ['title_header' => 'Dashboard', 'description' => 'Kelola data Anda disini']); ?>
<?= $this->endSection(); ?>
<?= $this->section('main_dashboard_content'); ?>

<div class="text-black">
    <div>
        <h2 class="mb-4 text-black fw-bold" data-aos="fade-up">Event</h2>
        <div class="row m-0">
            <div class="col-6 col-lg-3 col-md-6" data-aos="fade-up">
                <div class="card">
                    <div class="card-body px-4 py-4-5">
                        <div class="row">
                            <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                <div class="stats-icon purple mb-2">
                                    <i class="bi bi-balloon-heart-fill"></i>
                                </div>
                            </div>
                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                <h6 class="text-muted font-semibold">Total Event</h6>
                                <h6 class="font-extrabold mb-0"><?= $eventsCount ?></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-lg-3 col-md-6" data-aos="fade-up">
                <div class="card">
                    <div class="card-body px-4 py-4-5">
                        <div class="row">
                            <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                <div class="stats-icon blue mb-2">
                                    <i class="bi bi-camera-video-fill"></i>
                                </div>
                            </div>
                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                <h6 class="text-muted font-semibold">Online Event</h6>
                                <h6 class="font-extrabold mb-0"><?= $eventsOnlineCount ?></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-lg-3 col-md-6" data-aos="fade-up">
                <div class="card">
                    <div class="card-body px-4 py-4-5">
                        <div class="row">
                            <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                <div class="stats-icon green mb-2">
                                    <i class="bi bi-camera-video-off-fill"></i>
                                </div>
                            </div>
                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                <h6 class="text-muted font-semibold">Offline Event</h6>
                                <h6 class="font-extrabold mb-0"><?= $eventsOfflineCount ?></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-lg-3 col-md-6" data-aos="fade-up">
                <div class="card">
                    <div class="card-body px-4 py-4-5">
                        <div class="row">
                            <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                <div class="stats-icon red mb-2">
                                    <i class="bi bi-check2-circle"></i>
                                </div>
                            </div>
                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                <h6 class="text-muted font-semibold">Event Done</h6>
                                <h6 class="font-extrabold mb-0"><?= $eventDoneCount ?></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div>
        <h2 class="mb-4 text-black fw-bold" data-aos="fade-up">Collaborator</h2>
        <div class="row m-0">
            <div class="col-6 col-lg-3 col-md-6" data-aos="fade-up">
                <div class="card">
                    <div class="card-body px-4 py-4-5">
                        <div class="row">
                            <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                <div class="stats-icon blue mb-2">
                                    <i class="bi bi-person-fill"></i>
                                </div>
                            </div>
                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                <h6 class="text-muted font-semibold">Collaborators</h6>
                                <h6 class="font-extrabold mb-0"><?= $eventCollaboratorCount ?></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>

<?= $this->section('scripts'); ?>
<script>
    $(() => {
        <?php if (session()->has('success_message')) : ?>
            Swal.fire({
                icon: 'success',
                text: '<?= session()->getFlashdata('success_message') ?>',
                showConfirmButton: false,
                timer: 2000
            })
        <?php endif; ?>
    })
</script>
<?= $this->endSection(); ?>