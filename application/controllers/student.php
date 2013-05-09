<?php

class Student_Controller extends Base_Controller {
    
    public $restful = true;

    /*
     * Returns a ranking and a reason for the ranking.
     * If the reason is an empty string, ranking is a normal ranking
     * If the ranking is -1, the request should be denied with returned reason
     */
    private static function rank($username, $cid, $section) {
	$prereqs = Prereq::get($cid);
	foreach ($prereqs as $prereq) {
	    $registration = Registration::get($username, $prereq->prereq_id);

	    if (count($registration) == 0) { // student has not taken prereq yet
		return array(-1, "Student has not taken pre-requisite course {$prereq->prereq_id}");	
	    }

	    $failed = 0;
	    foreach ($registration as $reg) { // see if student has failed the course once and not retaken it
		if (intval($reg->grade) < RankAlgorithm::$passing_grade) {
		    $failed++; 
		} else {
		    $failed--; // either took and passed, or retaken and passed
		}
	    }
	    if ($failed > 0) {
		return array(-1, "Student has failed pre-requisite course {$prereq->prereq_id}");
	    }
	}

	$rank = RankAlgorithm::rank($username, $cid, $section);
	return array($rank, '');
    }

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
	$username = Session::get('username');
	$status = 'pending';
	$rank = self::rank($username, $cid, $section);
	$reason = $rank[1];
	if ($rank[0] == -1) {
	    $status = 'denied';
	}
	if(!Requests::create($username,$cid,$section,$comments,$rank[0],$reason,$status,'')) {
	    return Redirect::back()->with('error', 'Could not create request');
	}
	return Redirect::to_route('index')->with('success', 'Successfully created request');
    }

}

?>
