<?php

    class Registration {
	
	public static function get($user, $cid) {
	    $student = Student::get_student($user);
	    $ruid = $student[0]->ruid;
	    $pieces = explode(':', $cid); // e.g. 01:198:205
	    $unit = $pieces[0];
	    $subject = $pieces[1];
	    $course = $pieces[2];
	    $query = "SELECT * FROM registration 
		      where RU_ID='$ruid' AND 
		            UNIT_CD='$unit' AND 
		            SUBJ_CD='$subject' AND 
		            COURSE_NO='$course';";
	    return DB::query($query);
	}
    }
?>
