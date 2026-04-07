<?php 
include "header.php";

// ================= OLD DATA FETCH =================
if(isset($_REQUEST['id'])){
    $id = $_REQUEST['id'];
    $result = mysqli_query($cn,"SELECT * FROM services WHERE id='$id'") or die(mysqli_error($cn));
    $record = mysqli_fetch_array($result);
}

// ================= CATEGORY FETCH =================
$cat_result = mysqli_query($cn,"SELECT * FROM categories") or die(mysqli_error($cn));

// ================= UPDATE =================
if(isset($_REQUEST['submit']) && $_REQUEST['submit']=='UPDATE'){

    $id = $_REQUEST['id'];
    $title = $_REQUEST['title'];
    $description = $_REQUEST['description'];
    $price = $_REQUEST['price'];
    $category = $_REQUEST['category'];

    $image = $_REQUEST['oimg'];

    if($_FILES['image']['name']!=""){
        $image = "image/".$_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'],$image);
    }

    mysqli_query($cn,"UPDATE services SET 
        title='$title',
        description='$description',
        price='$price',
        image='$image',
        category='$category'
        WHERE id='$id'
    ") or die(mysqli_error($cn));

    header('location:viewservices.php');
    exit();
}

// ================= INSERT =================
if(isset($_REQUEST['submit']) && $_REQUEST['submit']=='🚀 Add Service'){

    $title = $_REQUEST['title'];
    $description = $_REQUEST['description'];
    $price = $_REQUEST['price'];
    $category = $_REQUEST['category'];

    $image = "image/".$_FILES['image']['name'];

    move_uploaded_file($_FILES['image']['tmp_name'],$image);

    mysqli_query($cn,"INSERT INTO services SET 
        title='$title',
        description='$description',
        price='$price',
        image='$image',
        category='$category'
    ") or die(mysqli_error($cn));

    header('location:viewservices.php');
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
        background: linear-gradient(45deg,#ff00cc,#9333ea);
        -webkit-background-clip:text;
        -webkit-text-fill-color:transparent;
    }

    .input-group-custom{
        margin-bottom:25px;
    }

    .input-group-custom input,
    .input-group-custom textarea,
    .input-group-custom select{
        width:100%;
        padding:12px;
        border:none;
        border-radius:10px;
        background:rgba(255,255,255,0.08);
        color:white;
    }

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

    @keyframes fadeIn{
        from{opacity:0; transform:translateY(20px);}
        to{opacity:1; transform:translateY(0);}
    }
</style>

<div class="d-flex justify-content-center align-items-center" style="min-height:90vh;">

<form method="POST" enctype="multipart/form-data" style="width:100%; max-width:420px;">

<div class="card p-4 glass-card">

<h4 class="mb-3 text-center fw-bold title-text">
    <?php echo isset($_REQUEST['id']) ? '✏ Update Service' : '📸 Add Service'; ?>
</h4>

<!-- HIDDEN -->
<input type="hidden" name="id" value="<?php echo @$record['id']; ?>">
<input type="hidden" name="oimg" value="<?php echo @$record['image']; ?>">

<!-- TITLE -->
<div class="input-group-custom">
    <input type="text" name="title" placeholder="Service Title"
    value="<?php echo @$record['title']; ?>" required>
</div>

<!-- DESCRIPTION -->
<div class="input-group-custom">
    <textarea name="description" rows="3" placeholder="Description" required><?php echo @$record['description']; ?></textarea>
</div>

<!-- PRICE -->
<div class="input-group-custom">
    <input type="number" name="price" placeholder="Price ₹"
    value="<?php echo @$record['price']; ?>" required>
</div>

<!-- CATEGORY (DYNAMIC LIKE YOUR CODE) -->
<div class="input-group-custom">
    <select name="category" required>
        <option class="text-primary" value="">Select Category</option>

        <?php while($cat = mysqli_fetch_array($cat_result)) { ?>
            
            <option class="text-primary" value="<?php echo $cat['cat_name']; ?>"
                <?php if(@$record['category'] == $cat['cat_name']) echo "selected"; ?>>
                
                <?php echo $cat['cat_name']; ?>
            
            </option>

        <?php } ?>

    </select>
</div>

<!-- IMAGE -->
<div class="input-group-custom">
    <input type="file" name="image" <?php if(!isset($_REQUEST['id'])) echo "required"; ?>>
</div>

<!-- BUTTON -->
<input type="submit" name="submit"
value="<?php echo isset($_REQUEST['id']) ? 'UPDATE' : '🚀 Add Service'; ?>"
class="btn btn-glow w-100">

</div>

</form>
</div>

<?php include "footer.php"; ?>