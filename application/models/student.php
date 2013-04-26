<?php

class Student extends User {

    public static function create($data) {
	$data['instructor'] = 0;
	User::create($data);
	DB::query("INSERT INTO student(ruid,netid) values('$ruid','$username');");
    }
}

?>
