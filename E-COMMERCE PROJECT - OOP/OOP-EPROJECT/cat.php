<?php include "header.php";
//=========================================         catagory check data
if(isset($_REQUEST['cid'])){

    $cid=$_REQUEST['cid'];
    //echo $cid;
}
?>

<!-- PRODUCTS SECTION -->
<div class="container py-5" id="products">
    <h2 class="text-center mb-5 fw-bold section-title" data-aos="fade-up">
        All Products
    </h2>

    <div class="row g-4">
        <?php
            $result=$db->getdata($con->cn,"products","*","WHERE cid='"."$cid"."'","order by cid");
            //$result = mysqli_query($cn, "SELECT * FROM products WHERE cid='$cid'")or die("Select error!!!" . mysqli_error($cn));

            while ($record = mysqli_fetch_array($result)) {
        ?>
            <div class="col-lg-4 col-md-6" data-aos="zoom-in">
                <div class="card product-card shadow-sm">

                    <!-- PRODUCT IMAGE -->
                    <div class="product-card shadow-sm">
                        <img src="admin/<?php echo $record['pphoto']; ?>"alt="<?php echo ($record['pname']); ?>">
                    </div>

                    <!-- PRODUCT DETAILS -->
                    <div class="card-body d-flex flex-column text-center">
                        <h5 class="card-title">
                            <?php echo ($record['pname']); ?>
                        </h5>

                        <p class="mb-1 text-muted">
                            MRP:
                            <del>₹<?php echo $record['pmrp']; ?></del>
                        </p>

                        <p class="price mb-2">
                            PRICE : 
                            ₹<?php echo $record['pprice']; ?>
                        </p>

                        <p class="card-text text-secondary small mb-3">
                            <?php echo $record['pdescription']; ?>
                        </p>

                        <!-- BUY FORM -->
                        <a href="product-3.php?pid=<?php echo $record['pid']; ?>"
                           class="btn btn-dark w-100 rounded-pill mt-auto">
                            Buy Now
                        </a>

                    </div>

                </div>
            </div>
        <?php } ?>
    </div>
</div>

<?php include "footer.php"; ?>
