<?php include"header.php" ;
//============================ delete FORMULA ================================

if(isset($_REQUEST['delete']))
{
	$delete=$_REQUEST['delete'];
	$db->deldata($con->cn,"catagories","where cid='"."$delete"."'");
	//mysqli_query($cn,"delete from catagories where cid=$delete")or die("delete error".mysqli_error($cn));
}
//=========================select part===========================
$result=$db->getdata($con->cn,"catagories","*","","order by cid ");
//$result = mysqli_query($cn,"SELECT * From catagories")or die("select error!!!".mysqli_error($cn));
echo"<table border='1' align='center' bgcolor='pink'>";
echo"<tr><th>ID</th><th>CATAGORY NAME</th><th>DELETE</th><th>UPDATE</th></tr>";

while ($record = mysqli_fetch_array($result)) 
{
	echo "<tr>";
	echo "<td>". $record['cid']."</td>";
	echo "<td>". $record['cname']."</td>";
	echo "<td><a href='cata_view.php?delete=".$record['cid']."' onclick='return check();'>DELETE</a></td>";
	echo "<td><a href='cata_insert.php?delete=".$record['cid']."'>UPDATE</a></td>";
	echo "</tr>";
}
echo"</table>";
?>

<a href="cata_insert.php" class="btn btn1 ">CATAGORIES INSERT</a>
<script>
function check ()
{
	return confirm("Do You Want To delete ?");
}
</script>

</body>
</html>
