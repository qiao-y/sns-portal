<html>
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
					<h1><a href="index.php">SNS Portal</a></h1>
				</div>
			</div>
			<div id="page">
				<div id="sidebar">
					<div class="box">
						<form id='login' action='checklogin.php' method='post' accept-charset='UTF-8'>
						<h3>Log In</h3>
						<p>
							SNS Portal is a website through which you can collectively acquire all SNS activities on other websites.  
						</p>
						<ul>
							<li>Email  <input style="color: rgb(51, 51, 51);" name="email" id="email" tabindex="1" value="" type="text" /></li>
							<li>Password <input style="color: rgb(51, 51, 51);" name="password" id="password" tabindex="1" value="" size="17" type="password" /></li>
						</ul>	
						<input type='submit' name='Submit' value='Login' />					

						</form>
						</div>
				</div>
				<div id="content">
					<div class="box">
						<h2>Welcome to SNS Portal</h2>
						<p>
							This is <strong>SNS Portal</strong>. Welcome to register.
						</p>
					</div>
					<div class="box">
						<form id='register' action='register.php' method='post' accept-charset='UTF-8'>
						<ul>
                            <li>Email: <input style="color: rgb(51, 51, 51);" name="reg_email" id="reg_email" tabindex="1" value="" type="text"></li>
                            <li>Password: <input style="color: rgb(51, 51, 51);" name="reg_password" id="reg_password" tabindex="1" value="" type="password"></li>
						    <li>Confirm Password: <input style="color: rgb(51, 51, 51);" name="con_password" id="con_password" tabindex="1" value="" type="password"></li>
                            <li>Name: <input style="color: rgb(51, 51, 51);" name="name" id="name" tabindex="1" value="" type="text"></li>
						</ul>
				
						<input type='submit' name='Submit' value='Register' />

					</form>

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
