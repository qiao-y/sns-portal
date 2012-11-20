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
                    </form>
					<ul>
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
				<?php 
				//update
				require_once "DAO/update_db.php";
				update($_GET["friendid"]);	

				?>
				<div id="content">
					<div class="box">
						<h2><?php $friend_id = $_GET["friendid"]; $friendname = get_user_name_by_id($friend_id); echo $friendname; ?> </h2>
					</div>
					<?php 
						if (!is_friend($userid,$friend_id)){
							echo "You cannot view this page as he/she is not your friend. <br/>";
							return;
						}
					?>

					<!-- BLOG -->

					<div class="box">
						<h3>Blog</h3>
						<?php	
							require_once "DAO/blogDAO.php";
							$blog_list = get_blog_list_by_uid($friend_id);
							for ($i = 0 ; $i < count($blog_list) ; ++$i){
							?>
							<a href="readblog.php?bid=<?php echo $blog_list[$i]->bid; ?>"style="color:white; background-color:rgb(56,69,138)"><?php echo $blog_list[$i]->title; ?></a>  <br/>
						<?php	
							} 					
						?>	
					</div>


					<!-- STATUS -->

					<div class="box">
						<h3>Status</h3>
                        <?php                   
                            require_once "DAO/statusDAO.php";
                            $status_list = get_status_by_uid($friend_id);
                            for ($i = 0 ; $i < count($status_list) ; ++$i){
                            ?>      
                            <a href="status.php?friendid=<?php echo $friend_id ?>&sid=<?php echo $status_list[$i]->sid ?>"style="color:white; background-color:rgb(56,69,138)"><?php echo $status_list[$i]->content; ?></a> <br/>
                        <?php 
                            }                   
                        ?>  
					</div>


					<!-- TWEET -->
                    <div class="box">
                        <h3>Tweet</h3>
                        <?php
                            require_once "DAO/tweetDAO.php";
                            $tweet_list = get_tweet_by_uid($friend_id);
                            for ($i = 0 ; $i < count($tweet_list) ; ++$i){
                            ?>
                            <font style="background-color:rgb(128,179,212)"><?php echo $tweet_list[$i]->content; ?></font><br/> 
                        <?php
                            }
                        ?>
                    </div>


				
                    <!-- LIKE BLOG -->
<!--
                    <div class="box">
                        <h3>Like Blog</h3>
-->


                    <!-- SHARING -->

                    <div class="box">
                      <h3>Sharings</h3>
                        <?php
                            require_once "DAO/sharingDAO.php";
                            $picture_list = get_sharing_list_by_uid($friend_id);
                            for ($i = 0 ; $i < count($picture_list) ; ++$i){
                                echo output_sharing($picture_list[$i],$friend_id);
                            }
                        ?>
                    </div>


                    <!-- PICTURES -->

                    <div class="box">
                        <h3>Pictures</h3>
                        <?php
                            require_once "DAO/pictureDAO.php";
                            $picture_list = get_picture_list_by_uid($friend_id);
                            for ($i = 0 ; $i < count($picture_list) ; ++$i){
                        ?> 
							<div class="img"> 
							<a href="viewpicture.php?friendid=<?php echo $friend_id ?>&pid=<?php echo $picture_list[$i]->pid ?>"><img src="<?php echo $picture_list[$i]->link ?>"alt="NULL" width="110" height="90"></a>
						 <div class="desc"><?php echo $picture_list[$i]->desc ?></div>
							</div>
                        <?php
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

