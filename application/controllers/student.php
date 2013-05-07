<?php

class Student_Controller extends Base_Controller {
    
    public $restful = true;

    public function get_home() {
	return View::make('student/home');
    }

}

?>
