<?php
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
require_once "common.php";
require_once "$root/Models/status.php";

function get_status_by_uid($userid)
{
	global $conn;
	$query = "select * from Status where u_id = " . $userid . "order by s_timestamp";
	$stmt = exec_query($query);

	$result = array();
	
	while ($row = oci_fetch_array($stmt,OCI_ASSOC)){
		$item = new status($row["S_ID"],$row["U_ID"],$row["S_CONTENT"],$row["S_TIMESTAMP"]);
		array_push($result,$item);
	}
	oci_close($conn);
	return $result;	
}	


//$res = get_status_by_uid(42);
//var_dump($res);

?>

