<?php
require_once "common.php";
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
require_once "$root/Models/blog.php";
require_once "$root/Models/blog_comments.php";


function get_blog_list_by_uid($userid)
{
	global $conn;
	// get blog body
	$query = "select * from blog where u_id = " . $userid . "order by b_timestamp desc";
	$stmt = exec_query($query);

	$result = array();
	
	while ($row = oci_fetch_array($stmt,OCI_ASSOC)){
		$item = new blog($row["B_ID"],$row["U_ID"],$row["B_TITLE"],$row["B_BODY"],$row["B_TIMESTAMP"]);
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
    $result = new blog($row["B_ID"],$row["U_ID"],$row["B_TITLE"],$row["B_BODY"],$row["B_TIMESTAMP"]);
    oci_close($conn);
    return $result;
}


function get_blog_title_by_id($bid)
{
    global $conn;
    // get blog body
    $query = "select b_title from blog where b_id = " . $bid;
    $stmt = exec_query($query);

    $row = oci_fetch_array($stmt,OCI_ASSOC);
  //  $result = ($row["B_ID"],$row["U_ID"],$row["B_TITLE"],$row["B_BODY"]);
    oci_close($conn);
    return $row["B_TITLE"];
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


function insert_blog($b_id,$u_id,$b_title,$b_body,$b_timestamp)
{
	global $conn;
	$query = "insert into blog (b_id,u_id,b_title,b_body) values ($b_id,$u_id,'$b_title','$b_body')";
	$stmt = prepare_statement($query);
	oci_execute($stmt);
	$err = oci_error($stmt);
	if ($err){
		echo $err['message'];
	}			
	oci_close($conn);
}



//$res = get_blog_by_uid(46);
//var_dump($res);

//$res = get_blog_comment_by_bid(7);
//var_dump($res);

//insert_blog(101,41,"test","testbody",123);


?>

