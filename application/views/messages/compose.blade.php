@layout('instructor/base')

@section('content')
    <div class="page-header">
	<h1>Compose a message</h1>
    </div>
    {{ Form::open('/messages/create', 'POST', array('class' => 'form-horizontal')) }}
	<div class="control-group">
	    <label class="control-label" for="inputTo">To:</label>
	    <div class="controls">
		<input class="span6" type="text" placeholder="e.g. jdoe@gmail.com jane@gmail.com" name="receivers" value="{{ implode(' ', $emails) }}"/>
	    </div>
	</div>	
	<div class="control-group">
	    <label class="control-label" for="inputSubject">Subject:</label>
	    <div class="controls">
		<input class="span6" type="text" name="subject" />
	    </div>
	</div>	
	<div class="control-group">
	    <label class="control-label" for="inputBody">Message:</label>
	    <div class="controls">
		<textarea class="span9" type="text" name="message" rows="10"></textarea>
	    </div>
	</div>	
	<div class="form-actions">
	    <button class="btn btn-primary" type="submit">Send</button>
	    <a class="btn" href="{{ URL::to_route('requests_course') }}">Cancel</a>
	</div>
    {{ Form::close() }}
@endsection
