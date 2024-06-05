<?php
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $part_id = $_POST['part_id'];

    $sql = "DELETE FROM part WHERE PartID = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param('i', $part_id);
    
    if ($stmt->execute()) {
        header("Location: parts.php");
    } else {
        echo "Error deleting record: " . $mysqli->error;
    }

    $stmt->close();
    $mysqli->close();
}
?>
