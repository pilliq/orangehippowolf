<?php

class Instructor_Controller extends Base_Controller {
    
    public $restful = true;

    public function get_requests() {
	return View::make('instructor/requests');
    }

    public function get_courses() {
	return View::make('instructor/courses');
    }
    
    public function get_create_course() {
	$data['courses'] = Course::get_all();
	$data['buildings'] = Building::get_all();
	return View::make('instructor/create_course', $data);
    }

    public function post_create_course() {
	var_dump(Input::all());
	return;

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
	    if(!$perm_num === '')  {
		Permission::create($perm_num,$cid,$section);
	    }
	}

	/* room info */
	$building = Input::get('roomBuilding');
	if (!Building::exists_by_name($building)) {
	    return Redirect::back()->with('error', 'Building does not exist');
	}
	$room_num = Input::get('roomNumber', '');
	if ($room_num === '') {
	    return Redirect::back()->with('error', 'A room number is needed');
	}
	$capacity = Input::get('roomCapacity','');
	if ($capacity === '') {
	    return Redirect::back()->with('error', 'A capacity is needed');
	}
	if (!Room::create($room_num,$building,$cacpacity)) {
	    return Redirect::back()->with('error', 'Could not create a room');
	}
	
	/* ranking info */
	/* prereqs */
    }

}

?>
