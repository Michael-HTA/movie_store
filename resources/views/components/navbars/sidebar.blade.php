@props(['activePage'])
<aside
    class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 bg-gradient-dark"
    id="sidenav-main">
    <div class="sidenav-header sticky-top">
        <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0 d-flex text-wrap align-items-center" href=" {{ route('dashboard') }} ">
            <img src="{{ asset('assets') }}/img/logo-ct.png" class="navbar-brand-img h-100" alt="main_logo">
            <span class="ms-2 font-weight-bold text-white">Movie Dashboard</span>
        </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="w-auto max-height-vh-100 collapse navbar-collapse h-auto" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link text-white {{ $activePage == 'dashboard' ? 'active bg-gradient-primary' : '' }}" href="/">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">dashboard</i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ $activePage == 'user-management' ? 'active bg-gradient-primary' : '' }} "
                    href="{{ route('user')}}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">person</i>
                    </div>
                    <span class="nav-link-text ms-1">Users</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ $activePage == 'movie' ? ' active bg-gradient-primary' : '' }} "
                href="{{ route('movie')}}">
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                    <span class="material-icons opacity-10">movie</span>
                </div>
                <span class="nav-link-text ms-1">Movie</span>
                </a>
            </li>
        </ul>
        <ul class="navbar-nav">
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Trashed Items</h6>
            </li>

            <li class="nav-item">
                <a class="nav-link text-white {{ $activePage == 'trashed-users' ? ' active bg-gradient-primary' : '' }} "
                    href="{{route('users.trashed')}}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        {{-- <i class="material-icons opacity-10">table_view</i> --}}
                        <span class="material-icons">
                            delete_outline
                        </span>
                    </div>
                    <span class="nav-link-text ms-1">Users</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-white {{ $activePage == 'movies-trash' ? ' active bg-gradient-primary' : '' }}  "
                    href="">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        {{-- <i class="material-icons opacity-10">receipt_long</i> --}}
                        <span class="material-icons">
                            delete
                        </span>
                    </div>
                    <span class="nav-link-text ms-1">Movies</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white"
                href="/">
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                    <span class="material-icons">logout</span>
                </div>
                <span class="nav-link-text ms-1">Sing Up</span>
                </a>
            </li>
        </ul>
    </div>
</aside>
