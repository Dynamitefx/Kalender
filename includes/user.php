<?php 
	class User{
		public $parentId;
		public $firstName;
		public $lastName;
		private $username;
		public $email;
		private $usertype;

		public function __construct($parentId,$firstName,$lastName,$username,$email,$usertype){
				$this->parentId = $parentId;
				$this->firstName = $firstName;
				$this->lastName = $lastName;
				$this->username = $username;
				$this->email = $email;
				$this->usertype = $usertype;
		}



	}
?>