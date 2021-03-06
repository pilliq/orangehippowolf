<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Simply tell Laravel the HTTP verbs and URIs it should respond to. It is a
| breeze to setup your application using Laravel's RESTful routing and it
| is perfectly suited for building large applications and simple APIs.
|
| Let's respond to a simple GET request to http://example.com/hello:
|
|		Route::get('hello', function()
|		{
|			return 'Hello World!';
|		});
|
| You can even respond to more than one URI:
|
|		Route::post(array('hello', 'world'), function()
|		{
|			return 'Hello World!';
|		});
|
| It's easy to allow URI wildcards using (:num) or (:any):
|
|		Route::put('hello/(:any)', function($name)
|		{
|			return "Welcome, $name.";
|		});
|
*/

Route::group(array('before' => 'auth'), function() {
    Route::get('/', array('as' => 'index', 'do' => function() {
	if (Session::get('instructor') == 1) {
	    return Redirect::to_route('requests_course');
	} else {
	    $user = Session::get('username');
	    $data['requests'] = Requests::get_user($user); 
	    return View::make('student.home', $data);
	}
    }));

    Route::get('/requests/1', function() {
	return View::make('instructor/request');
    });

    Route::get('/requests/course', array('as' => 'requests_course', 'uses' => 'instructor@course_requests'));
    Route::get('/requests', array('as' => 'requests', 'do' => function() {
	return Redirect::to_route('requests_course');	
    }));
    Route::get('/requests/create', array('as' => 'create_requests', 'uses' => 'student@create_request'));
    Route::get('/courses', array('as' => 'courses', 'uses' => 'instructor@courses'));
    Route::get('/courses/create', array('as' => 'create_courses', 'uses' => 'instructor@create_course'));

    Route::post('/requests/create', array('uses' => 'student@create_request'));
    Route::post('/courses/create', array('uses' => 'instructor@create_course'));
    Route::post('/requests/action', array('uses' => 'instructor@requests_action'));

    Route::get('/profile', array('as' => 'profile', 'uses' => 'account@profile'));
    Route::get('/messages', array('as' => 'messages', 'uses' => 'messages@messages'));

    Route::post('/messages/compose', array('as' => 'messages_compose', 'uses' => 'messages@compose'));
    Route::post('/messages/create', array('uses' => 'messages@create'));

});

Route::get('tmp', function() {
    return View::make('tmp');
});
Route::get('signup', array('as' => 'signup', 'uses' => 'account@signup'));
Route::get('signup/instructor', array('as' => 'signup_instructor', 'uses' => 'account@signup_instructor'));
Route::get('signup/student', array('as' => 'signup_student', 'uses' => 'account@signup_student'));
Route::get('login', array('as' => 'login', 'uses' => 'account@login'));


Route::post('signup/instructor', array('uses' => 'account@signup_instructor'));
Route::post('signup/student', array('uses' => 'account@signup_student'));
Route::post('login', array('uses' => 'account@login'));
Route::post('logout', array('as' => 'logout', 'uses' => 'account@logout'));

/*
|--------------------------------------------------------------------------
| Application 404 & 500 Error Handlers
|--------------------------------------------------------------------------
|
| To centralize and simplify 404 handling, Laravel uses an awesome event
| system to retrieve the response. Feel free to modify this function to
| your tastes and the needs of your application.
|
| Similarly, we use an event to handle the display of 500 level errors
| within the application. These errors are fired when there is an
| uncaught exception thrown in the application.
|
*/

Event::listen('404', function()
{
	return Response::error('404');
});

Event::listen('500', function()
{
	return Response::error('500');
});

/*
|--------------------------------------------------------------------------
| Route Filters
|--------------------------------------------------------------------------
|
| Filters provide a convenient method for attaching functionality to your
| routes. The built-in before and after filters are called before and
| after every request to your application, and you may even create
| other filters that can be attached to individual routes.
|
| Let's walk through an example...
|
| First, define a filter:
|
|		Route::filter('filter', function()
|		{
|			return 'Filtered!';
|		});
|
| Next, attach the filter to a route:
|
|		Route::get('/', array('before' => 'filter', function()
|		{
|			return 'Hello World!';
|		}));
|
*/

Route::filter('before', function()
{
	// Do stuff before every request to your application...
});

Route::filter('after', function($response)
{
	// Do stuff after every request to your application...
});

Route::filter('csrf', function()
{
	if (Request::forged()) return Response::error('500');
});

Route::filter('auth', function()
{
	if (Auth::guest()) return Redirect::to('login');
});
