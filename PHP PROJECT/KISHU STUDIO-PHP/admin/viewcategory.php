<?php
include "header.php";

// ================= DELETE =================
if(isset($_GET['delete'])){
    $id = $_GET['delete'];

    mysqli_query($cn,"DELETE FROM categories WHERE id='$id'")
    or die("Delete Error: ".mysqli_error($cn));

    header("location:viewcategory.php");
    exit();
}

// ================= FETCH =================
$result = mysqli_query($cn,"SELECT * FROM categories ORDER BY id ASC")
or die("Select Error!!!".mysqli_error($cn));
?>

<style>
body{
    background: radial-gradient(circle at top,#1e1b4b,#020617);
    font-family:'Segoe UI';
    color:white;
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
    background:linear-gradient(45deg,#ff00cc,#9333ea);
    -webkit-background-clip:text;
    -webkit-text-fill-color:transparent;
}

/* CARD */
.glass-card{
    background: rgba(255,255,255,0.05);
    backdrop-filter: blur(18px);
    border-radius:20px;
    padding:25px;
    box-shadow:0 0 40px rgba(147,51,234,0.35);
    border:1px solid rgba(255,255,255,0.08);
}

/* TABLE */
table{
    width:100%;
    border-collapse:separate;
    border-spacing:0 12px;
}

thead th{
    color:#c084fc;
    text-align:center;
    font-weight:600;
}

tbody tr{
    background: rgba(255,255,255,0.04);
    transition:0.3s;
}

tbody tr:hover{
    transform:scale(1.01);
    background: rgba(147,51,234,0.2);
}

td{
    text-align:center;
    padding:14px;
}

/* BADGE */
.badge-id{
    background:linear-gradient(45deg,#6366f1,#9333ea);
    padding:5px 12px;
    border-radius:20px;
    font-size:12px;
}

/* CATEGORY NAME */
.cat-name{
    font-weight:500;
    letter-spacing:0.5px;
}

/* BUTTONS */
.btn-action{
    padding:6px 14px;
    border:none;
    border-radius:25px;
    font-size:13px;
    text-decoration:none;
    color:white;
    display:inline-block;
    transition:0.3s;
}

.btn-edit{
    background:linear-gradient(45deg,#f59e0b,#fbbf24);
}

.btn-delete{
    background:linear-gradient(45deg,#ef4444,#dc2626);
}

.btn-action:hover{
    transform:scale(1.08);
    box-shadow:0 0 15px rgba(255,255,255,0.2);
}

/* ADD BUTTON */
.btn-glow{
    background: linear-gradient(45deg,#ff00cc,#9333ea);
    border:none;
    color:white;
    border-radius:30px;
    font-weight:600;
    transition:0.3s;
    text-decoration:none;
    padding:10px 25px;
    display:inline-block;
}

.btn-glow:hover{
    transform:scale(1.08);
    box-shadow:0 0 25px #ff00cc;
}

/* EMPTY */
.empty{
    padding:30px;
    color:#f87171;
    font-size:16px;
}
</style>

<div class="container mt-5">

    <div class="page-header">
        <h3>📂 Category Management</h3>

        <a href="addcategory.php" class="btn-glow">
            ➕ Add Category
        </a>
    </div>

    <div class="glass-card">

        <table>

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Category Name</th>
                    <th colspan="2">Action</th>
                </tr>
            </thead>

            <tbody>

            <?php 
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_assoc($result)){
            ?>

                <tr>
                    <td>
                        <span class="badge-id">
                            #<?= $row['id'] ?>
                        </span>
                    </td>

                    <td class="cat-name">
                        📁 <?= $row['cat_name'] ?>
                    </td>

                    <td>
                        <a href="addcategory.php?id=<?= $row['id'] ?>" 
                           class="btn-action btn-edit">
                           ✏ Edit
                        </a>
                    </td>

                    <td>
                        <a href="viewcategory.php?delete=<?= $row['id'] ?>" 
                           class="btn-action btn-delete"
                           onclick="return confirm('Are you sure to delete?')">
                           🗑 Delete
                        </a>
                    </td>
                </tr>

            <?php 
                }
            } else {
            ?>

                <tr>
                    <td colspan="4" class="empty text-center">
                        🚫 No Categories Found
                    </td>
                </tr>

            <?php } ?>

            </tbody>

        </table>

    </div>

</div>

<?php include "footer.php"; ?>