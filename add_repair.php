<?php
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $repair_cost = $_POST['repair_cost'];
    $status = $_POST['status'];
    $diagnostics_id = $_POST['diagnostics_id'];
    $guarantee_id = $_POST['guarantee_id'];
    $repair_duration = $_POST['repair_duration'];

    $sql = "INSERT INTO repair (RepairCost, Status, DiagnosticsID, GuaranteeID, RepairDuration) VALUES (?, ?, ?, ?, ?)";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param('dsiii', $repair_cost, $status, $diagnostics_id, $guarantee_id, $repair_duration);
    
    if ($stmt->execute()) {
        header("Location: repairs.php");
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
    <title>Add Repair</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <form action="add_repair.php" method="post">
        <label for="repair_cost">Repair Cost:</label>
        <input type="number" step="0.01" name="repair_cost" required><br>
        <label for="status">Status:</label>
        <input type="text" name="status" required><br>
        <label for="diagnostics_id">Diagnostics ID:</label>
        <input type="number" name="diagnostics_id" required><br>
        <label for="guarantee_id">Guarantee ID:</label>
        <input type="number" name="guarantee_id" required><br>
        <label for="repair_duration">Repair Duration:</label>
        <input type="number" name="repair_duration" required><br>
        <button type="submit">Add Repair</button>
    </form>
</body>
</html>
