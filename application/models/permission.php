<?php

class Permission {

    public static function create($number,$cid,$section) {
	$query = "INSERT INTO permission(number,cid,section) values('$number','$cid','$section');";
	return DB::query($query);
    }

    public static function get($cid, $section) {
	$query = "SELECT * FROM permission WHERE cid='$cid' AND section='$section';";
	return DB::query($query);
    }

    public static function get_unassigned($cid, $section) {
	$permissions = Permission::get($cid, $section);
	$result = array();
	foreach ($permissions as $permission) {
	    if ($permission->assigned == '') {
		$result[] = $permission;
	    }
	}
	return $result;
    }
    public static function assign($sp, $cid, $section, $student) {
	$query = "UPDATE permission SET assigned='$student' WHERE cid='$cid' AND section='$section' AND number='$sp';";
	return DB::query($query);
    }

    public static function unassign($student, $cid, $section) {
	$query = "UPDATE permission SET assigned=null WHERE cid='$cid' AND section='$section' AND assigned='$student';";
	return DB::query($query);
    }

    public static function exists($sp, $cid, $section) {
	$permissions = Permission::get($cid, $section);
	foreach ($permissions as $permission) {
	    if ($permission->number == $sp) {
		return true;
	    }
	}
	return false;
    }

}

?>
