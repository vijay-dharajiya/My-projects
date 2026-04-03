<?php
include "header.php";

/* ================= LOGIN CHECK ================= */
if (!isset($_SESSION['sid'])) {
    echo "<script>window.location='index.php'</script>";
    exit;
}

$sid = $_SESSION['sid'];

/* ================= GET ORDER TIME ================= */
if (!isset($_GET['time'])) {
    echo "<script>window.location='vieworder.php'</script>";
    exit;
}

$time = $_GET['time'];

/* ================= FETCH CUSTOMER + ORDER INFO ================= */
$info_sql = "
SELECT o.shiping, o.address, o.contact, o.`date time`,
       s.uname, s.email
FROM `order` o
JOIN sign_up s ON o.sid = s.sid
WHERE o.sid='$sid' AND o.`date time`='$time'
LIMIT 1
";

$info_res = mysqli_query($con->cn, $info_sql) or die(mysqli_error($con));

if (mysqli_num_rows($info_res) == 0) {
    echo "<script>alert('Invoice not found');window.location='vieworder.php'</script>";
    exit;
}

$info = mysqli_fetch_assoc($info_res);

/* ================= FETCH ALL PRODUCTS OF SAME ORDER ================= */
$item_sql = "
SELECT p.pname, p.pprice
FROM `order` o
JOIN products p ON o.pid = p.pid
WHERE o.sid='$sid' AND o.`date time`='$time'
";

$item_res = mysqli_query($con->cn, $item_sql) or die(mysqli_error($con));
?>

<div class="container my-5">
    <div class="card shadow">
        <div class="card-header bg-dark text-white">
            <h4 class="mb-0">Invoice</h4>
        </div>

        <div class="card-body">

            <!-- CUSTOMER INFO -->
            <div class="row mb-4">
                <div class="col-md-6">
                    <h6><strong>Name:</strong> <?php echo $info['uname']; ?></h6>
                </div>
                <div class="col-md-6 text-end">
                    <h6><strong>Order Time:</strong> <?php echo $info['date time']; ?></h6>
                    <h6><strong>Contact:</strong> <?php echo $info['contact']; ?></h6>
                </div>
            </div>

            <div class="mb-3">
                <strong>Shipping Address:</strong>
                <p><?php echo $info['address']; ?></p>
            </div>

            <!-- PRODUCTS -->
            <table class="table table-bordered">
                <thead class="table-secondary">
                    <tr>
                        <th>#</th>
                        <th>Product</th>
                        <th class="text-end">Price (₹)</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $i = 1;
                $total = 0;
                while ($row = mysqli_fetch_assoc($item_res)) {
                    $total += $row['pprice'];
                ?>
                    <tr>
                        <td><?php echo $i++; ?></td>
                        <td><?php echo $row['pname']; ?></td>
                        <td class="text-end"><?php echo number_format($row['pprice'], 2); ?></td>
                    </tr>
                <?php } ?>
                </tbody>

                <tfoot>
                    <tr>
                        <th colspan="2" class="text-end">Grand Total</th>
                        <th class="text-end">₹ <?php echo number_format($total, 2); ?></th>
                    </tr>
                </tfoot>
            </table>

            <div class="text-end">
                <button onclick="window.print()" class="btn btn-success">Print Invoice</button>
                <a href="profile.php" class="btn btn-secondary">Back</a>
            </div>

        </div>
    </div>
</div>

<?php include "footer.php"; ?>
