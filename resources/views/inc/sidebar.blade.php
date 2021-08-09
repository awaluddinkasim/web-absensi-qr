<!-- Sidebar -->
<ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
        <div class="sidebar-brand-icon">
            <img src="{{ asset('img/logo.png') }}">
        </div>
        <div class="sidebar-brand-text mx-3">Absensi</div>
    </a>
    <hr class="sidebar-divider my-0">
    <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
        <a class="nav-link" href="/">
            <i class="fas fa-fw fa-home"></i>
            <span>Beranda</span></a>
    </li>
    <hr class="sidebar-divider">
    <li class="nav-item {{ Request::segment(1) == "jadwal" ? 'active' : '' }}">
        <a class="nav-link" href="/jadwal">
            <i class="fas fa-fw fa-calendar-alt"></i>
            <span>Jadwal</span>
        </a>
    </li>
    <li class="nav-item {{ Request::segment(1) == "scan" ? 'active' : '' }}">
        <a class="nav-link" href="/scan">
            <i class="fas fa-fw fa-qrcode"></i>
            <span>Scan</span>
        </a>
    </li>
</ul>
<!-- Sidebar -->
