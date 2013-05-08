<?php

class Student_Controller extends Base_Controller {
    
    public $restful = true;

    public function get_home() {
	return View::make('student/home');
    }
    public function get_create_request() {
        return View::make('student/create_request', array('courses' => Course::get_all_offerings()));
    } 

}

?>
