<?php
ob_start();  // Start output buffering to allow header() calls later
include "connect.php";

// SECURITY CHECK
if(!isset($_SESSION['admin'])==true){
    header('location:index.php');
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Kishu Studio Admin</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

<style>

    body{
        margin:0;
        font-family:'Poppins', sans-serif;
        background:#0f0c29;
        color:white;
    }

    /* SIDEBAR */
    .sidebar{
        width:260px;
        height:100vh;
        position:fixed;
        background: linear-gradient(180deg,#1a0033,#2d0b59,#3b0764);
        padding-top:20px;
        border-right:1px solid rgba(255,255,255,0.08);
    }

    /* LOGO */
    .logo{
        text-align:center;
        margin-bottom:30px;
    }

    .logo h3{
        font-weight:700;
        letter-spacing:2px;
        background: linear-gradient(45deg,#ff00cc,#9333ea);
        -webkit-background-clip:text;
        -webkit-text-fill-color:transparent;
    }

    /* MENU */
    .sidebar a{
        display:flex;
        justify-content:space-between;
        align-items:center;
        padding:12px 25px;
        color:#e0d4ff;
        text-decoration:none;
        transition:0.3s;
        cursor:pointer;
    }

    .sidebar a:hover{
        background: linear-gradient(45deg,#9333ea,#ff00cc);
        border-radius:8px;
    }

    /* SUBMENU */
    .submenu{
        max-height:0;
        overflow:hidden;
        transition:0.4s ease;
        padding-left:15px;
    }

    .submenu a{
        font-size:14px;
        padding:10px 20px;
    }

    .submenu.show{
        max-height:400px;
    }

    /* ICON ROTATE */
    .rotate{
        transition:0.3s;
    }
    .rotate.active{
        transform:rotate(180deg);
    }

    /* MAIN */
    .main{
        margin-left:260px;
        min-height:100vh;
        background: linear-gradient(180deg,#14002e,#1f0a44,#2a0a5e);
    }

    /* TOPBAR */
    .topbar{
        position:sticky;
        top:0;
        z-index:1000;
        background: rgba(26,0,51,0.7);
        backdrop-filter: blur(10px);
        padding:15px 25px;
        display:flex;
        justify-content:space-between;
        align-items:center;
        border-bottom:1px solid rgba(255,255,255,0.1);
    }

    /* CONTENT */
    .content{
        padding:25px;
    }

    /* CARD */
    .card{
        background:#1a0033;
        border:none;
        border-radius:12px;
        color:white;
    }

</style>
</head>

<body>

<!-- SIDEBAR -->
<div class="sidebar">

    <div class="logo">
        <h3>KISHU STUDIO</h3>
    </div>

    <!-- DASHBOARD -->
    <a href="dashboard.php">
        <span><i class="fa fa-gauge"></i> Dashboard</span>
    </a>

    <!-- CATEGORIES -->
    <a onclick="toggleMenu('categories', this)">
        <span><i class="fa fa-layer-group"></i> Categories</span>
        <i class="fa fa-chevron-down rotate"></i>
    </a>

    <div id="categories" class="submenu">
        <a href="addcategory.php">Add Category</a>
        <a href="viewcategory.php">View Category</a>
    </div>

    <!-- GALLERY -->
    <a onclick="toggleMenu('gallery', this)">
        <span><i class="fa fa-image"></i> Gallery</span>
        <i class="fa fa-chevron-down rotate"></i>
    </a>

    <div id="gallery" class="submenu">

        <!-- PHOTO -->
        <a onclick="toggleMenu('photo', this)">
            <span>Photo</span>
            <i class="fa fa-chevron-down rotate"></i>
        </a>

        <div id="photo" class="submenu">
            <a href="addphoto.php">Add Photos</a>
            <a href="viewphoto.php">View Photos</a>
        </div>

        <!-- VIDEO -->
        <a onclick="toggleMenu('video', this)">
            <span>Video</span>
            <i class="fa fa-chevron-down rotate"></i>
        </a>

        <div id="video" class="submenu">
            <a href="addvideo.php">Add Videos</a>
            <a href="viewvideo.php">View Videos</a>
        </div>

    </div>

    <a href="viewuser.php"><span><i class="fa fa-user"></i> Users</span></a>
    <a href="vieworders.php"><span><i class="fa fa-cart-shopping"></i> Orders</span></a>
    <!-- SERVICES -->
    <a onclick="toggleMenu('services', this)">
        <span><i class="fa fa-briefcase"></i> Services</span>
        <i class="fa fa-chevron-down rotate"></i>
    </a>

    <div id="services" class="submenu">
        <a href="addservices.php">Add Services</a>
        <a href="viewservices.php">View Services</a>
    </div>

</div>

<!-- MAIN -->
<div class="main">

    <!-- TOPBAR -->
    <div class="topbar">
        <h5>Welcome Admin</h5>

        <div>
            <span>Kihala Vijay</span>
            <a href="logout.php" class="btn btn-sm btn-danger">Logout</a>
        </div>
    </div>

    <!-- ✅ CONTENT START (IMPORTANT) -->
    <div class="content">