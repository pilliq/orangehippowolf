<?php

class Requests {

    public static function create($student, $course, $section, $comment, $status,$sp) {
	$query = "INSERT INTO request(student,course,section,comment,status,sp) values('$student','$course','$section','$comment','$status','$sp');";
	return DB::query($query);
    }

    public static function get_all() {
	$query = "SELECT * FROM request;";
	return DB::query($query);
    }

    public static function get_user($user) {
	$query = "SELECT * FROM request where student='$user';";
	return DB::query($query);
    }

    public static function get_offering($cid,$section) {
	$query = "SELECT * FROM request where section='$section' course='$cid';";
	return DB::query($query);
    }

}

?>
