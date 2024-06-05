<?php
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $diagnostic_id = $_POST['diagnostic_id'];

    $sql = "DELETE FROM diagnostics WHERE DiagnosticsID = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param('i', $diagnostic_id);
    
    if ($stmt->execute()) {
        header("Location: diagnostics.php");
    } else {
        echo "Error deleting record: " . $mysqli->error;
    }

    $stmt->close();
    $mysqli->close();
}
?>
