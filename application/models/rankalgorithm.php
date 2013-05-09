<?php

    class RankAlgorithm {
	
	public static $passing_grade = 2;
	public static $highest_grade = 4;

	public static function create($attrs, $cid, $section) {
	    $query = "INSERT INTO 
		      rank_algorithm(cid,section,credits_completed,major_credits_completed,
				     declared_major,gpa,prereq_gpa,other_majors,failed_basic,
				     failed_prereq,no_use_permission) 
		      VALUES('$cid','$section',{$attrs['credits_completed']},{$attrs['major_credits_completed']},
		      {$attrs['declared_major']},{$attrs['gpa']},{$attrs['prereq_gpa']},
		      {$attrs['other_majors']},{$attrs['failed_basic']},{$attrs['failed_prereq']},
		      {$attrs['no_use_permission']})";
	    return DB::query($query);
	}

	public static function get($cid, $section) {
	    $query = "SELECT * FROM rank_algorithm WHERE cid='$cid' AND section='$section';";
	    return DB::query($query);
	}

	public static function rank($username, $cid, $section) {
	    $user = User::get($username);
	    $user = $user[0];
	    $student = Student::get_student($username); 
	    $student = $student[0];
	    $algo = RankAlgorithm::get($cid, $section);
	    $algo = $algo[0];

	    // is a cs major
	    $is_cs = 1;
	    if (!Major::has_cs($username)) {
		$is_cs = 0;
	    }

	    // prereq gpa. assuming all prereqs were taken or are being taken and none are failed
	    $prereq_gpa = 0;
	    $num_prereqs = 0;
	    $prereqs = Prereq::get($cid);
	    foreach ($prereqs as $prereq) {
		$registration = Registration::get($username, $prereq->prereq_id);
		$total = 0; 
		$times_taken = 0;
		foreach ($registration as $reg) { 
		    $total += $reg->grade;
		    $times_taken++;
		}		    
		if ($times_taken > 0) {
		    $prereq_gpa += ($total/$times_taken); // average gpa of all times student took prereq course
		    $num_prereqs++;
		} 
	    }
	    if ($num_prereqs > 0) {
		$prereq_gpa = $prereq_gpa / $num_prereqs; // take average gpa over all prereqs
	    } else {
		$prereq_gpa = self::$highest_grade;
	    }

	    // has other majors other than cs
	    $has_other = 0;
	    if (!Major::has_other($username)) {
		$has_other = 1;
	    }

	    // if they failed basic courses
	    $failed_basic = 0;
	    $basic_courses = array('01:198:111','01:198:112','01:640:152');
	    foreach ($basic_courses as $basic) {
		$i = 0;
		$registration = Registration::get($username, $basic);
		foreach ($registration as $reg) {
		    if (intval($reg->grade) < self::$passing_grade) {
			$i++;
		    }
		}
		if ($i >= 2) {
		    $failed_basic++;
		}
	    }

	    // expired permissions
	    $expireds = Requests::get_expired($username);
	    $num_expired = 0;
	    foreach ($expireds as $expired) {
		$num_expired++;	
	    }

	    $rank = intval($algo->credits_completed) * $student->credits +
		    intval($algo->major_credits_completed) * $student->majorcredits +
		    intval($algo->declared_major) * $is_cs +
		    intval($algo->gpa) * $student->gpa +
		    intval($algo->prereq_gpa) * $prereq_gpa -
		    intval($algo->other_majors) * $has_other -
		    intval($algo->failed_basic) * $failed_basic -
		    intval($algo->no_use_permission) * $num_expired;

	    return $rank;
	}
    }
?>
