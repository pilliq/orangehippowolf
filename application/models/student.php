<?php

class Student extends User {

    public static function create($data) {
	$data['instructor'] = 0;
	User::create($data);

	$ruid = $data['ruid'];
	$username = $data['username'];
	DB::query("INSERT INTO student(ruid,netid) values('$ruid','$username');");
    }
}

?>
