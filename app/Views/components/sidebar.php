<div id="sidebar">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header position-relative">
            <div class="d-flex justify-content-between align-items-center">
                <div class="logo">
                    <a class="fs-5" href="<?= base_url('/superadmin/dashboard'); ?>"><span class="fs-2">E</span>vent Organizer</a>
                </div>
                <div class="sidebar-toggler  x">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-item <?= service('uri')->getSegment(2) == 'dashboard' ? 'active' : '' ?>">
                    <a href="<?= base_url('/superadmin/dashboard'); ?>" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item <?= service('uri')->getSegment(2) == 'users' ? 'active' : '' ?>">
                    <a href="<?= base_url('/superadmin/users'); ?>" class='sidebar-link'>
                        <i class="bi bi-people-fill"></i>
                        <span>Users</span>
                    </a>
                </li>
                <li class="sidebar-item <?= service('uri')->getSegment(2) == 'events' ? 'active' : '' ?>">
                    <a href="<?= base_url('/superadmin/events'); ?>" class='sidebar-link'>
                        <i class="bi bi-balloon-heart-fill"></i>
                        <span>Events</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>