<?php 
include "header.php";

$msg_success = "";
$msg_error = "";

if(isset($_POST['submit'])){
    $name = trim($_POST['name']);
    $phone = trim($_POST['phone']);
    $email = trim($_POST['email']);
    $message = trim($_POST['message']);

    if($name=="" || $phone==""){
        $msg_error = "Please fill required fields!";
    } else {

        mysqli_query($cn,"INSERT INTO inquiry 
        (name,phone,email,message)
        VALUES('$name','$phone','$email','$message')")
        or die(mysqli_error($cn));

        $wa_msg = urlencode(
        "📸 *New Inquiry*\n\n".
        "👤 Name: $name\n".
        "📞 Phone: $phone\n".
        "📧 Email: $email\n".
        "💬 Message:\n$message"
        );

        $msg_success = "Opening WhatsApp...";

        echo "<script>
        setTimeout(function(){
            window.open('https://wa.me/919664910033?text=$wa_msg','_blank');
        },1000);
        </script>";
    }
}
?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

<style>

body{
    background:#f4f7fb;
}

.page-title h2{
    font-weight:700;
}

.contact-card{
    background: linear-gradient(135deg,#234b72,#3a6ea5,#6a9bd8);
    color:#fff;
    border-radius:20px;
    padding:30px;
    box-shadow:0 15px 40px rgba(0,0,0,0.2);
    transition:0.4s;
}
.contact-card:hover{
    transform:translateY(-6px);
}

.info-item{
    display:flex;
    align-items:center;
    margin-bottom:20px;
    background:rgba(255,255,255,0.1);
    padding:12px;
    border-radius:12px;
}
.info-item i{
    width:40px;
    height:40px;
    background:#fff;
    color:#234b72;
    display:flex;
    align-items:center;
    justify-content:center;
    border-radius:50%;
    margin-right:12px;
}
.info-item p{
    margin:0;
    font-weight:600;
}

.form-card{
    background:#fff;
    border-radius:20px;
    padding:30px;
    box-shadow:0 10px 30px rgba(0,0,0,0.1);
}

.btn-custom{
    background:linear-gradient(135deg,#234b72,#3a6ea5);
    color:#fff;
    border:none;
}

.whatsapp-float{
    position:fixed;
    bottom:20px;
    right:20px;
    background:#25D366;
    color:#fff;
    width:55px;
    height:55px;
    border-radius:50%;
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:24px;
    z-index:1000;
}

.info-item a{
    color:white;
    text-decoration:none;
}

/* ===== MODERN FORM DESIGN ===== */
.modern-input{
    position:relative;
}

.modern-input input,
.modern-input textarea{
    width:100%;
    border:none;
    border-bottom:2px solid #ddd;
    background:transparent;
    padding:12px 5px;
    outline:none;
    transition:0.3s;
}

/* LABEL */
.modern-input label{
    position:absolute;
    top:12px;
    left:5px;
    color:#888;
    font-size:14px;
    transition:0.3s;
    pointer-events:none;
}

/* FLOAT */
.modern-input input:focus ~ label,
.modern-input textarea:focus ~ label,
.modern-input input:not(:placeholder-shown) ~ label,
.modern-input textarea:not(:placeholder-shown) ~ label{
    top:-10px;
    font-size:12px;
    color:#0072ff;
}

/* BORDER ANIMATION */
.input-border{
    position:absolute;
    bottom:0;
    left:0;
    width:0;
    height:2px;
    background:#0072ff;
    transition:0.4s;
}

.modern-input input:focus ~ .input-border,
.modern-input textarea:focus ~ .input-border{
    width:100%;
}

/* BUTTON */
.submit-btn{
    background: linear-gradient(45deg,#00c6ff,#0072ff);
    border:none;
    border-radius:30px;
    padding:12px;
    font-weight:600;
    color:#fff;
    transition:0.3s;
}

.submit-btn:hover{
    transform:translateY(-2px);
    box-shadow:0 8px 25px rgba(0,0,0,0.2);
}

</style>

<div class="container py-5 mt-5">

    <div class="text-center mb-5 page-title">
        <h2>📸 Contact & Inquiry</h2>
        <p class="text-muted">Send your details quickly</p>
    </div>

    <div class="row g-4">

        <!-- CONTACT INFO -->
        <div class="col-lg-5">
            <div class="contact-card">

                <h4 class="mb-4">Get In Touch</h4>

                <div class="info-item">
                    <i class="fas fa-user"></i>
                    <p>Kihala Vijay</p>
                </div>

                <div class="info-item">
                    <i class="fas fa-phone"></i>
                    <p><a href="tel:+919664910033">+91 9664910033</a></p>
                </div>

                <div class="info-item">
                    <i class="fas fa-envelope"></i>
                    <p>
                        <a href="https://mail.google.com/mail/?view=cm&fs=1&to=kishustudioofficial@gmail.com" target="_blank">
                            kishustudioofficial@gmail.com
                        </a>
                    </p>
                </div>

                <div class="info-item">
                    <i class="fas fa-map-marker-alt"></i>
                    <p>Derala, Wankaner, Morbi</p>
                </div>

                <a href="https://wa.me/919664910033" class="btn btn-success w-100 mt-3">
                    💬 Chat on WhatsApp
                </a>

            </div>
        </div>

        <!-- FORM -->
        <div class="col-lg-7">
            <div class="form-card">

                <h4 class="mb-4">Send Inquiry</h4>

                <?php if($msg_error){ ?>
                    <div class="alert alert-danger"><?php echo $msg_error; ?></div>
                <?php } ?>

                <?php if($msg_success){ ?>
                    <div class="alert alert-success"><?php echo $msg_success; ?></div>
                <?php } ?>

                <form method="POST" class="row g-4">

                    <div class="col-md-6">
                        <div class="modern-input">
                            <input type="text" name="name" required placeholder=" ">
                            <label>Full Name *</label>
                            <span class="input-border"></span>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="modern-input">
                            <input type="text" name="phone" required placeholder=" ">
                            <label>Phone *</label>
                            <span class="input-border"></span>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="modern-input">
                            <input type="email" name="email" placeholder=" ">
                            <label>Email</label>
                            <span class="input-border"></span>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="modern-input">
                            <textarea name="message" rows="4" placeholder=" "></textarea>
                            <label>Message</label>
                            <span class="input-border"></span>
                        </div>
                    </div>

                    <div class="col-12">
                        <button type="submit" name="submit" class="submit-btn w-100">
                            🚀 Send via WhatsApp
                        </button>
                    </div>

                </form>

            </div>
        </div>

    </div>

</div>

<a href="https://wa.me/919664910033" class="whatsapp-float">
    <i class="fab fa-whatsapp"></i>
</a>

<?php include "footer.php"; ?>