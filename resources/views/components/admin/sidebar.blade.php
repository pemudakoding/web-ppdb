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
</ul>
