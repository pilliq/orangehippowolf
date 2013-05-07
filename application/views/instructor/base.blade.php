@layout('session')

@section('top-nav')
    <ul class="nav">
	<li class="active"><a href="{{ URL::to_route('requests') }}">Requests</a></li>
	<li><a href="{{ URL::to_route('courses') }}">Courses</a></li>
	<li><a href="#">Profile</a></li>
    </ul>
    @parent
@endsection
