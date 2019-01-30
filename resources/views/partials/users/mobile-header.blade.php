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
        </div>
    </nav>
</header>