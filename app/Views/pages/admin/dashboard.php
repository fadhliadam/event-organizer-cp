<?= $this->extend('layouts/main'); ?>

<?= $this->section('heads'); ?>
<link rel="stylesheet" href="<?= base_url('assets/css/app.css'); ?>">
<?= $this->endSection(); ?>


<?= $this->section('content'); ?>

<!-- <div class="d-md-inline d-flex flex-column flex-shrink-0 p-3 bg-secondary" style="height: 100vh;">
        <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
            <span class="d-md-inline d-flex text-white">Dashboard</span>
        </a>
        <hr>
        <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item">
                <a href="#" class="nav-link active bg-danger" aria-current="page">
                    <i class="bi bi-person text-white" width="16" height="16">
                        <use xlink:href="#home"></use>
                    </i>
                    <span class="d-md-inline d-flex text-white">
                        Users
                    </span>
                </a>
            </li>
            <li>
                <a href="#" class="nav-link link-dark">
                    <i class="bi bi-calendar-event text-white" width="16" height="16">
                        <use xlink:href="#speedometer2"></use>
                    </i>
                    <span class="d-md-inline d-flex text-white">

                        Events
                    </span>
                </a>
            </li>
        </ul>
        <hr>
    </div> -->
<div id="sidebar">
    <div class="sidebar-wrapper active">
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-title">Menu</li>

                <li class="sidebar-item active">
                    <a href="/admin/dashboard" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="/admin/dashboard/collaborator" class='sidebar-link'>
                        <i class="bi bi-person-fill"></i>
                        <span>Collaborator</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="pages/dashboard/dashboard_admin" class='sidebar-link'>
                        <i class="bi bi-grid-1x2-fill"></i>
                        <span>Event</span>
                    </a>
                </li>

            </ul>
        </div>
    </div>
