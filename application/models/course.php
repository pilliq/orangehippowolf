<?php

class Course {

    public static function get_all() {
	$query = "SELECT * FROM course ORDER BY cid";
	return DB::query($query);	
    }

    public static function get($id) {
	$query = "SELECT * FROM course WHERE cid='$id'";
	return DB::query($query);
    }

    public static function create_offering($cid, $year, $term, $section, $instructor) {
	$query = "INSERT INTO course_offering(cid,year,term,section,instructor) values('$cid','$year','$term','$section','$instructor');";
	return DB::query($query);
    }

    /* 
     * Returns true if given course with given section exists else returns false
     */
    public static function offering_exists($cid,$section) {
	$query = "SELECT * FROM course WHERE cid='$cid' AND section='$section';";
	$result = DB::query($query);
	if (count($result) == 0) {
	    return false;
	}
	return true;
    }

    /*
     * Checks if a course exists with given cid
     */
    public static function course_exists($cid) {
	$result = $this->get($cid);
	if (count($result) == 0) {
	    return false;
	}
	return true;
    }
}

?>
