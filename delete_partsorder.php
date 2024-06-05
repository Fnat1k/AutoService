<?php
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $order_id = $_POST['order_id'];

    $sql = "DELETE FROM partsorder WHERE OrderID = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param('i', $order_id);
    
    if ($stmt->execute()) {
        header("Location: partsorders.php");
    } else {
        echo "Error deleting record: " . $mysqli->error;
    }

    $stmt->close();
    $mysqli->close();
}
?>
