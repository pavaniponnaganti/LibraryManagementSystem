<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>About Us</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900|Quicksand:400,700" rel="stylesheet" />
<link href="default.css" rel="stylesheet" type="text/css" media="all" />
<link href="fonts.css" rel="stylesheet" type="text/css" media="all" />
<link rel="icon" href="images/library-icon.png" sizes="16x16" type="image/png">

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

<script type="text/javascript" src="book.js"> </script>

<style type="text/css">
<!--
.style2 {
	font-size: 18px;
	font-weight: bold;
}
.style3 {
	font-size: 14pt;
	font-weight: bold;
}
-->
</style>
</head>
<body>

<div id="header-wrapper">
	<div id="header" class="container">
		<div id="logo">
			<h1><a href="http://localhost/dbms/project_poo/">Library</a></h1>
			<div id="menu">
				<ul>
					<li class="current_page_item"><a href="http://localhost/dbms/project_poo/" accesskey="1" title="">Homepage</a></li>
					<!--li><a href="" accesskey="2" id="loginform" title="">Login</a></li-->
					<li><a href="http://localhost/dbms/project_poo/book.html" accesskey="3" title="">Books</a></li>
					<li><a href="http://localhost/dbms/project_poo/about us.php" accesskey="5" title="">About Us</a></li>
				</ul>
			</div>
		</div>
	</div>
</div>

<div id="page-wrapper">
	<div id="page" class="container">
		<div class="title">
			<h2>About Us</h2></br> </br>
			<h3 class="style3">Group Members</h3> </br>
			<p class="style2"> Name: Ayonya Prabhakaran &nbsp;&nbsp;&nbsp;&nbsp; Roll No. IHM2014502 &nbsp;(Front End)</p>
			<p class="style2"> Name: Kritika Sharma &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Roll No. ICM2014502 &nbsp;(Front End and Back-end)</p>
			<p class="style2"> Name: Padira Poojita Reddy &nbsp;&nbsp;&nbsp;&nbsp; Roll No. IIT2014145 &nbsp;(Front-end and Back-end)</p>
		</div>
		<p></p>
  </div>
</div>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
	<script src="login_js/index.js"></script>
</body>
</html>