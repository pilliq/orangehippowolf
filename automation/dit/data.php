<?php

    $parent_dir = "~/dit/";

    function connect() {
	$host = "127.0.0.1";
	$username = "csuser";
	$password = "cs8aea0e";
	$database = "cs336";
	$dbh = mysql_connect($host,$username,$password) or die("Cannot connect to the database ".mysql_error());
	$db_selected = mysql_select_db($database) or die("Cannot connect to the db: ".mysql_error());
    }

    function strip($a) {
	for($i = 0; $i < count($a) ; $i++) {
	    $a[$i] = trim($a[$i]);
	}
	return $a;
    }

    function insert_offerings() { // with default ranking
	$path = "/home/pquiza/dit/offerings.dat";
	$file = fopen($path, 'r');
	while ($line = fgets($file)) {
	    $pieces = explode("|",$line);
	    if ($pieces[0] == "#") continue;
	    strip($pieces);
	    list($cid,$year,$term,$section,$instructor) = $pieces;
	    $query = "insert into course_offering(cid,year,term,section,instructor) 
		values('$cid','$year','$term','$section','$instructor');";
	    mysql_query($query) or die("Could not insert an offering tuple\n");
	}	
	fclose($file);
    }

    function insert_courses() {
	$path = "/home/pquiza/dit/courses.dat";
	$file = fopen($path, 'r');
	while ($line = fgets($file)) {
	    $pieces = explode("|",$line);
	    strip($pieces);
	    list($cid,$unit,$subject,$course_num,$title,$credits) = $pieces;
	    $query = "insert into course(cid,unit,subject,course_number,title,credits)
		      values('$cid','$unit','$subject','$course_num','$title',$credits);";
	    mysql_query($query) or die("Could not insert a course tuple\n");
	}
	fclose($file);
    }

    function insert_rooms() {
	insert('building', array('code', 'name', 'campus'), '/home/pquiza/dit/buildings.dat');
    }

    function insert_course_offerings() {
	$f = function($data) {
		$ranks = array('credits_completed' => 1,
			       'major_credits_completed' => 2,
			       'declared_major' => 3,
			       'gpa' => 4,
			       'prereq_gpa' => 5,
			       'other_majors' => 6,
			       'failed_basic' => 7,
			       'failed_prereq' => 8,
			       'no_use_permission' => 9
			      );
		$query = "insert into rank_algorithm(cid,section,credits_completed,major_credits_completed,declared_major,gpa,prereq_gpa,other_majors,failed_basic,failed_prereq,no_use_permission) values('{$data[0]}','{$data[3]}',{$ranks['credits_completed']},{$ranks['major_credits_completed']},{$ranks['declared_major']},{$ranks['gpa']},{$ranks['prereq_gpa']},{$ranks['other_majors']},{$ranks['failed_basic']},{$ranks['failed_prereq']},{$ranks['no_use_permission']});";
		mysql_query($query) or die("Could not insert a rank algorithm tuple\n");
	};
	insert('course_offering', array('cid', 'year', 'term', 'section', 'instructor'), '/home/pquiza/dit/course_offerings.dat', $f);
    }

    function insert_requests() {
	insert('request', array('student','course','section','status','sp'), '/home/pquiza/dit/requests.dat');
    }

    function insert_registration() {
	insert('registration', array('NAME','RU_ID','YEAR','TERM','UNIT_CD','SUBJ_CD','COURSE_NO','SECTION_NO','GRADE','BLDG_CD','ROOM_NO'), '/home/pquiza/dit/reg.dat', false, false);
    }

    function update_registration() {

    }

    function insert($table, $fields, $path, $after_func=null, $print_line=false, $print_query=false) {
	$file = fopen($path, 'r');
	while ($line = fgets($file)) {

	    if ($print_line) print_r($line);

	    $pieces = explode("|",$line);
	    if ($pieces[0] == '#') continue;

	    $pieces = strip($pieces);
	    $query = "insert into $table(";
	    $query .= implode(',', $fields); 
	    $query .= ") values('";
	    $query .= implode("','", $pieces);
	    $query .= "');";

	    if ($print_query) print_r($query);

	    mysql_query($query) or die("Could not insert a $table tuple\n");

	    if ($after_func != null) {
		$after_func($pieces);
	    }
	}
    }

    connect();
    insert_courses();
    insert_rooms();
    insert_course_offerings();
    insert_requests();
    insert_registration();
?>
