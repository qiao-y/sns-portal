<?php

require "DAO/userDAO.php";

$email = trim($_POST['email']);
$password = trim($_POST['password']);

if (check_password($email,$password) != -1){
	echo "SUCCESS <br/>";
}
else {
	echo "Error : Invalid username or password. Please try again. <br/>";
}

?>
