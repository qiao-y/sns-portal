<?php

//enetity class of blog comments 


class blog_comments 
{
	public $bcid;
	public $uid;
	public $body;

	function __construct($bcid,$uid,$body){
		$this->bcid = $bcid;
		$this->uid = $uid;
		$this->body = $body;
	}

}



?>
