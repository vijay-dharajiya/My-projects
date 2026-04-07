<?php
include "header.php";

// FETCH TOTALS
$user_res = mysqli_query($cn, "SELECT COUNT(*) as total_users FROM sign_up");
$user_row = mysqli_fetch_assoc($user_res);
$total_users = $user_row['total_users'];

$completed_res = mysqli_query($cn, "SELECT COUNT(*) as total_completed FROM orders WHERE status='completed'");
$completed_row = mysqli_fetch_assoc($completed_res);
$total_completed = $completed_row['total_completed'];

// FETCH LATEST 10 ORDERS
$latest_orders_res = mysqli_query($cn, "
    SELECT orders.*, services.title AS service_name 
    FROM orders 
    JOIN services ON orders.service_id = services.id 
    ORDER BY orders.created_at DESC 
    LIMIT 10
");
?>

<style>
body{
    background: radial-gradient(circle at top,#1e1b4b,#020617);
    color:white;
    font-family:'Segoe UI';
}

/* SUMMARY CARDS */
.summary-cards{
    display:flex;
    gap:20px;
    margin-bottom:30px;
    flex-wrap: wrap;
}

.card{
    flex:1;
    min-width:180px;
    background: rgba(255,255,255,0.05);
    backdrop-filter: blur(18px);
    border-radius:20px;
    padding:25px;
    text-align:center;
    box-shadow:0 0 30px rgba(59,130,246,0.25);
    border:1px solid rgba(255,255,255,0.08);
    transition:0.3s;
}

.card:hover{
    transform:scale(1.05);
}

.card h2{
    font-size:32px;
    background: linear-gradient(45deg,#22c55e,#3b82f6);
    -webkit-background-clip:text;
    -webkit-text-fill-color:transparent;
    margin-bottom:10px;
}

.card p{
    font-size:16px;
    color:#38bdf8;
}

/* TABLE SLIDER */
.table-container{
    background: rgba(255,255,255,0.05);
    backdrop-filter: blur(18px);
    border-radius:20px;
    padding:25px;
    box-shadow:0 0 40px rgba(59,130,246,0.25);
    border:1px solid rgba(255,255,255,0.08);
    overflow-x:auto;
}

.table-container::-webkit-scrollbar {
    height: 8px;
}

.table-container::-webkit-scrollbar-thumb {
    background: linear-gradient(45deg,#3b82f6,#22c55e);
    border-radius: 10px;
}

.table-container::-webkit-scrollbar-track {
    background: rgba(255,255,255,0.05);
    border-radius: 10px;
}

/* TABLE STYLES */
.table thead th{
    color:#38bdf8;
    text-align:center;
    font-weight:600;
    white-space: nowrap;
}

.table tbody tr{
    background: rgba(255,255,255,0.04);
    transition:0.3s;
}

.table tbody tr:hover{
    transform:scale(1.01);
    background: rgba(59,130,246,0.15);
}

td, th{
    text-align:center;
    vertical-align:middle;
    white-space: nowrap;
}

.badge-id{
    background:linear-gradient(45deg,#6366f1,#8b5cf6);
    padding:5px 10px;
    border-radius:20px;
    font-size:12px;
}

.badge-service{
    background:linear-gradient(45deg,#22c55e,#4ade80);
    padding:5px 12px;
    border-radius:20px;
    font-size:12px;
}

.contact-link{
    color:#38bdf8;
    text-decoration:none;
}

.contact-link:hover{
    text-decoration:underline;
}

.date-box{
    background: rgba(59,130,246,0.2);
    padding:6px 10px;
    border-radius:10px;
    font-size:13px;
}

.msg-box{
    max-width:180px;
    white-space:nowrap;
    overflow:hidden;
    text-overflow:ellipsis;
}

.action-btn{
    min-width:75px;
    margin:2px 0;
}
.page-header h1{
    font-weight:700;
    background:linear-gradient(45deg,#22c55e,#3b82f6);
    -webkit-background-clip:text;
    -webkit-text-fill-color:transparent;
}
</style>

<div class="container mt-5">
    <div class="page-header mb-4">
        <h1>Admin Dashboard</h1>
    </div>
    <div class="summary-cards">
        <div class="card">
            <h2><?php echo $total_users; ?></h2>
            <p>Total Users</p>
        </div>
        <div class="card">
            <h2><?php echo $total_completed; ?></h2>
            <p>Completed Projects</p>
        </div>
    </div>

    <h3 class="mb-3" style="background:linear-gradient(45deg,#22c55e,#3b82f6); -webkit-background-clip:text; -webkit-text-fill-color:transparent;">Latest 10 Orders</h3>

    <div class="table-container table-slider">
        <table class="table table-dark table-hover align-middle mb-0">
            <thead>
                <tr>
                    <th>ID</th>
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
                <?php if(mysqli_num_rows($latest_orders_res)>0){
                    while($row=mysqli_fetch_assoc($latest_orders_res)){
                        $status_class = match($row['status']){
                            'pending'=> 'badge bg-warning text-dark',
                            'completed'=> 'badge bg-success',
                            'cancelled'=> 'badge bg-danger'
                        };
                ?>
                <tr>
                    <td><span class="badge badge-id">#<?php echo $row['id']; ?></span></td>
                    <td><span class="badge badge-service"><?php echo $row['service_name']; ?></span></td>
                    <td>👤 <?php echo $row['name']; ?></td>
                    <td><a href="mailto:<?php echo $row['email']; ?>" class="contact-link"><?php echo $row['email']; ?></a></td>
                    <td><a href="tel:<?php echo $row['phone']; ?>" class="contact-link"><?php echo $row['phone']; ?></a></td>
                    <td><span class="date-box">📅 <?php echo $row['event_date']; ?></span></td>
                    <td><div class="msg-box" title="<?php echo $row['message']; ?>">💬 <?php echo $row['message']; ?></div></td>
                    <td><span class="<?php echo $status_class; ?>"><?php echo ucfirst($row['status']); ?></span></td>
                    <td>
                        <?php if($row['status']=="pending"){ ?>
                            <a href="?action=cancel&id=<?php echo $row['id']; ?>" class="btn btn-sm btn-danger action-btn" onclick="return confirm('Cancel this order?')">Cancel</a>
                            <a href="?action=complete&id=<?php echo $row['id']; ?>" class="btn btn-sm btn-success action-btn" onclick="return confirm('Mark as Completed?')">Complete</a>
                        <?php } else { echo "-"; } ?>
                    </td>
                </tr>
                <?php } } else { ?>
                <tr>
                    <td colspan="9" class="text-center text-danger">🚫 No Orders Found</td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

</div>

<?php include "footer.php"; ?>