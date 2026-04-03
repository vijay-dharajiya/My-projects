<?php include "admin/connect.php"; 
//================================= login  data         ====================================
if(isset($_REQUEST['btn'])=='submit'){

    $email=$_REQUEST['uemail'];
    $password=$_REQUEST['upassword'];
    //echo "$email,$password";

    $result=$db->getdata($con->cn,"sign_up","*","where email='"."$email"."' and password='"."$password"."'","order by sid");
    //$result = mysqli_query($cn,"select *from sign_up where email='$email'and password='$password'")or die("Select error!!".mysqli_error($cn));
    //echo mysqli_num_rows($result);

    if(mysqli_num_rows($result)!=0){

        $_SESSION['log-in'] = true;
        $record=mysqli_fetch_array($result);
        $email=$record['email'];
        $sid=$record['sid'];
        $uname=$record['uname'];
        
        $_SESSION['email']=$email;
        $_SESSION['sid']=$sid;
        $_SESSION['uname']=$uname;

        //echo $_SESSION['email'] . " - " . $_SESSION['sid']." - " . $_SESSION['uname'];

        //header("location:index.php");
    }else
    {
        echo "INCORECT PASSWORD OR EMAIL";
    }
}
//=========================================         REGISTRATION DATA              ==========================
if(isset($_REQUEST['btn1'])=='submit') {
    
    $name=$_REQUEST['username'];
    $email = $_REQUEST['email'];
    $password=$_REQUEST['password'];
    $contact=$_REQUEST['contact'];

    $db->adddata($con->cn,"sign_up",array("uname"=>$name, "email"=>$email, "password"=>$password, "contact"=>$contact));
    //mysqli_query($cn,"INSERT INTO sign_up SET uname='$name',email='$email', password='$password', contact='$contact'")or die("Insert error !!!".mysqli_error($cn));
}
//========================================          serch panel             ===================================
if (isset($_REQUEST['srcbtn'])) {

    $search = $_REQUEST['src'];
    $_SESSION['search'] = $search;

    $result = $db->getdata($con->cn, "products JOIN catagories ON products.cid = catagories.cid", "products.*", "WHERE products.pname LIKE '%$search%' OR catagories.cname LIKE '%$search%'", "ORDER BY products.pid" );
    //$result = mysqli_query($cn, "SELECT * FROM products JOIN catagories ON products.cid = catagories.cid WHERE products.pname LIKE '%$search%' OR catagories.cname LIKE '%$search%' ORDER BY products.pid") or die("Select error!!" . mysqli_error($cn));
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OOP My Store - E-commerce</title>

    <!-- BOOTSTRAP CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- BOOTSTRAP ICONS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <!-- AOS ANIMATION CSS -->
    <link rel="stylesheet" href="aos.css" />
    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <!-- CUSTOM STYLESHEET -->
    <link rel="stylesheet" href="style.css">
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary px-4">
    <a class="navbar-brand fw-bold" href="index.php">MyStore</a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">

        <ul class="navbar-nav ms-auto align-items-lg-center">
             <!-- Search Bar (Left Side of Home) -->
            <li class="nav-item me-lg-2 my-2 my-lg-0">
                <form class="d-flex" method="get" action="search.php">
                    <div class="input-group input-group-sm">
                        <input type="search" name="src" class="form-control" placeholder="Search" aria-label="Search" required>
                        <button class="btn btn-light" name="srcbtn" type="submit">
                            <i class="bi bi-search"></i>
                        </button>
                    </div>
                </form>
            </li>
            <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="about.php">About</a></li>
            <li class="nav-item"><a class="nav-link" href="service.php">Services</a></li>
            <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="categoryDropdown"
                   role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Categories
                </a>

                <ul class="dropdown-menu" aria-labelledby="categoryDropdown">
                    <?php
                    $cat = $db->getdata($con->cn,"catagories","*","","order by cid");
                    //$cat = mysqli_query($cn, "SELECT * FROM catagories");

                    while ($row = mysqli_fetch_array($cat)) {
                        ?>
                        <li>
                            <a class="dropdown-item" href="cat.php?cid=<?php echo $row['cid']; ?>">
                                <?php echo $row['cname']; ?>
                            </a>
                        </li>
                        <?php
                    }
                    ?>
                </ul>
            </li>

            <?php if (isset($_SESSION['sid'])) { ?>
                <li class="nav-item">
                    <a class="nav-link" href="wishlist.php">
                        <i class="fa fa-heart-o"></i>

                        <?php
                            $sid = $_SESSION['sid'];
                            $res=$db->getdata($con->cn,"wishlist","*","WHERE sid='"."$sid"."'","");
                            //$res = mysqli_query($cn, "SELECT * FROM wishlist WHERE sid='$sid'");
                            echo mysqli_num_rows($res);
                        ?>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="cart.php">
                        <img src="img/cart.png" height="20" width="20">
                        <?php
                            $sid = $_SESSION['sid'];
                            $res=$db->getdata($con->cn,"cart","*","WHERE sid='"."$sid"."'","");
                            //$res = mysqli_query($cn, "SELECT * FROM cart WHERE sid='$sid'");
                            echo mysqli_num_rows($res);
                        ?>
                    </a>
                </li>
            <?php } ?>

            <?php if (isset($_SESSION['sid']) && isset($_SESSION['uname'])) { ?>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle fw-semibold text-white" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-person-circle"></i>
                    <?php echo htmlspecialchars($_SESSION['uname']); ?>
                </a>

                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                    <li>
                        <a class="dropdown-item" href="profile.php">
                            <i class="bi bi-person"></i> My Profile
                        </a>
                    </li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <a class="dropdown-item text-danger" href="logout1.php">
                            <i class="bi bi-box-arrow-right"></i> Logout
                        </a>
                    </li>
                </ul>
            </li>

            <?php } else { ?>

            <button class="btn btn-light fw-semibold px-3 btn-sm"
                    data-bs-toggle="modal"
                    data-bs-target="#log">
                <i class="bi bi-person-circle"></i> Login
            </button>

            <?php } ?>


        </ul>
    </div>
</nav>


<!-- LOGIN MODAL -->
<div class="modal fade" id="log" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content shadow-lg border-0 rounded-4">

            <div class="modal-header bg-primary text-white rounded-top-4">
                <h5 class="modal-title fw-bold">Welcome Back</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body px-4 py-4">
                <form method="POST">
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="uemail" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" name="upassword" class="form-control" required>
                    </div>

                    <div class="d-grid">
                        <input type="submit" name="btn" value="Login" class="btn btn-primary fw-semibold">
                    </div>
                </form>

                <!-- DIVIDER -->
                <div class="text-center my-3 text-muted">OR</div>

                <!-- SIGN UP INSIDE LOGIN -->
                <div class="d-grid">
                    <button class="btn btn-outline-primary" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="     #signup">Create New Account
                    </button>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- SIGN UP MODAL -->
<div class="modal fade" id="signup" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content shadow-lg border-0 rounded-4">

            <div class="modal-header bg-primary text-white rounded-top-4">
                <h5 class="modal-title fw-bold">Create Account</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body px-4 py-4">
                <form method="POST">

                    <div class="mb-3">
                        <label class="form-label">Username</label>
                        <input type="text" name="username" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Contact</label>
                        <input type="text" name="contact" class="form-control" required>
                    </div>

                    <div class="d-grid">
                        <input type="submit" name="btn1" value="Sign Up"
                               class="btn btn-primary fw-semibold">
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>


<!-- BOOTSTRAP JS (Required for Modal) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


</body>
</html>
