<?php
require_once 'config.php';

if (isset($_GET['car_id'])) {
    $car_id = $_GET['car_id'];
    $sql = "SELECT * FROM car WHERE CarID = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param('i', $car_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $car = $result->fetch_assoc();
    
    if ($car) {
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Edit Car</title>
            <link rel="stylesheet" href="styles.css">
        </head>
        <body>
            <form action="update_car.php" method="post">
                <input type="hidden" name="car_id" value="<?= $car['CarID'] ?>">
                <label for="make">Make:</label>
                <input type="text" name="make" value="<?= $car['Make'] ?>"><br>
                <label for="model">Model:</label>
                <input type="text" name="model" value="<?= $car['Model'] ?>"><br>
                <label for="year">Year:</label>
                <input type="number" name="year" value="<?= $car['Year'] ?>"><br>
                <label for="client_id">ClientID:</label>
                <input type="number" name="client_id" value="<?= $car['ClientID'] ?>"><br>
                <button type="submit">Update</button>
            </form>
        </body>
        </html>
        <?php
    } else {
        echo "No car found with ID $car_id";
    }

    $stmt->close();
    $mysqli->close();
}
?>
