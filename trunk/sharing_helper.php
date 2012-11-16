<?php

require_once "Models/sharing.php";
require_once "DAO/blogDAO.php";
require_once "DAO/userDAO.php";
require_once "DAO/statusDAO.php";
require_once "DAO/pictureDAO.php";
//1 blog
//2 status
//3 picture
function output_sharing($item,$friendid)
{
	$username = get_user_name_by_id($friendid);
	if ($item->category == 1){
		$blog_title = get_blog_title_by_id($item->correspondingid); 
		return "$username shared a <strong>blog<strong>: <a href=\"readblog.php?bid=$item->correspondingid\">$blog_title</a><br/>";
	}
	else if ($item->category == 2){
		$status = get_status_by_sid($item->correspondingid)->content;
		return "$username shared a <strong>status</strong>: <a href=\"status.php?friendid=$friendid&sid=$item->correspondingid\">$status</a><br/>";
	}
	else if ($item->category == 3){
		$link = get_picture_by_pid($item->correspondingid)->link; 
		
		return 
			"$username shared a <strong>picture</strong>".
			"<div class=\"img\">".
			"<a href=\"viewpicture.php?friendid=$friendid&pid=$item->correspondingid\"><img src=\"$link\" alt=\"NULL\" width=\"110\" height=\"90\"></a>".
			"</div>";		
	}

}


?>
