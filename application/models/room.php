<?php

class Room {

    public static function create($number, $building, $capacity) {
	$query = "INSERT INTO room(number,building,capacity) values('$number','$building',$capacity);";
	return DB::query($query);
    }

    /* 
     * Get all rooms from a building
     */
    public static function get_rooms($bid) {
	$query = "SELECT * FROM room WHERE building='$bid';";
	return DB::query($query);
    }

    /* 
     * Get info on a single room in a building
     */
    public static function get_room($bid,$number) {
	$query = "SELECT * FROM room WHERE building='$bid' and number='$number';";
	return DB::query($query);
    }
}

?>
