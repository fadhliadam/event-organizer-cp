<!-- app/Views/navbar.php -->

<nav class="navbar navbar-expand-lg navbar-light p-3" style="background-color: #8A2BE2;">
    <a class="navbar-brand text-white fw-bold" href="#" style="padding-left: 8px;">Event Organizer</a>
    <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link fw-bold text-white" href="#">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="#">Event</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="#">Support</a>
            </li>
        </ul>
    </div>
    <!-- Tambahkan elemen baru untuk Sign Up dan Sign In -->
    <div class="ml-auto">
        <span class="text-white"><a class="fw-bold text-white" href="#" style="text-decoration: none;">Sign In</a></span>
        <span class="text-white mr-2" style="border: 1px solid white; border-radius: 8px; padding: 8px;"><a class="fw-bold text-white" href="#" style="text-decoration: none;">Sign Up</a></span>
    </div>
    <!-- <div class="d-lg-none"> -->

    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <!-- </div> -->
</nav>

<!-- offcanvas -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasRightLabel">Event Organizer</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <ul class="navbar-nav list-group list-group-flush">
            <li class="nav-item list-group-item">
                <a class="nav-link fw-bold text-black" href="#">Home</a>
            </li>
            <li class="nav-item list-group-item">
                <a class="nav-link text-black" href="#">Event</a>
            </li>
            <li class="nav-item list-group-item">
                <a class="nav-link text-black" href="#">Support</a>
            </li>
        </ul>
    </div>
</div>