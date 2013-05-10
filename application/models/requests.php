<?php

class Requests {

    public static function create($student, $course, $section, $comment, $rank, $reason, $status, $sp) {
	$query = "INSERT INTO request(student,course,section,comment,rank,reason,status,sp) values('$student','$course','$section','$comment',$rank,'$reason','$status','$sp');";
	return DB::query($query);
    }

    public static function update_rank($student, $course, $section, $rank) {
	$query = "UPDATE request SET rank=$rank where student='$student' AND course='$course' AND section='$section';";
	return DB::query($query);
    }

    public static function grant($student, $course, $section, $sp, $reason='') {
	$query = "UPDATE request SET status='granted', sp='$sp', reason='$reason' where student='$student' AND course='$course' AND section='$section';";
	return DB::query($query);
    }

    public static function deny($student, $course, $section, $reason='') {
	$query = "UPDATE request SET status='denied', reason='$reason', sp='' where student='$student' AND course='$course' AND section='$section';";
	return DB::query($query);
    }

    public static function get_all() {
	$query = "SELECT * FROM request;";
	return DB::query($query);
    }

    public static function get_user($user) {
	$query = "SELECT * FROM request where student='$user' ORDER BY created DESC;";
	return DB::query($query);
    }

    public static function get_by_status($course, $section, $status=null) {
	$query = '';
	if ($status == null) {
	    $query = "SELECT * FROM request where course='$course' AND section='$section';";
	} else {
	    $query = "SELECT * FROM request where course='$course' AND section='$section' AND status='$status';";
	}
	return DB::query($query);
    }

    public static function get_offering($cid,$section) {
	$query = "SELECT * FROM request where section='$section' AND course='$cid';";
	return DB::query($query);
    }

    /*
     * Returns all requests for that were granted, but expired because user didn't 
     * use the permission number in time
     */
    public static function get_expired($user) {
	$query = "SELECT * FROM request where student='$user' and status='expired';";
	return DB::query($query);
    }
}

?>
