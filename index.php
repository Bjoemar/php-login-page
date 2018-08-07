<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width , initial-scale=1.0, maximum-scale=1.0 , shrink-to-fit=no">
	<meta http-equiv="U-XA-Compatible" contenteditable="IE=Edge">
	<?php require_once "partials/header.php" ?>
	<title>LOGIN PAGE</title>
</head>
<body>


<?php require "partials/nav.php" ?>
<div class="container" id="loginform">
	<h1>Login</h1>
	<?php if(isset($_SESSION['logged_in_user'])) {
		 	echo  "<h1 id='welcometext'> Hello".$_SESSION['logged_in_user']." !! <br></h1>";
		} else {

		
			
	
			
			echo '
	<form action="controllers/authenticate.php" method="POST">
		<div class="form-group">
			<label for="username">Username</label>
			<input type="text" name="username" id="username" class="form-control">
		</div>

		<div class="form-group">
			<label for="password">Password</label>
			<input type="password" name="password" id="password" class="form-control">
		</div>

		<button class="btn btn-primary">Login</button>
	</form> ';
	}
		if(isset($_SESSION['error_message'])){
	 			echo $_SESSION['error_message'];
	 			unset($_SESSION['error_message']);
	}
	  ?>
</div>

<div class="container" id="reg-form">

	<h1>REGISTER</h1>
	<form id="register_form" action="controllers/register_endpoint.php" method="POST">
		<div class="form-group">
		  <label for="usr">Username:</label>
		  <input type="text" class="form-control" id="usr"><label></label>
		</div>
		<div class="form-group">
		  <label for="pwd">Password:</label>
		  <input type="password" class="form-control" id="pwd">
		</div>
		<div class="form-group">
		  <label for="cnf-pwd">Confirm Password:</label>
		  <input type="password" class="form-control" id="cnf-pwd">
		  <label></label> <br>

		  <button type="button" class="btn btn-primary" id="registerBtn"> Register</button>
		</div>
	</form>
</div>	




<?php require_once "users_list.php"; ?>

<script type="text/javascript" src="assets/js/script.js"></script>



<script type="text/javascript">


	// taga check kung existing ba ang isang data sa database !!! 
	$('#registerBtn').click(() => {


	let errorFlag = false;
	const username = $('#usr').val();
	let users = JSON.parse('<?php echo json_encode($users);?>');
	console.log(users);
	let matchFlag = false;

	if(username.length == 0) {
		$('#usr').next().html('This field is required').css('color','red');
		errorFlag = true;
	} else {

		for(user of users){
		if (user.username == username) {
			matchFlag = true;
			break;
		}
	}
	if(matchFlag == true) {
		$('#usr').next().html('username already exists').css('color','red');
		errorFlag = true;
	} else {
		$('#usr').next().html('Username is avalable').css('color','green');
		
	}
}
	
	const password = $('#pwd').val();
	const confirm_password = $('#cnf-pwd').val();

	if (password.length == 0) {
		$('#cnf-pwd').next().css('color','red');
		$('#cnf-pwd').next().html('please put a password')
		errorFlag = true;
	} else { 
		// $('#cnf-pwd').next().html('');
		if(password !== confirm_password){
			$('#cnf-pwd').next().css('color','red');
			$('#cnf-pwd').next().html('Password did not match ')
			errorFlag = true;
		} else {
			$('#cnf-pwd').next().html('')
		}
	}

	if(errorFlag == false) {
		$('#register_form').submit();
	}

})


</script>

	






</body>
</html>