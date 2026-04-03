<?php
    include "header.php";   // session + DB connection assumed

    if (!isset($_REQUEST['pid'])) {
        echo "<h3 class='text-center mt-5'>Invalid Product</h3>";
        exit;
    }

    $pid = (int)$_REQUEST['pid'];

    $result=$db->getdata($con->cn,"products","*","WHERE pid='"."$pid"."'","order by pid");
    //$result = mysqli_query($cn, "SELECT * FROM products WHERE pid=$pid")or die("Select error!!!" . mysqli_error($cn));

    if (mysqli_num_rows($result) == 0) {
        echo "<h3 class='text-center mt-5'>Product Not Found</h3>";
        exit;
    }

    $product = mysqli_fetch_array($result);

    /* ================= ADD TO CART LOGIN CHECK ================= */
 
    $login_error = "";

    if (isset($_REQUEST['cart'])){
        if (isset($_SESSION['sid'])) {
            $pid=$_REQUEST['pid'];
            $sid=$_SESSION['sid'];
            $db->adddata($con->cn,"cart",array("pid"=>$pid, "sid"=>$sid));
            //mysqli_query($cn,"INSERT INTO cart set pid='$pid' , sid='$sid'")or die("Insert error!!!".mysqli_error($cn));

            echo "<script>alert('Product added to cart successfully');
                        window.location.replace('index.php')
                </script>";
                
        } else {
            //User is logged in → add to cart logic here;
            // Example:
            //$_SESSION['cart'][] = $pid;
                
                $login_error = "⚠️ Please login first to add items to your cart.";
        }
    }
    /*=================================== ADD TO WISHLIST LOGIN CHECK ================= */
    if (isset($_REQUEST['wishlist'])){
        if (isset($_SESSION['sid'])) {
            $pid=$_REQUEST['pid'];
            $sid=$_SESSION['sid'];
            $db->adddata($con->cn,"wishlist",array("pid"=>$pid, "sid"=>$sid));
            //mysqli_query($cn,"INSERT INTO wishlist set pid='$pid' , sid='$sid'")or die("Insert error!!!".mysqli_error($cn));

            echo "<script>alert('Product added to wishlist successfully');
                        window.location.replace('index.php')
                </script>";
                
        } else {
            //User is logged in → add to wishlist logic here;
            // Example:
            //$_SESSION['wishlist'][] = $pid;
                
                $login_error = "⚠️ Please login first to add items to your wishlist.";
        }
    }
?>


<div class="container py-5">
    <div class="row">

        <!-- PRODUCT IMAGE -->
        <div class="col-md-6 text-center">
            <img src="admin/<?php echo $product['pphoto']; ?>"
                 class="img-fluid rounded shadow"
                 alt="<?php echo $product['pname']; ?>">
        </div>

        <!-- PRODUCT DETAILS -->
        <div class="col-md-6">
            <h2 class="fw-bold"><?php echo $product['pname']; ?></h2>

            <p class="text-muted mt-3">
                <strong>Description:</strong><br>
                <?php echo $product['pdescription']; ?>
            </p>

            <h5 class="mt-3">
                MRP : <del class="text-danger">₹<?php echo $product['pmrp']; ?></del>
            </h5>

            <h4 class="text-success fw-bold">
                Our Price : ₹<?php echo $product['pprice']; ?>
            </h4>
            <?php if (!empty($login_error)) { ?>
                <div class="alert alert-warning mt-3">
                    <?php echo $login_error; ?>
                </div>
            <?php } ?>

            <div class="mt-4">
                <form method="POST" >
                    <input type="hidden" name="pid" value="<?php echo $product['pid']; ?>">
                    <button type="submit" name="cart" class="btn btn-outline-success btn-lg">
                        Add to Cart
                    </button>
                    <button type="submit" name="wishlist" class="btn btn-outline-success btn-lg">
                        Add to wishlist
                    </button>
                </form>
            </div>

            <div class="mt-3">
                <a href="index.php" class="btn btn-outline-dark">← Back to Products</a>
                <a href="order.php" class="btn btn-outline-dark">Buy Now</a>
            </div>
        </div>
    </div>
</div>

<?php include "footer.php"; ?>
