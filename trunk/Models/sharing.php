<?php


class sharing 
{
	public $shid;
	public $uid;
	public $correspondingid;
	public $category;
	public $timestamp;

	function __construct($shid,$uid,$cid,$category,$timestamp){
		$this->shid = $shid;
		$this->uid = $uid;
		$this->correspondingid= $cid;
		$this->category = $category;
		$this->timestamp = $timestamp;
	}


}



?>
