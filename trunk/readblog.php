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
							echo get_user_name_by_id($userid); 
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
				<?php if (isset($_GET["bid"])){ ?>
	
			<div id="content">
					<div class="box">
						<h2>
							<?php 
								require_once "DAO/blogDAO.php";
								$blog_id = $_GET["bid"]; 
								$blog = get_blog_by_id($blog_id);
								echo $blog->title . "<br />" . $blog->timestamp;
							 ?> 
						</h2>
						
						<p>
							<?php echo $blog->body; ?> 
						</p>
					 <br class="clearfix" />
                </div>
                <br class="clearfix" />

             <div class="box">
                  <h3>Comments</h3>
                     <?php
                            $blog_comment_list = get_blog_comment_by_bid($blog_id);
                            for ($i = 0 ; $i < count($blog_comment_list) ; ++$i){
                    ?>
                        	<p>
								<strong>
								<?php
								$commenter = get_user_name_by_id($blog_comment_list[$i]->uid); 
								$date = $blog_comment_list[$i]->date; 
								$content = $blog_comment_list[$i]->body; 
								?>
								<a href="main.php?friendid=<?php echo $blog_comment_list[$i]->uid; ?>"><?php echo $commenter; ?></a>
								<?php
								echo  $date . ":" . $content;  
								?>
								</strong>
							</p>
							
					<?php
                            }
                    ?>
			</div>

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

