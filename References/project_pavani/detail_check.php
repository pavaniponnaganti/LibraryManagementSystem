
<html>
   <body>
   
      <?php
		$username=$_POST['name'];
		$password=$_POST['password'];
        $link= mysqli_connect("localhost","root","","library");
		if (!$link)
		{
			die('Could not connect: ' . mysql_error());
		}
		$sql="select * from member";
		$retval = mysqli_query($link, $sql);
		if(! $retval )
		{
			die('Could not get data: ' . mysql_error());
		}
		while($row = mysqli_fetch_array($retval)){
           if ($row['mname']== $username && $row['paswd']==$password){
			   header("Location: member.html");
			   break;
		   }
		}   
  
		mysqli_close($link); 
     ?>
      
   </body>
</html>