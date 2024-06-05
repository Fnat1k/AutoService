<?php
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $visit_id = $_POST['visit_id'];

    $sql = "DELETE FROM visit WHERE VisitID = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param('i', $visit_id);
    
    if ($stmt->execute()) {
        header("Location: visits.php");
    } else {
        echo "Error deleting record: " . $mysqli->error;
    }

    $stmt->close();
    $mysqli->close();
}
?>
