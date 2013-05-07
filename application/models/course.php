<?php

class Course {

    public static function get_all() {
	$query = "SELECT * FROM course ORDER BY cid";
	return DB::query($query);	
    }

    public static function get($id) {
	$query = "SELECT * FROM course WHERE cid='$id'";
	return DB::query($query);
    }
}

?>
