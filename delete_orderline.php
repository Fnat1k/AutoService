<?php
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $orderline_id = $_POST['orderline_id'];

    $sql = "DELETE FROM orderline WHERE OrderLineID = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param('i', $orderline_id);
    
    if ($stmt->execute()) {
        header("Location: orderlines.php");
    } else {
        echo "Error deleting record: " . $mysqli->error;
    }

    $stmt->close();
    $mysqli->close();
}
?>
