<?php

//enetity class of status

class status
{
	public $sid;
	public $userID;
	public $content;
	public $timestamp;

	function __construct($sid,$uid,$content,$time){
		$this->sid=$sid;
		$this->userID=$uid;
		$this->content=$content;
		$this->timestamp=$time;
	}

}



?>
