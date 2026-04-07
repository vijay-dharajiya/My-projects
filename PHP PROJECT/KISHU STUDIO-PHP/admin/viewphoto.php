<?php 
include "header.php";

// ================= DELETE =================
if(isset($_REQUEST['delete'])){
    $id = $_REQUEST['delete'];

    $result = mysqli_query($cn,"SELECT * FROM photos WHERE id='$id'") or die(mysqli_error($cn));
    $record = mysqli_fetch_array($result);

    if(file_exists($record['photo'])){
        unlink($record['photo']);
    }

    mysqli_query($cn,"DELETE FROM photos WHERE id='$id'") or die(mysqli_error($cn));

    header("location:viewphoto.php");
    exit();
}

// ================= FETCH DATA =================
$result = mysqli_query($cn,"SELECT * FROM photos ORDER BY id ASC") or die(mysqli_error($cn));
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

/* IMAGE BOX (FIXED SIZE + CENTER) */
.img-box{
    width:200px;
    height:120px;
    display:flex;
    align-items:center;
    justify-content:center;
    background:#331f56;
    border-radius:12px;
    margin:auto;
}

/* IMAGE FULL VISIBLE */
.img-thumb{
    max-width:100%;
    max-height:100%;
    object-fit:contain;
    border-radius:10px;
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

.btn-edit{
    background:linear-gradient(45deg,#f59e0b,#f97316);
}

.btn-delete{
    background:linear-gradient(45deg,#ef4444,#dc2626);
}

.btn-action:hover{
    transform:scale(1.08);
    box-shadow:0 0 15px rgba(255,255,255,0.2);
}

/* ADD BUTTON */
.btn-add{
    background: linear-gradient(45deg,#06b6d4,#3b82f6);
    border:none;
    color:white;
    padding:10px 20px;
    border-radius:30px;
    font-weight:600;
    text-decoration:none;
    transition:0.3s;
}

.btn-add:hover{
    transform:scale(1.08);
    box-shadow:0 0 20px #06b6d4;
}
</style>

<div class="container mt-5">

<div class="page-header">
    <h3>📸 Photo Gallery</h3>
    <a href="addphoto.php" class="btn-add">+ Upload</a>
</div>

<div class="table-container">

<table>

<thead>
<tr>
    <th>ID</th>
    <th>Category</th>
    <th>Photo</th>
    <th colspan="2">Action</th>
</tr>
</thead>

<tbody>

<?php while($row = mysqli_fetch_array($result)) { ?>

<tr>
    <td><span class="badge-id"><?php echo $row['id']; ?></span></td>

    <td><?php echo $row['cat_name']; ?></td>

    <td>
        <div class="img-box">
            <img src="<?php echo $row['photo']; ?>" class="img-thumb">
        </div>
    </td>

    <td>
        <a href="addphoto.php?id=<?php echo $row['id']; ?>" class="btn-action btn-edit">✏ Edit</a>
    </td>

    <td>
        <a href="viewphoto.php?delete=<?php echo $row['id']; ?>" 
           class="btn-action btn-delete"
           onclick="return confirm('Delete this photo?')">🗑 Delete</a>
    </td>
</tr>

<?php } ?>

</tbody>

</table>

</div>
</div>

<?php include "footer.php"; ?>