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
	    </h1>
    </div>
    <button class="btn btn-primary">Create a new request</button>
    <table class="table table-hover">
    <thead>
	<tr>
	    <th>Course ID</th>
	    <th>Course</th>
	    <th>Status</th>
	</tr>
    </thead>
    <tbody>
	<tr>
	    <td>01:198:111</td>
	    <td><a href="#">Introduction to Computer Science</a></td>
	    <td><span class="label label-warning">Pending</span></td>
	</tr>
	<tr>
	    <td>01:198:112</td>
	    <td><a href="#">Data Structures</a></td>
	    <td><span class="label label-warning">Pending</span></td>
	</tr>
	<tr>
	    <td>01:198:211</td>
	    <td><a href="#">Computer Architecture</a></td>
	    <td><span class="label label-success">Accepted</span></td>
	</tr>
	<tr>
	    <td>01:198:214</td>
	    <td><a href="#">Systems Programming</a></td>
	    <td><span class="label label-important">Rejected</span></td>
	</tr>
	<tr>
	    <td>01:198:205</td>
	    <td><a href="#">Introduction to Discrete Structures I</a></td>
	    <td><span class="label label-success">Accepted</span></td>
	</tr>
    </tbody>
    </table>
@endsection
