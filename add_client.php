<?php
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fullname = $_POST['fullname'];
    $phonenumber = $_POST['phonenumber'];

    $sql = "INSERT INTO client (FullName, PhoneNumber) VALUES (?, ?)";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param('ss', $fullname, $phonenumber);
    
    if ($stmt->execute()) {
        header("Location: clients.php");
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
    <title>Add Client</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <form action="add_client.php" method="post">
        <label for="fullname">Full Name:</label>
        <input type="text" name="fullname" required><br>
        <label for="phonenumber">Phone Number:</label>
        <input type="text" name="phonenumber" required><br>
        <button type="submit">Add Client</button>
    </form>
</body>
</html>
