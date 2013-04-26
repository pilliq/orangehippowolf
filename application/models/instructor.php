<?php

class Instructor extends User {

    public static function create($data) {
	$data['instructor'] = 1;
	if(!User::create($data)) {
	    return false;    
	}
	$username = $data['username'];
	$department = $data['department'];
	return DB::query("INSERT INTO instructor(netid,department) values('$username','$department');");
    }
}

?>
