<?php
include("connect.php");
if(isset($_REQUEST['submit']))
{
	$email=$_REQUEST['email'];
	$password=$_REQUEST['password'];
	
	//echo $email , $password;
   
    $result = $db->getdata($con->cn,"admin","*","WHERE email='$email' and password='$password'","order by id");
    
    //$result=mysqli_query($cn,"select *from admin where email='$email' and password='$password'")or die("select error !!!".mysqli_error($cn));
	
	// echo mysqli_num_rows($result); //if submit right email or password than output 1 else 0
	
	if(mysqli_num_rows($result)!=0)
	{
		$_SESSION['admin']=true;
		
		header("location:home.php");
	}
	else{
		
		echo"INCORECT EMAIL OR PASSWORD";
	}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Login</title>

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

<!-- AOS Library -->
<link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">

<style>
    /* Fullscreen body */
    html, body {
        height: 100%;
        width: 100%;
        margin: 0;
        font-family: 'Roboto', sans-serif;
        display: flex;
        justify-content: center;
        background: linear-gradient(135deg, #17a2b8, #138496);
        overflow: hidden;
        position: relative;
    }

    /* Floating circles for background effect */
    .circle {
        position: absolute;
        border-radius: 50%;
        background: rgba(255,255,255,0.08);
        animation: float 15s infinite ease-in-out;
    }
    .circle:nth-child(1) { width: 180px; height: 180px; top: 10%; left: 20%; }
    .circle:nth-child(2) { width: 250px; height: 250px; top: 60%; left: 70%; }
    .circle:nth-child(3) { width: 130px; height: 130px; top: 50%; left: 40%; }

    @keyframes float {
        0%, 100% { transform: translateY(0px); }
        50% { transform: translateY(-25px); }
    }

    /* Centered form container */
    .login-container {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        width: 100%;
        max-width: 400px;
        padding: 30px;
        z-index: 2;
    }

    /* Title animation */
    .login-title {
        font-size: 2rem;
        font-weight: 700;
        color: #fff;
        margin-bottom: 40px;
        text-align: center;
        animation: fadeInDown 1s ease forwards;
        opacity: 0;
    }

    @keyframes fadeInDown {
        to { opacity: 1; transform: translateY(0); }
        from { opacity: 0; transform: translateY(-30px); }
    }

    form {
        width: 100%;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    input {
        width: 100%;
        max-width: 300px;
        padding: 15px 20px;
        margin-bottom: 20px;
        border: none;
        border-radius: 12px;
        font-size: 1rem;
        outline: none;
        transition: all 0.3s ease;
        box-shadow: 0 6px 15px rgba(0,0,0,0.25);
        background: rgba(255,255,255,0.9);
    }

    input:focus {
        box-shadow: 0 8px 20px rgba(0,0,0,0.4);
        transform: translateY(-2px);
    }

    button {
        width: 100%;
        max-width: 300px;
        padding: 15px 20px;
        border: none;
        border-radius: 12px;
        background: linear-gradient(135deg, #fff, #e0f7fa);
        font-weight: 600;
        font-size: 1rem;
        cursor: pointer;
        transition: all 0.3s ease;
        color: #138496;
        box-shadow: 0 6px 15px rgba(0,0,0,0.25);
    }

    button:hover {
        background: linear-gradient(135deg, #e0f7fa, #b2ebf2);
        transform: translateY(-2px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.35);
    }

</style>
</head>
<body>

<!-- Floating circles -->
<div class="circle"></div>
<div class="circle"></div>
<div class="circle"></div>

<!-- Centered login form -->
<div class="login-container" data-aos="fade-up" data-aos-duration="1200">
    <h2 class="login-title" data-aos="zoom-in" data-aos-duration="1000">Admin Login</h2>

    <form method="POST">
        <input type="email" name="email" placeholder="Email Address" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit" name="submit">Login</button>
    </form>
</div>

<!-- AOS JS -->
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script>
    AOS.init();
</script>

</body>
</html>
