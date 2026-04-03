<?php
include"connect.php";
if(!isset($_SESSION['admin'])==true)
{
	header('location:index.php');
}		
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>OOP E-commerce Admin Panel</title>

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="style3.css">
</head>
<body>

<!--header--->
    <div class="header">
        <h3>ADMIN PANEL</h3>
        <a href="logout.php" class="myButton">Logout</a>
        
    </div>
    <!--menu-->
    <div class="navbar">
      <a href="home.php">Home</a>
      <div class="dropdown">
        <button class="dropbtn">CATAGORIES
          <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-content">
          <a href="cata_view.php">Catagories view</a>
          <a href="cata_insert.php">Catagories insert</a>
        </div>
      </div> 
      <div class="dropdown">
        <button class="dropbtn">PRODUCTS
          <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-content">
          <a href="product-2.php">PRODUCT VIEW</a>
          <a href="product-1.php">PRODUCT INSERT</a>
        </div>
      </div>
      <a href="users.php">Users</a>
      <a href="orders.php">Orders</a>
    </div>

</body>
</html>

