<?php
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $order_date = $_POST['order_date'];
    $repair_id = $_POST['repair_id'];

    $sql = "INSERT INTO partsorder (OrderDate, RepairID) VALUES (?, ?)";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param('si', $order_date, $repair_id);
    
    if ($stmt->execute()) {
        header("Location: partsorders.php");
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
    <title>Add Parts Order</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <form action="add_partsorder.php" method="post">
        <label for="order_date">Order Date:</label>
        <input type="date" name="order_date" required><br>
        <label for="repair_id">Repair ID:</label>
        <input type="number" name="repair_id" required><br>
        <button type="submit">Add Parts Order</button>
    </form>
</body>
</html>
