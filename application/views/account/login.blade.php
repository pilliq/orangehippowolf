@layout('base')

@section('title')
    Login
@endsection

@section('styles')
    @parent
    {{-- HTML::style('css/login.css') --}}
@endsection


@section('content')
    @if (Session::has('error'))
	<div class="alert alert-error">
	    {{ Session::get('error') }}
	</div>
    @endif
    <div class="login-form">
	<div class="row-fluid">
	    <div class="span12 text-center">
		<h2>Login</h2>
		{{ Form::open('login') }}
		    <fieldset>
			<div class="clearfix">
			    <input type="text" placeholder="NetID" name="username">
			</div>
			<div class="clearfix">
			    <input type="password" placeholder="Password" name="password">
			</div>
			<button class="btn btn-primary" type="submit">Sign in</button>
		    </fieldset>
		{{ Form::close() }}
		<a href="{{ URL::to_route('signup') }}">Or signup for an account</a>
	    </div>
	</div>
    </div>
@endsection
