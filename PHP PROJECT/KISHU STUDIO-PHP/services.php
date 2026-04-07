<?php 
include "header.php";

if(session_status() == PHP_SESSION_NONE){
    session_start();
}

$result = mysqli_query($cn,"SELECT * FROM services ORDER BY id DESC");
?>

<style>

    /* ===== BACKGROUND ===== */
    body{
        background: linear-gradient(135deg,#e6eef5,#f4f9fc);
    }

    /* ===== TITLE ===== */
    .section-title{
        text-align:center;
        margin-bottom:50px;
    }

    .section-title h2{
        font-weight:700;
        font-size:36px;
        color:#234b72;
    }

    .section-title p{
        color:#5c6f82;
    }

    /* ===== CARD ===== */
    .service-card{
        border-radius:20px;
        overflow:hidden;
        background:#fff;
        transition:0.4s;
        box-shadow:0 10px 30px rgba(0,0,0,0.08);
        position:relative;
    }

    /* TOP GRADIENT BORDER */
    .service-card::before{
        content:"";
        position:absolute;
        top:0;
        left:0;
        width:100%;
        height:5px;
        background: linear-gradient(135deg, #234b72, #2c5364, #4ca1af);
    }

    /* HOVER */
    .service-card:hover{
        transform:translateY(-10px);
        box-shadow:0 25px 60px rgba(0,0,0,0.15);
    }

    /* ===== IMAGE ===== */
    .service-img{
        width:100%;
        height:220px;
        object-fit:contain;
        background:#fff;
        padding:10px;
        transition:0.4s;
    }

    .service-card:hover .service-img{
        transform:scale(1.05);
    }

    /* ===== CATEGORY ===== */
    .category-badge{
        position:absolute;
        top:15px;
        left:15px;
        background: linear-gradient(135deg, #234b72, #4ca1af);
        color:#fff;
        padding:6px 14px;
        border-radius:20px;
        font-size:11px;
        font-weight:600;
    }

    /* ===== TEXT ===== */
    .service-card h5{
        font-weight:600;
        color:#234b72;
    }

    .service-card p{
        color:#6c7a89;
        font-size:14px;
    }

    /* ===== PRICE ===== */
    .price{
        font-size:22px;
        font-weight:bold;
        color:#2c5364;
    }

    /* ===== BUTTON ===== */
    .btn-book{
        border-radius:30px;
        background: linear-gradient(135deg, #234b72, #4ca1af);
        color:#fff;
        border:none;
        font-weight:600;
        transition:0.3s;
    }

    .btn-book:hover{
        transform:translateY(-2px);
        box-shadow:0 10px 25px rgba(0,0,0,0.2);
    }

    /* ===== CTA ===== */
    .cta{
        background: linear-gradient(135deg, #234b72, #2c5364, #4ca1af);
        border-radius:20px;
        color:#fff;
        box-shadow:0 15px 40px rgba(0,0,0,0.2);
    }

    .cta h3{
        font-weight:700;
    }

    .cta p{
        opacity:0.9;
    }

    /* CTA BUTTON */
    .cta a{
        border-radius:30px;
        padding:10px 25px;
        font-weight:600;
    }

</style>


<div class="container py-5">

    <!-- TITLE -->
    <div class="section-title">
        <h2>Our Services</h2>
        <p>Choose the perfect photography service for your special moments</p>
    </div>

    <div class="row g-4">

        <?php while($row = mysqli_fetch_array($result)){ ?>

        <div class="col-lg-4 col-md-6">

            <div class="service-card h-100">

                <div class="position-relative">
                    <img src="admin/<?php echo $row['image']; ?>" class="service-img">

                    <span class="category-badge">
                        <?php echo $row['category']; ?>
                    </span>
                </div>

                <div class="p-3 d-flex flex-column">

                    <h5><?php echo $row['title']; ?></h5>

                    <p><?php echo substr($row['description'],0,100); ?>...</p>

                    <div class="mt-auto">

                        <div class="price mb-3">
                            ₹ <?php echo $row['price']; ?>
                        </div>

                        <?php if(isset($_SESSION['sid'])) { ?>

                            <a href="order.php?id=<?php echo $row['id']; ?>" 
                               class="btn btn-book w-100">
                               🚀 Book Now
                            </a>

                        <?php } else { ?>

                            <button class="btn btn-book w-100" onclick="openLoginModal()">
                                🔐 Login to Book
                            </button>

                        <?php } ?>

                    </div>

                </div>

            </div>

        </div>

        <?php } ?>

    </div>

</div>

<!-- CTA -->
<div class="container pb-5">
    <div class="cta text-center p-5">

        <h3>Let’s Capture Your Story</h3>

        <p>Book your session today and create unforgettable memories</p>

        <a href="contact.php" class="btn btn-light mt-3">
            Contact Now
        </a>

    </div>
</div>

<script>
function openLoginModal(){
    var myModal = new bootstrap.Modal(document.getElementById('log'));
    myModal.show();
}
</script>

<?php include "footer.php"; ?>