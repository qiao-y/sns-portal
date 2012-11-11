<?php
require_once "common.php";

function register_user($user_name,$email,$password)
{
	global $conn;
	$md5_password = md5($password);
	$query = "INSERT INTO Users(u_name, u_email, u_password)  VALUES (:user_name,:email,:md5_password)";
	
	$stmt = prepare_statement($query);

	oci_bind_by_name($stmt,":user_name",$user_name);
	oci_bind_by_name($stmt,":email",$email);
	oci_bind_by_name($stmt,":md5_password",$md5_password);	
	
	oci_execute($stmt);

	$err = oci_error($stmt);
	if ($err){
		echo $err['message'];
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


// register_user("newuser","zizi@gmail.com","haha");
// echo check_password("zizi@gmail.com","haha");
// echo get_user_id_by_email("qiaoyu.yu@gmail.com");


?>

