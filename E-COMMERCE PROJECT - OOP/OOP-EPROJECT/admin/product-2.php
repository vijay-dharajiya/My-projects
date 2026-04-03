<?php include"header.php";	
//====================================			DATA DELETE				===========================================
if(isset($_REQUEST['delete'])) {

	$DELETE=$_REQUEST['delete'];
	//echo $DELETE;
	$db->deldata($con->cn,"products","where pid='"."$DELETE"."'");
	//mysqli_query($cn,"delete from products where pid=$DELETE")or die("Delete error !!!".mysqli_error($cn));
	unlink($_REQUEST['pphoto']);
	echo "DATA DELETED";
}

//====================================		FIRST SELECT TABLE DATA 		=========================================
	$result=$db->getdata($con->cn,"products","*","","order by pid");

	//$result = mysqli_query($cn, "SELECT * from products")or die("Select error!!!".mysqli_error($cn));

	echo"<table border='1' align='center' bgcolor='pink'>";
	echo"<tr><th>P ID</th><th>C ID</th><th>PRODUCT NAME</th><th>PRODUCT PHOTO</th><th>PRODUCT MRP</th><th>PRODUCT PRICE</th><th>P DESCRIPTION</th><th>DELETE</th><th>UPDATE</th></tr>";

while($record = mysqli_fetch_array($result))
{
	echo "<tr>";
	echo "<td>".$record['pid']."</td>";
	echo "<td>".$record['cid']."</td>";
	echo "<td>".$record['pname']."</td>";
	echo "<td><img src='".$record['pphoto']."'height='100px' width='auto'></td>";
	echo "<td>".$record['pmrp']."</td>";
	echo "<td>".$record['pprice']."</td>";
	echo "<td>".$record['pdescription']."</td>";
	echo "<td><a href='product-2.php?delete=".$record['pid']."&de=".$record['pphoto']."'onclick='return check();'>DELETE</a></td>";	
	echo "<td><a href='product-1.php?delete=".$record['pid']."'>UPDATE</a></td>";
	echo "</tr>";

}
echo "</table>";
?>
<a href="product-1.php" class="btn btn1">Insert Product</a>
<script>
	function check() {
		return confirm("Do You Want To Delete ???")
	}
</script>

</body>
</html>