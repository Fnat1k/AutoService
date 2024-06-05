<?php
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $car_id = $_POST['car_id'];
    $make = $_POST['make'];
    $model = $_POST['model'];
    $year = $_POST['year'];
    $client_id = $_POST['client_id'];

    $sql = "UPDATE car SET Make = ?, Model = ?, Year = ?, ClientID = ? WHERE CarID = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param('ssiii', $make, $model, $year, $client_id, $car_id);
    
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
