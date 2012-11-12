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
							<li><a href="#"><?php echo $friend_list[$i]->uname ?></a></li>	
						<?php
							}	
						?>
						</ul>
					</div>
				</div>
				<div id="content">
					<div class="box">
						<h2>Welcome to Accumen</h2>
						<img class="alignleft" src="images/pic01.jpg" width="200" height="180" alt="" />
						<p>
							This is <strong>Accumen</strong>, a free, fully standards-compliant CSS template by <a href="http://www.freecsstemplates.org/">Free CSS Templates</a>. The images used in this template are from <a href="http://fotogrph.com/">Fotogrph</a>. This free template is released under a <a href="http://creativecommons.org/licenses/by/3.0/">Creative Commons Attributions 3.0</a> license, so you are pretty much free to do whatever you want with it (even use it commercially) provided you keep the footer credits intact. Aside from that, have fun with it :)
						</p>
					</div>
					<div class="box">
						<h3>Nullam curae integer</h3>
						<p>
							Congue quam posuere elit adipiscing varius tellus. Consequat porttitor dolor sed viverra cum congue. Varius primis auctor est nisl at mi quam. Ante libero arcu ridiculus blandit placerat. Sociis in consequat suscipit felis vivamus odio phasellus. Elementum pellentesque vestibulum gravida morbi turpis ante nullam. Pellentesque placerat porta ipsum.
						</p>
					</div>
					<div class="box">
						<h3>Accumsan euismod gravida pellentesque</h3>
						<p>
							Sociis dictum mauris ultricies suspendisse in quisque. Massa non morbi magna eget. Cubilia aliquet duis sapien ac nascetur fringilla ullamcorper. Auctor est odio rhoncus pharetra purus mattis. Ultrices vulputate lacus ridiculus imperdiet cursus. Tellus ridiculus morbi fringilla volutpat mi magna aliquam.
						</p>
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
        <div id="footer">
            &copy; 2012 SNS Portal | Design by Yu Qiao (yq2145) and Cheng Xiang (cx2142) </a>
        </div>
    </body>
</html>

