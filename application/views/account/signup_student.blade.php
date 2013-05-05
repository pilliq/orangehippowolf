@layout('base')

@section('title')
    Signup
@endsection

@section('content')
    @if(Session::has('error'))
	<div class="alert alert-error">
	    {{ Session::get('error') }}
	</div>
    @endif
    <div class="signup-form">
	<div class="row-fluid">
	    <div class="span12 text-center">
		<h2>Create a Student Account</h2>
		{{ Form::open('signup/student') }}
		    <fieldset>
			<div class="clearfix">
			    <input type="text" placeholder="First Name" name="first_name">
			</div>
			<div class="clearfix">
			    <input type="text" placeholder="Last Name" name="last_name">
			</div>
			<div class="clearfix">
			    <input type="text" placeholder="RUID" name="ruid">
			</div>
			<div class="clearfix">
			    <input type="text" placeholder="NetID" name="netid">
			</div>
			<div class="clearfix">
			    <input type="text" placeholder="Email" name="email">
			</div>
			<div class="clearfix">
			    <input type="password" placeholder="Password" name="password">
			</div>
			<div class="clearfix">
			    <input type="password" placeholder="Retype Password" name="password2">
			</div>
			<button class="btn btn-primary" type="submit">Sign up</button>
		    </fieldset>
		{{ Form::close() }}
	    </div>
	</div>
    </div>
@endsection
