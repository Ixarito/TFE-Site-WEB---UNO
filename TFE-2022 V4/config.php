<?php
	$host = 'server2.alelix.com:3306';
	$user = 'marcel';
	$password = 'MarsPass45/';
	$database = 'marcel';

	$conn = mysqli_connect($host, $user, $password, $database);
 
	// Check connection
	if($conn === false){
		die("ERROR: Could not connect. " . mysqli_connect_error());
	}
?>