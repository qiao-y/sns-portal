<?php

require "DAO/userDAO.php";

$email = trim($_POST['reg_email']);
$password = trim($_POST['reg_password']);
$confirm_pwd = trim($_POST['con_password']);
$name = trim($_POST['name']);

if ($password != $confirm_pwd){
	echo "Password and the confirmation password is different!<br/>";
	echo '<a href="javascript: history.go(-1)">Back</a>';
}
else {
	register_user($name,$email,$password);
	echo "Registration succceeded. Redirecting to main page...";
	$userid = get_user_id_by_email($email);
	session_start();
	$_SESSION['userid'] = $userid;
	header('location:main.php');   
}	



?>

