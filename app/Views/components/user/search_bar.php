<div class="container border rounded-3 bg-white">
    <?= form_open(base_url('/dashboard'), ['id' => $id, 'method' => 'get', 'class' => 'search-event input-group m-1']); ?>
        <span><i class="bi bi-search fs-6 text-body-tertiary ms-1 me-2"></i></span>
        <input type="text" class="form-control me-2" placeholder="Search name event" name="nameEvent">
        <button type="button" class="del-input d-none text-body-tertiary me-2">
            <i class="bi bi-x-circle-fill"></i>
        </button>
        <button type="submit" class="d-none"></button>
    <?= form_close() ?>
</div>
