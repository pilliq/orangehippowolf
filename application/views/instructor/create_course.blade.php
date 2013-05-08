@layout('instructor/base')

@section('title')
    Add a Course
@endsection

@section('styles')
    @parent
@endsection

@section('content')
    <div class="page-header">
	<h1>
	    Add a Course
	</h1>
    </div>
    <div class="create-couse-form">
	<div class="area">
	    {{ Form::open('courses/create', 'POST', array('class' => 'form-horizontal')) }} 
		<div class="row-fluid">
		    <div class="span6">
			<div class="heading">
			    <h2 class="form-heading">Course Information</h2>
			</div>
			<div class="control-group">
			    <label class="control-label" for="inputCourse">Select a course</label>
			    <div class="controls">
				<select class="span11" name="course">
				    @foreach ($courses as $course) 
					<option>{{ $course->cid }}  {{ $course->title }}</option>
				    @endforeach
				</select>
			    </div>
			</div>
			<div class="control-group">
			    <label class="control-label" for="inputYear">Select a year</label>
			    <div class="controls">
				<select class="span3" name="courseYear">
				    <option>2013</option>
				    <option>2014</option>
				    <option>2015</option>
				    <option>2016</option>
				</select>
			    </div>
			</div>
			<div class="control-group">
			    <label class="control-label" for="inputSection">Section</label>
			    <div class="controls">
				<input type="text" class="span2" placeholder="e.g. 02"  name="courseSection"/>
			    </div>
			</div>
		    </div>
		    <div class="span6">
			<div class="heading">
			    <h2 class="form-heading">
				Ranking
				<small> Weight in order of importance with 1 being least important (leave blank for default)</small>
			    </h2>
			</div>
			<div class="control-group">
			    <label class="control-label" for="inputCreditsRemaining">Credits Remaining</label>
			    <div class="controls">
				<input type="text" class="span2" placeholder="" name="rankCreditsRemaining"/>
			    </div>
			</div>
			<div class="control-group">
			    <label class="control-label" for="inputCreditsRemaining">Courses Remaining</label>
			    <div class="controls">
				<input type="text" class="span2" placeholder="" name="rankMajor"/>
			    </div>
			</div>
			<div class="control-group">
			    <label class="control-label" for="inputCreditsRemaining">Declared Major</label>
			    <div class="controls">
				<input type="text" class="span2" placeholder="" />
			    </div>
			</div>
			<div class="control-group">
			    <label class="control-label" for="inputCreditsRemaining">GPA</label>
			    <div class="controls">
				<input type="text" class="span2" placeholder="" />
			    </div>
			</div>
			<div class="control-group">
			    <label class="control-label" for="inputCreditsRemaining">Prerequisite GPA</label>
			    <div class="controls">
				<input type="text" class="span2" placeholder="" />
			    </div>
			</div>
			<div class="control-group">
			    <label class="control-label" for="inputCreditsRemaining">Has other majors</label>
			    <div class="controls">
				<input type="text" class="span2" placeholder="" />
			    </div>
			</div>
			<div class="control-group">
			    <label class="control-label" for="inputCreditsRemaining">failed twice 111, 112, or 152</label>
			    <div class="controls">
				<input type="text" class="span2" placeholder="" />
			    </div>
			</div>
			<div class="control-group">
			    <label class="control-label" for="inputCreditsRemaining"># of times failed prequisites</label>
			    <div class="controls">
				<input type="text" class="span2" placeholder="" />
			    </div>
			</div>
			<div class="control-group">
			    <label class="control-label" for="inputCreditsRemaining"> Apllied for Special Permission Number but did not use</label>
			    <div class="controls">
				<input type="text" class="span2" placeholder="" />
			    </div>
			</div>

		    </div>
		</div>
		<div class="row-fluid">
		    <div class="span6">
			<div class="heading">
			    <h2 class="form-heading">
				Permission Numbers
				<small>(Optional)</small>
			    </h2>
			</div>
			@for ($i=0 ; $i < 10 ; $i++) 
			    <div class="control-group">
				<label class="control-label" for="inputNumbers">{{ $i+1 }}</label>
				<div class="controls">
				    <input type="text" class="span8" placeholder="" name="permission{{ $i }}"/>
				</div>
			    </div>
			@endfor
		    </div>
		    <div class="span6">
			<div class="heading">
			    <h2 class="form-heading">Room Information</h2>
			</div>
			<div class="control-group">
			    <label class="control-label" for="inputBuilding">Building</label>
			    <div class="controls">
				<select class="span11" name="roomBuilding">
				    <option></option>
				    @foreach ($buildings as $building) 
					<option>{{ $building->name }}</option>
				    @endforeach
				</select>
			    </div>
			</div>
			<div class="control-group">
			    <label class="control-label" for="inputRoom">Room Number</label>
			    <div class="controls">
				<input type="text" class="span3" placeholder="" name="roomNumber"/>
			    </div>
			</div>
			<div class="control-group">
			    <label class="control-label" for="inputCapacity">Capacity</label>
			    <div class="controls">
				<input type="text" class="span2" placeholder="" name="roomCapacity"/>
			    </div>
			</div>
		    </div>
		</div>
		<div class="row-fluid">
		    <div class="span6">
			<div class="heading">
			    <h2 class="form-heading">
				Pre-requisites
				<small>Select one or more Pre-reqs
			    </h2>
			</div>
			<div class="control-group">
			    <!--<label class="control-label" for="inputPrereq">Select all Prereqs</label> --!>
			    <div class="controls">
				<select multiple="multiple" class="span12" name="prereq">
				    @foreach ($courses as $course) 
					<option>{{ $course->cid }}  {{ $course->title }}</option>
				    @endforeach
				</select>
			    </div>
			</div>
		    </div>
		    </div>
		</div>
		<div class="form-actions">
		    <input type="submit" class="btn btn-primary" value="Create Course">
		    <a class="btn" href="{{ URL::to_route('courses') }}">Cancel</a>
		</div>
	    </form>
	</div>
    </div>
@endsection
