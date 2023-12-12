<header>
    <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="searchModalLabel" aria-hidden="true">
        <div class="modal-dialog mt-5">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="text-center">
                        <div class="row align-items-center">
                            <div class="col">
                                <div class="container-fluid">
                                    <?= view_cell('\App\Libraries\SearchBar::show', ['id' => 'formSearchModal']); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-body-tertiary border-bottom">
        <nav class="navbar navbar-expand-lg bg-body-tertiary border-bottom">
            <div class="container">
                <div class="logo">
                    <a class="fs-5" href="<?= base_url('/dashboard'); ?>"><span class="fs-2">E</span>vent Organizer</a>
                </div>
                <div class="row ms-auto align-items-center">
                    <button class="col-auto navbar-toggler border-0" type="button" data-bs-toggle="modal" data-bs-target="#searchModal" aria-controls="searchEvent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="bi bi-search"></span>
                    </button>
                    <a class="col-auto navbar-toggler border-0" type="button" href="<?= base_url('/events/history'); ?>" aria-controls="historyEvent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="bi bi-clock-history"></span>
                    </a>
                    <div class="col-auto collapse navbar-collapse" id="searchEvent">
                        <?= view_cell('\App\Libraries\SearchBar::show', ['id' => 'formSearch']); ?>
                    </div>
                    <div class="col-auto collapse navbar-collapse" id="historyEvent">
                        <a class="nav-link" href="<?= base_url('/events/history'); ?>">History Event</a>
                    </div>
                    <div class="col-auto">
                        <div class="dropdown">
                            <a href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                <div class="user-menu d-flex">
                                    <div class="user-img d-flex align-items-center">
                                        <div class="avatar avatar-md">
                                            <img src="<?= session()->get('image'); ?>" alt="profile">
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton" style="min-width: 11rem;">
                                <li>
                                    <h6 class="dropdown-header">Hello, <?= session()->get('username') ?>!</h6>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="<?= base_url('/profile'); ?>"><i class="icon-mid bi bi-person me-2"></i> My
                                        Profile
                                    </a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><button type="button" id="logout" class="dropdown-item"><i class="icon-mid bi bi-box-arrow-left me-2"></i> Logout</button></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</header>
<?= $this->section('scripts'); ?>
<script>
    $('#logout').on('click', () => {
        const data = {
            title: 'Logout',
            text: 'Apakah kamu ingin keluar dari aplikasi?',
            buttonText: 'Ya, logout!',
            url: '<?= base_url('/logout') ?>',
            redirectTo: '<?= base_url('/login') ?>',
            method: "DELETE"
        }
        confirmSwalHandler(data);
    })

    function displayDelSearch(elementVal, elementDel) {
        if($(elementVal).val()) {
            $(elementDel).removeClass('d-none');
        } else {
            $(elementDel).addClass('d-none');
        }
    }

    function delSearch(elementVal, elementDel) {
        $(elementDel).on('click', function() {
            window.history.replaceState('', '', updateURLParameter(window.location.href, 'nameEvent', ''))
            $(elementVal).val('');
            $(this).addClass('d-none');
            $(elementVal).focus()
        })
    }

    // Function search handler
    $('#formSearch input[name=nameEvent]').on('keyup', function() {
        displayDelSearch(this, '#formSearch .del-input');
        window.history.replaceState('', '', updateURLParameter(window.location.href, 'nameEvent', $(this).val()))
    })
    $('#formSearch input[name=nameEvent]').on('blur', function() {
        $(this).parent().submit();
    });
    
    $('#formSearchModal input[name=nameEvent]').on('keyup', function() {
        displayDelSearch(this, '#formSearchModal .del-input');
        window.history.replaceState('', '', updateURLParameter(window.location.href, 'nameEvent', $(this).val()))
    })
    $('#formSearchModal input[name=nameEvent]').on('blur', function() {
        $(this).parent().submit();
    });


    // Update value in input from query param
    const urlParam = new URLSearchParams(window.location.search);
    const nameEvent = urlParam.get('nameEvent');
    
    if(nameEvent) {
        $('#formSearch input[name=nameEvent]').val(nameEvent);
        displayDelSearch('#formSearch input[name=nameEvent]', '#formSearch .del-input')
        delSearch('#formSearch input[name=nameEvent]', '#formSearch .del-input');

        $('#formSearchModal input[name=nameEvent]').val(nameEvent);
        displayDelSearch('#formSearchModal input[name=nameEvent]', '#formSearchModal .del-input')
        delSearch('#formSearchModal input[name=nameEvent]', '#formSearchModal .del-input');
    } else {
        window.history.replaceState('', '', updateURLParameter(window.location.href, 'nameEvent', ''))
    }
</script>
<?= $this->endSection(); ?>