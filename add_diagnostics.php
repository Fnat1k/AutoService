<?php
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $problem_description = $_POST['problem_description'];
    $required_parts = $_POST['required_parts'];

    $sql = "INSERT INTO diagnostics (ProblemDescription, RequiredParts) VALUES (?, ?)";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param('ss', $problem_description, $required_parts);
    
    if ($stmt->execute()) {
        header("Location: diagnostics.php");
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
    <title>Add Diagnostic</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <form action="add_diagnostic.php" method="post">
        <label for="problem_description">Problem Description:</label>
        <input type="text" name="problem_description" required><br>
        <label for="required_parts">Required Parts:</label>
        <input type="text" name="required_parts" required><br>
        <button type="submit">Add Diagnostic</button>
    </form>
</body>
</html>
