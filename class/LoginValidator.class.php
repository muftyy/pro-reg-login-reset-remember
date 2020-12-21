<?php

//trim, sanitize, is_num, etc
interface loginMethods{
	// public function isEmpty();
	// public function isInDatabase();
}


class LoginValidator implements loginMethods{
	private $data;
	private $errors = array();
	private static $fields = ['username_or_email','password'];

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
		}

		return $this->errors;
	}

	public function isEmpty() : bool{
		return (empty(trim($this->data['username_or_email'])) 
			   or empty(trim($this->data['password'])));
	}

	/*s*/
}

?>