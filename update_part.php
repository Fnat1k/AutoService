<?php
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $part_id = $_POST['part_id'];
    $part_name = $_POST['part_name'];
    $cost = $_POST['cost'];

    $sql = "UPDATE part SET PartName = ?, Cost = ? WHERE PartID = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param('sdi', $part_name, $cost, $part_id);
    
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
