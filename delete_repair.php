<?php
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $repair_id = $_POST['repair_id'];

    $sql = "DELETE FROM repair WHERE RepairID = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param('i', $repair_id);
    
    if ($stmt->execute()) {
        header("Location: repairs.php");
    } else {
        echo "Error deleting record: " . $mysqli->error;
    }

    $stmt->close();
    $mysqli->close();
}
?>
