<?php
include "header.php";  // Only this include - connect is already inside header.php

// ======================== FETCH OLD DATA ========================
if(isset($_REQUEST['id'])){
    $id = $_REQUEST['id'];
    $result = mysqli_query($cn,"SELECT * FROM categories WHERE id='$id'") or die(mysqli_error($cn));
    $record = mysqli_fetch_array($result);
}

// ======================== UPDATE ========================
if(isset($_REQUEST['submit']) && $_REQUEST['submit']=='UPDATE'){
    $hide = $_REQUEST['hide'];
    $category = $_REQUEST['category'];

    mysqli_query($cn, "UPDATE categories SET cat_name='$category' WHERE id='$hide'") 
    or die(mysqli_error($cn));

    header('location:viewcategory.php');
    exit();
}

// ======================== INSERT ========================
if(isset($_REQUEST['submit']) && $_REQUEST['submit']=='🚀 Add Category'){
    $cat = $_REQUEST['category'];

    mysqli_query($cn,"INSERT INTO categories SET cat_name='$cat'") 
    or die(mysqli_error($cn));

    header('location:viewcategory.php');
    exit();
}
?>

<div class="d-flex justify-content-center align-items-center" style="min-height:80vh;">

    <form method="POST" style="width:100%; max-width:420px;" autocomplete="off">

        <div class="card p-4 glass-card">

            <h4 class="mb-3 text-center fw-bold title-text">
                <?php echo isset($_REQUEST['id']) ? '✏ Update Category' : '✨ Add Category'; ?>
            </h4>

            <input type="hidden" name="hide" value="<?php echo @$record['id']; ?>">

            <div class="input-group-custom">
                <input type="text" name="category" value="<?php echo @$record['cat_name']; ?>" placeholder="Enter category name" required>
            </div>

            <input type="submit" name="submit" value="<?php echo isset($_REQUEST['id']) ? 'UPDATE' : '🚀 Add Category'; ?>" class="btn btn-glow w-100">

        </div>

    </form>

</div>

<style>

    /* GLASS CARD */
    .glass-card{
        background: rgba(255,255,255,0.05);
        backdrop-filter: blur(15px);
        border-radius:20px;
        border:1px solid rgba(255,255,255,0.1);
        box-shadow:0 0 40px rgba(147,51,234,0.4);
        animation:fadeIn 0.6s ease;
    }

    /* TITLE */
    .title-text{
        background: linear-gradient(45deg,#ff00cc,#9333ea);
        -webkit-background-clip:text;
        -webkit-text-fill-color:transparent;
    }

    /* INPUT */
    .input-group-custom{
        margin-bottom:25px;
    }

    .input-group-custom input{
        width:100%;
        padding:12px;
        border:none;
        outline:none;
        border-radius:10px;
        background:rgba(255,255,255,0.08);
        color:white;
        font-size:14px;
    }

    /* BUTTON */
    .btn-glow{
        background: linear-gradient(45deg,#ff00cc,#9333ea);
        border:none;
        color:white;
        padding:12px;
        border-radius:30px;
        font-weight:600;
        transition:0.3s;
    }

    .btn-glow:hover{
        transform:scale(1.05);
        box-shadow:0 0 20px #ff00cc;
    }

    /* MESSAGE */
    .msg-box{
        text-align:center;
        margin:15px auto;
        padding:10px;
        border-radius:10px;
        background:rgba(255,255,255,0.08);
        color:#a5f3fc;
        max-width:400px;
    }

    /* ANIMATION */
    @keyframes fadeIn{
        from{
            opacity:0;
            transform:translateY(20px);
        }
        to{
            opacity:1;
            transform:translateY(0);
        }
    }

</style>

<?php include "footer.php"; ?>