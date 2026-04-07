<?php 
include "header.php";

// ================= DELETE =================
if(isset($_REQUEST['delete'])){
    $id = $_REQUEST['delete'];

    $result = mysqli_query($cn,"SELECT * FROM videos WHERE id='$id'") or die(mysqli_error($cn));
    $record = mysqli_fetch_array($result);

    if(file_exists($record['video'])){
        unlink($record['video']);
    }

    mysqli_query($cn,"DELETE FROM videos WHERE id='$id'") or die(mysqli_error($cn));

    header("location:viewvideo.php");
    exit();
}

// ================= FETCH DATA =================
$result = mysqli_query($cn,"SELECT * FROM videos ORDER BY id ASC") or die(mysqli_error($cn));
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

/* VIDEO */
video{
    border-radius:12px;
    box-shadow:0 0 15px rgba(0,0,0,0.5);
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

/* TITLE TEXT */
.video-title{
    font-weight:600;
    color:#e2e8f0;
}
</style>

<div class="container mt-5">

<div class="page-header">
    <h3>🎬 Video Gallery</h3>
    <a href="addvideo.php" class="btn-add">+ Upload</a>
</div>

<div class="table-container">

<table>

<thead>
<tr>
    <th>ID</th>
    <th>Category</th>
    <th>Title</th>
    <th>Preview</th>
    <th colspan="2">Action</th>
</tr>
</thead>

<tbody>

<?php while($row = mysqli_fetch_array($result)) { ?>

<tr>
    <td><span class="badge-id"><?php echo $row['id']; ?></span></td>

    <td><?php echo $row['cat_name']; ?></td>

    <td class="video-title">
        <?php echo $row['title']; ?>
    </td>

    <td>
        <video width="200" height="110" controls>
            <source src="<?php echo $row['video']; ?>" type="video/mp4">
        </video>
    </td>

    <td>
        <a href="addvideo.php?id=<?php echo $row['id']; ?>" class="btn-action btn-edit">✏ Edit</a>
    </td>

    <td>
        <a href="viewvideo.php?delete=<?php echo $row['id']; ?>" 
           class="btn-action btn-delete"
           onclick="return confirm('Delete this video?')">🗑 Delete</a>
    </td>
</tr>

<?php } ?>

</tbody>

</table>

</div>
</div>

<?php include "footer.php"; ?>