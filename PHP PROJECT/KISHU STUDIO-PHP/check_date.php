<?php
include "admin/connect.php";

$date = $_POST['date'];

$result = mysqli_query($cn,"
    SELECT COUNT(*) as total 
    FROM orders 
    WHERE event_date='$date' 
    AND status != 'cancelled'
");

$data = mysqli_fetch_assoc($result);

if($data['total'] >= 2){
    echo "full";
} else {
    echo "available";
}
?>