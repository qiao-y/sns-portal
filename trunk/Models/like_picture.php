<?php


class like_picture 
{
	public $pid;
	public $userID;
	public $timestamp;

	function __construct($pid,$uid,$time){
		$this->pid=$pid;
		$this->userID=$uid;
		$this->timestamp=$time;
	}

}



?>
