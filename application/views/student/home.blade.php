@layout('student/base')

@section('title')
    Requests Professor
@endsection

@section('styles')
    @parent
@endsection

@section('content')
    @if (Session::has('sucess'))
	<div class="alert alert-success">
	    {{ Session::get('success') }}
	</div>
    @endif
    <div class="page-header">
	    <h1>
		Requests
	    </h1>
    </div>
    <a href="{{ URL::to_route('create_requests') }}" class="btn btn-primary">Create a new request</a>
    <table class="table table-hover">
    <thead>
	<tr>
	    <th>Course ID</th>
	    <th>Course</th>
	    <th>Status</th>
	</tr>
    </thead>
    <tbody>
	@foreach ($requests as $request)
	    <tr>
	    <td>{{ $request->course }}</td>
	    <td>{{ Course::get_name($request->course) }}</td>
	    <td>
		@if ($request->status == 'granted')
		    <span class="label label-success">Granted</span>
		@elseif ( $request->status == 'denied') 
		    <span class="label label-important">Denied</span>
		@elseif ( $request->status == 'inactive') 
		    <span class="label">Inactive</span>
		@elseif ( $request->status == 'pending') 
		    <span class="label label-warning">Pending</span>
		@elseif ( $request->status == 'expired') 
		    <span class="label label-inverse">Expired</span>
		@endif
	    </td>
	    </tr>
	@endforeach
    </tbody>
    </table>
@endsection
