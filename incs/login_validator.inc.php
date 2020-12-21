<?php 

	include 'autoloader.inc.php';

	$loginValidator = new LoginValidator($_POST);

	$errors = $loginValidator->validateForm();
	$data = $loginValidator->getData();

	if(!array_filter($errors)){
		// $registerationValidator->database()
		echo "yayyyy you can move on to the database operations";
	}

?>