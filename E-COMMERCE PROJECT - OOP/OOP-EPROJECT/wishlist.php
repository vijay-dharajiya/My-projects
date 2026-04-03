<?php 
    include "header.php";
    //=================================       DELETE QUERY        ===============================
    if(isset($_REQUEST['remove'])){
    $Remove=$_REQUEST['remove'];
    $db->deldata($con->cn ,"wishlist","WHERE pid='$Remove' and sid='$sid'");
    //mysqli_query($cn,"delete from cart where pid=$Remove and sid=$sid")or die("Select error !!! " . mysqli_error($cn));
    }
    //==============================      SELECT AND JOIN PRODUCT FROM WISHLIST       =================================
    $result = $db->getdata( $con->cn , "wishlist JOIN products ON wishlist.pid = products.pid", "products.pname, products.pprice, products.pphoto, products.pid", "WHERE wishlist.sid='$sid'", "");

    //==============================CLEAR WISHLIST ================================= 
    if(isset($_REQUEST['clear'])){ $db->deldata($con->cn ,"wishlist","WHERE sid='$sid'"); }//mysqli_query($cn,"delete from wishlist where sid=$sid")or die("Select error !!! " . mysqli_error($cn));

?>

<div class="container my-5">
  <h3 class="mb-4 fw-bold">Wishlist Details</h3>

  <div class="table-responsive">
    <table class="table table-bordered table-hover align-middle text-center">
      <thead class="table-dark">
        <tr>
          <th>Product Name</th>
          <th>Product Price</th>
          <th>Product Photo</th>
          <th>Product Remove</th>
        </tr>
      </thead>
      <tbody>
        <?php
          $sum = 0;

          if (mysqli_num_rows($result) > 0) {
            while ($rec = mysqli_fetch_assoc($result)) 
                {
        ?>
        <tr>
            <td><?= $rec['pname']; ?></td>
            <td>₹ <?= $rec['pprice']; ?></td>
            <td><img src="admin/<?= $rec['pphoto']; ?>" alt="<?= $rec['pname']; ?>" width="80" class="img-thumbnail"></td>
            <td><a href="wishlist.php?remove=<?= $rec['pid']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Remove this item from wishlist?')">Remove</a></td>
        </tr>
        <?php
                $sum += $rec['pprice'];
            }
        ?>
        <!-- TOTAL ROW -->
        <tr class="fw-bold table-secondary">
            <td>Total Bill :</td>
            <td colspan="3">₹ <?= $sum; ?></td>
        </tr>
        <?php
            } else {
                echo "
                    <tr>
                        <td colspan='4' class='text-muted text-center'>
                            No items in wishlist
                        </td>
                    </tr>";
            }
        ?>       
      </tbody>
    </table>
  </div>
  <div class="row">
    <div class="col-md-8">
      <h1>Your Wishlist Purchased Now<img src="img/cart.png" height="40" width="40"> <?=@$tot;?> </h1>
    </div>
    <div class="col-md-4">
      <a href="order.php" class="btn btn-outline-dark" name="order"> Order-Now</a>
      <a href="wishlist.php?clear" class="btn btn-outline-dark" name="clear"> Clear</a>
    </div>
  </div>
</div>

<?php include "footer.php"; ?>
