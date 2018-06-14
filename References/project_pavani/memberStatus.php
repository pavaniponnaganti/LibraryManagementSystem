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

/*if($qry_result->num_rows == 0) {
	$display_string = "<th>No books issued</th>";
}*/

//DUE_DATE FUNCTIONALITY
$issue2_date = mysqli_query($con,"SELECT issue_date FROM books WHERE memid = '$id'");
$result = mysqli_fetch_array($issue2_date);
$start_date = $result['issue_date'];
$issue_date3 = date('d-m-Y',strtotime($start_date));
$due_date = date('d-m-Y', strtotime($start_date. ' + 15 days'));
$current_date = new DateTime();
$date_due = new DateTime($due_date);

//FINE FUNCTIONALITY
$diff = date_diff($date_due, $current_date);
$days = $diff->format("%R%a days");
//echo "days =".$days;

if($days > 0) {
	$str = "Rs.".$days*5;
} else { 
	$str = "no fine";
  }

$display_string = "<table border=1 cellspacing=0 cellpading=0>";
$display_string .= "<tr>";
$display_string .= "<th>BookId</th>";
$display_string .= "<th>Title</th> ";
$display_string .= "<th>Author</th>		";
$display_string .= "<th>Shelf</th>		";
$display_string .= "<th>Issue Date</th>		";
$display_string .= "<th>Due Date</th>		";
$display_string .= "<th>Fine</th>		";
$display_string .= "</tr>";

while($row = mysqli_fetch_array($qry_result)){
   $display_string .= "<tr>";
   $display_string .= "<td>$row[bookid]</td>";
   $display_string .= "<td>$row[title]</td>";
   $display_string .= "<td>$row[author]</td>";
   $display_string .= "<td>$row[shelf]</td>";
   $display_string .= "<td>$issue_date3</td>";
   $display_string .= "<td>$due_date</td>";
   $display_string .= "<td>$str</td>";
   $display_string .= "</tr>";
}

$display_string .= "</table>";

echo $display_string;
?>