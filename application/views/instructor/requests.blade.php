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
		    <li class="active"><a href="#">New</a></li>
		    <li><a id="a" class="link" href="#">All</a></li>
		    <li><a id="b" class="link" href="#">By Course</a></li>
		    <li><a id="c" class="link" href="#">Granted</a></li>
		    <li><a id="d" class="link" href="#">Denied</a></li>
		</ul>
	    </div>
    </div>
	        <div class="span10">
	            <div class="">
		        <div class="page-header"><h2>All Requests</h2></div>
		        <h4>CS 112</h4>
                <div class="tab-content">
                    <div class="tab-pane active"  id="tab1">
                        <p>
                            <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Rank</th>
                                <th>RUID</th>
                                <th>Timestamp</th>
                                <th>Name</th>
                                <th>Comments</th>
                                <th>Special Permission Number</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr> 
                                <td>1</td>
                                <td>128005294</td>
                                <td>Joseph Calvano</td>
                                <td>Attended First Day of Class</td>
                                <td>
                                    <div class="row-fluid">
                                        <div class="span5"> 
                                                <select class="input-small">
                                                    <option>3456</option>
                                                    <option>1242</option>
                                                </select>
                                                Or input:
                                        </div>
                                        <div class="span4">
                                            <input class ="input-small" type="text" placeholder="Enter unlisted number" name="spnumber">
                                        </div>
                                        <div class="span2">
                                            <button class="btn-primary" type=submit">Assign</button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                            </table>
                        </p>
                    </div>
                </div>
                <h4>CS 112</h4>
                <div class="tab-content">
                    <div class="tab-pane active"  id="tab1">
                        <p>
                            <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Rank</th>
                                <th>RUID</th>
                                <th>Name</th>
                                <th>Comments</th>
                                <th>Special Permission Number</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr> 
                                <td>1</td>
                                <td>128005294</td>
                                <td>Joseph Calvano</td>
                                <td>Attended First Day of Class</td>
                                <td>
                                    <div class="row-fluid">
                                        <div class="span5"> 
                                                <select class="input-small">
                                                    <option>3456</option>
                                                    <option>1242</option>
                                                </select>
                                                Or input:
                                        </div>
                                        <div class="span4">
                                            <input class ="input-small" type="text" placeholder="Enter unlisted number" name="spnumber">
                                        </div>
                                        <div class="span2">
                                            <button class="btn-primary" type=submit">Assign</button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                            </table>
                        </p>
                    </div>
                </div>
	            </div>
            </div>
	</div>
    </div>
@endsection
