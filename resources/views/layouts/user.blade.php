
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

  @include('partials.users.sidebar')


  <!-- Main content -->
  <div class="main-content">
    <!-- Top navbar -->
    @include('partials.users.nav')


    <!-- Header -->
    @include('partials.users.header')


    <!-- Page content -->
    <div class="container-fluid mt--7">
      @yield('content')


      <!-- Footer -->
      @include('partials.footer')
    </div>
  </div>
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="/assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Optional JS -->
  <script src="/assets/vendor/chart.js/dist/Chart.min.js"></script>
  <script src="/assets/vendor/chart.js/dist/Chart.extension.js"></script>
  <!-- Argon JS -->
  <script src="/assets/js/argon.js?v=1.0.0"></script>
  <script src="/js/sweetalert.min.js"></script>

  @include('flash')
</body>

</html>