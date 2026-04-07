<?php
include "header.php";

// FETCH FILTER PARAMETERS
$service_filter = $_GET['service'] ?? '';
$status_filter  = $_GET['status'] ?? '';
$date_filter    = $_GET['date'] ?? '';

// HANDLE ACTIONS
if(isset($_GET['action'], $_GET['id'])){
    $id = $_GET['id'];
    $action = $_GET['action'];

    if($action=="cancel") mysqli_query($cn,"UPDATE orders SET status='cancelled' WHERE id='$id'");
    if($action=="complete") mysqli_query($cn,"UPDATE orders SET status='completed' WHERE id='$id'");

    header("Location: vieworders.php");
    exit;
}

// PAGINATION
$perPage = 8;
$page = intval($_GET['page'] ?? 1);
$start = ($page-1)*$perPage;

// BUILD QUERY
$where = "WHERE 1=1 ";
if($service_filter) $where .= " AND services.id='$service_filter'";
if($status_filter) $where .= " AND orders.status='$status_filter'";
if($date_filter) $where .= " AND orders.event_date='$date_filter'";

$total_query = "SELECT COUNT(*) as total FROM orders JOIN services ON orders.service_id = services.id $where";
$total_res = mysqli_query($cn,$total_query);
$total_row = mysqli_fetch_assoc($total_res);
$total_records = $total_row['total'];
$total_pages = ceil($total_records/$perPage);

$query = "
    SELECT orders.*, services.title AS service_name
    FROM orders
    JOIN services ON orders.service_id = services.id
    $where
    ORDER BY orders.id DESC
    LIMIT $start,$perPage
";
$result = mysqli_query($cn,$query);

// SERVICES FOR FILTER
$services_res = mysqli_query($cn,"SELECT id,title FROM services");
?>

<style>
body{
    background: radial-gradient(circle at top,#1e1b4b,#020617);
    color:white;
    font-family:'Segoe UI';
}

/* HEADER */
.page-header{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:25px;
}

.page-header h3{
    font-weight:700;
    background:linear-gradient(45deg,#22c55e,#3b82f6);
    -webkit-background-clip:text;
    -webkit-text-fill-color:transparent;
}

/* TABLE CARD */
.table-container{
    background: rgba(255,255,255,0.05);
    backdrop-filter: blur(18px);
    border-radius:20px;
    padding:25px;
    box-shadow:0 0 40px rgba(59,130,246,0.25);
    border:1px solid rgba(255,255,255,0.08);
}

/* HORIZONTAL SCROLL SLIDER */
.table-slider {
    overflow-x: auto;
    scroll-behavior: smooth;
    -webkit-overflow-scrolling: touch;
    padding-bottom: 10px;
}

.table-slider::-webkit-scrollbar {
    height: 8px;
}

.table-slider::-webkit-scrollbar-thumb {
    background: linear-gradient(45deg,#3b82f6,#22c55e);
    border-radius: 10px;
}

.table-slider::-webkit-scrollbar-track {
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

/* BADGES */
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

/* CONTACT LINKS */
.contact-link{
    color:#38bdf8;
    text-decoration:none;
}

.contact-link:hover{
    text-decoration:underline;
}

/* DATE BOX */
.date-box{
    background: rgba(59,130,246,0.2);
    padding:6px 10px;
    border-radius:10px;
    font-size:13px;
}

/* MESSAGE BOX */
.msg-box{
    max-width:180px;
    white-space:nowrap;
    overflow:hidden;
    text-overflow:ellipsis;
}

/* EMPTY ROW */
.empty{
    padding:30px;
    font-size:16px;
    color:#f87171;
}

/* BUTTONS */
.action-btn{
    min-width:75px;
    margin:2px 0;
}
</style>

<div class="container mt-5">

<div class="page-header">
    <h3>📦 Order Dashboard</h3>
</div>

<!-- FILTER FORM -->
<form method="get" class="row g-2 mb-3 align-items-center">
    <div class="col-md-3">
        <select class="form-select" name="service">
            <option value="">All Services</option>
            <?php while($s=mysqli_fetch_assoc($services_res)){ ?>
                <option value="<?php echo $s['id']; ?>" <?php if($service_filter==$s['id']) echo 'selected'; ?>>
                    <?php echo $s['title']; ?>
                </option>
            <?php } ?>
        </select>
    </div>
    <div class="col-md-2">
        <select class="form-select" name="status">
            <option value="">All Status</option>
            <option value="pending" <?php if($status_filter=='pending') echo 'selected'; ?>>Pending</option>
            <option value="completed" <?php if($status_filter=='completed') echo 'selected'; ?>>Completed</option>
            <option value="cancelled" <?php if($status_filter=='cancelled') echo 'selected'; ?>>Cancelled</option>
        </select>
    </div>
    <div class="col-md-2">
        <input type="date" class="form-control" name="date" value="<?php echo $date_filter; ?>">
    </div>
    <div class="col-md-2">
        <button type="submit" class="btn btn-success w-100">Filter</button>
    </div>
</form>

<!-- TABLE -->
<div class="table-container table-slider">
<table class="table table-dark table-hover align-middle mb-0">
    <thead class="text-info text-center">
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
        <?php if(mysqli_num_rows($result)>0){
            while($row=mysqli_fetch_assoc($result)){
                $status_class = match($row['status']){
                    'pending'=> 'badge bg-warning text-dark',
                    'completed'=> 'badge bg-success',
                    'cancelled'=> 'badge bg-danger'
                };
        ?>
        <tr class="text-center">
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

<!-- PAGINATION -->
<nav class="mt-4">
    <ul class="pagination justify-content-center">
        <?php for($i=1;$i<=$total_pages;$i++){
            $params = $_GET; $params['page']=$i;
            $link = "?".http_build_query($params);
        ?>
        <li class="page-item <?php if($i==$page) echo 'active'; ?>">
            <a class="page-link" href="<?php echo $link; ?>"><?php echo $i; ?></a>
        </li>
        <?php } ?>
    </ul>
</nav>

</div>

<?php include "footer.php"; ?>