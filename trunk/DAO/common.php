<?php
ini_set('display_errors', 'On');
$db = "w4111b.cs.columbia.edu:1521/adb";
$conn = oci_connect("yq2145", "chaseqiao", $db);

if (!$conn){
	$m = oci_error();
	trigger_error(htmlentities($m['message']), E_USER_ERROR);
}


function prepare_statement($query)
{
    global $conn;
	return oci_parse($conn,$query);
}



?>

