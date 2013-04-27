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
	    </div>
	</div>
    </div>
@endsection
