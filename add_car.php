<?php
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $make = $_POST['make'];
    $model = $_POST['model'];
    $year = $_POST['year'];
    $client_id = $_POST['client_id'];

    $sql = "INSERT INTO car (Make, Model, Year, ClientID) VALUES (?, ?, ?, ?)";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param('ssii', $make, $model, $year, $client_id);
    
    if ($stmt->execute()) {
        header("Location: cars.php");
    } else {
        echo "Error adding record: " . $mysqli->error;
    }

    $stmt->close();
    $mysqli->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Car</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <form action="add_car.php" method="post">
        <label for="make">Make:</label>
        <input type="text" name="make" required><br>
        <label for="model">Model:</label>
        <input type="text" name="model" required><br>
        <label for="year">Year:</label>
        <input type="number" name="year" required><br>
        <label for="client_id">ClientID:</label>
        <input type="number" name="client_id" required><br>
        <button type="submit">Add Car</button>
    </form>
</body>
</html>
