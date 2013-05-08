<?php

class Student_Controller extends Base_Controller {
    
    public $restful = true;

    public function get_home() {
	$user = Session::get('username');
	$data['requests'] = Request::get_user($user);
	return View::make('student/home', $data);
    }
    public function get_create_request() {
	//$data['courses'] = Course::get_all();
	$data['courses'] = Course::get_all_offerings();
        return View::make('student/create_request', $data);
    } 

    public function post_create_request() {
	$course = Input::get('course', '');
	if ($course == '') {
	    return Redirect::back()->with('error', 'A course must be selected');
	}
	$parts = explode(' ', $course);
	$cid = $parts[0];
	$section = $parts[2];
	$comments = Input::get('comments', '');
	$user = Session::get('username');
	if(!Requests::create($user,$cid,$section,$comments,'pending','')) {
	    return Redirect::back()->with('error', 'Could not create request');
	}
	return Redirect::to_route('index')->with('success', 'Successfully made request');
    }

    private function rank($username, $cid, $section) {
	//$user = User::get($username);
	//$algo = RankAlgorithm::get($cid, $section);
	//$algo[0]->credits_completed*$user[0]->credits+$algo[0]->major_credits_completed*$user[0]->majorCredits+$algo[0]->declared_major*+$algo[0]->gpa*$user[0]->gpa+$algo[0]->prereq_gpa*+$algo[0]->other_majors*+$algo[0]->failed_basic*+$algo[0]->no_use_permission;

	//$user[0]->credits;
	//$user[0]->majorCredits;
	//$user[0]->gpa;
    

    }
}

?>
