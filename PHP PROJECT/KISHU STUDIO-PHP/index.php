<?php include 'header.php'; ?>

<style>

/* ===== GLOBAL ===== */
body{
    background: linear-gradient(135deg,#eef3f8,#f9fbfd);
}

/* ===== HERO ===== */
.hero-section{
    height: 95vh;
    background: linear-gradient(rgba(0,0,0,0.65), rgba(0,0,0,0.65)),
                url('https://images.unsplash.com/photo-1492724441997-5dc865305da7');
    background-size: cover;
    background-position: center;
    display:flex;
    align-items:center;
}

.hero-title{
    font-size:60px;
    font-weight:700;
}

.hero-title span{
    background: linear-gradient(135deg,#4ca1af,#ffffff);
    -webkit-background-clip:text;
    -webkit-text-fill-color:transparent;
}

.hero-subtitle{
    font-size:18px;
    opacity:0.9;
}

/* BUTTONS */
.btn-main{
    padding:12px 28px;
    border-radius:30px;
    border:none;
    font-weight:600;
    background: linear-gradient(135deg,#234b72,#4ca1af);
    color:#fff;
    transition:0.3s;
}

.btn-main:hover{
    transform:translateY(-3px);
    box-shadow:0 10px 30px rgba(0,0,0,0.3);
}

.btn-outline-custom{
    padding:12px 28px;
    border-radius:30px;
    border:1px solid #fff;
    color:#fff;
    transition:0.3s;
}

.btn-outline-custom:hover{
    background:#fff;
    color:#234b72;
}

/* ===== SECTION ===== */
.section{
    padding:80px 0;
}

.section-title{
    font-size:36px;
    font-weight:700;
    color:#234b72;
}

/* ===== ABOUT ===== */
.about-box{
    background:#fff;
    border-radius:25px;
    padding:40px;
    box-shadow:0 20px 50px rgba(0,0,0,0.08);
}

.about-img{
    border-radius:20px;
}

/* ===== SERVICES ===== */
.service-card{
    border-radius:20px;
    padding:30px;
    background:#fff;
    box-shadow:0 10px 30px rgba(0,0,0,0.08);
    transition:0.3s;
}

.service-card:hover{
    transform:translateY(-8px);
    box-shadow:0 20px 40px rgba(0,0,0,0.15);
}

/* ===== GALLERY ===== */
.gallery-card{
    border-radius:15px;
    overflow:hidden;
    background:#fff;
    display:flex;
    align-items:center;
    justify-content:center;
    height:230px;
    cursor:pointer;
}

.gallery-card img{
    max-width:100%;
    max-height:100%;
    object-fit:contain;
    transition:0.3s;
}

.gallery-card:hover img{
    transform:scale(1.05);
}

/* ===== MODAL ===== */
.gallery-modal{
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

.gallery-modal img{
    max-width:85%;
    max-height:85%;
    border-radius:10px;
}

.close-btn{
    position:absolute;
    top:20px;
    right:30px;
    font-size:35px;
    color:#fff;
    cursor:pointer;
}

.arrow{
    position:absolute;
    top:50%;
    transform:translateY(-50%);
    font-size:50px;
    color:#fff;
    cursor:pointer;
}

.left{ left:30px; }
.right{ right:30px; }

/* CTA */
.cta-section{
    background: linear-gradient(135deg,#234b72,#2c5364,#4ca1af);
    color:#fff;
    padding:70px 0;
    border-radius:20px;
    text-align:center;
}

</style>

<!-- HERO -->
<section class="hero-section">
    <div class="container text-center text-white">

        <h1 class="hero-title">
            Capture Your <span>Perfect Moments</span>
        </h1>

        <p class="hero-subtitle mt-3">
            Professional Photography Studio for Weddings, Events & Creative Shoots
        </p>

        <div class="mt-4">
            <a href="gallery.php" class="btn-main me-3">Explore Gallery</a>
            <a href="services.php" class="btn-outline-custom">Book Now</a>
        </div>

    </div>
</section>

<!-- ABOUT -->
<section class="section">
    <div class="container">
        <div class="about-box">
            <div class="row align-items-center">

                <div class="col-md-6">
                    <h2 class="section-title">About Kishu Studio</h2>

                    <p>
                        At <b>Kishu Studio</b>, we specialize in capturing timeless memories with creativity,
                        precision, and passion. Our goal is to turn every moment into a cinematic story
                        that you can relive forever.
                    </p>

                    <p>
                        From weddings and pre-wedding shoots to events and personal sessions, we focus
                        on delivering high-quality visuals with a professional touch and artistic vision.
                    </p>

                    <p>
                        With a strong commitment to client satisfaction, we ensure every shoot reflects
                        emotions, elegance, and perfection.
                    </p>

                    <a href="about.php" class="btn-main mt-3">Read More</a>
                </div>

                <div class="col-md-6">
                    <img src="https://images.unsplash.com/photo-1516035069371-29a1b244cc32"
                         class="img-fluid about-img">
                </div>

            </div>
        </div>
    </div>
</section>

<!-- SERVICES -->
<section class="section text-center">
    <div class="container">
        <h2 class="section-title mb-5">Our Services</h2>

        <div class="row g-4 mb-5">

            <div class="col-md-4">
                <div class="service-card">
                    <h4>Wedding Photography</h4>
                    <p>
                        Capture your once-in-a-lifetime moments with cinematic storytelling,
                        emotional depth, and high-end professional editing.
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="service-card">
                    <h4>Pre-Wedding Shoots</h4>
                    <p>
                        Creative and romantic pre-wedding sessions designed to reflect your
                        love story with unique concepts and stunning visuals.
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="service-card">
                    <h4>Event Photography</h4>
                    <p>
                        Professional coverage for all types of events with attention to detail,
                        ensuring every important moment is perfectly documented.
                    </p>
                </div>
            </div>

        </div>

        <a href="services.php" class="btn-main">View All Services</a>
    </div>
</section>

<!-- GALLERY -->
<section class="section">
    <div class="container text-center">

        <h2 class="section-title mb-5">Latest Work</h2>

        <div class="row g-4">

            <?php 
            $result = mysqli_query($cn, "SELECT * FROM photos ORDER BY id DESC LIMIT 6");
            $images = [];
            $i = 0;

            while($row = mysqli_fetch_array($result)){
                $images[] = "admin/".$row['photo'];
            ?>

                <div class="col-md-4">
                    <div class="gallery-card" onclick="openGallery(<?php echo $i; ?>)">
                        <img src="admin/<?php echo $row['photo']; ?>">
                    </div>
                </div>

            <?php $i++; } ?>

        </div>

        <a href="gallery.php" class="btn-main mt-4">View Full Gallery</a>
    </div>
</section>

<!-- MODAL -->
<div id="galleryModal" class="gallery-modal">
    <span class="close-btn" onclick="closeGallery()">&times;</span>
    <span class="arrow left" onclick="prevImage()">&#10094;</span>
    <img id="modalImg">
    <span class="arrow right" onclick="nextImage()">&#10095;</span>
</div>

<script>
let images = <?php echo json_encode($images); ?>;
let currentIndex = 0;

function openGallery(index){
    currentIndex = index;
    document.getElementById("galleryModal").style.display = "flex";
    showImage();
}

function showImage(){
    document.getElementById("modalImg").src = images[currentIndex];
}

function nextImage(){
    currentIndex = (currentIndex + 1) % images.length;
    showImage();
}

function prevImage(){
    currentIndex = (currentIndex - 1 + images.length) % images.length;
    showImage();
}

function closeGallery(){
    document.getElementById("galleryModal").style.display = "none";
}

/* KEYBOARD SUPPORT */
document.addEventListener("keydown", function(e){
    let modal = document.getElementById("galleryModal");

    if(modal.style.display === "flex"){
        if(e.key === "ArrowRight") nextImage();
        if(e.key === "ArrowLeft") prevImage();
        if(e.key === "Escape") closeGallery();
    }
});
</script>

<!-- CTA -->
<div class="container mb-5">
    <div class="cta-section">
        <h2>Let’s Capture Your Story</h2>
        <p>Your moments deserve premium photography experience</p>
        <a href="contact.php" class="btn btn-light mt-3 px-4">Contact Now</a>
    </div>
</div>

<?php include 'footer.php'; ?>