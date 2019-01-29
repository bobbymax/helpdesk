<aside class="menu-sidebar d-none d-lg-block">
  <div class="logo">
      <a href="#">
          <img src="/images/icon/logo.png" alt="Cool Admin" />
      </a>
  </div>
  <div class="menu-sidebar__content js-scrollbar1">
      <nav class="navbar-sidebar">
          <ul class="list-unstyled navbar__list">
              <li>
                  <a href="{{ route('tickets.index') }}">
                      <i class="fas fa-mail-reply-all"></i>Tickets</a>
              </li>

              <li>
                  <a href="{{ route('tickets.closed') }}">
                      <i class="fas fa-archive"></i>Closed Tickets</a>
              </li>
              <li>
                  <a href="{{ route('trainings.index') }}">
                      <i class="fas fa-briefcase"></i>Trainings</a>
              </li>
          </ul>
      </nav>
  </div>
</aside>