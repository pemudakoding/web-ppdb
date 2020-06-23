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
    <li class="nav-item active">
        <a class="nav-link" href="{{route('calon-peserta.index')}}">
            <i class="fas fa-user-graduate"></i>
            <span>Calon Peserta Didik</span></a>
    </li>
    <li class="nav-item active">
        <a class="nav-link" href="{{route('zona.index')}}">
            <i class="fas fa-map-marked-alt"></i>
            <span>Zona Sekolah</span></a>
    </li>
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        Modul Export
    </div>
        <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseProfile"
            aria-expanded="true" aria-controls="collapseProfile">
            <i class="fas fa-file-export"></i>
            <span>Export Data Pendaftar</span>
        </a>
        <div id="collapseProfile" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Export</h6>
                <a class="collapse-item" href="{{route('exports.all')}}">Export Semua</a>
                <a class="collapse-item" href="{{route('exports.zona')}}">Export Dalam Zona</a>
                <a class="collapse-item" href="{{route('exports.non-zona')}}">Export Luar Zona</a>
            </div>
        </div>
    </li>
</ul>
