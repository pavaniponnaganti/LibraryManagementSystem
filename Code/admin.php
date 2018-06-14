<?php
session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900|Quicksand:400,700" rel="stylesheet" />
<link href="default1.css" rel="stylesheet" type="text/css" media="all" />
<link href="fonts.css" rel="stylesheet" type="text/css" media="all" />
<link rel="icon" href="images/library-icon.png" sizes="16x16" type="image/png">

<!--[if IE 6]><link href="default_ie6.css" rel="stylesheet" type="text/css" /><![endif]-->

</head>
<body>

<script language="javascript" type="text/javascript">

function ajaxFunction(){           //for memberStatus
   var ajaxRequest;
   ajaxRequest = new XMLHttpRequest();
   ajaxRequest.onreadystatechange = function(){
   
      if(ajaxRequest.readyState == 4){
         var ajaxDisplay = document.getElementById('ajaxDiv');
         ajaxDisplay.innerHTML = ajaxRequest.responseText;
      }
   }
   var id = document.getElementById('memid').value;
   var queryString = "?memid="+id;
   ajaxRequest.open("GET", "memberStatus.php" + queryString, true);
   ajaxRequest.send(null); 
}

function ajaxFunction2(){           //for issue_book_by_admin
   var ajaxRequest;
   ajaxRequest = new XMLHttpRequest();
   ajaxRequest.onreadystatechange = function(){
   
      if(ajaxRequest.readyState == 4){
         var ajaxDisplay = document.getElementById('ajaxDiv');
         ajaxDisplay.innerHTML = ajaxRequest.responseText;
      }
   }
   var mid=document.getElementById('memid2').value;
   var bid=document.getElementById('bookid2').value;
   var queryString = "?memid2="+mid;
   queryString+="&bookid2="+bid;
   ajaxRequest.open("GET", "issue_book_by_admin.php" + queryString, true);
   var person = confirm("Issued book successfully!!!");
   ajaxRequest.send(null); 
}

function ajaxFunction3(){             //for receive_book_by_admin
   var ajaxRequest;
   ajaxRequest = new XMLHttpRequest();
   ajaxRequest.onreadystatechange = function(){
   
      if(ajaxRequest.readyState == 4){
         var ajaxDisplay = document.getElementById('ajaxDiv');
         ajaxDisplay.innerHTML = ajaxRequest.responseText;
      }
   }
   var mid=document.getElementById('memid3').value;
   var bid=document.getElementById('bookid3').value;
   var queryString = "?memid3="+mid;
   queryString+="&bookid3="+bid;
   ajaxRequest.open("GET", "receive_book_by_admin.php" + queryString, true);
   var person = confirm("Received book successfully!!!");
   ajaxRequest.send(null); 
}

</script>

<div id="header-wrapper">
	<div id="header" class="container">
		<div id="logo">
			<h1><a href="#">Library Admin</a></h1>
			<div id="menu">
				<ul>
					<li class="current_page_item"><a href="#" accesskey="1" title="">Homepage</a></li>
					<li><a href="logout.php" accesskey="2" title="">Logout</a></li>
				</ul>
			</div>
		</div>
	</div>
</div>
<div id="wrapper">
	<div id="three-column" class="container">
		<div><span class="arrow-down"></span></div>
		
		<!--FOR MEMBER STATUS-->
		<div id="tbox1" style="display:inline">
			<div class="title">
				<h2>Member Status</h2>
			</div>
			<form name='MemberStatus'>
			Member ID : <input type='text' id='memid' /> <br><br><br><br>
			<input href='#' type="button" class="button" onclick='ajaxFunction()' value='CHECK'/>
			</form><br><br>
			<div id='ajaxDiv'>Your result will display here</div></div>
		
		<!--FOR ISSUE-->
		<div id="tbox2" style="display:inline">
			<div class="title">
				<h2>Issue</h2>
			</div>
			<form name='Issue'>
			Member ID: <input type="text" id="memid2"><br><br>
			Book ID:   <input type="text" id="bookid2"><br><br>
			<input href="#" type="button" class="button" onclick='ajaxFunction2()' value='UPDATE'/>
			</form>
			<div id='ajaxDiv'></div></div>
		
		<!--FOR RECEIVE-->
		<div id="tbox3" style >
			<div class="title">
				<h2>Receive</h2>
			</div>
			<form name='Issue'>
			Member ID: <input type="text" id="memid3"><br><br>
			Book ID:   <input type="text" id="bookid3"><br><br>
			<input href="#" type="button" class="button" onclick='ajaxFunction3()' value='UPDATE'/>
			</form>
			<div id='ajaxDiv'></div></div>

</body>
</html>