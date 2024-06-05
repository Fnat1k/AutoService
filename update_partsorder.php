<?php
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $order_id = $_POST['order_id'];
    $order_date = $_POST['order_date'];
    $repair_id = $_POST['repair_id'];

    $sql = "UPDATE partsorder SET OrderDate = ?, RepairID = ? WHERE OrderID = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param('sii', $order_date, $repair_id, $order_id);
    
    if ($stmt->execute()) {
        echo "Record updated successfully";
        echo "<script>window.close();</script>";
    } else {
        echo "Error updating record: " . $mysqli->error;
    }

    $stmt->close();
    $mysqli->close();
}
?>
