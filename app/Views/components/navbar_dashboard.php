<header>
    <nav class="navbar navbar-expand navbar-light navbar-top">
        <div class="container-fluid">
            <a href="#" class="burger-btn d-block">
                <i class="bi bi-justify fs-3"></i>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="ms-auto">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <div class="dropdown">
                        <a href="#" data-bs-toggle="dropdown" aria-expanded="false">
                            <div class="user-menu d-flex">
                                <div class="user-name text-end me-3">
                                    <h6 class="mb-0 text-gray-600"><?= session()->get('username'); ?></h6>
                                    <p class="mb-0 text-sm text-gray-600 text-capitalize">
                                        <?php 
                                            $roles = [
                                                1 => 'superadmin',
                                                2 => 'admin'
                                            ];
                                            echo $roles[session()->get('role_id')];
                                        ?>
                                    </p>
                                </div>
                                <div class="user-img d-flex align-items-center">
                                    <div class="avatar avatar-md">
                                        <img src="<?= base_url('assets/images/profile.png'); ?>">
                                    </div>
                                </div>
                            </div>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton"
                            style="min-width: 11rem;">
                            <li>
                                <h6 class="dropdown-header">Hello, <?= session()->get('username') ?>!</h6>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#"><i class="icon-mid bi bi-person me-2"></i> My
                                    Profile
                                </a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><button type="button" onclick="return logoutHandler('<?= base_url('/superadmin/logout')?>', '<?= base_url('/superadmin/login')?>')" class="dropdown-item"><i
                                class="icon-mid bi bi-box-arrow-left me-2"></i> Logout</button></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>
<?= $this->section('scripts'); ?>
<script>
    function logoutHandler(url, redirectTo) {
        Swal.fire({
            icon: 'warning',
            title: 'Logout',
            text: 'Apakah kamu ingin keluar dari aplikasi?',
            showCancelButton: true,
            confirmButtonText: 'Yes, logout!',
            confirmButtonColor: '#ca2b43'
        }).then((result) => {
            if(result.isConfirmed) {
                $.ajax({
                    url,
                    method: 'GET',
                    dataType: 'json',
                    success: function (response) {
                        if(response.status === 'success') {
                            Swal.fire({
                                text: response.message,
                                icon: 'success',
                                showConfirmButton: false,
                                timer: 1000,
                            }).then((result) => {
                                window.location.href = redirectTo;
                            });
                        }  else {
                            Swal.fire('Error!', response.message, 'error');
                        }
                    }, 
                    error: function(xhr, status, error) {
                            console.error(xhr.responseText);
                            Swal.fire('Error!', 'An error occurred. Please try again.', 'error');
                    }
                })
            }
        })
    }
</script>
<?= $this->endSection(); ?>