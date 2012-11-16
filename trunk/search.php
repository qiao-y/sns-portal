<?php
require_once "DAO/userDAO.php";

if (!isset($_POST["searchKeyword"]) || $_POST["searchKeyword"] == ""){
	echo "Please enter the search keyword <br/>";
    echo '<a href="javascript: history.go(-1)">Back</a>';	
}
else {
	$keyword = $_POST["searchKeyword"];
	$user_list = search_user($keyword); 
?>
	<ul class="list">
	<?php
	$length = count($user_list);
	if ($length == 0){
		echo "No match results.";
		return;
	}

	for ($i = 0; $i < $length ; ++$i){
	?>
	<li><?php echo $user_list[$i]->uname; ?> <a href="addfriend.php?uid=<?php echo $user_list[$i]->userID; ?>">Add you to his/her friend list</a></li>
	<?php 
	}
	?>
	
	</ul>
		
<?php
}

?>
