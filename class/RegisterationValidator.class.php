<?php

//trim, sanitize, is_num, etc
interface RegisterationMethods{
	public function isEmpty();
	public function passwordsMatch();
	public function emailExists();
}


class RegisterationValidator implements RegisterationMethods{

	public function isEmpty() : bool{
		return (empty(trim($_POST['email'])) or empty(trim($_POST['password'])) or empty(trim($_POST['password_repeat'])));
	}

	public function emailExists() : bool{
		$email = $_POST['email'];

		if($email == "test@test.com"){
			return true;
		}

		return false;
	}

	public function passwordsMatch() : bool {
		return $_POST['password'] === $_POST['password_repeat'];
	}

	

	public function toDashboard(){
		//set session and redirect to dashboard
	}
}


?>