<?php
    include ("connect.php");

$error = "";

if(isset($_REQUEST['login'])){

    $email = $_REQUEST['email'];
    $password = $_REQUEST['password'];

    //echo $email,$password ; 
    $result = mysqli_query($cn, "select *from admin where email='$email' and password='$password'")or die("Select Error!!!".mysqli_error($cn));
    
    //echo mysqli_num_rows($result);

    if(mysqli_num_rows($result)!=0){

        $_SESSION['admin']=true;

        header("location:dashboard.php");
        exit();
    }else
    {
        $error = "INCORECT EMAIL OR PASSWORD";
    }
    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Admin Login</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

<style>

    /* 🌈 GRADIENT BACKGROUND */
    body {
        height: 100vh;
        margin: 0;
        font-family: 'Poppins', sans-serif;
        background: linear-gradient(270deg, #667eea, #764ba2, #ff758c);
        background-size: 400% 400%;
        animation: gradient 10s ease infinite;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    /* ANIMATION */
    @keyframes gradient {
        0% {background-position:0% 50%;}
        50% {background-position:100% 50%;}
        100% {background-position:0% 50%;}
    }

    /* 💎 LOGIN CARD */
    .card-login {
        width: 380px;
        padding: 35px;
        border-radius: 15px;
        background: rgba(255,255,255,0.1);
        backdrop-filter: blur(15px);
        box-shadow: 0 10px 30px rgba(0,0,0,0.3);
        transition: 0.3s;
    }

    /* ❌ SHAKE EFFECT */
    .shake {
        animation: shake 0.4s;
    }
    @keyframes shake {
        0% {transform: translateX(0);}
        25% {transform: translateX(-5px);}
        50% {transform: translateX(5px);}
        75% {transform: translateX(-5px);}
        100% {transform: translateX(0);}
    }

    /* INPUT */
    .form-control {
        background: rgba(255,255,255,0.2);
        border: none;
        color: white;
    }
    .form-control::placeholder {
        color: #ddd;
    }
    .form-control:focus {
        background: rgba(255,255,255,0.3);
        color: white;
        box-shadow: none;
    }

    /* 👁️ PASSWORD ICON */
    .eye {
        position: absolute;
        right: 12px;
        top: 38px;
        cursor: pointer;
        color: white;
    }

    /* BUTTON */
    .btn-login {
        background: linear-gradient(45deg,#ff758c,#ff7eb3);
        border: none;
        color: white;
        font-weight: 500;
    }
    .btn-login:hover {
        transform: scale(1.05);
    }

</style>
</head>

<body>

<div class="card-login <?php if($error!="") echo 'shake'; ?>">

    <h3 class="text-center text-white mb-3">Admin Login</h3>

    <?php if($error!=""){ ?>
        <div class="alert alert-danger text-center p-2">
            <?php echo $error; ?>
        </div>
    <?php } ?>

    <form method="POST">

        <div class="mb-3 position-relative">
            <label class="text-white">Email</label>
            <input type="email" name="email" class="form-control" placeholder="Enter email" required>
        </div>

        <div class="mb-3 position-relative">
            <label class="text-white">Password</label>
            <input type="password" id="pass" name="password" class="form-control" placeholder="Enter password" required>
            <i class="bi bi-eye eye" onclick="togglePass()"></i>
        </div>

        <button type="submit" name="login" class="btn btn-login w-100 mt-2">
            Login
        </button>

    </form>

</div>

<script>
function togglePass(){
    let p = document.getElementById("pass");
    p.type = (p.type === "password") ? "text" : "password";
}
</script>

</body>
</html>