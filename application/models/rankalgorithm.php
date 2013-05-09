<?php

    class RankAlgorithm {
	
	public static function create($attrs, $cid, $section) {
	    $query = "INSERT INTO rank_algorithm(cid,section,credits_completed,major_credits_completed,declared_major,gpa,prereq_gpa,other_majors,failed_basic,failed_prereq,no_use_permission) values('$cid','$section',{$attrs['credits_completed']},{$attrs['major_credits_completed']},{$attrs['declared_major']},{$attrs['gpa']},{$attrs['prereq_gpa']},{$attrs['other_majors']},{$attrs['failed_basic']}.{$attrs['failed_prereq']},{$attrs['no_use_permission']})";
	}

	public static function get($cid, $section) {
	    $query = "SELECT * FROM rank_algorithm WHERE cid='$cid' AND section='$section';";
	    return DB::query($query);
	}
    }
?>
