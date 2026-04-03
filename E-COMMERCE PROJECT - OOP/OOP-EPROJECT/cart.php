<?php 
include "header.php";
//=================================       DELETE QUERY        ===============================
if(isset($_REQUEST['remove'])){
  $Remove=$_REQUEST['remove'];
  $db->deldata($con->cn ,"cart","WHERE pid='$Remove' and sid='$sid'");
  //mysqli_query($cn,"delete from cart where pid=$Remove and sid=$sid")or die("Select error !!! " . mysqli_error($cn));
}
//==============================      SELECT AND JOIN PRODUCT FROM CART       =================================
$result = $db->getdata( $con->cn , "cart JOIN products ON cart.pid = products.pid", "products.pname, products.pprice, products.pphoto, products.pid", "WHERE cart.sid='$sid'", "");

//$result = mysqli_query($cn,"SELECT products.pname,products.pprice,products.pphoto, products.pid FROM cart join products on cart.pid=products.pid where sid='$sid' ")or die("Select error !!! " . mysqli_error($cn));

//====================        TOTAL BILL QUERY use chatgpt for this and down comented code      ===========================
/*$totalresult = mysqli_query($cn,"SELECT sum(products.pprice) AS total from cart join products on cart.pid=products.pid where cart.sid=$sid")or die("Select error!!".mysqli_error($cn));

  $total=mysqli_fetch_array($totalresult);
  $totalBill= $total['total'] ?? 0 ;*/

?>

<div class="container my-5">
  <h3 class="mb-4 fw-bold">Cart Details</h3>

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

              while ($rec = mysqli_fetch_assoc($result)) {
          ?>
              <tr>
                <td><?= $rec['pname']; ?></td>
                <td>₹ <?= $rec['pprice']; ?></td>
                <td><img src="admin/<?= $rec['pphoto']; ?>" alt="<?= $rec['pname']; ?>" width="80" class="img-thumbnail"></td>
                <td><a href="cart.php?remove=<?= $rec['pid']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Remove this item from cart?')">Remove</a></td>
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
                          No items in cart
                      </td>
                  </tr>";
          }
        ?>
        <!--  =================         use chat gpt for total bill           ========================
       <?php/*
          if (mysqli_num_rows($result) > 0) {
              while ($rec = mysqli_fetch_assoc($result)) {
                  echo 
                    "<tr>
                      <td>{$rec['pname']}</td>
                      <td>{$rec['pprice']}</td>
                      <td><img src='admin/{$rec['pphoto']}' alt='{$rec['pname']}' width='80' class='img-thumbnail'></td>
                      <td><a href='cart.php?remove={$rec['pid']}' class='btn btn-sm btn-danger' onclick=\"return confirm('Remove this item from cart?')\">Remove</a></td>
                    </tr>";
              }

              echo
                "<tr class='fw-bold table-secondary'>
                   <td>Total Bill : </td> 
                   <td colspan='3'>₹ {$totalBill}</td>
                </tr>";
          } else {
              echo 
                "<tr>
                  <td colspan='3' class='text-muted'>No items in cart</td>
                </tr>";
          }
        */?>-->
      </tbody>
    </table>
  </div>
  <div class="row">
    <div class="col-md-8">
      <h1>you have purchased <img src="img/cart.png" height="40" width="40"> <?=@$tot;?> </h1>
    </div>
    <div class="col-md-4">
      <a href="order.php" class="btn btn-outline-dark" name="order"> Order-Now</a>
    </div>
  </div>
</div>

<?php include "footer.php"; ?>
