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
	<div class="span3">
	    <div class="well sidebar-nav" style="padding: 8px 0;">
		<ul class="nav nav-list">
		    <li class="nav-header">Requests</li>
		    <li class="active"><a href="#">New</a></li>
		    <li><a href="#">All</a></li>
		    <li><a href="#">By Course</a></li>
		    <li><a href="#">Granted</a></li>
		    <li><a href="#">Denied</a></li>
		</ul>
	    </div>
	</div>
	<div class="span9">
	    <div class="">
		<h2>All Requests</h2>
		<ul class="nav nav-tabs">
		    <li class="active"><a href="#">Course</a></li>
		    <li><a href="#">Home</a></li>
		    <li><a href="#">Hi</a></li>
		</ul>
	    </div>
	</div>
	</div>
    </div>
@endsection
