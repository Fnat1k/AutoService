<?php
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $client_id = $_POST['client_id'];

    $sql = "DELETE FROM client WHERE ClientID = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param('i', $client_id);
    
    if ($stmt->execute()) {
        header("Location: clients.php");
    } else {
        echo "Error deleting record: " . $mysqli->error;
    }

    $stmt->close();
    $mysqli->close();
}
?>
