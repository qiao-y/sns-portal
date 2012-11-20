<?php
require_once "common.php";
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
require_once "$root/Models/user.php";

function get_max_uid()
{
    global $conn;
	$query = "select max (u_id) as TEMP from users";
    $stmt = prepare_statement($query);
    oci_execute($stmt);
	if (oci_fetch_all($stmt,$res) == 0){
        oci_close($conn);
        return 10000;
    }
    else{
        oci_close($conn);
		return $res["TEMP"][0];
    }
}


function register_user($user_name,$email,$password)
{
	global $conn;
	$md5_password = md5($password);
	$uid = get_max_uid() + 1;
	$query = "INSERT INTO Users(u_id, u_name, u_email, u_password)  VALUES ($uid, :user_name,:email,:md5_password)";
	
	$stmt = prepare_statement($query);

	oci_bind_by_name($stmt,":user_name",$user_name);
	oci_bind_by_name($stmt,":email",$email);
	oci_bind_by_name($stmt,":md5_password",$md5_password);	
	
	oci_execute($stmt);

	$err = oci_error($stmt);
	if ($err){
//		echo $err['message'];
	}
	oci_close($conn);
}

function check_password($email,$password)
//on sucess return uid
//on failure return -1
{
	global $conn;
	$md5_password = md5($password);
	$query = sprintf("SELECT * FROM users WHERE u_email = '%s' and u_password = '%s'", $email,$md5_password);
	$stmt = exec_query($query);
	if (oci_fetch_all($stmt,$res) == 0){
		oci_close($conn);
		return -1;
	}
	else{
		oci_close($conn);
		return $res["U_ID"][0];		
	}
}

function get_user_id_by_email($email)
{
    global $conn;
    $query = sprintf("SELECT u_id FROM users WHERE u_email = '%s'", $email);
    $stmt = exec_query($query);
    if (oci_fetch_all($stmt,$res) == 0){
        oci_close($conn);
        return -1;
    }
    else{
        oci_close($conn);
        return $res["U_ID"][0];
    }

}

function get_user_name_by_id($userid)
{
    global $conn;
    $query = sprintf("SELECT u_name FROM users WHERE u_id = %d ", $userid);
    $stmt = exec_query($query);
    if (oci_fetch_all($stmt,$res) == 0){
        oci_close($conn);
        return -1;
    }
    else{
        oci_close($conn);
        return $res["U_NAME"][0];
    }

}

function search_user($keyword)
{
	global $conn;

    $query = sprintf("SELECT * FROM users WHERE u_name like '%%%s%%' or u_email like '%%%s%%'",$keyword,$keyword); 
	$stmt = exec_query($query);

    $result = array();

    while ($row = oci_fetch_array($stmt,OCI_ASSOC)){
        $item = new user($row["U_ID"],$row["U_EMAIL"],$row["U_LASTLOGINTIME"],$row["U_NAME"]);
        array_push($result,$item);
    }
    oci_close($conn);
    return $result;
}



//echo get_max_uid();

// register_user("newuser","zizi@gmail.com","haha");
// echo check_password("zizi@gmail.com","haha");
// echo get_user_id_by_email("qiaoyu.yu@gmail.com");
// echo get_user_name_by_id(41);
// echo var_dump(search_user("qiao"));


?>

