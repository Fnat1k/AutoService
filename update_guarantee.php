<?php
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $guarantee_id = $_POST['guarantee_id'];
    $guarantee_period = $_POST['guarantee_period'];

    $sql = "UPDATE guarantee SET GuaranteePeriod = ? WHERE GuaranteeID = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param('ii', $guarantee_period, $guarantee_id);
    
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
