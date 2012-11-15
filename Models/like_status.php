<?php


class like_status 
{
	public $sid;
	public $userID;
	public $timestamp;

	function __construct($sid,$uid,$time){
		$this->sid=$sid;
		$this->userID=$uid;
		$this->timestamp=$time;
	}

}



?>
