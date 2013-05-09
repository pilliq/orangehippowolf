<?php

    class Major {
	
	public static function create($user,$major) {
	    $query = "INSERT INTO major(student,major) values('$user','$major');";
	    return DB::query($query);
	}

	public static function get($user) {
	    $query = "SELECT * FROM major where student='$user';";
	    return DB::query($query);
	}

	public static function has_cs($user) {
	    $result = Major::get($user);
	    foreach ($result as $entry) {
		if (in_array(strtolower($entry->major), array('cs','computer science','comp sci'))) {
		    return true;
		}
	    }
	    return false;
	}

	/* 
	 * Returns true if student has a major other than cs, or other majors in addition to cs
	 * else returns false
	 */
	public static function has_other($user) {
	    $result = Major::get($user);

	    if (count($result) == 0) return false; //in case they didn't specify a major

	    foreach ($result as $entry) {
		if (!in_array(strtolower($entry->major), array('cs','computer science','comp sci'))) {
		    return true;
		}
	    }
	    return false;
	}
    }
?>
