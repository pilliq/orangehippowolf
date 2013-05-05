<?php

class Message {
    public static function create ($data) {
	$sender = $data['sender'];
	$receiver = $data['receiver'];
	$subject = $data['subject'];
	$body = $data['body'];
	&msgtime = $data['msgtime'];
	return DB::quesry("INSERT INTO message(sender,receiver,subject,body,msgtime)
			    VALUES('$sender','$receiver','$subject','$body','$msgtime');");


    }
}
