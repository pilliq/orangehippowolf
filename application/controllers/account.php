<?php

class Account_Controller extends Base_Controller {
    
    public $restful = true;

    public function get_profile() {
	echo 'Profile';
    }

    public function get_login() {
	return View::make('account/login')->with(Input::old());
    }
    public function post_login() {
	$username = Input::get('username');
	$password = Input::get('password');
	$user = DB::query("select * from user where username='$username' and password='$password'");
	if (count($user) == 0) {
	    return Redirect::to_route('login')->with('status', 'Error logging in');
	} else {
	    echo 'Success';	
	}
    }

    public function post_logout() {
	echo 'Logout';
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
	$first_name = Input::get('first_name', 'John');
	$last_name = Input::get('last_name', 'Doe');
	$department = Input::get('department', 'Computer Science');
	$netid = Input::get('netid', 'jdoe');
	$email = Input::get('email', 'jdoe@gmail.com');
	$password = Input::get('password');
	$password2 = Input::get('password2');
	if ($password != $password2 || $password == '') {
	    return Redirect::to_route('login')->with('status', 'Password error');
	}
	DB::query("insert into user(username,password,email,first_name,last_name) values('$netid','$password','$email','$first_name','$last_name')");
	return Redirect::to_route('login');
    }

    public function post_signup_student() {
	$first_name = Input::get('first_name', 'John');
	$last_name = Input::get('last_name', 'Doe');
	$ruid = Input::get('ruid', '000000000');
	$netid = Input::get('netid', 'jdoe');
	$email = Input::get('email', 'jdoe@gmail.com');
	$password = Input::get('password');
	$password2 = Input::get('password2');
	if ($password != $password2 || $password == '') {
	    return Redirect::to_route('login')->with('status', 'Password error');
	}
	DB::query("insert into user(username,password,email,first_name,last_name) values('$netid','$password','$email','$first_name','$last_name')");
	return Redirect::to_route('login');
    }

}

?>
