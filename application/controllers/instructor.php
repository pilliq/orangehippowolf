<?php

class Instructor_Controller extends Base_Controller {
    
    public $restful = true;

    public function get_all_requests() {
	$user = Session::get('username');
	$data['courses'] = Course::get_by_instructor($user);
	//$data['requests'] = Requests::get_offering();
	return View::make('instructor/requests');
    }

    public function get_courses() {
	$user = Session::get('username');
	$data['offerings'] = Course::get_by_instructor($user);
	return View::make('instructor/courses', $data);
    }
    
    public function get_create_course() {
	$data['courses'] = Course::get_all();
	$data['buildings'] = Building::get_all();
	return View::make('instructor/create_course', $data);
    }

    public function post_create_course() {
	/* course info */
	$parts = explode(' ', Input::get('course'));
	$cid = $parts[0];
	if (!Course::course_exists($cid)) {
	    return Redirect::back()->with('error', 'Course does not exist');
	}
	$section = Input::get('courseSection', '');
	if ($section == '') {
	    return Redirect::back()->with('error', 'Must provide a section for the course');
	}
	if (Course::offering_exists($cid,$section)) {
	    return Redirect::back()->with('error', 'A course with that section already exists');
	}
	$year = Input::get('courseYear');
	$term = "9"; // Don't know what this value is, but it's in the table given to use for next semester courses
	if (!Course::create_offering($cid, $year, $term, $section, Session::get('username'))) {
	    return Redirect::back()->with('error', 'Could not create a course');
	}
	
	/* permission numbers */
	for ($i = 0 ; $i < 10 ; $i++) {
	    $perm_num = Input::get('permission'.strval($i), '');
	    if(!$perm_num == '')  {
		Permission::create($perm_num,$cid,$section);
	    }
	}

	/* room info */
	$building = Input::get('roomBuilding');
	$code = Building::exists_by_name($building);
	if (!Building::exists_by_name($building)) {
	    return Redirect::back()->with('error', 'Building does not exist');
	}
	$room_num = Input::get('roomNumber', '');
	if ($room_num == '') {
	    return Redirect::back()->with('error', 'A room number is needed');
	}
	$capacity = Input::get('roomCapacity','');
	if ($capacity == '') {
	    return Redirect::back()->with('error', 'A capacity is needed');
	}
	if (!Room::create($room_num,$code,$capacity)) {
	    return Redirect::back()->with('error', 'Could not create a room');
	}
	
	/* ranking info */
	$ranks = array();
	$default_ranks = array('credits_completed' => 1,
			       'major_credits_completed' => 2,
			       'declared_major' => 3,
			       'gpa' => 4,
			       'prereq_gpa' => 5,
			       'other_majors' => 6,
			       'failed_basic' => 7,
			       'failed_prereq' => 8,
			       'no_use_permission' => 9
			       );

	foreach ($default_ranks as $attr => $default_rank) {
	    $rank = Input::get("rank".$attr, '');
	    if ($rank === '') {
		$rank = $default_rank;
	    }
	    $ranks[$attr] = $rank;
	}
	if (!RankAlgorithm::create($ranks,$cid,$section)) {
	    return Redirect::back()->with('error', 'Could not create a rank algorithm');
	}
	
	/* prereqs */
	$prereqs = Input::get('prereq');
	foreach($prereqs as $prereq) {
	    if (!Prereq::create($prereq, $cid)) {
		return Redirect::back()->with('error', "Could not add prereq $prereq");
	    }
	}

	return Redirect::to_route('courses')->with('success', 'Successfully added a course!');
    }

}

?>
