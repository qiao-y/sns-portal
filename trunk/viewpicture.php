<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<title>SNS Portal</title>
		<link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css" />
		<link href="http://fonts.googleapis.com/css?family=Kreon" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" type="text/css" href="css/style.css" />
	</head>
	<body>
		<div id="wrapper">
			<div id="header">
				<div id="logo">
					<h1><a href="main.php">SNS Portal</a></h1>
				</div>
				<div id="menu">
					<form id='search' action='search.php' method='post' accept-charset='UTF-8'>
						<ul><li><input name="searchKeyword" id="searchKeyword" tabindex="1" value="" type="text"/><input type='submit' name='Submit' value='Search Friend' /></li></ul>
						<ul>
					</form>
					<li>Welcome 
						<?php
							require_once "DAO/userDAO.php";
							session_start(); 
							$userid = $_SESSION['userid'];
							$username = get_user_name_by_id($userid);
							echo $username; 
						?> 
					</li>
					<li><a href="logout.php">Log Out</a></li>
					</ul>
					<br class="clearfix" />
				</div>
			</div>
			<div id="page">
				<div id="sidebar">
					<div class="box">
						<h3>Friend List</h3>
							
						<ul class="list">
						<?php
							require_once "DAO/friendDAO.php";
							$friend_list = get_friend_list($userid);
							for ($i = 0 ; $i < count($friend_list) ; ++$i){
						?>	
							<li><a href="main.php?friendid=<?php echo $friend_list[$i]->userID ?>"><?php echo $friend_list[$i]->uname ?></a></li>	
						<?php
							}	
						?>
						</ul>
					</div>
				</div>
				<?php if (isset($_GET["friendid"])){ ?>
				<div id="content">
					<div class="box">
						<h2><?php $friend_id = $_GET["friendid"]; $friendname = get_user_name_by_id($friend_id); echo $friendname; ?> </h2>
					</div>


					<!-- STATUS -->

					<div class="box">
						<h3>Status</h3>
                        <?php                   
                            require_once "DAO/pictureDAO.php";
                            $picture = get_picture_by_pid($_GET['pid']);
                        ?> 
						<a href="<?php echo $picture->link?>"><img src="<?php echo $picture->link ?>"alt="NULL" width="50%" height="auto"></a> 
					</div>
			

				 <!-- LIKE -->
	             <div class="box">
                  <h3>Like</h3>
                     <?php
                            require_once "DAO/likeDAO.php";
                            $picture_like_list = get_like_picture_users_by_pid($_GET['pid']);
                            $like_count = count($picture_like_list);
                            if ($like_count == 0){
                                echo "No one likes this picture. <br/>";
                            }
                            else{
                                for ($i = 0 ; $i < count($picture_like_list) - 1 ; ++$i){
                                    echo $picture_like_list[$i]->uname . ", " ;
                                }
                                echo $picture_like_list[$i]->uname . " like this picture <br/> ";

                            }

                    ?>

            </div>
				
                <br class="clearfix" />
                </div>
				<br class="clearfix" />
				</div>

            <div id="page-bottom">
                <div id="page-bottom-content">
                    <h3>Acknowledgement</h3>
                    <p>
                        This site is built for Columbia University W4111 2012 Fall Project.
                    </p>
                </div>
                <br class="clearfix" />
            </div>
        </div>
	
		<?php  } ?>
		
        <div id="footer">
            &copy; 2012 SNS Portal | Design by Yu Qiao (yq2145) and Cheng Xiang (cx2142) </a>
        </div>
    </body>
</html>

