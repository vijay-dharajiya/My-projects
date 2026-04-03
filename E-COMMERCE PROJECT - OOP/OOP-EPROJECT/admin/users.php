<?php include"header.php";
//=================================			DELETE DATA 		=======================================
	if(isset($_REQUEST['delete'])){

		$DELETE=$_REQUEST['delete'];
		//echo "$DELETE";
		$db->deldata($con->cn,"sign_up","where sid='"."$DELETE"."'");
		//mysqli_query($cn,"delete from sign_up where sid=$DELETE")or die("delete error".mysqli_error($cn));
	}

//=================================			select from table data ======================================
	
	$result=$db->getdata($con->cn,"sign_up","*","","");
	//$result = mysqli_query($cn,"SELECT * FROM sign_up")or die("Select error".mysqli_error($cn));

	echo"<table border='1' align='center' bgcolor='pink'>";
	echo"<tr><th>S ID</th><th>USER NAME</th><th>EMAIL</th><th>PASSWORD</th><th>CONTACT</th><th>DELETE</th></tr>";
	while ($record=mysqli_fetch_array($result)) {
		
		echo "<tr>";
		echo "<td>".$record['sid']."</td>";
		echo "<td>".$record['uname']."</td>";
		echo "<td>".$record['email']."</td>";
		echo "<td>".$record['password']."</td>";
		echo "<td>".$record['contact']."</td>";
		echo "<td><a href='users.php?delete=".$record['sid']."' onclick='return check();'>DELETE</a></td>";
		echo "</tr>";
	}
	echo"</table>";
?>	
<script>
	function check()
	{
		return confirm("Are You Sure To Delete ???")
	}
</script>
</body>
</html>