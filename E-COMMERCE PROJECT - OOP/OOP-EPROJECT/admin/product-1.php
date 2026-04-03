<?php include"header.php";
//=========================================			OLD DATA FETCH 		=============================
if(isset($_REQUEST['delete'])) {

	$DELETE=$_REQUEST['delete'];
	//echo $DELETE;
	$result=$db->getdata($con->cn,"products","*","WHERE pid='"."$DELETE"."'","order by pid");
	//$result = mysqli_query($cn, "SELECT * from products WHERE pid=$DELETE")or die("Select error!!!".mysqli_error($cn));
	$record = mysqli_fetch_array($result);
	//echo $record['pname'];
}
//=========================================			UPDATE DATA			==============================
if (@$_REQUEST['btn']=='UPDATE') 
{
	$vijay=$_REQUEST['vijay'];
	$cid=$_REQUEST['cid'];
	$name=$_REQUEST['pname'];
	$mrp=$_REQUEST['pmrp'];
	$price=$_REQUEST['pprice'];
	$description=$_REQUEST['pdescription'];
	$pht=$_REQUEST['oimg'];
	if ($_FILES['pphoto']['name']!="") {
	
		$pht="image/".$_FILES['pphoto']['name'];
		move_uploaded_file($_FILES['pphoto']['tmp_name'],$pht);
		unlink($_REQUEST['oimg']);
	}

	$db->updatedata($con->cn,"products",array("cid"=>$cid, "pname"=>$name, "pphoto"=>$pht,"pmrp"=>$mrp, "pprice"=>$price, "pdescription"=>$description),"where pid='"."$vijay"."'");
	//mysqli_query($cn,"UPDATE products SET cid='$cid', pname='$name',pphoto='$pht',pmrp='$mrp', pprice='$price', pdescription='$description' WHERE pid=$vijay")or die("Insert error !!!".mysqli_error($cn));

	header("location:product-2.php");
}

//==========================================		INSERT DATA			==============================
if (@$_REQUEST['btn']=='Insert') 
{
	$cid=$_REQUEST['cid'];
	$name=$_REQUEST['pname'];
	$pht="image/".$_FILES['pphoto']['name'];
	$mrp=$_REQUEST['pmrp'];
	$price=$_REQUEST['pprice'];
	$description=$_REQUEST['pdescription'];
	move_uploaded_file($_FILES['pphoto']['tmp_name'],$pht);
	$db->adddata($con->cn,"products",array("cid"=>$cid, "pname"=>$name, "pphoto"=>$pht,"pmrp"=>$mrp, "pprice"=>$price, "pdescription"=>$description));
	//mysqli_query($cn,"INSERT INTO products SET cid='$cid', pname='$name',pphoto='$pht',pmrp='$mrp', pprice='$price', pdescription='$description'")or die("Insert error !!!".mysqli_error($cn));
	header("location:product-2.php");
}

?>	
	<!-- Image Section -->

	<div class="container">
	    <h2 class="">Add Product</h2>
	    <div class="center">
		    <form method="POST" enctype="multipart/form-data">

		        
		        <div class="form-group">
		            <input type="hidden" name="vijay"  value="<?=$record['pid'];?>" required>
		            <input type="hidden" name="oimg" value="<?=$record['pphoto'];?>" required>
		        </div> 
		        <div class="form-group">
		            <label>Catagories Id</label>
		            <input type="text" name="cid" value="<?=@$record['cid'];?>" placeholder="Enter Catagories Id" required>
		        </div>
		        <div class="form-group">
		            <label>Product Name</label>
		            <input type="text" name="pname" value="<?=@$record['pname'];?>" placeholder="Enter product name" required>
		        </div>

		        <div class="form-group">
		            <label>Product Photo</label>
		            <input type="file" name="pphoto" required>
		        </div>

		        <div class="form-group">
		            <label>Product MRP</label>
		            <input type="number" name="pmrp" value="<?=$record['pmrp'];?>" placeholder="product mrp" required>
		        </div>

		        <div class="form-group">
		            <label>Product Price</label>
		            <input type="number" name="pprice" value="<?=$record['pprice'];?>" placeholder="Enter price" required>
		        </div>

		        <div class="form-group">
		            <label>Product Description</label>
		            <textarea name="pdescription" placeholder="Enter product description" required><?php echo @$record['pdescription'];?></textarea>
		        </div>

		        <input type="submit" name="btn" class="btn" value="<?php if(isset($_REQUEST['delete'])) echo "UPDATE"; else echo "Insert"; ?>"/>
		    </form>
		</div>
		    <a href="product-2.php">view data </a>
	</div>
</body>
</html>