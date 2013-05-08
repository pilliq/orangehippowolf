<?php

class Account_Controller extends Base_Controller {
    
    public $restful = true;

    public function get_profile() {
	return View::make('account/profile');
    }

    public function get_login() {
	return View::make('account/login')->with(Input::old());
    }

    public function post_login() {
	$creds = array(
	    'username' => Input::get('username'),
	    'password' => Input::get('password')
	);

	if (Auth::attempt($creds)) {
	    $user = Auth::retrieve($creds['username']);
	    Session::put('username', $creds['username']);
	    Session::put('instructor', $user->instructor);
	    //return ($user->instructor==1)?Redirect::to_route('index');
	    return Redirect::to_route('index');
	} else {
	    return Redirect::to_route('login')->with('error', 'Username or password is incorrect');
	}
    }

    public function post_logout() {
	Auth::logout();
	Session::forget('username');
	Session::forget('instructor');
	return Redirect::to_route('index');
    }

    public function get_signup() {
	return View::make('account/signup');
    }

    public function get_signup_instructor() {
	return View::make('account/signup_instructor');
    }

    public function get_signup_student() {
	return View::make('account/signup_student');
    }

    public function post_signup_instructor() {
	$password = Input::get('password');
	$password2 = Input::get('password2');
	if ($password != $password2 || $password == '') {
	    return Redirect::to_route('signup_instructor')->with('error', 'Passwords do not match');
	}

	$data = array(
	    'first_name' => Input::get('first_name', 'John'),
	    'last_name' => Input::get('last_name', 'Doe'),
	    'department' => Input::get('department', 'Computer Science'),
	    'username' => Input::get('netid', 'jdoe'),
	    'email' => Input::get('email', 'jdoe@gmail.com'),
	    'password' => $password
	);

	$result = Instructor::create($data);

	return Redirect::to_route('login');
    }

    public function post_signup_student() {
	$password = Input::get('password');
	$password2 = Input::get('password2');
	if ($password != $password2 || $password == '') {
	    return Redirect::to_route('signup_student')->with('error', 'Passwords do not match');
	}
	
	$data = array(
	    'first_name' => Input::get('first_name', 'John'),
	    'last_name' => Input::get('last_name', 'Doe'),
	    'ruid' => Input::get('ruid', '000000000'),
	    'username' => Input::get('netid', 'jdoe'),
	    'email' => Input::get('email', 'jdoe@gmail.com'),
	    'password' => Input::get('password'),
	    'gradmonth' => Input::get('gradmonth', 'January'),
	    'gradyear' => Input::get('gradyear', 2013),
	    'gpa' => Input::get('gpa', 0.000),
	    'credits' => Input::get('credits', 0),
	    'major_credits' => Input::get('major_credits', 0),
	    'major' => Input::get('major', 'CS')
	);

	$result = Student::create($data);

	return Redirect::to_route('login');
    }

}

?>
