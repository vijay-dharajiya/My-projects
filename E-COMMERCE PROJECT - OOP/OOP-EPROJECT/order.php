<?php
include "header.php";

/* ================= LOGIN CHECK ================= */
if (!isset($_SESSION['sid'])) {
    echo"<script> window.location.replace('index.php')</script>";
    exit;
}

/* ================= ORDER SUBMIT ================= */
if (isset($_REQUEST['order'])) {

    $name    = $_REQUEST['name'];
    $Add = $_REQUEST['add'];
    $contact  = $_REQUEST['mobile'];
    $payment = $_REQUEST['payment'];
    $sid     = $_SESSION['sid'];
    //echo $name , $Add , $contact ,$payment , $sid ,$date;
    $res=$db->getdata($con->cn,"cart","*","WHERE sid='$sid'","");
        while($rec=mysqli_fetch_array($res)){
            $pid=$rec['pid'];
            $db->adddata($con->cn,"`order`",array("sid"=>$sid, "pid"=>$pid, "shiping"=>$name, "address"=>$Add, "contact"=>$contact, "pmode"=>$payment));
            //mysqli_query($cn,"INSERT INTO `order` SET sid='$sid', pid='$pid', shiping='$name', address='$Add', contact='$contact', pmode='$payment'") or die(mysqli_error($cn));

        }
    // Clear cart
    $db->deldata($con->cn,"cart","where sid='"."$sid"."'");
    //mysqli_query($cn, "DELETE FROM cart WHERE sid='$sid'");

    echo "<script>alert('Order placed successfully'); window.location='vieworder.php';</script>";
}
//======================================wishlist to order code ============================
if (isset($_REQUEST['order'])) {

    $name    = $_REQUEST['name'];
    $Add = $_REQUEST['add'];
    $contact  = $_REQUEST['mobile'];
    $payment = $_REQUEST['payment'];
    $sid     = $_SESSION['sid'];
    //echo $name , $Add , $contact ,$payment , $sid ,$date;
    $res=$db->getdata($con->cn,"wishlist","*","WHERE sid='$sid'","");
        while($rec=mysqli_fetch_array($res)){
            $pid=$rec['pid'];
            $db->adddata($con->cn,"`order`",array("sid"=>$sid, "pid"=>$pid, "shiping"=>$name, "address"=>$Add, "contact"=>$contact, "pmode"=>$payment));
            //mysqli_query($cn,"INSERT INTO `order` SET sid='$sid', pid='$pid', shiping='$name', address='$Add', contact='$contact', pmode='$payment'") or die(mysqli_error($cn));

        }
    // Clear wishlist
    $db->deldata($con->cn,"wishlist","where sid='"."$sid"."'");
    //mysqli_query($cn, "DELETE FROM cart WHERE sid='$sid'");

    echo "<script>alert('Order placed successfully'); window.location='vieworder.php';</script>";
}
?>

<div class="container my-5">
    <h3 class="fw-bold mb-4">Shipping Details</h3>

    <form method="POST" class="row g-3">

        <div class="col-md-6">
            <label class="form-label">Full Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="col-md-6">
            <label class="form-label">Contact Number</label>
            <input type="tel" name="mobile" class="form-control" required>
        </div>

        <div class="col-12">
            <label class="form-label">Shipping Address</label>
            <textarea name="add" class="form-control" rows="3" required></textarea>
        </div>

        <div class="col-12">
            <label class="form-label fw-bold">Payment Method</label><br>

            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="payment" value="COD" checked>
                <label class="form-check-label">Cash on Delivery</label>
            </div>

            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="payment" value="ONLINE">
                <label class="form-check-label">Online Payment</label>
            </div>
        </div>
        <div class="col-12 text-end">
            <button type="submit" name="order" class="btn btn-dark px-4">
                Order Now
            </button>
        </div>

    </form>
</div>

<?php include "footer.php"; ?>
