<?php
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $repair_id = $_POST['repair_id'];
    $repair_cost = $_POST['repair_cost'];
    $status = $_POST['status'];
    $diagnostics_id = $_POST['diagnostics_id'];
    $guarantee_id = $_POST['guarantee_id'];
    $repair_duration = $_POST['repair_duration'];

    $sql = "UPDATE repair SET RepairCost = ?, Status = ?, DiagnosticsID = ?, GuaranteeID = ?, RepairDuration = ? WHERE RepairID = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param('dsiiii', $repair_cost, $status, $diagnostics_id, $guarantee_id, $repair_duration, $repair_id);
    
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
