<?php
include "header.php";

/* ================= LOGIN CHECK ================= */
if (!isset($_SESSION['sid'])) {
    header("location:index.php");
    exit;
}

$sid = $_SESSION['sid'];

/* ================= FETCH USER DATA ================= */
$result = $db->getdata($con->cn , "sign_up","*","where sid='"."$sid"."'","order by sid");
//$result = mysqli_query($cn, "SELECT * FROM sign_up WHERE sid='$sid'");
$record = mysqli_fetch_assoc($result);

if (!$record) {
    echo "<script>alert('User not found'); window.location='index.php';</script>";
    exit;
}

/* ================= UPDATE PROFILE ================= */
if (isset($_POST['save_profile'])) {

    $uname   = $_POST['uname'];
    $email   = $_POST['email'];
    $contact = $_POST['contact'];

    mysqli_query(
        $cn,
        "UPDATE sign_up 
         SET uname='$uname', email='$email', contact='$contact'
         WHERE sid='$sid'"
    );

    $_SESSION['uname'] = $uname;

    echo "<script>window.location.replace('profile.php')</script>";
    
    
}
?>

<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">

            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-header bg-primary text-white text-center">
                    <h4 class="mb-0">My Profile</h4>
                </div>

                <div class="card-body p-4">

                <?php if (!isset($_GET['edit'])) { ?>

                    <!-- VIEW MODE -->
                    <div class="mb-3">
                        <label class="form-label fw-bold">Name</label>
                        <input type="text" class="form-control"
                               value="<?= htmlspecialchars($record['uname']); ?>" disabled>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Email</label>
                        <input type="text" class="form-control"
                               value="<?= htmlspecialchars($record['email']); ?>" disabled>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-bold">Contact</label>
                        <input type="text" class="form-control"
                               value="<?= htmlspecialchars($record['contact']); ?>" disabled>
                    </div>

                    <div class="text-center">
                        <a href="profile.php?edit=1" class="btn btn-warning px-4">
                            Edit Profile
                        </a>
                    </div>

                <?php } else { ?>

                    <!-- EDIT MODE -->
                    <form method="POST">

                        <div class="mb-3">
                            <label class="form-label fw-bold">Name</label>
                            <input type="text" name="uname" class="form-control"
                                   value="<?= htmlspecialchars($record['uname']); ?>" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Email</label>
                            <input type="email" name="email" class="form-control"
                                   value="<?= htmlspecialchars($record['email']); ?>" required>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold">Contact</label>
                            <input type="text" name="contact" class="form-control"
                                   value="<?= htmlspecialchars($record['contact']); ?>" required>
                        </div>

                        <div class="d-flex justify-content-between">
                            <button type="submit" name="save_profile"
                                    class="btn btn-success px-4">
                                Save Profile
                            </button>

                            <a href="profile.php" class="btn btn-secondary px-4">
                                Cancel
                            </a>
                        </div>

                    </form>

                <?php } ?>

                </div>
            </div>

        </div>
    </div>
</div>

<!-- ================= MY ORDERS ================= -->
<div class="container mb-5">
    <div class="card shadow border-0 rounded-4">
        <div class="card-header bg-dark text-white fw-semibold">
            My Orders
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered align-middle">
                    <thead class="table-secondary">
                        <tr>
                            <th>Order ID</th>
                            <th>Shipping</th>
                            <th>Address</th>
                            <th>Contact</th>
                            <th>Date & Time</th>
                            <th>Invoice</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $orders = $db->getdata($con->cn,"`order`","*","WHERE sid='"."$sid"."'","order by oid desc");
                    //$orders = $db->getdata($con->cn,"`order`","*","WHERE sid='$sid'","ORDER BY oid DESC");
                    //$orders = mysqli_query($cn, "SELECT * FROM `order` WHERE sid='$sid' ORDER BY oid DESC");

                    if (mysqli_num_rows($orders) == 0) {
                        echo "<tr><td colspan='6' class='text-center'>No Orders Found</td></tr>";
                    }

                    while ($row = mysqli_fetch_assoc($orders)) {
                    ?>
                        <tr>
                            <td><?= $row['oid']; ?></td>
                            <td><?= $row['shiping']; ?></td>
                            <td><?= $row['address']; ?></td>
                            <td><?= $row['contact']; ?></td>
                            <td><?= $row['date time']; ?></td>
                            <td>
                                <a href="invoice.php?time=<?= urlencode($row['date time']); ?>"
                                   class="btn btn-sm btn-primary">
                                    Invoice
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php include "footer.php"; ?>
