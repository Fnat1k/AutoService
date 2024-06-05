<?php
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $order_id = $_POST['order_id'];
    $part_id = $_POST['part_id'];
    $quantity = $_POST['quantity'];

    $sql = "INSERT INTO orderline (OrderID, PartID, Quantity) VALUES (?, ?, ?)";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param('iii', $order_id, $part_id, $quantity);
    
    if ($stmt->execute()) {
        header("Location: orderlines.php");
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
    <title>Add Order Line</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <form action="add_orderline.php" method="post">
        <label for="order_id">Order ID:</label>
        <input type="number" name="order_id" required><br>
        <label for="part_id">Part ID:</label>
        <input type="number" name="part_id" required><br>
        <label for="quantity">Quantity:</label>
        <input type="number" name="quantity" required><br>
        <button type="submit">Add Order Line</button>
    </form>
</body>
</html>
