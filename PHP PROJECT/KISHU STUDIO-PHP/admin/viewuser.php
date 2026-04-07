<?php 
include "header.php";

// ================= DELETE =================
if(isset($_REQUEST['delete'])){
    $id = $_REQUEST['delete'];

    mysqli_query($cn,"DELETE FROM sign_up WHERE sid='$id'") or die(mysqli_error($cn));

    header("location:viewuser.php");
    exit();
}

// ================= FETCH DATA =================
$result = mysqli_query($cn,"SELECT * FROM sign_up ORDER BY sid ASC") or die(mysqli_error($cn));
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

/* CARD */
.table-container{
    background: rgba(255,255,255,0.05);
    backdrop-filter: blur(18px);
    border-radius:20px;
    padding:25px;
    box-shadow:0 0 40px rgba(59,130,246,0.25);
    border:1px solid rgba(255,255,255,0.08);
}

/* TABLE */
table{
    width:100%;
    border-collapse:separate;
    border-spacing:0 12px;
}

thead th{
    color:#38bdf8;
    text-align:center;
    font-weight:600;
}

tbody tr{
    background: rgba(255,255,255,0.04);
    transition:0.3s;
}

tbody tr:hover{
    transform:scale(1.01);
    background: rgba(59,130,246,0.15);
}

td{
    text-align:center;
    padding:12px;
    vertical-align:middle;
}

/* BADGE */
.badge-id{
    background:linear-gradient(45deg,#6366f1,#8b5cf6);
    padding:5px 10px;
    border-radius:20px;
    font-size:12px;
}

/* BUTTONS */
.btn-action{
    padding:6px 14px;
    border:none;
    border-radius:25px;
    color:white;
    text-decoration:none;
    font-size:13px;
    display:inline-block;
    transition:0.3s;
}

.btn-delete{
    background:linear-gradient(45deg,#ef4444,#dc2626);
}

.btn-action:hover{
    transform:scale(1.08);
    box-shadow:0 0 15px rgba(255,255,255,0.2);
}
</style>

<div class="container mt-5">

<div class="page-header">
    <h3>👤 User List</h3>
</div>

<div class="table-container">

<table>

<thead>
<tr>
    <th>ID</th>
    <th>Username</th>
    <th>Email</th>
    <th>Contact</th>
    <th>Action</th>
</tr>
</thead>

<tbody>

<?php while($row = mysqli_fetch_array($result)) { ?>

<tr>
    <td><span class="badge-id"><?php echo $row['sid']; ?></span></td>

    <td><?php echo $row['username']; ?></td>

    <td><?php echo $row['email']; ?></td>

    <td><?php echo $row['contact']; ?></td>

    <td>
        <a href="viewuser.php?delete=<?php echo $row['sid']; ?>" 
           class="btn-action btn-delete"
           onclick="return confirm('Delete this user?')">🗑 Delete</a>
    </td>
</tr>

<?php } ?>

</tbody>

</table>

</div>
</div>

<?php include "footer.php"; ?>