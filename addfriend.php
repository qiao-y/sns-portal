<?php
require_once "DAO/friendDAO.php";

$uid1 = $_GET['uid'];
session_start();
$uid2 = $_SESSION['userid'];

if (add_friend($uid1,$uid2)){
	echo "Add friend successfully.<br/>";
}
else{
	echo "Failed to add friend. <br/>";
}

?>

<a href="javascript: history.go(-1)">Back</a>
