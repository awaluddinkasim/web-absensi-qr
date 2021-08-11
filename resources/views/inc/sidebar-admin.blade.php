<!-- Sidebar -->
<ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
        <div class="sidebar-brand-icon">
            <img src="{{ asset('img/logo.png') }}">
        </div>
        <div class="sidebar-brand-text mx-3">Absensi</div>
    </a>
    <hr class="sidebar-divider my-0">
    <li class="nav-item {{ Request::is('admin') ? 'active' : '' }}">
        <a class="nav-link" href="/admin">
            <i class="fas fa-fw fa-home"></i>
            <span>Beranda</span></a>
    </li>
    <hr class="sidebar-divider">
    <li class="nav-item {{ Request::segment(2) == "master" ? 'active' : '' }}">
        <a class="nav-link {{ Request::segment(2) != "master" ? 'collapsed' : '' }}" href="#" data-toggle="collapse" data-target="#collapseBootstrap"
            aria-expanded="true" aria-controls="collapseBootstrap">
            <i class="far fa-fw fa-window-maximize"></i>
            <span>Master Data</span>
        </a>
        <div id="collapseBootstrap" class="collapse {{ Request::segment(2) == "master" ? 'show' : '' }}" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Master Data</h6>
                <a class="collapse-item {{ Request::segment(3) == "guru" ? 'active' : '' }}" href="/admin/master/guru">Guru</a>
                <a class="collapse-item {{ Request::segment(3) == "siswa" ? 'active' : '' }}" href="/admin/master/siswa">Siswa</a>
                <a class="collapse-item {{ Request::segment(3) == "mapel" ? 'active' : '' }}" href="/admin/master/mapel">Mata Pelajaran</a>
            </div>
        </div>
    </li>
    <li class="nav-item {{ Request::segment(2) == "laporan" ? 'active' : '' }}">
        <a class="nav-link" href="/admin/laporan">
            <i class="fas fa-fw fa-print"></i>
            <span>Laporan</span>
        </a>
    </li>
</ul>
<!-- Sidebar -->
