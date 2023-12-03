<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        a {
            text-decoration: none;
        }

        .login {
            min-height: 100vh;
        }

        .bg-image {
            background-image: url('<?= base_url('assets/images/unsika.png'); ?>');
            background-size: cover;
            background-position: center center;
            filter: sepia(92%) saturate(2554%) hue-rotate(210deg) brightness(101%) contrast(90%);
        }
    </style>
</head>

<body>
    <?= $this->include('login_modal'); ?>

    <div class="container-fluid">
        <div class="row no-gutter">
            <div class="col-md-7 d-none d-md-flex bg-image"></div>
            <div class="col-md-5 bg-light">
                <div class="login d-flex align-items-center py-5">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-10 col-xl-7 mx-auto">
                                <h4 class="fw-bold my-4 text-center">Login</h4>
                                <?= $this->include('login_content'); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#loginModal">
        Login
    </button>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>