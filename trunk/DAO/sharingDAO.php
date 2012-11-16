<?php
require_once "common.php";
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
require_once "$root/Models/sharing.php";
require_once "$root/sharing_helper.php";

function get_sharing_list_by_uid($userid)
{
	global $conn;
	$query = "select * from sharing where u_id = " . $userid . "order by sh_timestamp desc";
	$stmt = exec_query($query);

	$result = array();
	
	while ($row = oci_fetch_array($stmt,OCI_ASSOC)){
		$item = new sharing($row["SH_ID"],$row["U_ID"],$row["SH_CORRESPONDING_ID"],$row["SH_CATEGORY"],$row["SH_TIMESTAMP"]);
		array_push($result,$item);
	}
	oci_close($conn);
	return $result;	
}	

/*function get_blog_by_id($bid)
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
*/


//$list = get_sharing_list_by_uid(41);
//var_dump($list[3]);
//echo output_sharing($list[3],50);

?>

