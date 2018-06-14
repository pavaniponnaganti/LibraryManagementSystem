<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "library";
	
$con=mysqli_connect($dbhost, $dbuser, $dbpass,$dbname);
	
$book = $_GET['book'];
$optn = $_GET['option'];

$book = mysqli_real_escape_string($con,$book);
if($optn == "a")
	$query = "SELECT * FROM books WHERE author = '$book' ";
else
	$query = "SELECT * FROM books WHERE title = '$book' ";
	
$qry_result = mysqli_query($con,$query) or die(mysqli_error($con));

$display_string = "<table>";
$display_string .= "<tr>";
$display_string .= "<th>BookId</th>";
$display_string .= "<th>Title</th> ";
$display_string .= "<th>Author</th>		";
$display_string .= "<th>Shelf</th>		";
$display_string .= "<th>Availability</th>  ";
$display_string .= "<th>Memid</th> 	";
$display_string .= "</tr>";

while($row = mysqli_fetch_array($qry_result)){
   $display_string .= "<tr>";
   $display_string .= "<td>$row[bookid]</td>";
   $display_string .= "<td>$row[title]</td>";
   $display_string .= "<td>$row[author]</td>";
   $display_string .= "<td>$row[shelf]</td>";
   $display_string .= "<td>$row[availability]</td>";
   $display_string .= "<td>$row[memid]</td>";
   $display_string .= "</tr>";
}

$display_string .= "</table>";

echo $display_string;
?>