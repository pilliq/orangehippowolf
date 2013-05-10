<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width">

    @section('styles')
	{{ HTML::style('css/bootstrap.min.css') }}
	{{ HTML::style('css/bootstrap-responsive.min.css') }}
    @yield_section

</head>
<body>
    <div class="navbar">
	<div class="navbar-inner">
	    <div class="container">
		<a class="brand" href="{{ URL::to_route('index') }}">Perms</a>

		    @yield('top-nav')

	    </div>
	</div>
    </div>

    <div class="container">
	@if (Session::has('error'))
	    <div class="alert alert-error">
		{{ Session::get('error') }}
	    </div>
	@endif
	@if (Session::has('success'))
	    <div class="alert alert-success">
		{{ Session::get('success') }}
	    </div>
	@endif
	@if (Session::has('warning'))
	    <div class="alert alert-warning">
		{{ Session::get('warning') }}
	    </div>
	@endif
	@yield('content')
    </div>

</body>

    @section('scripts')
	{{ HTML::script('js/jquery.min.js') }}
	{{ HTML::script('js/bootstrap.min.js') }}
    @yield_section

</html>
