@layout('base')

@section('styles')
    @parent
    {{ HTML::style('css/session.css') }}
@endsection

@section('top-nav')
    <div class="pull-right">
	{{ Form::open('logout', 'POST', array('class' => 'navbar-form link')) }}
	    <button class="btn logout" type="submit" value="Logout" name="logout">Logout</button> 
	{{ Form::close() }}
    </div>
@endsection
