<?php

class Message {

    public static function create($sender, $receivers, $subject, $message) {
	$query = "INSERT INTO messages(sender,receivers,subject,body) values('$sender','$receivers','$subject','$message');";
	return DB::query($query);
    }

    public static function get($sender) {
	$query = "SELECT * FROM messages WHERE sender='$sender';";
	return DB::query($query);
    }
}
