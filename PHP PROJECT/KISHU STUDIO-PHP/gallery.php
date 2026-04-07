<?php 
include "header.php";

// FETCH DATA
$photo_result = mysqli_query($cn,"SELECT * FROM photos ORDER BY id DESC");
$video_result = mysqli_query($cn,"SELECT * FROM videos ORDER BY id DESC");

$photoMedia = [];
$videoMedia = [];
?>

<style>

/* ===== PREMIUM BACKGROUND ===== */
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
    position:relative;
}

.section-title::after{
    content:"";
    width:80px;
    height:3px;
    background: linear-gradient(135deg,#234b72,#4ca1af);
    display:block;
    margin:10px auto;
    border-radius:5px;
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

/* HOVER EFFECT */
.gallery-card:hover{
    transform:translateY(-8px);
    box-shadow:0 20px 50px rgba(0,0,0,0.2);
}

/* IMAGE + VIDEO */
.gallery-card img,
.gallery-card video{
    width:100%;
    height:240px;
    object-fit:contain;   /* 🔥 FULL IMAGE VISIBLE */
    background:#f1f5f9;   /* clean background */
    padding:10px;
}

/* ZOOM */
.gallery-card:hover img,
.gallery-card:hover video{
    transform:scale(1.08);
}

/* OVERLAY */
.gallery-card::before{
    content:"";
    position:absolute;
    top:0;
    left:0;
    width:100%;
    height:100%;
    background: linear-gradient(180deg,transparent,rgba(0,0,0,0.5));
    opacity:0;
    transition:0.4s;
}

.gallery-card:hover::before{
    opacity:1;
}

/* PLAY ICON */
.play-icon{
    position:absolute;
    top:50%;
    left:50%;
    transform:translate(-50%,-50%) scale(0.8);
    font-size:40px;
    color:#fff;
    background: linear-gradient(135deg,#234b72,#4ca1af);
    padding:12px 18px;
    border-radius:50%;
    opacity:0;
    transition:0.4s;
}

.gallery-card:hover .play-icon{
    opacity:1;
    transform:translate(-50%,-50%) scale(1);
}

/* ===== VIDEO CARD ===== */
.gallery-card.video-card{
    background:transparent;
    box-shadow:none;
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
}

.modal-gallery img,
.modal-gallery video{
    max-width:85%;
    max-height:85%;
    border-radius:12px;
    box-shadow:0 20px 60px rgba(0,0,0,0.5);
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
    opacity:0.7;
}

.arrow:hover{
    opacity:1;
}

.left{ left:30px; }
.right{ right:30px; }

/* MOBILE */
@media(max-width:768px){
    .gallery-card img,
    .gallery-card video{
        height:200px;
    }
}

</style>

<div class="container mt-5 py-5">

    <!-- PHOTOS -->
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

    <!-- VIDEOS -->
    <h2 class="section-title mt-5">🎬 Video Gallery</h2>
    <div class="row g-4">
        <?php 
        $j = 0;
        while($row = mysqli_fetch_array($video_result)){ 
            $videoMedia[] = "admin/".$row['video'];
        ?>
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="gallery-card video-card" onclick="openVideoModal(<?php echo $j; ?>)">
                    <video muted>
                        <source src="admin/<?php echo $row['video']; ?>" type="video/mp4">
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

// OPEN
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

// CLOSE
function closeModal(){
    document.getElementById("galleryModal").style.display = "none";
    document.getElementById("modalContent").innerHTML = "";
}

// SHOW
function showMedia(){
    let content = "";

    if(currentType === "photo"){
        content = `<img src="${photoMedia[currentIndex]}">`;
    } else {
        content = `<video controls autoplay>
                        <source src="${videoMedia[currentIndex]}" type="video/mp4">
                   </video>`;
    }

    document.getElementById("modalContent").innerHTML = content;
}

// NEXT / PREV
function nextMedia(){
    if(currentType === "photo"){
        currentIndex = (currentIndex + 1) % photoMedia.length;
    } else {
        currentIndex = (currentIndex + 1) % videoMedia.length;
    }
    showMedia();
}

function prevMedia(){
    if(currentType === "photo"){
        currentIndex = (currentIndex - 1 + photoMedia.length) % photoMedia.length;
    } else {
        currentIndex = (currentIndex - 1 + videoMedia.length) % videoMedia.length;
    }
    showMedia();
}

// KEYBOARD
document.addEventListener("keydown", function(e){
    let modal = document.getElementById("galleryModal");

    if(modal.style.display === "flex"){
        if(e.key === "ArrowRight") nextMedia();
        if(e.key === "ArrowLeft") prevMedia();
        if(e.key === "Escape") closeModal();
    }
});
</script>

<?php include "footer.php"; ?>