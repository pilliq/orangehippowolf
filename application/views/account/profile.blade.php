@layout('session')

@section('title')
    Profile 
@endsection

@section('styles')
    @parent
@endsection

@section('content')
    {{ Session::get('status') }}
    <div class="login-form">
	<div class="row-fluid">
	    <div class="span12 text-center">
		<h2>Profile</h2>
		{{ Session::get('username') }}
		<br />
		@if (Session::get('instructor') == 1) 
		    I am an instructor
		@else 
		    I am a student
		@endif
		<br />
		{{ Session::get('instructor') }}
	    </div>
	</div>
    </div>
@endsection
