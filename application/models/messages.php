<?php

class Message {
    public static function create ($data) {
	$mid = $mid['mid'];
	$sender = $data['sender'];
	$receiver = $data['receiver'];
	$subject = $data['subject'];
	$body = $data['body'];
	$created = $data['created'];
	return DB::query("INSERT INTO message(sender,receiver,subject,body,msgtime)
			    VALUES('$sender','$receiver','$subject','$body','$created');");


    }
}
