<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "library";
	
$con=mysqli_connect($dbhost, $dbuser, $dbpass,$dbname);
	
$mid = 0;
$bid = $_GET['bookid3'];
$avl = "Available";
$dt  = NULL;

$book = mysqli_real_escape_string($con,$bid);

$query = "update books set memid='$mid',availability='$avl',issue_date='$dt' where bookid='$bid'";
	
$qry_result = mysqli_query($con,$query);
  
//Warning: mysqli_fetch_array() expects parameter 1 to be mysqli_result, boolean given in C:\xampp\htdocs\dbms\project_dbms\change_pswd.php on line 22

set_error_handler(function() { /* ignore errors */ });
dns_get_record();

while($row = mysqli_fetch_array($qry_result)){
   
}

restore_error_handler();

?>