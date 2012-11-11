<?php
require_once "common.php";
require_once "../Models/blog.php";
require_once "../Models/blog_comments.php";


function get_blog_by_uid($userid)
{
	// get blog body
	$query = "select * from blog where u_id = " . $userid;
	$stmt = exec_query($query);

	$result = array();
	
	while ($row = oci_fetch_array($stmt,OCI_ASSOC)){
		$item = new blog($row["B_ID"],$row["U_ID"],$row["B_TITLE"],$row["B_BODY"]);
		array_push($result,$item);
	}

	return $result;	
}	


function get_blog_comment_by_bid($bid)
{
    $query = "select * from blog_comments where b_id = " . $bid;
    $stmt = exec_query($query);

    $result = array();
    
    while ($row = oci_fetch_array($stmt,OCI_ASSOC)){
        $item = new blog_comments($row["BC_ID"],$row["BC_USERID"],$row["BC_BODY"]);
        array_push($result,$item);
    }

    return $result; 
}   




//$res = get_blog_by_uid(46);
//var_dump($res);

//$res = get_blog_comment_by_bid(7);
//var_dump($res);

oci_close($conn);
?>
