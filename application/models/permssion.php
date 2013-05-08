<?php

class Permission {

    public static function create($number,$cid,$section) {
	$query = "INSERT INTO permission(number,cid,section) values('$number','$cid','$section');";
	return DB::query($query);
    }

}

?>
