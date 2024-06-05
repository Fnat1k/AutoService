<?php
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $guarantee_id = $_POST['guarantee_id'];

    $sql = "DELETE FROM guarantee WHERE GuaranteeID = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param('i', $guarantee_id);
    
    if ($stmt->execute()) {
        header("Location: guarantees.php");
    } else {
        echo "Error deleting record: " . $mysqli->error;
    }

    $stmt->close();
    $mysqli->close();
}
?>
