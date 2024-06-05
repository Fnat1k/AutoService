<?php
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $mechanic_id = $_POST['mechanic_id'];

    $sql = "DELETE FROM mechanic WHERE MechanicID = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param('i', $mechanic_id);
    
    if ($stmt->execute()) {
        header("Location: mechanics.php");
    } else {
        echo "Error deleting record: " . $mysqli->error;
    }

    $stmt->close();
    $mysqli->close();
}
?>
