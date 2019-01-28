<header class="header-mobile d-block d-lg-none">
    <div class="header-mobile__bar">
        <div class="container-fluid">
            <div class="header-mobile-inner">
                <a class="logo" href="index.html">
                    <img src="/images/icon/logo.png" alt="CoolAdmin" />
                </a>
                <button class="hamburger hamburger--slider" type="button">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
    </div>
    <nav class="navbar-mobile">
        <div class="container-fluid">
            <ul class="navbar-mobile__list list-unstyled">
                <li class="active">
                    <a href="{{ route('admin.dashboard') }}">
                        <i class="fas fa-tachometer-alt"></i>Dashboard
                    </a>
                </li>
                @foreach($menus as $menu)
                    @can($menu->permission)
                        <li>
                            <a href="{{ route($menu->guard) }}"><i class="fas fa-{{ $menu->icon }}"></i>{{ $menu->name }}</a>
                        </li>
                    @endcan
                @endforeach

                @can('browse-menus')
                    <li>
                        <a href="{{ route('menus.create') }}">
                            <i class="fas fa-plus"></i>Add a Menu</a>
                    </li>
                @endcan
                

                <li>
                    <a href="{{ route('archived.tickets') }}">
                        <i class="fas fa-archive"></i>Archived</a>
                </li>
            </ul>
        </div>
    </nav>
</header>