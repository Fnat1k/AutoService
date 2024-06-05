<?php
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $specialization = $_POST['specialization'];

    $sql = "INSERT INTO mechanic (Name, Specialization) VALUES (?, ?)";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param('ss', $name, $specialization);
    
    if ($stmt->execute()) {
        header("Location: mechanics.php");
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
    <title>Add Mechanic</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <form action="add_mechanic.php" method="post">
        <label for="name">Name:</label>
        <input type="text" name="name" required><br>
        <label for="specialization">Specialization:</label>
        <input type="text" name="specialization" required><br>
        <button type="submit">Add Mechanic</button>
    </form>
</body>
</html>
