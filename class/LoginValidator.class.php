<?php

//trim, sanitize, is_num, etc
interface loginMethods{
	public function isEmpty();
	public function isInDatabase();
}


class LoginValidator implements loginMethods{

	public function isEmpty() : bool{
		return (empty(trim($_POST['email'])) or empty(trim($_POST['password'])));
	}

	public function isInDatabase() : bool{
		$email = $_POST['email'];
		$password = $_POST['password'];

		if($email !== "test@test.com" and $password !== "test"){
			return false;
		}

		return true;
	}

	public function toDashboard(){
		//set session and redirect to dashboard
	}
}

?>