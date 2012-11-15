<?php

class picture 
{
	public $pid;
	public $link;
	public $uid;
	public $timestamp;

	function __construct($pid,$link,$uid,$timestamp){
		$this->pid = $pid;
		$this->link = $link;
		$this->uid = $uid;
		$this->timestamp = $timestamp;
	}
	
}



?>
