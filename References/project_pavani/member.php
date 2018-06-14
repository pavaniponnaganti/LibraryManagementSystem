<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Member Details</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900|Quicksand:400,700" rel="stylesheet" />
<link href="style.css" rel="stylesheet" type="text/css" media="all" />
<link href="fonts.css" rel="stylesheet" type="text/css" media="all" />
<link rel="icon" href="images/library-icon.png" sizes="16x16" type="image/png">

<?php
session_start();
?>

</head>
<body>

<script language="javascript" type="text/javascript">

function ajaxFunction(){
   var ajaxRequest;
   ajaxRequest = new XMLHttpRequest();
   ajaxRequest.onreadystatechange = function(){
   
      if(ajaxRequest.readyState == 4){
         var ajaxDisplay = document.getElementById('ajaxDiv');
         ajaxDisplay.innerHTML = ajaxRequest.responseText;
      }
   }
   var id = '<?php echo $_SESSION["memid"]; ?>';
   var queryString = "?memid="+id;
   ajaxRequest.open("GET", "issuedBooks.php" + queryString, true);
   ajaxRequest.send(null); 
}

function ajaxFunction2(){
   var ajaxRequest;
   ajaxRequest = new XMLHttpRequest();
   ajaxRequest.onreadystatechange = function(){
   
      if(ajaxRequest.readyState == 4){
         var ajaxDisplay = document.getElementById('ajaxDiv');
         ajaxDisplay.innerHTML = ajaxRequest.responseText;
      }
   }
   var str=document.getElementById('pswd').value;
   var id = '<?php echo $_SESSION["memid"]; ?>';
   var queryString = "?memid="+id;
   queryString+="&newpass="+str;
   ajaxRequest.open("GET", "change_pswd.php" + queryString, true);
   var person = confirm("Password Successfully changed!!!");
   ajaxRequest.send(null); 
}

</script>

<div id="header-wrapper">
	<div id="header" class="container">
		<div id="logo">
			<h1><a href="#">Library</a></h1>
			<div id="menu">
				<ul>
					<!--li class="current_page_item"><a href="http://localhost/ayonya100/project_dbms/index.php" accesskey="1" title="">Homepage</a></li-->
					<li><a href="logout.php" accesskey="2" title="">Logout</a></li>
					
				</ul>
			</div>
		</div>
	</div>
</div>
<div id="page-wrapper">
	<div id="page" class="container">
		<div class="title">
			<h2>Account Details</h2>
		</div>
		<?php
if($_SESSION["username"]) {
?>

<p> Welcome! </p> <br />
		 
		<div id="tbox1">
			<p>Name: <?php echo $_SESSION["username"]; ?></p>
			<p>Member ID: <?php echo $_SESSION["memid"]; ?> </p>
		</div>
<?php
}
?>
	</div>
</div>
 <div id="wrapper">
	<div id="three-column" class="container" >
		<div><span class="arrow-down"></span></div>
		<div id="tbox1" style="display:inline">
			<input type='button' class="button" onclick='ajaxFunction()' value='Books Issued'/><br /><br />
			<br /><br /> <br />
		<div id="tbox2" style="display:inline" > 
				<input type='password' id='pswd' name="pass"/><br />  
				<input type='button' class="button" onclick='ajaxFunction2()' value='Change Password'/>
		<div id="tbox2" style="display:inline">	</div>  <br />
	</div>
		<div id='ajaxDiv'></div>
	</div>
	</div>
</body>
</html>