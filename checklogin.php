<?php

require "DAO/userDAO.php";

$email = trim($_POST['email']);
$password = trim($_POST['password']);

$userid = check_password($email,$password);

if ($userid != -1){
	session_start();
	$_SESSION['userid'] = $userid;
	echo "Login success. Redirecting to main page...<br/>";
	header('location:main.php');	
}
else {
	echo "Error : Invalid username or password. Please try again. <br/>";
}	
?>
<a href="javascript: history.go(-1)">Back</a>
