<?php
include "admin/connect.php";

$result = mysqli_query($cn,"
    SELECT event_date 
    FROM orders 
    WHERE status != 'cancelled'
    GROUP BY event_date 
    HAVING COUNT(*) >= 2
");

$dates = [];

while($row = mysqli_fetch_assoc($result)){
    $dates[] = $row['event_date'];
}

echo json_encode($dates);
?>