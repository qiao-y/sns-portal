<?php

//enetity class of user

class user 
{
	public $userID;
	public $userEmail;
	public $lastLoginTime;
	public $uname;

	function __construct($userID,$email,$last,$uname){
		$this->userID = $userID;
		$this->userEmail = $email;	
		$this->lastLoginTime = $last;
		$this->uname = $uname;
	}

}



?>
