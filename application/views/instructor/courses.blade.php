@layout('instructor/base')

@section('title')
    Courses
@endsection

@section('styles')
    @parent
@endsection

@section('content')
    @if (Session::has('success')) 
	<div class="alert alert-success">
	    <button type="button" class="close" data-dismiss="alert">×</button>
	    {{ Session::get('success') }}
	</div>
    @endif
    @if (Session::has('error')) 
	<div class="alert alert-warning">
	    <button type="button" class="close" data-dismiss="alert">×</button>
	    {{ Session::get('error') }}
	</div>
    @endif
    <div class="page-header">
	<h1>My Courses
	    <a class="btn btn-primary pull-right" href="{{ URL::to_route('create_courses') }}"><i class="icon-plus icon-white"></i> Add a new course</a>
	</h1>
    </div>
    @if (count($offerings) == 0) 
	<h2>Oh no, you don't have any courses!</h2>
    @else
	<table class="table table-hover">
	    <thead>
		<th>Course ID</th>
		<th>Section</th>
		<th>Title</th>
		<th>Year</th>
		<th>Credits</th>
	    </thead>	
	    <tbody>
		    @foreach($offerings as $offering)
			<tr>
			    <td>{{ $offering->cid }}</td>
			    <td>{{ $offering->section }}</td>
			    <td>{{ Course::get_name($offering->cid) }}</td>
			    <td>{{ $offering->year }}</td>
			    <td>{{ Course::get_credits($offering->cid) }}</td>
			</tr>
		    @endforeach
	    </tbody>
	</table>
    @endif
@endsection
