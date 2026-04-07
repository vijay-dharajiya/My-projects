<?php
include "admin/connect.php"; // session already started

$error = "";
$success = ""; // ✅ ADDED

/* ================= LOGIN ================= */
if(isset($_POST['btn'])){
    $email = trim($_POST['uemail']);
    $password = trim($_POST['upassword']);

    $result = mysqli_query($cn,"SELECT * FROM sign_up WHERE email='$email' AND password='$password'");

    if(mysqli_num_rows($result) > 0){
        $user = mysqli_fetch_assoc($result);

        $_SESSION['log-in'] = true;
        $_SESSION['email'] = $user['email'];
        $_SESSION['sid'] = $user['sid'];
        $_SESSION['username'] = $user['username'];
    } else {
        $error = "INCORRECT EMAIL OR PASSWORD";
    }
}

//* ================= REGISTER ================= */
if(isset($_POST['button'])){
    $name = trim($_POST['uname']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $contact = trim($_POST['contact']);

    // ✅ CHECK EMAIL EXISTS
    $check = mysqli_query($cn,"SELECT * FROM sign_up WHERE email='$email'");

    if(mysqli_num_rows($check) > 0){

        // ❌ EMAIL ALREADY EXISTS
        $_SESSION['success_msg'] = "Email already registered! Please login.";

    } else {

        // ✅ INSERT NEW USER
        mysqli_query($cn,"INSERT INTO sign_up SET username='$name', email='$email', password='$password', contact='$contact'");

        $_SESSION['success_msg'] = "Registered successfully! Please login.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Kishu Studio</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="css/style.css">

        <style>
            .ultra-card {
                background: linear-gradient(135deg, #234b72, #2c5364, #4ca1af);
                color: #fff;
                border-radius: 20px;
                box-shadow: 0 10px 25px rgba(0,0,0,0.2);
                padding: 35px;
            }

            .ultra-card .form-control {
                background: rgba(255,255,255,0.1);
                border: none;
                border-radius: 12px;
                color: #fff;
                padding: 12px;
            }

            .ultra-card .form-control::placeholder {
                color: rgba(255,255,255,0.7);
            }

            .ultra-card .btn.ultra-btn {
                background: rgba(255,255,255,0.2);
                color: #fff;
            }

            .ultra-card .btn.ultra-btn:hover {
                background: rgba(255,255,255,0.4);
            }

            .ultra-card .btn.ultra-btn-outline {
                border: 2px solid rgba(255,255,255,0.5);
                color: #fff;
            }

            .ultra-card .btn.ultra-btn-outline:hover {
                background: rgba(255,255,255,0.2);
            }

            .btn-close-white {
                filter: invert(1);
            }

            /* DROPDOWN FIX CSS */
            .navbar{ z-index:1000; }
            .navbar .container{ overflow:visible !important; }

            .dropdown-menu{
                position:absolute !important;
                top:100%;
                right:0;
                display:none;
                z-index:99999;
            }

            .dropdown.show .dropdown-menu{
                display:block;
            }
        </style>
    </head>

    <body>

        <!-- NAVBAR -->
        <nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
            <div class="container">

                <a class="navbar-brand logo-text" href="index.php">Kishu Studio</a>

                <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#menu">
                <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="menu">

                    <ul class="navbar-nav mx-auto text-center">
                        <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="about.php">About</a></li>
                        <li class="nav-item"><a class="nav-link" href="gallery.php">Gallery</a></li>
                        <li class="nav-item"><a class="nav-link" href="services.php">Service</a></li>
                        <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
                    </ul>

                    <?php if(isset($_SESSION['sid'])): ?>
                        <div class="dropdown">
                            <button class="btn btn-login dropdown-toggle d-flex align-items-center">
                                <i class="bi bi-person-circle me-2"></i><?php echo $_SESSION['username']; ?>
                            </button>

                            <ul class="dropdown-menu dropdown-menu-end bg-white shadow">
                                <li><a class="dropdown-item" href="profile.php">My Profile</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item text-danger" href="logout.php">Logout</a></li>
                            </ul>
                        </div>
                        <?php else: ?>
                            <button class="btn btn-login" data-bs-toggle="modal" data-bs-target="#log">
                                <i class="bi bi-person-circle"></i> Login
                            </button>
                    <?php endif; ?>

                </div>
            </div>
        </nav>

        <!-- LOGIN MODAL -->
        <div class="modal fade" id="log">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content border-0 bg-transparent">

                    <div class="card ultra-card position-relative">

                        <button type="button" class="btn-close btn-close-white position-absolute top-0 end-0 m-3" data-bs-dismiss="modal"></button>

                        <h3 class="text-center mb-3 fw-bold">Welcome Back 👋</h3>

                        <?php if($error!=""): ?>
                            <div class="alert alert-danger text-center"><?php echo $error; ?></div>
                        <?php endif; ?>

                        <form method="POST">
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="bi bi-envelope-fill"></i></span>
                                <input type="email" name="uemail" class="form-control" placeholder="Email" required>
                            </div>

                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                                <input type="password" name="upassword" class="form-control" placeholder="Password" required>
                            </div>

                            <button name="btn" class="btn ultra-btn w-100">Login</button>
                        </form>

                        <div class="text-center my-3 text-light">OR</div>

                        <button class="btn ultra-btn-outline w-100" data-bs-target="#signup" data-bs-toggle="modal" data-bs-dismiss="modal">
                            Create New Account
                        </button>

                    </div>
                </div>
            </div>
        </div>

        <!-- REGISTER MODAL -->
        <div class="modal fade" id="signup">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content border-0 bg-transparent">

                    <div class="card ultra-card position-relative">

                        <button type="button" class="btn-close btn-close-white position-absolute top-0 end-0 m-3" data-bs-dismiss="modal"></button>

                        <h3 class="text-center mb-3 fw-bold">Create Account 🚀</h3>

                        <form method="POST">
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                                <input type="text" name="uname" class="form-control" placeholder="Username" required>
                            </div>

                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="bi bi-envelope-fill"></i></span>
                                <input type="email" name="email" class="form-control" placeholder="Email" required>
                            </div>

                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                                <input type="password" name="password" class="form-control" placeholder="Password" required>
                            </div>

                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="bi bi-telephone-fill"></i></span>
                                <input type="text" name="contact" class="form-control" placeholder="Contact" required>
                            </div>

                            <button name="button" class="btn ultra-btn w-100">Register</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>

        <!-- JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

        <script>
        // ===== MODAL FIX =====
        document.querySelectorAll('.modal').forEach(modal => {
            modal.addEventListener('hidden.bs.modal', function () {
                document.body.classList.remove('modal-open');
                document.querySelectorAll('.modal-backdrop').forEach(el => el.remove());
            });
        });

        // ===== DROPDOWN FIX (MAIN PART) =====
        document.addEventListener("DOMContentLoaded", function () {

            const dropdowns = document.querySelectorAll(".dropdown");

            dropdowns.forEach(function (dropdown) {

                const toggle = dropdown.querySelector(".dropdown-toggle");

                toggle.addEventListener("click", function (e) {
                    e.preventDefault();
                    e.stopPropagation();

                    dropdowns.forEach(function (d) {
                        if (d !== dropdown) {
                            d.classList.remove("show");
                        }
                    });

                    dropdown.classList.toggle("show");
                });

            });

            document.addEventListener("click", function () {
                dropdowns.forEach(function (d) {
                    d.classList.remove("show");
                });
            });

        });

        // ===== SCROLL =====
        window.addEventListener("scroll",()=>{
        document.querySelector(".navbar").classList.toggle("scrolled",window.scrollY>50);
        });

        document.addEventListener("DOMContentLoaded", function () {
            var toastEl = document.getElementById('successToast');
            if(toastEl){
                var toast = new bootstrap.Toast(toastEl, {
                    delay: 2000   // show for 2 seconds
                });
                toast.show();
            }   
        });
        </script>

        <?php if(isset($_SESSION['success_msg'])): ?>   <!-- ✅ ADDED -->

            <div class="position-fixed top-0 end-0 p-3" style="z-index:9999;">
                
                <div id="successToast" class="toast align-items-center text-white bg-success border-0">
                    
                    <div class="d-flex">
                        <div class="toast-body">
                            ✅ <?php echo $_SESSION['success_msg']; ?>
                        </div>
                        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
                    </div>

                </div>

            </div>

            <?php unset($_SESSION['success_msg']); ?>   <!-- ✅ ADDED -->
        <?php endif; ?>
    </body>
</html>