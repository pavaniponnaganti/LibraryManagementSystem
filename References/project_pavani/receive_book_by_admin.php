<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "library";
	
$con=mysqli_connect($dbhost, $dbuser, $dbpass,$dbname);
	
$mid = 0;
$bid = $_GET['bookid3'];
$avl = "Available";

$date_receive = NULL;

$book = mysqli_real_escape_string($con,$bid);

$query = "update books set memid='$mid',availability='$avl',issue_date='$date_receive' where bookid='$bid'";
$qry_result = mysqli_query($con,$query);

$query2 = "update issued_by set memid='$mid',issue_date='$date_receive' where bookid='$bid'";
$qry_result1 = mysqli_query($con,$query2);

$query3 = "update book set availability='$avl' where bookid='$bid'";
$qry_result2 = mysqli_query($con,$query3);
  
//Warning: mysqli_fetch_array() expects parameter 1 to be mysqli_result, boolean given in C:\xampp\htdocs\dbms\project_dbms\change_pswd.php on line 22

set_error_handler(function() { /* ignore errors */ });
dns_get_record();

while($row = mysqli_fetch_array($qry_result)){  //1
   
}

restore_error_handler();

set_error_handler(function() { /* ignore errors */ });  //2
dns_get_record();

while($row = mysqli_fetch_array($qry_result2)){
   
}

restore_error_handler();

set_error_handler(function() { /* ignore errors */ });  //3
dns_get_record();

while($row = mysqli_fetch_array($qry_result3)){
   
}

restore_error_handler();
?>