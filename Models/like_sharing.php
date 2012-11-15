<?php


class like_sharing 
{
	public $shid;
	public $userID;
	public $timestamp;

	function __construct($shid,$uid,$time){
		$this->shid=$shid;
		$this->userID=$uid;
		$this->timestamp=$time;
	}

}



?>
