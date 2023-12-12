<div id="sidebar">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header position-relative">
            <div class="d-flex justify-content-between align-items-center">
                <div class="logo">
                    <?php
                        $dashboard_routes = [
                            1 => '/superadmin/dashboard',
                            2 => '/admin/dashboard',
                            3 => '/dashboard'
                        ];
                     ?>
                    <a class="fs-5 fw-bold d-flex gap-2 align-items-center" href="<?= base_url($dashboard_routes[session()->get('role_id')]); ?>">
                        <div class="border border-danger p-1 rounded">
                            <img src="<?= base_url('assets/images/logo.png'); ?>" alt="logo" width="32px">
                        </div>
                        <span class="">Event Organizer</span>
                    </a>
                </div>
                <div class="sidebar-toggler  x">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <?php if(session()->get('role_id') == 1): ?>
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
            <?php elseif(session()->get('role_id') == 2): ?>
            <ul class="menu">
                <li class="sidebar-item <?= service('uri')->getSegment(2) == 'dashboard' ? 'active' : '' ?>">
                    <a href="<?= base_url('/admin/dashboard'); ?>" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item <?= service('uri')->getSegment(2) == 'collaborators' ? 'active' : '' ?>">
                    <a href="<?= base_url('/admin/collaborators'); ?>" class='sidebar-link'>
                        <i class="bi bi-people-fill"></i>
                        <span>Collaborators</span>
                    </a>
                </li>
                <li class="sidebar-item <?= service('uri')->getSegment(2) == 'events' ? 'active' : '' ?>">
                    <a href="<?= base_url('/admin/events'); ?>" class='sidebar-link'>
                        <i class="bi bi-balloon-heart-fill"></i>
                        <span>Events</span>
                    </a>
                </li>
            </ul>
            <?php else: ?>
            <ul class="menu">
                <li class="sidebar-item <?= service('uri')->getSegment(2) == 'profile' ? 'active' : '' ?>">
                    <a href="<?= base_url('/profile'); ?>" class='sidebar-link'>
                        <i class="bi bi-person-fill"></i>
                        <span>Profile</span>
                    </a>
                </li>
                <li class="sidebar-item <?= service('uri')->getSegment(2) == 'yourevents' ? 'active' : '' ?>">
                    <a href="<?= base_url('/yourevents'); ?>" class='sidebar-link'>
                        <i class="bi bi-balloon-heart-fill"></i>
                        <span>Your Events</span>
                    </a>
                </li>
                <li class="sidebar-item <?= service('uri')->getSegment(2) == 'historyevents' ? 'active' : '' ?>">
                    <a href="<?= base_url('/events/history'); ?>" class='sidebar-link'>
                        <i class="bi bi-clock-history"></i>
                        <span>History Events</span>
                    </a>
                </li>
            </ul>
            <?php endif; ?>
        </div>
    </div>
</div>