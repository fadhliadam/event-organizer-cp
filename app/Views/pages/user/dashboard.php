<?= $this->extend('layouts/user_dashboard'); ?>
<?= $this->section('heads'); ?>
<style>
    .event-info {
        font-size: 8pt;
        font-weight: 500;
    }
</style>
<?= $this->endSection(); ?>
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
        <p class="fw-bold">Showing <?= count($events); ?> results</p>
    </div>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 g-3">
        <?php foreach ($events as $event) : ?>
            <div class="col">
                <div class="card shadow" data-clickable="true" data-href="<?= base_url('events/' . $event->id); ?>">
                    <img src="<?= base_url('assets/' . $event->banner); ?>" class="card-img-top" alt="...">
                    <div class="py-3 px-2">
                        <?php
                        $availabilityStyle = 'text-secondary fs-6 fw-bold';
                        $availability = 'Terjual habis';
                        $price = '';
                        $originalTime = $time::createFromFormat('Y-m-d', $event->date);
                        $event->date = $originalTime->format('d M Y');
                        if ($event->quota != 0) {
                            $availabilityStyle = 'text-success';
                            $availability = 'Tersedia sekarang';
                            if ($event->price == 0) {
                                $price = 'Gratis';
                            } else {
                                $price = number_to_currency($event->price, 'IDR', 'id_ID');
                            }
                        }
                        ?>
                        <p class="card-title small fw-bold mb-1 text-truncate"><?= $event->name; ?></p>
                        <p class="card-text event-info mb-1"><?= $event->date ?></p>
                        <p class="card-text event-info mb-1"><?= $event->street ?></p>
                        <p class="card-text event-info text-danger fs-6 mb-1"><?= $price; ?></p>
                        <p class="card-text event-info <?= $availabilityStyle; ?>"><?= $availability; ?></p>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </div>
    <div>
        <?= $pager->links('events', 'event_pagination'); ?>
    </div>
    <div id="searchResults"></div>
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