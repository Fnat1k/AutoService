<?php
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $visit_date = $_POST['visit_date'];
    $reason = $_POST['reason'];
    $car_id = $_POST['car_id'];
    $mechanic_id = $_POST['mechanic_id'];
    $diagnostics_id = $_POST['diagnostics_id'];

    $sql = "INSERT INTO visit (VisitDate, Reason, CarID, MechanicID, DiagnosticsID) VALUES (?, ?, ?, ?, ?)";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param('ssiii', $visit_date, $reason, $car_id, $mechanic_id, $diagnostics_id);
    
    if ($stmt->execute()) {
        header("Location: visits.php");
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
    <title>Add Visit</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <form action="add_visit.php" method="post">
        <label for="visit_date">Visit Date:</label>
        <input type="date" name="visit_date" required><br>
        <label for="reason">Reason:</label>
        <input type="text" name="reason" required><br>
        <label for="car_id">Car ID:</label>
        <input type="number" name="car_id" required><br>
        <label for="mechanic_id">Mechanic ID:</label>
        <input type="number" name="mechanic_id" required><br>
        <label for="diagnostics_id">Diagnostics ID:</label>
        <input type="number" name="diagnostics_id" required><br>
        <button type="submit">Add Visit</button>
    </form>
</body>
</html>
