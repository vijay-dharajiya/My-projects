<?php 
include "header.php";

if(session_status() == PHP_SESSION_NONE){
    session_start();
}

// Check if user is logged in
if(!isset($_SESSION['sid'])){
    echo "<script>window.location='login.php';</script>";
    exit();
}

$user_email = $_SESSION['email']; // Assuming you store user email in session

// Fetch user orders
$result = mysqli_query($cn, "
    SELECT orders.*, services.title AS service_name 
    FROM orders 
    LEFT JOIN services ON orders.service_id = services.id
    WHERE orders.email = '$user_email'
    ORDER BY orders.created_at DESC
");
?>

<style>
body { background: #f5f7fb; }

/* PROFILE CARD */
.profile-box{
    background:#fff;
    border-radius:20px;
    padding:30px;
    box-shadow:0 10px 30px rgba(0,0,0,0.1);
}

/* PAGE TITLE */
.page-title{
    font-weight:700;
    color:#234b72;
}

/* ORDERS TABLE */
.table{
    border-radius:12px;
    overflow:hidden;
}
.table thead{
    background:#234b72;
    color:#fff;
}

/* STATUS BADGE */
.status{
    padding:6px 12px;
    border-radius:20px;
    font-size:13px;
    font-weight:600;
}
.pending{ background:#fff3cd; color:#856404; }
.completed{ background:#d4edda; color:#155724; }
.cancelled{ background:#f8d7da; color:#721c24; }

/* BUTTON */
.btn-cancel{
    border:none;
    padding:5px 12px;
    border-radius:10px;
    background:#dc3545;
    color:#fff;
    font-size:13px;
}
</style>

<div class="container py-5 mt-5">
    <div class="profile-box">
        <h3 class="page-title mb-4">My Orders</h3>
        <div class="table-responsive">
            <table class="table table-bordered align-middle text-center">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Service</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Event Date</th>
                        <th>Message</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                $i = 1;
                while($row = mysqli_fetch_array($result)){ 
                    $statusClass = $row['status'];
                ?>
                    <tr>
                        <td><?php echo $i++; ?></td>
                        <td><?php echo $row['service_name']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['phone']; ?></td>
                        <td><?php echo $row['event_date']; ?></td>
                        <td><?php echo $row['message']; ?></td>
                        <td><span class="status <?php echo $statusClass; ?>">
                            <?php echo ucfirst($row['status']); ?>
                        </span></td>
                        <td>
                        <?php if($row['status'] == "pending"){ ?>
                            <a href="profile.php?cancel=<?php echo $row['id']; ?>" 
                               onclick="return confirm('Are you sure to cancel this order?')" 
                               class="btn-cancel">Cancel</a>
                        <?php } else { echo "-"; } ?>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include "footer.php"; ?>

<?php
// CANCEL ORDER LOGIC
if(isset($_GET['cancel'])){
    $id = $_GET['cancel'];

    mysqli_query($cn,"
        UPDATE orders 
        SET status='cancelled' 
        WHERE id='$id' AND email='$user_email'
    ");

    echo "<script>window.location='profile.php';</script>";
}
?>