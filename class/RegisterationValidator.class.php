<?php

//trim, sanitize, is_num, etc
interface RegisterationMethods{
	// public function isEmpty();
	// public function passwordsMatch();
	// public function emailExists();
}


class RegisterationValidator implements RegisterationMethods{
	private $data;
	private $errors = array();
	private static $fields = ['username','email','password','password_repeat'];

	public function __construct($post_data){
		$this->data = $post_data;
	}

	private function addError($key, $value){
		$this->errors[$key] = $value;
	}

	public function getData(){
		return $this->data;
	}

	public function validateForm(){
		foreach (self::$fields as $field) {
			if(!array_key_exists($field, $this->data)){
				$this->addError('system','There was an error processing your request. Please try again later');
				return $this->errors;
			}
		}


		if($this->isEmpty()){
			$this->addError('empty','Please, all fields are required');
			return $this->errors;
		}else{
			$this->validateUsername();
			$this->validateEmail();
			$this->validatePassword();
		}

		return $this->errors;
	}

	// check if username oe email already exist
	// store data in database
	public function database(){

	}

	
	public function isEmpty() : bool{
		return (empty(trim($this->data['username'])) 
			or empty(trim($this->data['email'])) 
			or empty(trim($this->data['password'])) 
			or empty(trim($this->data['password_repeat'])));
	}

	public function validateUsername(){
		if(!preg_match('/[a-zA-Z0-9]{6,12}/',$this->data['username'])){
			$this->addError('username','Username must 6-12 alphanumeric characters');
		}
	}
	
	public function validateEmail(){
		if(!filter_var($this->data['email'], FILTER_VALIDATE_EMAIL)){
			$this->addError('email','Email must be a valid email address');
		}
	}

	public function validatePassword(){
		if(!preg_match('/[\w@]{6,}/', $this->data['password'])){
			$this->addError('password','Password must be 6 or more characters and alphanumeric');
		}
		else if($this->data['password'] !== $this->data['password_repeat']){
			$this->addError('password', 'Passwords do not match');
		}
	}

	// /**
	// * checks if email already exisits in the database
	// * if it does, we prompt the user to use a different email
	// */
	// public function emailExists() : bool{
	// 	$email = $_POST['email'];

	// 	if($email == "test@test.com"){
	// 		return true;
	// 	}

	// 	return false;
	// }

	// /**
	// * check if both password fields match
	// *
	// */
	// public function passwordsMatch() : bool {
	// 	return $_POST['password'] === $_POST['password_repeat'];
	// }

	

	// public function toLogin(){
	// 	//redirect to login pages with a  successful message
	// }
}


?>