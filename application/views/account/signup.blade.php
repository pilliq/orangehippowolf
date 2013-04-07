@layout('base')

@section('title')
    Signup 
@endsection

@section('styles')
    @parent
    {{-- HTML::style('css/login.css') --}}
@endsection


@section('content')
    <div class="login-form">
	<div class="row-fluid">
	    <div class="span6 text-center">
		<h2>Instructor</h2>
		<a href="{{ URL::to_route('signup_instructor') }}" class="btn btn-success">Signup</a>
	    </div>
	    <div class="span6 text-center">
		<h2>Student</h2>
		<a href="{{ URL::to_route('signup_student') }}" class="btn btn-success">Signup</a>
	    </div>
	</div>
    </div>
@endsection
