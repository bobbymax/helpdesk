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
                  <a href="{{ route('user.dashboard') }}"><i class="fas fa-tachometer-alt"></i>Dashboard</a>
              </li>
              <li>
                  <a href="{{ route('tickets.index') }}">
                      <i class="fas fa-chart-bar"></i>Tickets</a>
              </li>
          </ul>
      </nav>
  </div>
</aside>