
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>@yield('title', 'Help Desk Portal | Welcome')</title>
  <!-- Favicon -->
  <link href="/assets/img/brand/favicon.png" rel="icon" type="image/png">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Icons -->
  <link href="/assets/vendor/nucleo/css/nucleo.css" rel="stylesheet">
  <link href="/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
  <!-- Argon CSS -->
  <link type="text/css" href="/assets/css/argon.css?v=1.0.0" rel="stylesheet">
</head>

<body>

    <!-- Header -->
    <div class="header py-7 py-lg-8" style="background-image: url(/assets/img/theme/building.jpg); background-size: cover; background-position: center top;">
      <div class="container">
        <span class="mask bg-translucent-darker opacity-8"></span>
        <div class="header-body text-center mb-7">
          <div class="row justify-content-center">
            
          </div>
        </div>
      </div>
      <div class="separator separator-bottom separator-skew zindex-100">
        <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
          <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
        </svg>
      </div>
    </div>


      <!-- Main content -->
      <div class="main-content">
        <!-- Page content -->
        @yield('content')
      </div>


  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="/assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="/js/bootstrap3-typeahead.min.js"></script>
  <script src="/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Optional JS -->
  <script src="/assets/vendor/chart.js/dist/Chart.min.js"></script>
  <script src="/assets/vendor/chart.js/dist/Chart.extension.js"></script>
  <!-- Argon JS -->
  <script src="/assets/js/argon.js?v=1.0.0"></script>
  <script src="/js/sweetalert.min.js"></script>

  @yield('scripts')
</body>

</html>