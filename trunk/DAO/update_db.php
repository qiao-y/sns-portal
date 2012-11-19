<?php
require_once "common.php";
require_once "friendDAO.php";
require_once "userDAO.php";
require_once "blogDAO.php";
require_once "likeDAO.php";
require_once "pictureDAO.php";
require_once "sharingDAO.php";
require_once "tweetDAO.php";
require_once "statusDAO.php";


function ts_helper($seconds)
{
	$interval = DateInterval::createFromDateString("$seconds seconds");
	$date = new DateTime('2012-09-01');
	$date->add($interval);
	return $date->format('d-M-y h.m.s.000000 A');
}


function update_like_blog($uid)
{
    $document = @simplexml_load_file("../data/$uid/like_blog");
    if (!$document){
		echo "No need to update <br/>";
        return;
    }
    foreach ($document as $like){
        $b_id = $like->blog_id;
        $u_id = $like->u_id;
        $ts = ts_helper($like->timestamp);
       // echo "$b_id, $u_id, $ts <br/>";
		//insert_like_blog($b_id,$u_id,$ts);
    }
}

function update_like_status($uid)
{
    $document = @simplexml_load_file("../data/$uid/like_status");
    if (!$document){
        echo "No need to update <br/>";
        return;
    }
    foreach ($document as $like){
        $status_id = $like->status_id;
        $u_id = $like->u_id;
        $ts = ts_helper($like->timestamp);
     //   echo "$status_id, $u_id, $ts <br/>";
		//insert_like_status($status_id,$u_id,$ts);
    }
}

function update_like_pictures($uid)
{
    $document = @simplexml_load_file("../data/$uid/like_pictures");
    if (!$document){
        echo "No need to update <br/>";
        return;
    }
    foreach ($document as $like){
        $p_id = $like->p_id;
        $u_id = $like->u_id;
        $ts = ts_helper($like->timestamp);
        //echo "$p_id, $u_id, $ts <br/>";
	//	insert_like_picture($p_id,$u_id,$ts);
    }
}

function update_like_sharing($uid)
{
    $document = @simplexml_load_file("../data/$uid/like_sharing");
    if (!$document){
        echo "No need to update <br/>";
        return;
    }
    foreach ($document as $like){
        $sharing_id = $like->sharing_id;
        $u_id = $like->user_id;
        $ts = ts_helper($like->timestamp);
      //  echo "$sharing_id, $u_id, $ts <br/>";
		//insert_like_sharing($sharing_id,$u_id,$ts);
    }
}


function update_status($uid)
{
	$document = @simplexml_load_file("../data/$uid/status");
	if (!$document){
		return;
	}
	foreach ($document as $status){
		$s_id = $status->cid;
    	$u_id = $status->u_id;
    	$s_content = $status->s_content;
    	$ts = ts_helper($status->timestamp);
    	//insert_status($s_id,$s_content,$u_id,$ts);
		//echo "$s_id, $u_id, $s_content, $ts  <br/>";
	}
}


function update_blog($uid)
{
	$document = @simplexml_load_file("../data/$uid/blog");
    if (!$document){
		return;
	}
	foreach ($document as $blog){
        $b_id = $blog->cid;
        $u_id = $blog->u_id;
        $b_title = $blog->b_title;
        $b_body = $blog->b_body;
    	$ts = ts_helper($blog->timestamp);    
	
       	//insert_blog($b_id,$u_id,$b_title,$b_body,$ts);
		// echo "$b_id, $u_id, $b_title, $b_body, $ts  <br/>";

    }
}

function update_picture($uid)
{
    $document = @simplexml_load_file("../data/$uid/pictures");
    if (!$document){
        return;
    }
    foreach ($document as $pic){
        $p_id = $pic->cid;
        $u_id = $pic->u_id;
        $p_desc = $pic->p_description;
        $p_link = $pic->URI;
        $ts = ts_helper($pic->timestamp);

         //insert_picture($p_id,$p_link,$u_id,$p_desc,$ts);
         //echo "$p_id, $u_id, $p_desc, $p_link, $ts  <br/>";

    }
}

function update_sharing($uid)
{
    $document = @simplexml_load_file("../data/$uid/sharing");
    if (!$document){
        return;
    }
    foreach ($document as $sharing){
        $sh_id = $sharing->cid;
        $u_id = $sharing->u_id;
        $category = $sharing->sharing_category;
        $corres_id = $sharing->sharing_corresponding_id;
        $ts = ts_helper($sharing->timestamp);

        //insert_blog($b_id,$u_id,$b_title,$b_body,$ts);
        // echo "$b_id, $u_id, $b_title, $b_body, $ts  <br/>";

    }
}

function update($uid){
	update_picture($uid);
}


update(101);





?>

