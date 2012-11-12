<?php
require_once "common.php";
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
require_once "$root/Models/user.php";


function get_friend_list($uid)
//return an array of  user class
{
	global $conn;
	$query = "select * from users u where u.u_id in ( select u_id2 from user_friend where u_id1 = " . $uid . ")";
	$stmt = exec_query($query);
	
	$result = array();	

	while ($row = oci_fetch_array($stmt,OCI_ASSOC)){
		$item = new user($row["U_ID"],$row["U_EMAIL"],$row["U_LASTLOGINTIME"],$row["U_NAME"]);
		array_push($result,$item);
	}
	oci_close($conn);
	return $result;
	
}


//var_dump(get_friend_list(48));


?>
