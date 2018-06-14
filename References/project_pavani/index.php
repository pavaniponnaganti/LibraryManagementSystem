<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Library</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900|Quicksand:400,700" rel="stylesheet" />
<link href="default.css" rel="stylesheet" type="text/css" media="all" />
<link href="fonts.css" rel="stylesheet" type="text/css" media="all" />
<link rel="icon" href="images/library-icon.png" sizes="16x16" type="image/png">
<link href="style2.css" rel="stylesheet" type="text/css">

<!--[if IE 6]><link href="default_ie6.css" rel="stylesheet" type="text/css" /><![endif]-->

<?php
	session_start();
	$message="";
	$f=0;
	if(count($_POST)>0) {
		$conn = mysqli_connect("localhost","root","","library");
		$result = mysqli_query($conn,"SELECT * FROM member WHERE mname='" . $_POST['name'] . "' and paswd = '". $_POST['password']."'");
		if($_POST['name']=='admin'){
			$f=1;
		}
		$row  = mysqli_fetch_array($result);
		if(is_array($row)) {
			$_SESSION["memid"] = $row[memid];
			$_SESSION["username"] = $row[mname];
		} else {
			$message = "Invalid Username or Password!";
		}
	}
	if(isset($_SESSION["memid"])) {
		if($f=='0')
			header("Location:member.php");
		else
			header("Location:admin.php");
	}
?>


</head>
<body>
<div id="header-wrapper">
	<div id="header" class="container">
		<div id="logo">
			<h1><a href="#">Library</a></h1>
			<div id="menu">
				<ul>
					<li class="current_page_item"><a href="http://localhost/dbms/project_poo/" accesskey="1" title="">Homepage</a></li>
					<li><a href="#" accesskey="2" id="loginform" title="">Login</a> </li>
					<li><a href="http://localhost/dbms/project_poo/book.html" accesskey="3" title="">Books</a></li>
					<li><a href="http://localhost/dbms/project_poo/about us.php" accesskey="4" title="">About Us</a></li>
			</ul>
				<div id="navthing">
					<div class="login">
						<div class="arrow-up"></div>
							<div class="formholder">
								<div class="randompad">
									<fieldset>
										<FORM name="frmUser" method="post" action="">
											<label name="username">Username</label>
											<input type="username" name="name"/>
											<label name="password">Password</label>
											<input type="Password" name="password"/>
											<input type="submit" value="Login" />
										</FORM>
									</fieldset>
								</div>
							</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div id="page-wrapper">
	<div id="page" class="container">
		<div class="title">
			<h2>Welcome to our library</h2>
		</div>
		<p>An interactive and user-friendly library site to cater to your needs.</p>
		<p>You can browse through the books you need, login as a member to find your issue status. Do not forget to visit our library to issue and receive books</p>
		<p>NOTE : fine for over due of books will be Rs.5/- per day after the due date is over. Kindly cooperate</p>
	</div>
</div>

<!--
 <div id="copyright" class="container">
<p>&copy; Untitled. All rights reserved. | Photos by <a href="http://fotogrph.com/">Fotogrph</a> | Design by <a href="http://templated.co" rel="nofollow">TEMPLATED</a>.</p>
		<ul class="contact">
			<li><a href="https://www.facebook.com/ayonya100?fref=ts" class="icon icon-facebook"><span></span></a></li>
			<li><a href="https://www.facebook.com/profile.php?id=100008350187978&fref=ts" class="icon icon-facebook"><span></span></a></li>
			<li><a href="https://www.facebook.com/kritikaangle.sharma" class="icon icon-facebook"><span></span></a></li>
		</ul>
</div>
-->

<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src="login_js/index.js"></script>
</body>
</html>
