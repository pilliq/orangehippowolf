<?php

class Building {

    public static function get_all() {
	$query = "SELECT * FROM building ORDER BY name;";
	return DB::query($query);	
    }

    public static function get_by_name($name) {
	$query = "SELECT * FROM building WHERE name='$name';";
	return DB::query($query);
    }

    public static function exists_by_name($name) {
	$result = Building::get_by_name($name);
	if (count($result) == 0) {
	    return false;
	}
	return $result[0]->code;
    }
}

?>
