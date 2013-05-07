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


}

?>
