<?php include"header.php" ;
//====================================		old data fetch 		==============================
if(isset($_REQUEST['delete']))
{
	$delete=$_REQUEST['delete'];
	//echo $delete ;
	$result =$db->getdata($con->cn,"catagories","*", "WHERE cid='"."$delete"."'","order by cid");
	$record = mysqli_fetch_array($result);
}
//======================================		Update data 		=========================
if(@$_REQUEST['btn'] == 'UPDATE')
{
	$hide=$_REQUEST['hide'];
	$name=$_REQUEST['cname'];

	$db->updatedata($con->cn,"catagories",array("cname"=>$name), "where cid='"."$hide"."'");
	
	header("location:cata_view.php");
}

//======================================		Insert data 		=========================

if (@$_REQUEST['btn']=='Insert') {
	$catagory=$_REQUEST['cname'];
	//echo $catagory;

	$db->adddata($con->cn,"catagories", array("cname"=>$catagory));
	header("location:cata_view.php");
}
?>
<style>
        
    </style>
	<!-- Insert Data -->
    <div class="container margin">
        <form method="POST">
            <input type="hidden" name="hide" value="<?=@$record['cid'];?>">
            <h2>Add Catagories</h2>
            <br>
            <div class="row">
                <input type="text" name="cname" placeholder="Insert Categories"
                       class="big-input" value="<?=@$record['cname'];?>" required>
            </div>

            <br>

            <input type="submit" name="btn" value="<?php if(isset($_REQUEST['delete'])) echo 'UPDATE';else echo 'Insert';?>" class="myButton">
        </form>
    </div>

</body>
</html>