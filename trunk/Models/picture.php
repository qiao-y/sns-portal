<?php

class picture 
{
	public $pid;
	public $link;
	public $uid;
	public $timestamp;
	public $desc;
	

	function __construct($pid,$link,$uid,$timestamp,$desc){
		$this->pid = $pid;
		$this->link = $link;
		$this->uid = $uid;
		$this->timestamp = $timestamp;
		$this->desc = $desc;
	}
	
}



?>
