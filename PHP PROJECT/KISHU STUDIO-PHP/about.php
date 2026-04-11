<?php include "header.php"; ?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

<style>

body{
    font-family: 'Poppins', sans-serif;
    background: linear-gradient(135deg,#eef3f8,#f9fbfd);
}

/* ===== SECTION SPACING ===== */
.section{
    padding:70px 0;
}

/* ===== TITLE ===== */
.section-title{
    text-align:center;
    margin-bottom:50px;
}

.section-title h2{
    font-weight:700;
    color:#234b72;
}

.section-title p{
    color:#6c7a89;
}

/* ===== ABOUT CARD ===== */
.about-box{
    background:#fff;
    border-radius:25px;
    padding:40px;
    box-shadow:0 20px 50px rgba(0,0,0,0.1);
}

/* IMAGE */
.about-img{
    border-radius:20px;
    width:100%;
    height:100%;
    object-fit:cover;
    box-shadow:0 15px 40px rgba(0,0,0,0.2);
}

/* TEXT */
.about-text h3{
    font-weight:700;
    color:#234b72;
}

.about-text p{
    color:#5c6f82;
}

/* BUTTON */
.btn-main{
    background: linear-gradient(135deg,#234b72,#4ca1af);
    color:#fff;
    padding:12px 26px;
    border-radius:30px;
    border:none;
    transition:0.3s;
}

.btn-main:hover{
    transform:translateY(-2px);
    box-shadow:0 10px 25px rgba(0,0,0,0.2);
}

/* INSTAGRAM */
.insta-btn{
    background: linear-gradient(45deg,#f09433,#dc2743,#bc1888);
    color:#fff;
    padding:12px 20px;
    border-radius:30px;
    text-decoration:none;
    margin-left:10px;
}

/* ===== FEATURES ===== */
.feature-card{
    background:#fff;
    padding:30px;
    border-radius:20px;
    text-align:center;
    box-shadow:0 10px 30px rgba(0,0,0,0.08);
    transition:0.3s;
}

.feature-card:hover{
    transform:translateY(-10px);
    box-shadow:0 20px 50px rgba(0,0,0,0.15);
}

.feature-card i{
    font-size:30px;
    color:#4ca1af;
    margin-bottom:10px;
}

/* ===== STATS ===== */
.stats-box{
    background: linear-gradient(135deg,#234b72,#2c5364,#4ca1af);
    color:#fff;
    padding:50px;
    border-radius:25px;
    text-align:center;
    box-shadow:0 20px 60px rgba(0,0,0,0.2);
}

.stats-box h3{
    font-size:38px;
    font-weight:700;
}

</style>

<div class="container section">

    <!-- ABOUT -->
    <div class="about-box">
        <div class="row align-items-center">

            <div class="col-md-5 mb-4">
                <img src="images/vijay.jpeg" class="about-img">
            </div>

            <div class="col-md-7 about-text">
                <h3>Hello, I'm Kihala Vijay</h3>

                <p>
                    Welcome to <b>Kishu Studio</b>! I am a passionate photographer with over 2 years 
                    of experience capturing emotional and unforgettable moments.
                </p>

                <p>
                    I specialize in wedding, pre-wedding, event, and portrait photography.
                    My style is natural, cinematic, and focused on real emotions.
                </p>

                <button class="btn-main mb-3">Book Now</button>

                <a href="https://instagram.com/kishu_studio_official" target="_blank" class="insta-btn">
                    <i class="fab fa-instagram"></i> Follow @kishu_studio_official
                </a>
            </div>

        </div>
    </div>

</div>

<!-- FEATURES -->
<div class="container section">

    <div class="section-title">
        <h2>Why Choose Us</h2>
        <p>Professional service with creativity and trust</p>
    </div>

    <div class="row">

        <div class="col-md-4 mb-4">
            <div class="feature-card">
                <i class="fas fa-camera"></i>
                <h5>Professional Quality</h5>
                <p>High-end photography with creative editing</p>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="feature-card">
                <i class="fas fa-tags"></i>
                <h5>Affordable Pricing</h5>
                <p>Best value with premium service</p>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="feature-card">
                <i class="fas fa-clock"></i>
                <h5>Fast Delivery</h5>
                <p>Quick and reliable turnaround</p>
            </div>
        </div>

    </div>

</div>

<!-- STATS -->
<div class="container section">
    <div class="stats-box">

        <h2 class="mb-4">Our Achievements</h2>

        <div class="row">

            <div class="col-md-4">
                <h3>100+</h3>
                <p>Happy Clients</p>
            </div>

            <div class="col-md-4">
                <h3>50+</h3>
                <p>Weddings Covered</p>
            </div>

            <div class="col-md-4">
                <h3>2+</h3>
                <p>Years Experience</p>
            </div>

        </div>

    </div>
</div>

<?php include "footer.php"; ?>