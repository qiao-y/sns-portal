<?php

require "DAO/userDAO.php";

$email = trim($_POST['email']);
$password = trim($_POST['password']);

$userid = check_password($email,$password);

if ($userid != -1){
	session_start();
	$_SESSION['userid'] = $userid;
	echo "SUCCESS <br/>";
	//add redirection here
}
else {
	echo "Error : Invalid username or password. Please try again. <br/>";
}

?>
