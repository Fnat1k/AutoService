<?php
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $diagnostic_id = $_POST['diagnostic_id'];
    $problem_description = $_POST['problem_description'];
    $required_parts = $_POST['required_parts'];

    $sql = "UPDATE diagnostics SET ProblemDescription = ?, RequiredParts = ? WHERE DiagnosticsID = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param('ssi', $problem_description, $required_parts, $diagnostic_id);
    
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
