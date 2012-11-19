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
		$desc = "";
		if (isset($row["P_DESCRIPTION"])){
			$desc = $row["P_DESCRIPTION"];
		}
		$item = new picture($row["P_ID"],$row["P_BODY_LINK"],$row["U_ID"],$row["P_TIMESTAMP"],$desc);

		array_push($result,$item);
	}
	oci_close($conn);
	return $result;	
}	

function get_picture_by_pid($pid)
{   
    global $conn;
    $query = "select * from pictures where p_id = " . $pid . "order by p_timestamp desc";

    $stmt = exec_query($query);

    $row = oci_fetch_array($stmt,OCI_ASSOC);
	$desc = "";
    if (isset($row["P_DESCRIPTION"])){
		$desc = $row["P_DESCRIPTION"];
    }

	$result = new picture($row["P_ID"],$row["P_BODY_LINK"],$row["U_ID"],$row["P_TIMESTAMP"],$desc);

    oci_close($conn);
    return $result;
}

function insert_picture($p_id,$p_link,$u_id,$desc,$timestamp)
{
    global $conn;
    $query = "insert into pictures (p_id,p_body_link,u_id,p_timestamp,p_description) values ($p_id,'$p_link',$u_id,'$timestamp','$desc')";
    $stmt = prepare_statement($query);
    oci_execute($stmt);
    $err = oci_error($stmt);
    if ($err){
        echo $err['message'];
    }
    oci_close($conn);
}



//insert_picture(101,'http://www.columbia.edu/files/columbia/imagecache/gallery/gallery/now-dig-this-h',41,"test",'14-NOV-12 08.20.45.123117 PM');




//var_dump (get_picture_list_by_uid(48));
//var_dump(get_picture_by_pid(14));

?>

