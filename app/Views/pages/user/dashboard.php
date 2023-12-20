<?= $this->extend('layouts/user_dashboard'); ?>
<?= $this->section('heads'); ?>
<style>
    .event-info {
        font-size: 8pt;
        font-weight: 500;
    }
</style>
<?= $this->endSection(); ?>

<?= $this->section('main_dashboard_content'); ?>
<div class="bg-body-tertiary border-bottom">
    <div class="container px-3 px-md-0">
        <div class="row-2">
            <?= form_open(base_url('/dashboard'), ['id' => 'formCategory', 'class' => 'btn-group gap-2 my-3 btn-group-sm flex-wrap', 'aria-label' => 'search group', 'role' => 'group', 'method' => 'get']); ?>
                <input type="radio" class="btn-check" name="category" id="all" value="all" autocomplete="off">
                <label class="btn btn-outline-primary rounded" for="all">
                    Semua
                </label>
                <?php foreach ($categories as $category) : ?>
                    <input type="radio" class="btn-check" name="category" id="<?= $category->name; ?>" value="<?= $category->name; ?>" autocomplete="off">
                    <label class="btn btn-outline-primary rounded" for="<?= $category->name; ?>">
                        <?= $category->name; ?>
                    </label>
                <?php endforeach ?>
                <input type="submit" class="d-none">
            <?= form_close(); ?>
        </div>
    </div>
</div>

<section class="container px-3 px-md-0">
    <div class="my-3">
        <p class="fw-bold">Showing <?= count($events); ?> results</p>
        <?= count($events) <  1 ? '<small class="d-block text-danger mb-5">Event not found</small>' : ''?>
    </div>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 g-3" id="event-list">
        <?php foreach ($events as $event) : ?>
            <div class="col">
                <div class="card shadow-sm" data-clickable="true" data-href="<?= base_url('events/' . $event->id); ?>">
                    <img src="<?= base_url('assets/' . $event->banner); ?>" class="card-img-top" alt="...">
                    <div class="py-3 px-2">
                        <?php
                        $price = '';
                        $originalTime = $time::createFromFormat('Y-m-d', $event->date);
                        $event->date = $originalTime->format('d M Y');
                        if ($event->quota != 0 && $event->is_completed == 0) {
                            $availabilityStyle = 'text-success';
                            $availability = 'Tersedia sekarang';
                            if ($event->price == 0) {
                                $price = 'Gratis';
                            } else {
                                $price = number_to_currency($event->price, 'IDR', 'id_ID');
                            }
                        } elseif($event->quota == 0 && $event->is_completed == 0) {
                            $availabilityStyle = 'badge bg-secondary';
                            $availability = 'Terjual habis';
                        } else {
                            $availabilityStyle = 'text-danger';
                            $availability = 'Telah Berakhir';
                        }
                        ?>
                        <p class="card-title small fw-bold mb-1 text-truncate"><?= $event->name; ?></p>
                        <p class="card-text event-info mb-1"><?= $event->date ?></p>
                        <p class="card-text event-info mb-1"><?= $event->street ?></p>
                        <p class="card-text event-info text-danger fs-6 mb-1"><?= $price; ?></p>
                        <p class="card-text event-info <?= $availabilityStyle; ?>"><?= $availability ?></p>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </div>
    <div>
        <?= $pager; ?>
    </div>
</section>
<?= $this->endSection(); ?>

<?= $this->section('scripts'); ?>
<script>
    // Event filter
    $('input[name=category]').on('change', ({target}) => {
        const {value} = target;
        $('#formCategory').submit();
    });

    $(document).ready(() => {
        $(document.body).on('click', '.card[data-clickable=true]', (e) => {
            var href = $(e.currentTarget).data('href');
            window.location = href;
        });

        // category filter button
        const urlParam = new URLSearchParams(window.location.search);
        const category = urlParam.get('category');
        const categoryRadios = document.querySelectorAll('input[name=category]');
        if(category) {
            categoryRadios.forEach((categoryRadio) => {  
                if(categoryRadio.value.toLowerCase() == category.toLowerCase()){
                    categoryRadio.checked = true;
                }
            })
        } else {
            categoryRadios[0].checked = true;
            window.history.replaceState('','',updateURLParameter(window.location.href, 'category', 'all'));
       }
       
    })

</script>
<?= $this->endSection(); ?>