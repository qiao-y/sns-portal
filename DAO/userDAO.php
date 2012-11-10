<?php
require_once "common.php";

function register_user($user_name,$email,$password)
{
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
}


//register_user("newuser","zizi@gmail.com","haha");

oci_close($conn);
?>

