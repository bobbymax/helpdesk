<aside class="menu-sidebar d-none d-lg-block">
  <div class="logo">
      <a href="#">
          <img src="/images/icon/logo.png" alt="Cool Admin" />
      </a>
  </div>
  <div class="menu-sidebar__content js-scrollbar1">
      <nav class="navbar-sidebar">
          <ul class="list-unstyled navbar__list">
              <li class="active">
                  <a href="{{ route('admin.dashboard') }}"><i class="fas fa-tachometer-alt"></i>Dashboard</a>
              </li>
              @foreach($menus as $menu)

                @can($menu->permission)

                  
                  <li>
                    <a href="{{ route($menu->guard) }}"><i class="fas fa-{{ $menu->icon }}"></i>{{ $menu->name }}</a>
                  </li>


                @endcan

              @endforeach

              <li>
                  <a href="{{ route('menus.create') }}">
                      <i class="fas fa-plus"></i>Add a Menu</a>
              </li>
            

              <li>
                  <a href="{{ route('archived.tickets') }}">
                      <i class="fas fa-archive"></i>Archived</a>
              </li>

              <li>
                  <a href="{{ route('monthly.report.print') }}">
                      <i class="fas fa-rocket"></i>Monthly Report</a>
              </li>
          </ul>
      </nav>
  </div>
</aside>