<?php
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $part_name = $_POST['part_name'];
    $cost = $_POST['cost'];

    $sql = "INSERT INTO part (PartName, Cost) VALUES (?, ?)";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param('sd', $part_name, $cost);
    
    if ($stmt->execute()) {
        header("Location: parts.php");
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
    <title>Add Part</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <form action="add_part.php" method="post">
        <label for="part_name">Part Name:</label>
        <input type="text" name="part_name" required><br>
        <label for="cost">Cost:</label>
        <input type="number" step="0.01" name="cost" required><br>
        <button type="submit">Add Part</button>
    </form>
</body>
</html>
