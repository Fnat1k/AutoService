<?php
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $visit_id = $_POST['visit_id'];
    $visit_date = $_POST['visit_date'];
    $reason = $_POST['reason'];
    $car_id = $_POST['car_id'];
    $mechanic_id = $_POST['mechanic_id'];
    $diagnostics_id = $_POST['diagnostics_id'];

    $sql = "UPDATE visit SET VisitDate = ?, Reason = ?, CarID = ?, MechanicID = ?, DiagnosticsID = ? WHERE VisitID = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param('ssiiii', $visit_date, $reason, $car_id, $mechanic_id, $diagnostics_id, $visit_id);
    
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
