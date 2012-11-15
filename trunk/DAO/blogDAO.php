<?php
require_once "common.php";
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
require_once "$root/Models/blog.php";
require_once "$root/Models/blog_comments.php";


function get_blog_list_by_uid($userid)
{
	global $conn;
	// get blog body
	$query = "select * from blog where u_id = " . $userid;
	$stmt = exec_query($query);

	$result = array();
	
	while ($row = oci_fetch_array($stmt,OCI_ASSOC)){
		$item = new blog($row["B_ID"],$row["U_ID"],$row["B_TITLE"],$row["B_BODY"]);
		array_push($result,$item);
	}
	oci_close($conn);
	return $result;	
}	

function get_blog_by_id($bid)
{
    global $conn;
    // get blog body
    $query = "select * from blog where b_id = " . $bid;
    $stmt = exec_query($query);

    $row = oci_fetch_array($stmt,OCI_ASSOC);
    $result = new blog($row["B_ID"],$row["U_ID"],$row["B_TITLE"],$row["B_BODY"]);
    oci_close($conn);
    return $result;
}



function get_blog_comment_by_bid($bid)
{
	global $conn;
    $query = "select * from blog_comments where b_id = " . $bid;
    $stmt = exec_query($query);

    $result = array();
    
    while ($row = oci_fetch_array($stmt,OCI_ASSOC)){
        $item = new blog_comments($row["BC_ID"],$row["BC_USERID"],$row["BC_BODY"],$row["BC_DATE"]);
        array_push($result,$item);
    }
	oci_close($conn);
    return $result; 
}   




//$res = get_blog_by_uid(46);
//var_dump($res);

//$res = get_blog_comment_by_bid(7);
//var_dump($res);

?>

