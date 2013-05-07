<?php

class Building {

    public static function get_all() {
	$query = "SELECT * FROM building ORDER BY name;";
	return DB::query($query);	
    }

    public static function get($id) {
	$query = "SELECT * FROM course WHERE code='$id';";
	return DB::query($query);
    }
}

?>