</div>
<div id="main">
    <header>
        <nav class="navbar navbar-expand navbar-light navbar-top">
            <div class="container-fluid">
                <a href="#" class="burger-btn d-block">
                    <i class="bi bi-justify fs-3"></i>
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- <ul class="navbar-nav ms-auto mb-lg-0">
                        <li class="nav-item dropdown me-1">
                            <a class="nav-link active dropdown-toggle text-gray-600" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class='bi bi-envelope bi-sub fs-4'></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                                <li>
                                    <h6 class="dropdown-header">Mail</h6>
                                </li>
                                <li><a class="dropdown-item" href="#">No new mail</a></li>
                            </ul>
                        </li>
                    </ul> -->
                    <div class="dropdown ms-auto">
                        <a href="#" data-bs-toggle="dropdown" aria-expanded="false">
                            <div class="user-menu d-flex">
                                <div class="user-name text-end me-3">
                                    <h6 class="mb-0 text-gray-600">John Ducky</h6>
                                    <p class="mb-0 text-sm text-gray-600">Administrator</p>
                                </div>
                                <div class="user-img d-flex align-items-center">
                                    <div class="avatar avatar-md">
                                        <img src="<?= base_url('assets/images/person.png'); ?>">
                                    </div>
                                </div>
                            </div>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton" style="min-width: 11rem;">
                            <li>
                                <h6 class="dropdown-header">Hello, John!</h6>
                            </li>
                            <li><a class="dropdown-item" href="#"><i class="icon-mid bi bi-person me-2"></i> My
                                    Profile</a></li>
                            <li><a class="dropdown-item" href="#"><i class="icon-mid bi bi-gear me-2"></i>
                                    Settings</a></li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#"><i class="icon-mid bi bi-box-arrow-left me-2"></i> Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <div class="container-fluid text-black">
        <div class="container-fluid mt-4">
            <div class="row">
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start">
                        <ol class="breadcrumb">
                            <!-- <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li> -->
                            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <hr>
            <h2 class="mb-4 text-black fw-bold" data-aos="fade-up">User</h2>
            <div class="row">
                <div class="col-6 col-lg-3 col-md-6 mb-4" data-aos="fade-up">
                    <div class="card text-bg-white inner p-2" style="border: none;">
                        <span class="fw-bold">New Users</span>
                        <h1 class="text-center">200</h1>
                        <div class="col text-center text-success">
                            <i class="bi bi-arrow-up-short"></i>
                            <span class="text-center fs-2">50%</span>
                        </div>
                        <h6 class="text-center text-secondary">
                            Last 1 month
                        </h6>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6 mb-4" data-aos="fade-up">
                    <div class="card text-bg-white inner p-2" style="border: none;">
                        <span class="fw-bold">Fasilkom Users</span>
                        <h1 class="text-center">200</h1>
                        <div class="col text-center text-danger">
                            <i class="bi bi-arrow-down-short"></i>
                            <span class="text-center fs-2">50%</span>
                        </div>
                        <h6 class="text-center text-secondary">
                            Last 1 month
                        </h6>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6 mb-4" data-aos="fade-up">
                    <div class="card text-bg-white inner p-2" style="border: none;">
                        <span class="fw-bold">Non-Fasilkom Users</span>
                        <h1 class="text-center">200</h1>
                        <div class="col text-center text-success">
                            <i class="bi bi-arrow-up-short"></i>
                            <span class="text-center fs-2">50%</span>
                        </div>
                        <h6 class="text-center text-secondary">
                            Last 1 month
                        </h6>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6 mb-4" data-aos="fade-up">
                    <div class="card text-bg-white inner p-2" style="border: none;">
                        <span class="fw-bold">Collaborators</span>
                        <h1 class="text-center">200</h1>
                        <div class="col text-center text-success">
                            <i class="bi bi-arrow-up-short"></i>
                            <span class="text-center fs-2">50%</span>
                        </div>
                        <h6 class="text-center text-secondary">
                            Last 1 month
                        </h6>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row" data-aos="fade-up">
                <div class="col-lg-7">
                    <div class="card">
                        <div class="card-header">
                            <h4>User</h4>
                        </div>
                        <div class="card-body">
                            <div id="area-user"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-header">
                            <h4>Total User</h4>
                        </div>
                        <div class="card-body">
                            <div id="line-user"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <h2 class="mb-4 text-black fw-bold" data-aos="fade-up">Event</h2>
        <div class="row">
            <div class="col-6 col-lg-3 col-md-6 mb-4" data-aos="fade-up">
                <div class="card text-bg-white inner p-2" style="border: none;">
                    <span class="fw-bold">Total Event</span>
                    <h1 class="text-center">200</h1>
                    <div class="col text-center text-success">
                        <i class="bi bi-arrow-up-short"></i>
                        <span class="text-center fs-2">50%</span>
                    </div>
                    <h6 class="text-center text-secondary">
                        Last 1 month
                    </h6>
                </div>
            </div>
            <div class="col-6 col-lg-3 col-md-6 mb-4" data-aos="fade-up">
                <div class="card text-bg-white inner p-2" style="border: none;">
                    <span class="fw-bold">Public Event</span>
                    <h1 class="text-center">200</h1>
                    <div class="col text-center text-danger">
                        <i class="bi bi-arrow-down-short"></i>
                        <span class="text-center fs-2">50%</span>
                    </div>
                    <h6 class="text-center text-secondary">
                        Last 1 month
                    </h6>
                </div>
            </div>
            <div class="col-6 col-lg-3 col-md-6 mb-4" data-aos="fade-up">
                <div class="card text-bg-white inner p-2" style="border: none;">
                    <span class="fw-bold">Private Event</span>
                    <h1 class="text-center">200</h1>
                    <div class="col text-center text-success">
                        <i class="bi bi-arrow-up-short"></i>
                        <span class="text-center fs-2">50%</span>
                    </div>
                    <h6 class="text-center text-secondary">
                        Last 1 month
                    </h6>
                </div>
            </div>
            <div class="col-6 col-lg-3 col-md-6 mb-4" data-aos="fade-up">
                <div class="card text-bg-white inner p-2" style="border: none;">
                    <span class="fw-bold">Event</span>
                    <h1 class="text-center">200</h1>
                    <div class="col text-center text-success">
                        <i class="bi bi-arrow-up-short"></i>
                        <span class="text-center fs-2">50%</span>
                    </div>
                    <h6 class="text-center text-secondary">
                        Last 1 month
                    </h6>
                </div>
            </div>
            <div class="row" data-aos="fade-up">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>Total Event</h4>
                        </div>
                        <div class="card-body">
                            <div id="line-event"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>Event Organization</h4>
                        </div>
                        <div class="card-body">
                            <div id="bar-event"></div>
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
    var barEventOptions = {
        series: [{
                name: "BEM",
                data: [44, 55, 57, 56, 61, 58, 63, 60, 66],
            },
            {
                name: "BLM",
                data: [76, 85, 101, 98, 87, 105, 91, 114, 94],
            },
            {
                name: "HIMTIKA",
                data: [35, 41, 36, 26, 45, 48, 52, 53, 41],
            },
            {
                name: "HIMSIKA",
                data: [35, 41, 36, 26, 45, 48, 52, 53, 41],
            },
        ],
        chart: {
            type: "bar",
            height: 350,
        },
        plotOptions: {
            bar: {
                horizontal: false,
                columnWidth: "55%",
                endingShape: "rounded",
            },
        },
        dataLabels: {
            enabled: false,
        },
        stroke: {
            show: true,
            width: 2,
            colors: ["transparent"],
        },
        xaxis: {
            categories: ["Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct"],
        },
        yaxis: {
            title: {
                text: "$ (thousands)",
            },
        },
        fill: {
            opacity: 1,
        },
        tooltip: {
            y: {
                formatter: function(val) {
                    return "$ " + val + " thousands"
                },
            },
        },
    }

    var areaUserOptions = {
        series: [{
                name: "Fasilkom",
                data: [31, 40, 28, 51, 42, 109, 100],
            },
            {
                name: "Non-Fasilkom",
                data: [11, 32, 45, 32, 34, 52, 41],
            },
        ],
        chart: {
            height: 350,
            type: "area",
        },
        dataLabels: {
            enabled: false,
        },
        stroke: {
            curve: "smooth",
        },
        xaxis: {
            categories: ["Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", ],
        },
        tooltip: {
            y: {
                formatter: function(val) {
                    return "$ " + val + " thousands"
                },
            },
        },
    }

    var lineEventOptions = {
        chart: {
            type: "line",
        },
        series: [{
            name: "sales",
            data: [30, 40, 35, 50, 49, 60, 70, 91, 125],
        }, ],
        xaxis: {
            categories: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Agu", "Sep"],
        },
    }
    var lineUserOptions = {
        chart: {
            type: "line",
        },
        series: [{
            name: "sales",
            data: [30, 40, 35, 50, 49, 60, 70, 91, 125],
        }, ],
        xaxis: {
            categories: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Agu", "Sep"],
        },
    }
    var barEvent = new ApexCharts(document.querySelector("#bar-event"), barEventOptions)
    var areaUser = new ApexCharts(document.querySelector("#area-user"), areaUserOptions)
    var lineEvent = new ApexCharts(document.querySelector("#line-event"), lineEventOptions)
    var lineUser = new ApexCharts(document.querySelector("#line-user"), lineUserOptions)

    barEvent.render()
    areaUser.render()
    lineEvent.render()
    lineUser.render()
</script>

<script src="<?= base_url('assets/js/app.js') ?>"></script>
<?= $this->endSection(); ?>