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
	    <div class="container-fluid">
		<a class="brand" href="{{ URL::to_route('index') }}">Perms</a>
		<ul class="nav">

		    @yield('top-nav')

		</ul>
	    </div>
	</div>
    </div>

    <div class="container-fluid">
	@yield('content')
    </div>

</body>

    @section('scripts')
	{{ HTML::script('js/jquery.min.js') }}
	{{ HTML::script('js/bootstrap.min.js') }}
    @yield_section

</html>
