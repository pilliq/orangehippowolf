@layout('instructor/base')

@section('title')
    Courses
@endsection

@section('styles')
    @parent
@endsection

@section('content')
    <div class="page-header">
	<h1>My Courses
	    <a class="btn btn-primary pull-right" href="{{ URL::to_route('create_courses') }}"><i class="icon-plus icon-white"></i> Add a new course</a>
	</h1>
    </div>
    <table class="table table-hover">
	<thead>
	    <th>Course ID</th>
	    <th>Title</th>
	    <th>Credits</th>
	</thead>	
	<tbody>
	    <tr>
		<td>01:198:111</td>
		<td>Introduction to Computer Science</td>
		<td>4</td>
	    </tr>
	    <tr>
		<td>01:198:112</td>
		<td>Data Structures</td>
		<td>4</td>
	    </tr>
	    <tr>
		<td>01:198:214</td>
		<td>Systems Programming</td>
		<td>4</td>
	    </tr>
	</tbody>
    </table>
@endsection
