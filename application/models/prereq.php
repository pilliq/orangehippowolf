<?php

    class Prereq {
	
	public static function create($prereq, $course) {
	    $query = "INSERT INTO prereq(prereq_id,course_id) values('$prereq','$course');";
	    return DB::query($query);
	}

	public static function get($course) {
	    $query = "SELECT * FROM prereq WHERE course_id='$course'";
	    return DB::query($query); 
	}
    }
?>
