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
	
	for ($i = 0; $i < count($user_list) ; ++$i){
	?>
	<li><?php echo $user_list[$i]->uname; ?> Add you to his friend list </li>
	<?php 
	}
	?>
	
	</ul>
		
<?php
}

?>
