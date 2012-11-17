<?php


class tweet 
{
	public $tid;
	public $userID;
	public $content;
	public $timestamp;

	function __construct($tid,$uid,$content,$time){
		$this->tid=$tid;
		$this->userID=$uid;
		$this->content=$content;
		$this->timestamp=$time;
	}

}



?>
