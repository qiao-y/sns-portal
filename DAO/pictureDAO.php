<?php
require_once "common.php";
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
require_once "$root/Models/picture.php";


function get_picture_list_by_uid($userid)
{
	global $conn;
	$query = "select * from pictures where u_id = " . $userid . "order by p_timestamp desc";
	$stmt = exec_query($query);

	$result = array();
	
	while ($row = oci_fetch_array($stmt,OCI_ASSOC)){
		$item = new picture($row["P_ID"],$row["P_BODY_LINK"],$row["U_ID"],$row["P_TIMESTAMP"]);

		array_push($result,$item);
	}
	oci_close($conn);
	return $result;	
}	


//var_dump (get_picture_list_by_uid(41));


?>

