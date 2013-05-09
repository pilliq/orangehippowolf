@layout('student/base')

@section('title')
    Requests Professor
@endsection

@section('styles')
    @parent
@endsection

@section('content')
    <div class="page-header">
	    <h1>
		Requests
		<a class="btn btn-primary pull-right" href="{{ URL::to_route('create_requests') }}"><i class="icon-plus icon-white"></i> Create a new request</a> 
	    </h1>
    </div>
    @if (count($requests) == 0)
	<h2>You don't have any requests!</h2>
    @else
	<table class="table table-hover">
	<thead>
	    <tr>
		<th>Date Requested</th>
		<th>Course ID</th>
		<th>Section</th>
		<th>Course</th>
		<th>Status</th>
	    </tr>
	</thead>
	<tbody>
	    @foreach ($requests as $request)
		<tr>
		<td>{{ $request->created }}</td>
		<td>{{ $request->course }}</td>
		<td>{{ $request->section }}</td>
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
    @endif
@endsection
