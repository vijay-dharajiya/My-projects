<?php 
include "header.php";

// FETCH DATA
$photo_result = mysqli_query($cn,"SELECT * FROM photos ORDER BY id DESC");
$video_result = mysqli_query($cn,"SELECT * FROM videos ORDER BY id DESC");

$photoMedia = [];
$videoMedia = [];
?>

<style>

/* ===== BACKGROUND ===== */
body{
    background: linear-gradient(135deg,#eef3f8,#f9fbfd);
}

/* ===== TITLE ===== */
.section-title{
    font-size:30px;
    font-weight:700;
    color:#234b72;
    text-align:center;
    margin-bottom:30px;
}

/* ===== CARD ===== */
.gallery-card{
    position:relative;
    border-radius:18px;
    overflow:hidden;
    cursor:pointer;
    background:#fff;
    transition:0.4s;
    box-shadow:0 10px 25px rgba(0,0,0,0.08);
}

.gallery-card:hover{
    transform:translateY(-8px);
    box-shadow:0 20px 50px rgba(0,0,0,0.2);
}

.gallery-card img,
.gallery-card video{
    width:100%;
    height:240px;
    object-fit:contain;
    background:#f1f5f9;
    padding:10px;
}

/* PLAY ICON */
.play-icon{
    position:absolute;
    top:50%;
    left:50%;
    transform:translate(-50%,-50%);
    font-size:40px;
    color:#fff;
    background:#234b72;
    padding:10px 15px;
    border-radius:50%;
}

/* ===== MODAL ===== */
.modal-gallery{
    position:fixed;
    top:0;
    left:0;
    width:100%;
    height:100%;
    background:rgba(0,0,0,0.95);
    display:none;
    align-items:center;
    justify-content:center;
    z-index:9999;
    padding:20px;
}

/* CENTER CONTENT */
#modalContent{
    display:flex;
    align-items:center;
    justify-content:center;
    width:100%;
    height:100%;
}

/* IMAGE + VIDEO */
.modal-gallery img,
.modal-gallery video{
    max-width:100%;
    max-height:90vh;
    width:auto;
    height:auto;
    object-fit:contain;
    border-radius:12px;
    animation:zoomIn 0.3s ease;
}

/* ANIMATION */
@keyframes zoomIn{
    from{ transform:scale(0.8); opacity:0; }
    to{ transform:scale(1); opacity:1; }
}

/* CLOSE */
.close-btn{
    position:absolute;
    top:20px;
    right:30px;
    font-size:35px;
    color:#fff;
    cursor:pointer;
}

/* ARROWS */
.arrow{
    position:absolute;
    top:50%;
    transform:translateY(-50%);
    font-size:45px;
    color:#fff;
    cursor:pointer;
}

.left{ left:20px; }
.right{ right:20px; }

</style>

<div class="container mt-5 py-5">

    <!-- PHOTO -->
    <h2 class="section-title">📸 Photo Gallery</h2>
    <div class="row g-4 mb-5">
        <?php 
        $i = 0;
        while($row = mysqli_fetch_array($photo_result)){ 
            $photoMedia[] = "admin/".$row['photo'];
        ?>
        <div class="col-lg-3 col-md-4 col-sm-6">
            <div class="gallery-card" onclick="openPhotoModal(<?php echo $i; ?>)">
                <img src="admin/<?php echo $row['photo']; ?>">
            </div>
        </div>
        <?php $i++; } ?>
    </div>

    <!-- VIDEO -->
    <h2 class="section-title">🎬 Video Gallery</h2>
    <div class="row g-4">
        <?php 
        $j = 0;
        while($row = mysqli_fetch_array($video_result)){ 
            $videoMedia[] = "admin/".$row['video'];
        ?>
        <div class="col-lg-4 col-md-6">
            <div class="gallery-card" onclick="openVideoModal(<?php echo $j; ?>)">
                <video muted>
                    <source src="admin/<?php echo $row['video']; ?>">
                </video>
                <div class="play-icon">▶</div>
            </div>
        </div>
        <?php $j++; } ?>
    </div>

</div>

<!-- MODAL -->
<div class="modal-gallery" id="galleryModal">
    <span class="close-btn" onclick="closeModal()">&times;</span>
    <span class="arrow left" onclick="prevMedia()">&#10094;</span>
    <div id="modalContent"></div>
    <span class="arrow right" onclick="nextMedia()">&#10095;</span>
</div>

<script>

let photoMedia = <?php echo json_encode($photoMedia); ?>;
let videoMedia = <?php echo json_encode($videoMedia); ?>;

let currentIndex = 0;
let currentType = "";

/* OPEN */
function openPhotoModal(index){
    currentType = "photo";
    currentIndex = index;
    document.getElementById("galleryModal").style.display = "flex";
    showMedia();
}

function openVideoModal(index){
    currentType = "video";
    currentIndex = index;
    document.getElementById("galleryModal").style.display = "flex";
    showMedia();
}

/* CLOSE */
function closeModal(){
    document.getElementById("galleryModal").style.display = "none";
    document.getElementById("modalContent").innerHTML = "";
}

/* SHOW */
function showMedia(){
    let content = "";

    if(currentType === "photo"){
        content = `<img src="${photoMedia[currentIndex]}">`;
    } else {
        content = `<video controls autoplay>
                        <source src="${videoMedia[currentIndex]}">
                   </video>`;
    }

    document.getElementById("modalContent").innerHTML = content;
}

/* NEXT */
function nextMedia(){
    if(currentType === "photo"){
        currentIndex = (currentIndex + 1) % photoMedia.length;
    } else {
        currentIndex = (currentIndex + 1) % videoMedia.length;
    }
    showMedia();
}

/* PREV */
function prevMedia(){
    if(currentType === "photo"){
        currentIndex = (currentIndex - 1 + photoMedia.length) % photoMedia.length;
    } else {
        currentIndex = (currentIndex - 1 + videoMedia.length) % videoMedia.length;
    }
    showMedia();
}

/* KEYBOARD */
document.addEventListener("keydown", function(e){
    if(document.getElementById("galleryModal").style.display === "flex"){
        if(e.key === "ArrowRight") nextMedia();
        if(e.key === "ArrowLeft") prevMedia();
        if(e.key === "Escape") closeModal();
    }
});

/* CLICK OUTSIDE CLOSE */
document.getElementById("galleryModal").addEventListener("click", function(e){
    if(e.target.id === "galleryModal"){
        closeModal();
    }
});

</script>

<?php include "footer.php"; ?>