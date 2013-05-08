@layout('student/base')

@section('title')
    Home
@endsection

@section('styles')
    @parent
@endsection

@section('content')
    <div class="page-header">
    <h1>Request Special Permission Number</h1>
    </div>
    <div class = "request-sp-form">
    <div class="area">
{{ Form::open('requests/create', 'POST', array('id' => 'create_request','class' => 'form-horizontal')) }}

        <div class="row-fluid">
        <div class="heading">
            <h2 class="form-heading">Make Request</h2>
        </div>
       <!-- <div class="control-group">
            <label class="control-label" for="inputYear">Select a year</label>
            <div class="controls">
            <select class="span3" name="courseYear">
                @foreach ($courses as $course)
                <option> {{ $course->year}}</option>
                @endforeach
            </select>
            </div>
        </div> --!>
        <div class="control-group">
            <label class="control-label" for="inputCourse">Select a course</label>
            <div class="controls">
            <select class="span11" name="course">
                @foreach  ($courses as $course)
                <option>{{ $course->cid }}  {{ $course->title }} {{ $course->section }} {{ $course->year}}</option>
                @endforeach
            </select>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="inputComments">Comments</label>
            <div class="controls">
                <textarea class ="xlarge" type = "span6" rows="4" id="comments" name="comments"></textarea>
            </div>
        </div>
      <!--  <div class="control-group">
            <label class="control-label" for="inputSection">Select a section</label>
            <div class="controls">
            <select class="span3" name="section">
                @foreach  ($courses as $course)
                <option> {{ $course->section }}</option>
                @endforeach
            </select>
            </div>
            </div> --!>
        </div>
        </div>
        <div class="form-actions">
            <input type="submit" class="btn btn-primary" value="Create Request">
            <a class="btn" href="{{ URL::to_route('create_requests') }}">Cancel</a>

    </div>
    {{ Form::close() }}
    </div>
    </div>
@endsection
