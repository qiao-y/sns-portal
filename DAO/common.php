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


function exec_query($query)
{
    global $conn;
    $stmt = oci_parse($conn,$query);
	oci_execute($stmt);

    $err = oci_error($stmt);
    if ($err){
//		echo "error while exec ". $query ."<br/>";
//        echo $err['message'];
		oci_free_statement($stmt);
		$nrows = 0;
		return NULL;
    }

	return $stmt;
/*	
	$nrows = oci_fetch_all($stmt,$res);		//rows returned
	oci_free_statement($stmt);
	return $res;
*/
}


?>

