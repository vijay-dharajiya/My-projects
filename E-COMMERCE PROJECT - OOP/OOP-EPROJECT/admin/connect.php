<?php
include"same.php";
session_start();
//$cn=mysqli_connect("localhost","root","","oop_project")or die("Server Not Found!!!".mysqli_error($cn));
$con = new dbconnect ;
$db = new mydb;
?>