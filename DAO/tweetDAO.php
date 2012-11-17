<?php
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
require_once "common.php";
require_once "$root/Models/tweet.php";

function get_tweet_by_uid($userid)
{
	global $conn;
	$query = "select * from tweet where u_id = " . $userid . "order by t_timestamp";
	$stmt = exec_query($query);

	$result = array();
	
	while ($row = oci_fetch_array($stmt,OCI_ASSOC)){
		$item = new status($row["T_ID"],$row["U_ID"],$row["T_CONTENT"],$row["T_TIMESTAMP"]);
		array_push($result,$item);
	}
	oci_close($conn);
	return $result;	
}	


function get_tweet_by_tid($tid)
{
    global $conn;
    $query = "select * from tweet where t_id = " . $tid . "order by t_timestamp";
    
    $stmt = exec_query($query);

    $row = oci_fetch_array($stmt,OCI_ASSOC);

	$result = new status($row["T_ID"],$row["U_ID"],$row["T_CONTENT"],$row["T_TIMESTAMP"]);

	oci_close($conn);
    return $result;
}   



//$res = get_status_by_uid(42);
//var_dump($res);

//var_dump(get_status_by_sid(10));

?>

