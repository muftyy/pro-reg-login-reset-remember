<?php

//trim, sanitize, is_num, etc
interface RegisterationMethods{
	// private function addError();
	public function getData();
	public function validateForm();
	public function validateUsername();
	public function validateEmail();
	public function validatePassword();
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

	// check if username or email already exists in database
	// store data in database
	public function database(){

	}

	/*Pre-database validation*/
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

	/*Post-database validation*/
	public function usernameExists(){

	}

	public function emailExists(){
		
	}
}


?>