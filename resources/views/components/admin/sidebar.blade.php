<ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('admin.dashboard')}}">
        <div class="sidebar-brand-icon">
            <img src="{{$webInformation->logo}}">
        </div>
        <div class="sidebar-brand-text mx-3">{{$webInformation->name}}</div>
    </a>
    <hr class="sidebar-divider my-0">
    <li class="nav-item active">
        <a class="nav-link" href="{{route('admin.dashboard')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        Modul Informasi
    </div>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePengumuman"
            aria-expanded="true" aria-controls="collapsePengumuman">
            <i class="fas fa-bullhorn"></i>
            <span>Pengumuman</span>
        </a>
        <div id="collapsePengumuman" class="collapse" aria-labelledby="headingBootstrap"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Berita</h6>
                <a class="collapse-item" href="#">Lihat Pengumuman</a>
                <a class="collapse-item" href="#">Tambah Pengumuman</a>
            </div>
        </div>
    </li>
</ul>
