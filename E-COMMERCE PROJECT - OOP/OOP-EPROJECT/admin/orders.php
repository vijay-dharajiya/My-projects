<?php include "header.php"; ?>

<?php
// ================= DELETE ORDER =================
if (isset($_GET['delete'])) {
    $DELETE = intval($_GET['delete']);
    //$DELETE
    $db->deldata($con->cn, "`order`","WHERE oid='".$DELETE."'");
    //mysqli_query($cn, "DELETE FROM `order` WHERE oid=$DELETE")or die("Delete Error: " . mysqli_error($cn));
}

// ================= FETCH ORDERS WITH PRODUCT =================
/*$sql = "SELECT o.oid, p.pname, p.pphoto, o.shiping, o.address, o.contact, o.pmode, o.`date time` FROM `order` oINNER JOIN products p ON o.  pid = p.pid";
//$result = mysqli_query($cn, $sql) or die("Select Error: " . mysqli_error($cn));*/
$result = $db->getdata($con->cn, "`order` o INNER JOIN products p ON o.pid = p.pid", 
            "o.oid, p.pname, p.pphoto, o.shiping, o.address, o.contact, o.pmode, o.`date time`", "", "");

echo "<table border='1' align='center' bgcolor='pink'>";
echo "<tr>
        <th>Order ID</th>
        <th>Product Name</th>
        <th>Product Image</th>
        <th>User Name</th>
        <th>Address</th>
        <th>Contact</th>
        <th>Payment Mode</th>
        <th>Date</th>
        <th>Delete</th>
      </tr>";

while ($record = mysqli_fetch_assoc($result)) {

    echo "<tr>";
    echo "<td>{$record['oid']}</td>";
    echo "<td>{$record['pname']}</td>";
    echo "<td><img src='".$record['pphoto']."'height='100px' width='auto'></td>";
    echo "<td>{$record['shiping']}</td>";
    echo "<td>{$record['address']}</td>";
    echo "<td>{$record['contact']}</td>";
    echo "<td>{$record['pmode']}</td>";
    echo "<td>{$record['date time']}</td>";
    echo "<td> <a href='orders.php?delete={$record['oid']}'onclick='return check();'>DELETE</a> </td>";
    echo "</tr>";
}
echo "</table>";
?>

<script>
function check() {
    return confirm("Are you sure you want to delete this order?");
}
</script>
