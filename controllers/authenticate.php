<?php 
	session_start();
	echo "superglobal session variable";
	print_r($_SESSION);
	$username = $_POST['username'];
	$password = $_POST['password'];

	echo "username: $username , password: $password";

	require_once "../users_list.php";
	$match_flag = false;

	foreach ($users as $user) {
		if	($user['username'] == $username && $user['password'] == $password) {
			$match_flag =true;

		} 
	} 

	if($match_flag == true) { 
		echo "matched <br>";
		$_SESSION['logged_in_user'] = $username;
	} else {
		$_SESSION['error_message'] = "Incorrect Username or password";
	
	}
		header('location: ../index.php');






 ?>