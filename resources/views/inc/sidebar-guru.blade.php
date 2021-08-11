<!-- Sidebar -->
<ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
        <div class="sidebar-brand-icon">
            <img src="{{ asset('img/logo.png') }}">
        </div>
        <div class="sidebar-brand-text mx-3">Absensi</div>
    </a>
    <hr class="sidebar-divider my-0">
    <li class="nav-item {{ Request::is('guru') ? 'active' : '' }}">
        <a class="nav-link" href="/guru">
            <i class="fas fa-fw fa-home"></i>
            <span>Beranda</span></a>
    </li>
    <hr class="sidebar-divider">
    <li class="nav-item {{ Request::segment(2) == "absensi" ? 'active' : '' }}">
        <a class="nav-link" href="/guru/absensi">
            <i class="fas fa-fw fa-clipboard"></i>
            <span>Absensi</span>
        </a>
    </li>
    <li class="nav-item {{ Request::segment(2) == "laporan" ? 'active' : '' }}">
        <a class="nav-link" href="/guru/laporan">
            <i class="fas fa-fw fa-print"></i>
            <span>Laporan</span>
        </a>
    </li>
</ul>
<!-- Sidebar -->
