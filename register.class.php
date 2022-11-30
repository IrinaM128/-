<?php 
class RegisterUser{
	// Class properties
	private $login;
	private $name;
	private $email;
	private $userPassword;
	private $encrypted_userPassword;
	private $confirmPassword;
	private $encrypted_confirmPassword;
	public $error;
	public $success;
	private $storage = "data.json";
	private $stored_users;
	private $new_user;  


	public function __construct($login, $name, $email, $userPassword, $confirmPassword){

		$this->login = trim($this->login);
		$this->login = filter_var($login, FILTER_SANITIZE_STRING);
		
		$this->name = trim($this->name);
		$this->name = filter_var($name, FILTER_SANITIZE_STRING);
		
		$this->email = trim($this->email);
		$this->email = filter_var($email, FILTER_SANITIZE_STRING);

		$this->userPassword = filter_var(trim($userPassword), FILTER_SANITIZE_STRING);
		$this->encrypted_userPassword = password_hash($this->userPassword, PASSWORD_DEFAULT);
		
		$this->confirmPassword = filter_var(trim($confirmPassword), FILTER_SANITIZE_STRING);
		$this->encrypted_confirmPassword = password_hash($this->confirmPassword, PASSWORD_DEFAULT);

		$this->stored_users = json_decode(file_get_contents($this->storage), true);

		$this->new_user = [
			"login" => $this->login,
			"name" => $this->name,
			"email" => $this->email,
			"userPassword" => $this->encrypted_userPassword,
		];

		if($this->checkFieldValues()){
			$this->insertUser();
		}
	}


	private function checkFieldValues(){
		if(empty($this->login) || empty($this->name) || empty($this->email) || empty($this->userPassword) || empty($this->confirmPassword)){
			$this->error = "All fields are required.";
			return false;
		} else {
			return true;
		}
	}
	
	private function checkPassword(){
		    if($this->userPassword == $this->confirmPassword){
		        return true;
		} 
	}


	private function emailExists(){  
	   if($this->checkPassword() == FALSE){
	        return $this->error = "Passwords  are not the same.";
	    } else {
		foreach($this->stored_users as $user){
			if($this->email == $user['email']){
				$this->error = "Email already taken, please choose a different one.";
				return true;
			} else if ($this->login == $user['login']){
				$this->error = "Login already taken, please choose a different one.";
				return true;
			}
		}
	}
	}
	

	private function insertUser(){
		if($this->emailExists() == FALSE){
			array_push($this->stored_users, $this->new_user);
			if(file_put_contents($this->storage, json_encode($this->stored_users, JSON_PRETTY_PRINT))){
				return $this->success = "Your registration was successful";
			}else{
				return $this->error = "Something went wrong, please try again";
			}
		}
	}
	



} 
