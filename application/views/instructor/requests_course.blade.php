@layout('instructor/base')

@section('title')
    Home
@endsection

@section('styles')
    @parent
@endsection

@section('content')
    <div class="container-fluid">
	<div class="row-fluid">
	    <div class="span2">
		<div class="well sidebar-nav" style="padding: 8px 0;">
		    <ul class="nav nav-list">
			<li class="nav-header">Requests</li>
			<li class=""><a href="#">New</a></li>
			<li><a id="a" class="link" href="#">All</a></li>
			<li class="active"><a class="link" href="{{ URL::to_route('requests_course') }}">By Course</a></li>
			<li><a id="c" class="link" href="#">Granted</a></li>
			<li><a id="d" class="link" href="#">Denied</a></li>
		    </ul>
		</div>
	    </div>
	    <div class="span10">
		<div class="page-header"><h2>Requests by Course</h2></div>
		@if (count($requests) == 0)
		    <h2>
			You don't have any courses
			<small>Why don't you <a href="{{ URL::to_route('create_courses') }}">create a course</a> first?</small> 
		    </h2>
		@else
		    @foreach ($requests as $course => $sections)
			<div class="control-group">
			<h3>{{ $course }} {{ Course::get_name($course) }}</h3>
			@foreach ($sections as $section => $section_requests)
			    <h4>Section {{ $section }}</h4>
			    @if (count($section_requests) == 0)
				<div class="well" style="text-align: center;">
				    <h3>No Requests</h3>
				</div>
			    @else 
				<table class="table table-hover table-bordered">
				    <thead>
					<tr>
					    <th>Rank Score</th>
					    <th>Netid</th>
					    <th>Comments</th>
					    <th>Status</th>
					    <th>Action</th>
					</tr>
				    </thead>
				    <tbody>
				@foreach($section_requests as $request)
					<tr> 
					    <td>{{ $request->rank }}</td>
					    <td>{{ $request->student }}</td>
					    <td>{{ $request->comment }}</td>
					    @if ($request->status == 'granted')
						<td><span class="label label-success">Granted</span></td>
					    @elseif ($request->status == 'denied')
						<td><span class="label label-important">Denied</span></td>
					    @elseif ($request->status == 'pending')
						<td><span class="label label-warning">Pending</span></td>
					    @elseif ($request->status == 'inactive')
						<td><span class="label">Inactive</span></td>
					    @elseif ($request->status == 'expired')
						<td><span class="label label-inverse">Expired</span></td>
					    @endif
					    <td class="span6">
						{{ Form::open('/requests/action', 'POST', array('class' => "form-inline", 'style' => "margin: 0;")) }}
						    <select class="input-small" name="sp">
							<option>Select #</option>
							@foreach (Permission::get_unassigned($course, $section) as $permission)
							    <option>{{ $permission->number }}</option>
							@endforeach
						    </select>
						    Or
						    <input class="input-small" type="text" placeholder="Enter unlisted" name="unlisted">
						    @if ($request->status == 'granted')
							<button class="btn btn-success" disabled type=submit name="action" value="assign">Assign</button>
						    @else 
							<button class="btn btn-success" type=submit name="action" value="assign">Assign</button>
						    @endif
						    @if ($request->status == 'denied')
							<button class="btn btn-danger" disabled type=submit" name="action" value="deny">Deny</button>
						    @else
							<button class="btn btn-danger" type=submit" name="action" value="deny">Deny</button>
						    @endif
						    <input type="hidden" name="student" value="{{ $request->student }}" />
						    <input type="hidden" name="course" value="{{ $course }}" />
						    <input type="hidden" name="section" value="{{ $section }}" />
						{{ Form::close() }}
					    </td>
					</tr>
				@endforeach
				    </tbody>
				</table>
			    @endif
			@endforeach
			</div>
		    @endforeach
		@endif
	    </div>
	</div>
    </div>
@endsection
