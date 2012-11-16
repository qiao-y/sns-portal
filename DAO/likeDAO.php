<?php
require_once "common.php";
require_once "blogDAO.php";
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
require_once "$root/Models/like_picture.php";
require_once "$root/Models/like_status.php";
require_once "$root/Models/like_blog.php";
require_once "$root/Models/like_sharing.php";
require_once "$root/Models/user.php";

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

function get_like_blog_users_by_bid($bid)
{
	global $conn;
    $query = "select * from users where u_id in (select u_id from like_blog where b_id = " . $bid . ")";
	$stmt = exec_query($query);

    $result = array();

    while ($row = oci_fetch_array($stmt,OCI_ASSOC)){
        $item = new user($row["U_ID"],$row["U_EMAIL"],$row["U_LASTLOGINTIME"],$row["U_NAME"]);
        array_push($result,$item);
    }

	oci_close($conn);
    return $result;

}

function get_like_picture_users_by_pid($pid)
{
    global $conn;
    $query = "select * from users where u_id in (select u_id from like_picture where p_id = " . $pid . ")";
    $stmt = exec_query($query);

    $result = array();

    while ($row = oci_fetch_array($stmt,OCI_ASSOC)){
        $item = new user($row["U_ID"],$row["U_EMAIL"],$row["U_LASTLOGINTIME"],$row["U_NAME"]);
        array_push($result,$item);
    }

    oci_close($conn);
    return $result;

}


function get_like_status_users_by_sid($sid)
{
    global $conn;
    $query = "select * from users where u_id in (select u_id from like_status where s_id = " . $sid . ")";
    $stmt = exec_query($query);

    $result = array();

    while ($row = oci_fetch_array($stmt,OCI_ASSOC)){
        $item = new user($row["U_ID"],$row["U_EMAIL"],$row["U_LASTLOGINTIME"],$row["U_NAME"]);
        array_push($result,$item);
    }

    oci_close($conn);
    return $result;

}


function get_like_sharing_users_by_shid($shid)
{
    global $conn;
    $query = "select * from users where u_id in (select u_id from like_sharing where sh_id = " . $shid . ")";
    $stmt = exec_query($query);

    $result = array();

    while ($row = oci_fetch_array($stmt,OCI_ASSOC)){
        $item = new user($row["U_ID"],$row["U_EMAIL"],$row["U_LASTLOGINTIME"],$row["U_NAME"]);
        array_push($result,$item);
    }

    oci_close($conn);
    return $result;

}




//var_dump(get_blog_title_by_id(2));

//var_dump(get_like_blog_by_uid(50));

//var_dump(get_like_blog_users_by_bid(7));

//var_dump(get_like_sharing_users_by_shid(10));


?>

