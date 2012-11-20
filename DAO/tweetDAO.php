<?php
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
require_once "common.php";
require_once "$root/Models/tweet.php";

function get_tweet_by_uid($userid)
{
	global $conn;
	$query = "select * from tweet where u_id = " . $userid . "order by t_timestamp";
	$stmt = exec_query($query);

	$result = array();
	
	while ($row = oci_fetch_array($stmt,OCI_ASSOC)){
		$item = new status($row["T_ID"],$row["U_ID"],$row["T_CONTENT"],$row["T_TIMESTAMP"]);
		array_push($result,$item);
	}
	oci_close($conn);
	return $result;	
}	


function get_tweet_by_tid($tid)
{
    global $conn;
    $query = "select * from tweet where t_id = " . $tid . "order by t_timestamp";
    
    $stmt = exec_query($query);

    $row = oci_fetch_array($stmt,OCI_ASSOC);

	$result = new status($row["T_ID"],$row["U_ID"],$row["T_CONTENT"],$row["T_TIMESTAMP"]);

	oci_close($conn);
    return $result;
}   

function insert_tweet($t_id,$t_content,$t_timestamp,$u_id)
{
    global $conn;
    $query = "insert into tweet (t_id,t_content,t_timestamp,u_id) values ($t_id,'$t_content','$t_timestamp',$u_id)";
    
//	echo "<br/><br/><br/>$query<br/><br/><br/>";

	$stmt = prepare_statement($query);
    oci_execute($stmt);
    $err = oci_error($stmt);
    if ($err){
//        echo $err['message'];
    }
    oci_close($conn);
}


//insert_tweet(101,'hello','14-NOV-12 08.20.45.123117 PM',41);



//$res = get_status_by_uid(42);
//var_dump($res);

//var_dump(get_status_by_sid(10));

?>

