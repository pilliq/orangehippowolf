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
	$data=array(
	    'subject' => Input::get('subject', 'no subject'),
	    'body' => Input::get('body'),
	    //sender
	    //receiver
	    //msgtime
	
	return Redirect::to_route('messenger/messages');


    }

    public function get_sent(){

    }	

    public function get_received(){



    }






}    
?>

