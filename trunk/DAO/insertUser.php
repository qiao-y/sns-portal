<?php
require_once "common.php";
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
require_once "friendDAO.php";


function add_user($uid,$user_name,$email,$password)
{
	global $conn;
	$md5_password = md5($password);
	$query = "INSERT INTO Users(u_id, u_name, u_email, u_password)  VALUES ($uid,'$user_name','$email','$md5_password')";
	
	$stmt = prepare_statement($query);

	oci_execute($stmt);

	$err = oci_error($stmt);
	if ($err){
//		echo $err['message'];
	}
	oci_close($conn);
}

function ts_helper($seconds)
{
	$interval = DateInterval::createFromDateString("$seconds seconds");
	$date = new DateTime('2012-09-01');
	$date->add($interval);
	return $date->format('d-M-y h.m.s.000000 A');
}

/*
$document = simplexml_load_file('../data/user_data.xml');
foreach ($document as $user)
{
	$u_id = $user->u_id;
	$u_email = $user->u_email;
	$u_password = $user->u_password;
	$u_name = $user->u_name;
	echo "$u_email <br/>";
//	add_user($u_id,$u_name,$u_email,$u_password);	
}

*/


/*
$handle = @fopen('/home/qiaoyu/sns-portal/data/friend_relation','r');
if ($handle)
{
	$count = 1;
	$uid1=-1;
	$uid2=-1;
	$ts="";
	while ($buffer = fgets($handle,4096)){
		if ($buffer[0] == '='){
			//echo "$uid1,$uid2," . ts_helper($ts). "<br/>";
			add_friend_with_ts($uid1,$uid2,ts_helper($ts));
			$count++;
			continue;
		}
		if ($count % 7 == 2){
			$uid1 = trim($buffer);
		}
		else if ($count % 7 == 4){
			$uid2 = trim($buffer);
		}
		else if ($count % 7 == 6){
			$ts = trim($buffer);
		}
		$count++;
	}
	fclose ($handle);
}
else
{
	echo "zizi";
}

*/

?>

