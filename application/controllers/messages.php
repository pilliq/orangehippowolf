<?php

class Messages_Controller extends Base_Controller {
    
    public $restful = true;

    public function get_messages() {
	$data['messages'] = Message::get(Session::get('username'));
	return View::make('messages/messages', $data);
    }

    public function post_create() {
	$receivers = Input::get('receivers');
	$subject = Input::get('subject');
	$message = Input::get('message');
	$sender = Session::get('username');
	if (!Message::create($sender, $receivers, $subject, $message)) {
	    return Redirect::back()->with('error', 'Could not send message');
	}
	return Redirect::to_route('messages')->with('success', 'Message sent');
    }

    public function post_compose() {
	$types = array('pending', 'denied', 'granted', 'inactive', 'expired');
	$course = Input::get('course','');
	$section = Input::get('section','');
	$type = Input::get('who');
	$requests = null;

	if ($type == 'all') {
	    $requests = Requests::get_by_status($course, $section);
	} else if (!in_array($type, $types)) {
	    $requests = Requests::get_by_status($course, $section, $type);
	} 

	$data['emails'] = array();
	foreach ($requests as $req) {
	    $user = User::get($req->student);
	    $data['emails'][] = $user[0]->email;
	}
	
	return View::make('messages/compose', $data);
    }
}    
?>
