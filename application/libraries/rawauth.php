<?php

class Rawauth extends Laravel\Auth\Drivers\Driver { 

    public function attempt($args=array()) {
	$username = $args['username'];
	$password = $args['password'];

	$result = User::get($username, $password);
	if (count($result) == 0) {
	    return false;
	}

	return $this->login($result[0]->username, array_get($args,'remember'));
    }

    public function retrieve($id) {
	$result = User::get($id);
	if (count($result) == 0) {
	    return null;
	} 
	return $result[0];
    }
}
?>
