<?php 
include "header.php";

// ================= OLD DATA FETCH =================
if(isset($_REQUEST['id'])){
    $id = $_REQUEST['id'];
    $result = mysqli_query($cn,"SELECT * FROM videos WHERE id='$id'") or die(mysqli_error($cn));
    $record = mysqli_fetch_array($result);
}

// ================= CATEGORY FETCH =================
$cat_result = mysqli_query($cn,"SELECT * FROM categories") or die(mysqli_error($cn));

// ================= UPDATE =================
if(isset($_REQUEST['submit']) && $_REQUEST['submit']=='UPDATE'){
    $id = $_REQUEST['id'];
    $cat_name = $_REQUEST['cat_name'];
    $title = $_REQUEST['title']; // ✅ added
    $video = $_REQUEST['ovideo'];

    if($_FILES['video']['name']!=""){
        $video = "video/".$_FILES['video']['name'];
        move_uploaded_file($_FILES['video']['tmp_name'],$video);
        unlink($_REQUEST['ovideo']);
    }

    mysqli_query($cn,"UPDATE videos SET video='$video', cat_name='$cat_name', title='$title' WHERE id='$id'") 
    or die(mysqli_error($cn));

    header('location:viewvideo.php');
    exit();
}

// ================= INSERT =================
if(isset($_REQUEST['submit']) && $_REQUEST['submit']=='🚀 Upload Video'){
    $video = "video/".$_FILES['video']['name'];
    $cat_name = $_REQUEST['cat_name'];
    $title = $_REQUEST['title']; // ✅ added

    move_uploaded_file($_FILES['video']['tmp_name'],$video);

    mysqli_query($cn,"INSERT INTO videos SET video='$video', cat_name='$cat_name', title='$title'") 
    or die(mysqli_error($cn));

    header('location:viewvideo.php');
    exit();
}
?>

<style>
body{
    background: linear-gradient(135deg,#0f172a,#1e1b4b);
    color:white;
    font-family:'Segoe UI';
}

.glass-card{
    background: rgba(255,255,255,0.05);
    backdrop-filter: blur(15px);
    border-radius:20px;
    border:1px solid rgba(255,255,255,0.1);
    box-shadow:0 0 40px rgba(147,51,234,0.4);
    animation:fadeIn 0.6s ease;
}

.title-text{
    background: linear-gradient(45deg,#22c55e,#16a34a);
    -webkit-background-clip:text;
    -webkit-text-fill-color:transparent;
}

.input-group-custom{
    margin-bottom:25px;
}

.input-group-custom input,
.input-group-custom select{
    width:100%;
    padding:12px;
    border:none;
    border-radius:10px;
    background:rgba(255,255,255,0.08);
    color:white;
}

.btn-glow{
    background: linear-gradient(45deg,#22c55e,#16a34a);
    border:none;
    color:white;
    padding:12px;
    border-radius:30px;
    font-weight:600;
    transition:0.3s;
}

.btn-glow:hover{
    transform:scale(1.05);
    box-shadow:0 0 20px #22c55e;
}

@keyframes fadeIn{
    from{opacity:0; transform:translateY(20px);}
    to{opacity:1; transform:translateY(0);}
}
</style>

<div class="d-flex justify-content-center align-items-center" style="min-height:90vh;">

    <form method="POST" enctype="multipart/form-data" style="width:100%; max-width:420px;">

    <div class="card p-4 glass-card">

    <h4 class="mb-3 text-center fw-bold title-text">
        <?php echo isset($_REQUEST['id']) ? '✏ Update Video' : '🎬 Upload Video'; ?>
    </h4>

    <!-- HIDDEN -->
    <input type="hidden" name="id" value="<?php echo @$record['id']; ?>">
    <input type="hidden" name="ovideo" value="<?php echo @$record['video']; ?>">

    <!-- CATEGORY DROPDOWN -->
    <div class="input-group-custom">
        <select name="cat_name" required>
            <option class="text-primary" value="">Select Category</option>

            <?php while($cat = mysqli_fetch_array($cat_result)) { ?>
                
                <option class="text-primary" value="<?php echo $cat['cat_name']; ?>"
                    <?php if(@$record['cat_name'] == $cat['cat_name']) echo "selected"; ?>>
                    
                    <?php echo $cat['cat_name']; ?>
                
                </option>

            <?php } ?>

        </select>
    </div>

    <!-- TITLE (ADDED) -->
    <div class="input-group-custom">
        <input type="text" name="title" placeholder="Enter Video Title"
        value="<?php echo @$record['title']; ?>" required>
    </div>

    <!-- VIDEO FILE -->
    <div class="input-group-custom">
        <input type="file" name="video" accept="video/*" <?php if(!isset($_REQUEST['id'])) echo "required"; ?>>
    </div>

    <!-- BUTTON -->
    <input type="submit" name="submit"
    value="<?php echo isset($_REQUEST['id']) ? 'UPDATE' : '🚀 Upload Video'; ?>"
    class="btn btn-glow w-100">

    </div>

    </form>
</div>

<?php include "footer.php"; ?>