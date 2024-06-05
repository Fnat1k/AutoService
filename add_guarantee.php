<?php
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $guarantee_period = $_POST['guarantee_period'];

    $sql = "INSERT INTO guarantee (GuaranteePeriod) VALUES (?)";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param('i', $guarantee_period);
    
    if ($stmt->execute()) {
        header("Location: guarantees.php");
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
    <title>Add Guarantee</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <form action="add_guarantee.php" method="post">
        <label for="guarantee_period">Guarantee Period:</label>
        <input type="number" name="guarantee_period" required><br>
        <button type="submit">Add Guarantee</button>
    </form>
</body>
</html>
