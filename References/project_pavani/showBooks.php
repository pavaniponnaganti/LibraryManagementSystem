<html>
<body>
	<?php
		$q = $_REQUEST["q"];
		$name=$_GET['name'];
        $link= mysqli_connect("localhost","root","","library");
		if (!$link)
		{
			die('Could not connect: ' . mysql_error());
		}
		$sql="select * from member where author is like %($q)%";
		$retval = mysqli_query($link, $sql);
		if(! $retval )
		{
			die('Could not get data: ' . mysql_error());
		}
		while($row = mysqli_fetch_array($retval)){
            echo $row['title'];
			"<br>"
		    echo $row['author'];
		}   */
		echo "hii";
		mysqli_close($link); 
	?> 
</body>
</html>