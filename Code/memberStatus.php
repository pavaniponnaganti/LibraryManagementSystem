<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "library";
	
$con=mysqli_connect($dbhost, $dbuser, $dbpass,$dbname);

$id = $_GET['memid'];

$book = mysqli_real_escape_string($con,$id);

$query = "SELECT bookid,title,author,shelf FROM books WHERE memid = '$id'";
	
$qry_result = mysqli_query($con,$query) or die(mysqli_error($con));

$display_string = "<table>";
$display_string .= "<tr>";
$display_string .= "<th>BookId</th>";
$display_string .= "<th>Title</th> ";
$display_string .= "<th>Author</th>		";
$display_string .= "<th>Shelf</th>		";
$display_string .= "</tr>";

while($row = mysqli_fetch_array($qry_result)){
   $display_string .= "<tr>";
   $display_string .= "<td>$row[bookid]</td>";
   $display_string .= "<td>$row[title]</td>";
   $display_string .= "<td>$row[author]</td>";
   $display_string .= "<td>$row[shelf]</td>";
   $display_string .= "</tr>";
}

$display_string .= "</table>";

echo $display_string;
?>