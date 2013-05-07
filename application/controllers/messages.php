<?php

class Messenger_Controller extends Base_Controller {
    
    public $restful = true;

    public function get_messages(){  
	return View::make('messenger/messages');				
    }



    public function get_compose(){
	return View::make('messenger/compose');

    }

    public function post_compose(){

	$creds = 'receiver' => Input::get('receiver');

	if(Auth::attempt($creds)){
	    //see if receiver is in the database...
	$user = Auth::retrieve(
	$data=array(
	    'mid' => Input::get('mid'),
	    'subject' => Input::get('subject', 'no subject'),
	    'body' => Input::get('body'),
	    'sender' => Input::get('sender'),
	    'receiver' => Input::get('receiver'),
	    'created' => Input:get('created'),
	    
	    return Redirect::to_route('/messages');
	}
	else{
	return Redirect::to_route('/messages')->with('error', '
	}


    }

    public function get_sent(){

    }	

    public function get_received(){



    }






}    
?>

