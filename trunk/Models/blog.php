<?php

//enetity class of blog 
require_once "blog_comments.php";


class blog 
{
	public $bid;
	public $uid;
	public $title;
	public $body;
	//public $comments;

	function __construct($bid,$uid,$title,$body){
		$this->bid = $bid;
		$this->uid = $uid;
		$this->title = $title;
		$this->body = $body;
		$comments = array();
	}
	
/*	function add_comments($comments){
		array_push($comments);		
	}
*/
}



?>
