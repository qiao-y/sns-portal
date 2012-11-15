<?php


class like_blog 
{
	public $bid;
	public $btitle;
	public $userID;
	public $timestamp;

	function __construct($bid,$btitle,$uid,$time){
		$this->bid=$bid;
		$this->btitle=$btitle;
		$this->userID=$uid;
		$this->timestamp=$time;
	}

}



?>
