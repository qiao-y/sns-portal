<?php

require "DAO/userDAO.php";

$email = trim($_POST['reg_email']);
$password = trim($_POST['reg_password']);
$confirm_pwd = trim($_POST['con_password']);
$name = trim($_POST['name']);

if ($password != $confirm_pwd){
	echo "Password and the confirmation password is different!";
}
else {
	register_user($name,$email,$password);
	echo "Registration succceeded!";
}	



?>

