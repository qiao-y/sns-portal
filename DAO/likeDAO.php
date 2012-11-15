<?php
require_once "common.php";
require_once "blogDAO.php";
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
require_once "$root/Models/like_picture.php";
require_once "$root/Models/like_status.php";
require_once "$root/Models/like_blog.php";
require_once "$root/Models/like_sharing.php";


function get_like_blog_by_uid($userid)
{
	global $conn;
	$query = "select * from like_blog where u_id = " . $userid . " order by lb_timestamp desc";
	$stmt = exec_query($query);

	$result = array();
	
	while ($row = oci_fetch_array($stmt,OCI_ASSOC)){
		$item = new like_blog($row["B_ID"],get_blog_title_by_id($row["B_ID"]),$row["U_ID"],$row["LB_TIMESTAMP"]);
		array_push($result,$item);
	}
	oci_close($conn);
	return $result;	
}	


//var_dump(get_blog_title_by_id(2));

//var_dump(get_like_blog_by_uid(50));



?>

