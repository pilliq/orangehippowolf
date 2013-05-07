<?php

class Message_Controller extends Base_Controller {
    
    public $restful = true;

    public function get_messages(){  
	return View::make('messages');				
    }

    public function get_compose(){
	return View::make('messages_compose');

    }

    public function post_compose(){
	$data=array(
	    'mid' => Input::get('mid'),
	    'subject' => Input::get('subject', 'no subject'),
	    'body' => Input::get('body'),
	    'sender' => Input::get('sender'),
	    'receiver' => Input::get('receiver'),
	    'created' => Input:get('created'),
	    Message::create($data),
	    return View::make('messages_sent');
	}

    public function get_sent(){
	    return View::make('messages_sent');
    }	

    public function get_received(){
	    return View::make('messages_received');
    }

}    
?>
