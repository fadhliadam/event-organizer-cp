<?= $this->extend('layouts/main_dashboard'); ?>

<?= $this->section('page_title'); ?>
<?= view_cell('\App\Libraries\HeadingPointer:show', ['title_header' => 'Dashboard', 'description' => 'Kelola data Anda disini']); ?>
<?= $this->endSection(); ?>
<?= $this->section('main_dashboard_content'); ?>

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
        <h2 class="mb-4 text-black fw-bold" data-aos="fade-up">Event</h2>
        <div class="row">
            <div class="col-6 col-lg-3 col-md-6 mb-4" data-aos="fade-up">
                <div class="card text-bg-white inner p-2" style="border: none;">
                    <span class="fw-bold">Event Created</span>
                    <h1 class="text-center"><?= $eventsCount ?></h1>
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
                    <span class="fw-bold">Online Events</span>
                    <h1 class="text-center"><?= $eventsOnlineCount ?></h1>
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
                    <span class="fw-bold">Offline Events</span>
                    <h1 class="text-center"><?= $eventsOfflineCount ?></h1>
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
                    <span class="fw-bold">Event Visitors</span>
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
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <h4>Event Visitors</h4>
                    </div>
                    <div class="card-body">
                        <div id="area-event"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h4>Event Done</h4>
                    </div>
                    <div class="card-body">
                        <div id="radial-gradient-event"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <h2 class="mb-4 text-black fw-bold" data-aos="fade-up">Collaborator</h2>
    <div class="row">
        <div class="col-6 col-lg-3 col-md-6" data-aos="fade-up">
            <div class="card">
                <div class="card-body px-4 py-4-5">
                    <div class="row">
                        <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                            <div class="stats-icon blue mb-2">
                                <i class="iconly-boldProfile"></i>
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

<?= $this->endSection(); ?>

<?= $this->section('scripts'); ?>
<script>
    

    var areaEventOptions = {
        series: [{
            name: "Fasilkom",
            data: [31, 40, 28, 51, 42, 109, 100],
        }, {
            name: "Non-Fasilkom",
            data: [31, 45, 20, 46, 42, 110, 100],
        }, ],
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



    var radialGradientEventOptions = {
        series: [75],
        chart: {
            height: 350,
            type: "radialBar",
            toolbar: {
                show: true,
            },
        },
        plotOptions: {
            radialBar: {
                startAngle: -135,
                endAngle: 225,
                hollow: {
                    margin: 0,
                    size: "70%",
                    background: "#fff",
                    image: undefined,
                    imageOffsetX: 0,
                    imageOffsetY: 0,
                    position: "front",
                    dropShadow: {
                        enabled: true,
                        top: 3,
                        left: 0,
                        blur: 4,
                        opacity: 0.24,
                    },
                },
                track: {
                    background: "#fff",
                    strokeWidth: "67%",
                    margin: 0, // margin is in pixels
                    dropShadow: {
                        enabled: true,
                        top: -3,
                        left: 0,
                        blur: 4,
                        opacity: 0.35,
                    },
                },

                dataLabels: {
                    show: true,
                    name: {
                        offsetY: -10,
                        show: true,
                        color: "#888",
                        fontSize: "17px",
                    },
                    value: {
                        formatter: function(val) {
                            return parseInt(val)
                        },
                        color: "#111",
                        fontSize: "36px",
                        show: true,
                    },
                },
            },
        },
        fill: {
            type: "gradient",
            gradient: {
                shade: "dark",
                type: "horizontal",
                shadeIntensity: 0.5,
                gradientToColors: ["#ABE5A1"],
                inverseColors: true,
                opacityFrom: 1,
                opacityTo: 1,
                stops: [0, 100],
            },
        },
        stroke: {
            lineCap: "round",
        },
        labels: ["Percent"],
    }
    var areaEvent = new ApexCharts(document.querySelector("#area-event"), areaEventOptions)
    var radialGradientEvent = new ApexCharts(
        document.querySelector("#radial-gradient-event"),
        radialGradientEventOptions
    )

    areaEvent.render()
    radialGradientEvent.render()
</script>
<script>
    $(() => {
        <?php if(session()->has('success_message')):?>
            Swal.fire({
                icon:'success',
                text: '<?= session()->getFlashdata('success_message')?>',
                showConfirmButton: false,
                timer: 2000
            })
        <?php endif;?>
    })
</script>
<?= $this->endSection(); ?>