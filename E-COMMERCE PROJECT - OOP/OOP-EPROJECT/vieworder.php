<?php
include "header.php";

/* ================= LOGIN CHECK ================= */
if (!isset($_SESSION['sid'])) {
    echo "<script>window.location='index.php'</script>";
    exit;
}

$sid = $_SESSION['sid'];

/* ================= DELETE ORDER ================= */
if (isset($_REQUEST['del'])) {
    $oid = $_REQUEST['del'];
    $db-> deldata($con->cn,"`order`","WHERE oid='$oid' AND sid='$sid'",);
    //mysqli_query($cn, "DELETE FROM `order` WHERE oid='$oid' AND sid='$sid'")or die(mysqli_error($cn));
    
}
?>

<div class="container my-5">
    <h3 class="fw-bold mb-4">My Orders</h3>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>Order Id</th>
                <th>Shipping Name</th>
                <th>Address</th>
                <th>Contact</th>
                <th>Date & Time</th>
                <th>Invoice</th>
                <th>Delete</th>
            </tr>
        </thead>

        <tbody>
        <?php
        $res = $db->getdata($con->cn,"`order`","*","WHERE sid='$sid'","ORDER BY oid DESC",);
        //$res = mysqli_query($cn,"SELECT * FROM `order` WHERE sid='$sid' ORDER BY oid DESC") or die(mysqli_error($cn));

        if (mysqli_num_rows($res) == 0) {
            echo "<tr><td colspan='5' class='text-center'>No Orders Found</td></tr>";
        }

        while ($row = mysqli_fetch_assoc($res)) {
        ?>
            <tr>
                <td><?php echo $row['oid']; ?></td>
                <td><?php echo $row['shiping']; ?></td>
                <td><?php echo $row['address']; ?></td>
                <td><?php echo $row['contact']; ?></td>
                <td><?php echo $row['date time']; ?></td>
                <td>
                    <a href="invoice.php?time=<?php echo urlencode($row['date time']); ?>"
                       class="btn btn-primary btn-sm">
                       Invoice
                    </a>
                </td>
                <td>
                    <a href="vieworder.php?del=<?php echo $row['oid']; ?>"
                       class="btn btn-danger btn-sm"
                       onclick="return confirm('Are you sure?')">
                        Delete
                    </a>
                </td>

            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>

<?php include "footer.php"; ?>
