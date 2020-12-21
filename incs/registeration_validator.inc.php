<?php 

	include 'autoloader.inc.php';

	$registerationValidator = new RegisterationValidator($_POST);

	$errors = $registerationValidator->validateForm();
	$data = $registerationValidator->getData();

	if(!array_filter($errors)){
		// $registerationValidator->database()
		echo "yayyyy you can move on to the database operations";
	}


?>