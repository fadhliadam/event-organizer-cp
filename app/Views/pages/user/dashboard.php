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
                <input type="radio" class="btn-check" name="categoryId" id="Semua" value="0" autocomplete="off" checked>
                <label class="btn btn-outline-primary" for="Semua">
                    Semua
                </label>
                <?php foreach ($categories as $category) : ?>
                    <input type="radio" class="btn-check" name="categoryId" id="<?= $category->name; ?>" value="<?= $category->id; ?>" autocomplete="off">
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
    <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 g-3" id="event-list">
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

    // function PaginationAjax() {

    //     let click_status = false;
    //     $('#pagination').on('click', 'a', function(e) {

    //         // reverse link action
    //         e.preventDefault();

    //         // get href data
    //         var href = $(this).attr('href');

    //         // disable click
    //         if (click_status) {
    //             return false;
    //         }
    //         click_status = true;

    //         // disable pagination
    //         $('#pagination li').addClass('disabled');

    //         // go to top
    //         $('html, body').animate({
    //             scrollTop: 0
    //         }, 0);

    //         $.ajax({
    //             url: href,
    //             type: 'POST',
    //             dataType: 'JSON',
    //             success: function(response) {

    //                 // re-init because its refresh DOM 
    //                 filterCategory();
    //                 PaginationAjax();

    //                 // enable click
    //                 click_status = false;
    //             },
    //             error: function(xhr, statusText, errorThrown) {
    //                 alert(statusText);

    //                 // enable pagination
    //                 $('#pagination li').removeClass('disabled');

    //                 // enable click
    //                 click_status = false;
    //             }
    //         });

    //     });
    // }

    // PaginationAjax();

    function filterCategory() {
        // Filter events by category
        $('input[type="radio"]').change(function() {
            var categoryId = $(this).val();
            if (categoryId === 'Semua') {
                categoryId = 0;
            }

            $.ajax({
                url: "<?= base_url('/dashboard') ?>",
                method: "POST",
                data: {
                    categoryId: categoryId
                },
                dataType: "json",
                success: function(response) {
                    $('#event-list').empty();

                    // Render filtered events
                    var events = response.events;
                    var prices = response.prices;
                    if (events.length > 0) {
                        for (var i = 0; i < events.length; i++) {
                            var event = events[i];
                            var availabilityStyle = 'text-secondary fs-6 fw-bold';
                            var availability = 'Terjual habis';
                            var price = prices[i];

                            if (event.quota != 0) {
                                availabilityStyle = 'text-success';
                                availability = 'Tersedia sekarang';
                            }
                            var html = `
                            <div class="col">
                                <div class="card shadow" data-clickable="true" data-href="<?= base_url('events/') ?>/${event.id}">
                                    <img src="<?= base_url('assets/') ?>/${event.banner}" class="card-img-top" alt="...">
                                    <div class="py-3 px-2">
                                        <p class="card-title small fw-bold mb-1 text-truncate">${event.name}</p>
                                        <p class="card-text event-info mb-1">${event.date}</p>
                                        <p class="card-text event-info mb-1">${event.street}</p>
                                        <p class="card-text event-info text-danger fs-6 mb-1">${price}</p>
                                        <p class="card-text event-info ${availabilityStyle} ?>">${availability}</p>
                                    </div>
                                </div>
                            </div>
                        `;
                            $('#event-list').append(html);
                        }
                    } else {
                        $('#event-list').append('<p>Tidak ada event yang ditemukan.</p>');
                    }
                }
            });
        });

        // Pre-select the currently chosen category
        $('input[type="radio"][value="<?= $selectedCategoryId ?>"]').prop('checked', true);
    }

    filterCategory();
</script>
<?= $this->endSection(); ?>