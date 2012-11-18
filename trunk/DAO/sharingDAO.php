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


function insert_sharing($sh_id,$u_id,$corresponding_id,$category,$timestamp)
{
    global $conn;
    $query = "insert into sharing (sh_id,u_id,sh_corresponding_id,sh_category,sh_timestamp) values ($sh_id,$u_id,$corresponding_id,$sh_category,'$timestamp')";
    $stmt = prepare_statement($query);
    oci_execute($stmt);
    $err = oci_error($stmt);
    if ($err){
        echo $err['message'];
    }
    oci_close($conn);
}



//$list = get_sharing_list_by_uid(41);
//var_dump($list[3]);
//echo output_sharing($list[3],50);

?>

