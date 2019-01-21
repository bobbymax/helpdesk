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
              <li class="has-sub">
                  <a class="js-arrow" href="#">
                      <i class="fas fa-copy"></i>Request Catalog</a>
                  <ul class="list-unstyled navbar__sub-list js-sub-list">
                      <li>
                          <a href="{{ route('categories.index') }}">
                              <i class="fas fa-file-alt"></i>Categories</a>
                      </li>
                      <li>
                          <a href="{{ route('issues.index') }}">
                              <i class="fas fa-folder-open"></i>Issues</a>
                      </li>
                  </ul>
              </li>

              <li class="has-sub">
                  <a class="js-arrow" href="#">
                      <i class="fas fa-desktop"></i>NCDMB Structure</a>
                  <ul class="list-unstyled navbar__sub-list js-sub-list">
                      <li>
                          <a href="{{ route('directorates.index') }}">
                              <i class="fas fa-object-group"></i>Directorates</a>
                      </li>
                      <li>
                          <a href="{{ route('divisions.index') }}">
                              <i class="fas fa-copy"></i>Divisions</a>
                      </li>
                      <li>
                          <a href="{{ route('departments.index') }}">
                              <i class="fas fa-building"></i>Departments</a>
                      </li>
                      <li>
                          <a href="{{ route('locations.index') }}">
                              <i class="fas fa-map"></i>Locations</a>
                      </li>
                  </ul>
              </li>
              
              <li>
                  <a href="{{ route('admin.tickets.index') }}">
                      <i class="fas fa-ticket-alt"></i>Tickets</a>
              </li>
              <li>
                  <a href="{{ route('users.index') }}">
                      <i class="fas fa-users"></i>Users</a>
              </li>
          </ul>
      </nav>
  </div>
</aside>