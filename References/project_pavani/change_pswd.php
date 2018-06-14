<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "library";
	
$con=mysqli_connect($dbhost, $dbuser, $dbpass,$dbname);
	
$newpass = $_GET['newpass'];
$id = $_GET['memid'];

$book = mysqli_real_escape_string($con,$id);

$query = "update member set paswd='$newpass' where memid='$id'";
	
$qry_result = mysqli_query($con,$query);  

//Warning: mysqli_fetch_array() expects parameter 1 to be mysqli_result, boolean given in C:\xampp\htdocs\dbms\project_dbms\change_pswd.php on line 22

set_error_handler(function() { /* ignore errors */ });
dns_get_record();

while($row = mysqli_fetch_array($qry_result)){
   
}

restore_error_handler();

?>