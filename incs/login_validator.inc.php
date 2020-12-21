<?php 

	require "class/LoginValidator.class.php";
	$loginValidator = new LoginValidator();

	if($loginValidator->isEmpty()){
		$error = "Please fill all fields";
	}

	else if($loginValidator->isInDatabase()){
		//set session, redirect to dashboard
		// $loginValidator->toDashboard();
		$error = "yayyyy you are logged in";
	}

	else{
		$error = "invalid email or password";
	}

?>