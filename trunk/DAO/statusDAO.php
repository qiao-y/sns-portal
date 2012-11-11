<?php
require_once "common.php";
require_once "../Models/status.php";

function get_status_by_uid($userid)
{
	$query = "select * from Status where u_id = " . $userid;
	$stmt = exec_query($query);

	$result = array();
	
	while ($row = oci_fetch_array($stmt,OCI_ASSOC)){
		$item = new status($row["S_ID"],$row["U_ID"],$row["S_CONTENT"],$row["S_TIMESTAMP"]);
		array_push($result,$item);
	}

	return $result;	
}	


//$res = get_status_by_uid(42);
//var_dump($res);

oci_close($conn);
?>

