<?php

class Student extends User {

    public static function create($data) {
	$data['instructor'] = 0;
	User::create($data);

	$ruid = $data['ruid'];
	$username = $data['username'];
	$gradmonth = $data['gradmonth'];
	$gradyear = $data['gradyear'];
	$major_credits = $data['major_credits'];
	$credits = $data['credits'];
	$gpa = $data['gpa'];

	$query = "INSERT INTO student(ruid,netid,gradMonth,gradYear,majorCredits,credits,gpa) values($ruid,'$username','$gradmonth','$gradyear',$major_credits,$credits,$gpa);";
	Log::write('debug', $query);
	return DB::query($query);
    }
}

?>
