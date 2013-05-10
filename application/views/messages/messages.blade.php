@layout('instructor/base')

@section('content')
    <div class="page-header">
	<h1>
	    Sent Messages
	    {{ Form::open('/messages/compose', 'POST', array('class' => 'form-inline pull-right', 'style' => '')) }} <button class="btn btn-primary" type="submit"><i class="icon-plus-white"></i> Compose a message</button>{{ Form::close() }}
	</h1>
    </div>
    @if (count($messages) == 0) 
	<h2>
	    You have no messages!
	    <small>Why don't you try to {{ Form::open('/messages/compose', 'POST', array('class' => 'form-inline', 'style' => 'margin: 0;')) }} <button class="btn-link" type="submit">compose a message</button>{{ Form::close() }} first?</small>
	</h2>
    @else
	<table class="table table-bordered">
	    <thead>
		<th>Sent</th>
		<th>Receivers</th>
		<th>Subject</th>
		<th>Message</th>
	    </thead>
	    <tbody>
		@foreach ($messages as $message)
		    <td>{{ $message->created }}</td>
		    <td>{{ $message->receivers }}</td>
		    <td>{{ $message->subject }}</td>
		    <td>{{ $message->body }}</td>
		@endforeach
	    </tbody>
	</table>
    @endif
@endsection
