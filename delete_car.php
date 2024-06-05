<?php
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $car_id = $_POST['car_id'];

    $sql = "DELETE FROM car WHERE CarID = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param('i', $car_id);
    
    if ($stmt->execute()) {
        header("Location: cars.php");
    } else {
        echo "Error deleting record: " . $mysqli->error;
    }

    $stmt->close();
    $mysqli->close();
}
?>
