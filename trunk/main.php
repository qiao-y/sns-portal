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
				<div id="content">
					<div class="box">
						<h2><?php $friend_id = $_GET["friendid"]; $friendname = get_user_name_by_id($friend_id); echo $friendname; ?> </h2>
					</div>


					<!-- BLOG -->

					<div class="box">
						<h3>Blog</h3>
						<?php	
							require_once "DAO/blogDAO.php";
							$blog_list = get_blog_list_by_uid($friend_id);
							for ($i = 0 ; $i < count($blog_list) ; ++$i){
							?>
							<a href="readblog.php?bid=<?php echo $blog_list[$i]->bid; ?>"><?php echo $blog_list[$i]->title; ?></a>	<br/>	
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
                            <?php echo $status_list[$i]->timestamp . ": " . $status_list[$i]->content; ?> <br/>   
                        <?php 
                            }                   
                        ?>  
					</div>
				
                    <!-- LIKE BLOG -->

                    <div class="box">
                        <h3>Like Blog</h3>
                        <?php
                            require_once "DAO/likeDAO.php";
                            $like_blog_list = get_like_blog_by_uid($friend_id);
                            for ($i = 0 ; $i < count($like_blog_list) ; ++$i){
                            ?>
                            <?php echo $friendname . " LIKED "?>
							<a href="readblog.php?bid=<?php echo $like_blog_list[$i]->bid ?>"><?php echo $like_blog_list[$i]->btitle; ?></a> at <?php echo $like_blog_list[$i]->timestamp; ?><br/>
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

