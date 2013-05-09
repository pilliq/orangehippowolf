@layout('base')

@section('title')
    Signup
@endsection

@section('content')
    <div class="page-header">
	<h1>Create a Student Account</h1>
    </div>
    <div class="signup-form">
	<div class="area">
	    {{ Form::open('signup/student', 'POST', array('class' => 'form-horizontal')) }}
		<div class="row-fluid">
		    <div class="span6">
			<div class="heading">
			    <h2 class="form-heading">Account Information</h2>
			</div>
			<div class="control-group">
			    <label class="control-label" for="inputfirstName">First Name</label>
			    <div class="controls">
				<input type="text" placeholder="e.g. John" name="first_name" />
			    </div>
			</div>
			<div class="control-group">
			    <label class="control-label" for="inputlastName">Last Name</label>
			    <div class="controls">
				<input type="text" placeholder="e.g. Doe" name="last_name" />
			    </div>
			</div>
			<div class="control-group">
			    <label class="control-label" for="inputRUID">RUID</label>
			    <div class="controls">
				<input type="text" placeholder="e.g. 127005821" name="ruid" />
			    </div>
			</div>
			<div class="control-group">
			    <label class="control-label" for="inputnetid">NetId</label>
			    <div class="controls">
				<input type="text" placeholder="e.g. jdoe" name="netid" />
			    </div>
			</div>
			<div class="control-group">
			    <label class="control-label" for="inputEmail">Email</label>
			    <div class="controls">
				<input type="text" placeholder="e.g. jdoe@gmail.com" name="email" />
			    </div>
			</div>
			<div class="control-group">
			    <label class="control-label" for="inputPassword">Password</label>
			    <div class="controls">
				<input type="password" placeholder="" name="password" />
			    </div>
			</div>
			<div class="control-group">
			    <label class="control-label" for="inputPassword2">Retype Password</label>
			    <div class="controls">
				<input type="password" placeholder="" name="password2" />
			    </div>
			</div>
		    </div>
		    <div class="span6">
			<div class="heading">
			    <h2 class="form-heading">Academic Information</h2>
			</div>
			<div class="control-group">
			    <label class="control-label" for="inputGraduation">Graduation Date</label>
			    <div class="controls">
				<select class="span5" name="gradmonth">
				    <option>January</option>
				    <option>February</option>
				    <option>March</option>
				    <option>April</option>
				    <option>May</option>
				    <option>June</option>
				    <option>July</option>
				    <option>August</option>
				    <option>September</option>
				    <option>October</option>
				    <option>November</option>
				    <option>December</option>
				</select>
				<select class="span3" name="gradyear">
				    <option>2013</option>
				    <option>2014</option>
				    <option>2015</option>
				    <option>2016</option>
				    <option>2017</option>
				</select>
			    </div>
			</div>
			<div class="control-group">
			    <label class="control-label" for="inputGPA">GPA</label>
			    <div class="controls">
				<input type="text" placeholder="e.g. 3.692" class="span3" name="gpa" />
			    </div>
			</div>
			<div class="control-group">
			    <label class="control-label" for="inputCredits">Credits Completed</label>
			    <div class="controls">
				<input type="text" class="span3" placeholder="e.g. 40" name="credits" />
			    </div>
			</div>
			<div class="control-group">
			    <label class="control-label" for="inputMajorCredits">Major Credits Completed</label>
			    <div class="controls">
				<input type="text" placeholder="e.g. 28" class="span3" name="major_credits" />
			    </div>	
			</div>
	    		<div class="control-group">
			    <label class="control-label" for="inputMajor">Major</label>
			    <div class="controls majors">
				<input type="text" placeholder="e.g. Computer Science" name="major0" />
				<a href="#" class="btn btn-link" id="addMajor">Add another major</a>
			    </div>
			</div>	
			</div>
		    </div>
		</div>
		<div class="form-actions">
		    <button class="btn btn-primary" type="submit">Sign up</button>
		    <a class="btn" href="{{ URL::to_route('index') }}">Cancel</a>
		</div>
	    {{ Form::close() }}
	</div>
    </div>
@endsection
@section('scripts')
    @parent
    <script type="text/javascript">
	$(document).ready(function() {
	    var i = 1;
	    $(document).on('click', '#addMajor', function() {
		$('<div><input type="text" placeholder="" name="major'+i+'" /> <a href="#" class="btn btn-link" id="remMajor">Remove</a></div>')
		.appendTo('div.majors');
		i++;
	    });		
	    $(document).on('click', '#remMajor', function() {
		if (i > 1) {
		    $(this).parent().remove();
		    i--;
		} 
	    });
	});
    </script>
@endsection
