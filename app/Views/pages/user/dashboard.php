<?= $this->extend('layouts/user_dashboard'); ?>

<?= $this->section('page_title'); ?>
<?= view_cell('\App\Libraries\HeadingPointer::show', ['title_header' => 'Dashboard', 'description' => 'Lihat list event yang tersedia'])  ?>
<?= $this->endSection(); ?>

<?= $this->section('main_dashboard_content'); ?>
<div class="bg-body-tertiary border-bottom">
    <div class="container">
        <div class="row-2">
            <div class="btn-group my-3 btn-group-sm flex-wrap" role="group" aria-label="Basic radio toggle button group">
                <input type="radio" class="btn-check" name="btnradio" id="Semua" autocomplete="off" checked>
                <label class="btn btn-outline-primary" for="Semua">
                    Semua
                </label>
                <?php foreach ($categories as $category) : ?>
                    <input type="radio" class="btn-check" name="btnradio" id="<?= $category->name; ?>" autocomplete="off">
                    <label class="btn btn-outline-primary" for="<?= $category->name; ?>">
                        <?= $category->name; ?>
                    </label>
                <?php endforeach ?>
            </div>
        </div>
    </div>
</div>

<section class="container">
    <div class="my-3">
        <p class="fw-bold">Showing 35 results</p>
    </div>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 g-3">
        <?php foreach ($events as $event) : ?>
            <div class="col">
                <div class="card" data-clickable="true" data-href="<?= base_url('events/' . $event->id); ?>">
                    <img src="<?= base_url('assets/' . $event->banner); ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h6 class="card-title"><?= $event->name; ?></h6>
                        <p class="card-text small"><?= $event->date ?></p>
                        <p class="card-text small"><?= $event->street ?></p>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
        <div class="col">
            <div class="card" data-clickable="true" data-href="http://google.com">
                <img src="assets/images/events/banner.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card" data-clickable="true" data-href="http://google.com">
                <img src="assets/images/events/banner.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card" data-clickable="true" data-href="http://google.com">
                <img src="assets/images/events/banner.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection(); ?>

<?= $this->section('scripts'); ?>
<script>
    $(document).ready(() => {
        $(document.body).on('click', '.card[data-clickable=true]', (e) => {
            var href = $(e.currentTarget).data('href');
            window.location = href;
        });
    });
</script>
<?= $this->endSection(); ?>