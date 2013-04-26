<?php
    
class User {

    public static function create($data) {
	$username = $data['username'];
	$password = Hash::make($data['password']);
	$email = $data['email'];
	$first_name = $data['first_name'];
	$last_name = $data['last_name'];
	$instructor = $data['instructor'];

	Log::write('debug', 'password: '.$data['password']);
	Log::write('debug', 'created_pass: '.$password);

	return DB::query("INSERT INTO user(username,password,email,first_name,last_name,instructor) 
			  VALUES('$username','$password','$email','$first_name','$last_name','$instructor');");
    }
    
    public static function get($username, $pass=null) {
	$result = DB::query("SELECT * FROM user WHERE username='$username';");
	if ($pass == null || count($result) == 0) {
	    return $result;
	} 

	Log::write('debug', 'password: '.$pass);
	Log::write('debug', 'hash_check: '. ((Hash::check($pass,$result[0]->password))?'true':'false'));

	if (Hash::check($pass, $result[0]->password)) {
	    return $result;
	} else {
	    return array();
	}
    }
}

?>
