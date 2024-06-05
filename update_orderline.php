<?php
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $orderline_id = $_POST['orderline_id'];
    $order_id = $_POST['order_id'];
    $part_id = $_POST['part_id'];
    $quantity = $_POST['quantity'];

    $sql = "UPDATE orderline SET OrderID = ?, PartID = ?, Quantity = ? WHERE OrderLineID = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param('iiii', $order_id, $part_id, $quantity, $orderline_id);
    
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
