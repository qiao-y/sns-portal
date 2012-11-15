<?php

//enetity class of blog comments 


class blog_comments 
{
	public $bcid;
	public $uid;
	public $body;
	public $date;

	function __construct($bcid,$uid,$body,$date){
		$this->bcid = $bcid;
		$this->uid = $uid;
		$this->body = $body;
		$this->date = $date;
	}

}



?>
