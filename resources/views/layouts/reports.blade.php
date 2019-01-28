<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Help Desk Reporting System">
    <meta name="author" content="NCDMB ICT">
    <meta name="keywords" content="helpdesk reporting system ncdmb">

    <!-- Title Page-->
    <title>@yield('title', 'ICT Monthly Report')</title>

    @yield('styles')

    <link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet">


    <style>
    	body {
    		font-family: 'Muli', sans-serif; 
    	}

    	.content-wrapper {
    		padding-bottom: 80px;
    	}

    	.content-header {
    		padding: 50px 0;
    	}
    </style>

</head>
<body>

	<div class="content-wrapper">
		<div class="container-fluid">

			@yield('content')

		</div>
	</div>

    <script src="/js/sweetalert.min.js"></script>

    @include('flash')

    @yield('scripts')
</body>
</html>