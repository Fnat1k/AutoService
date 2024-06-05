<?php
require_once 'config.php';

if (isset($_GET['mechanic_id'])) {
    $mechanic_id = $_GET['mechanic_id'];
    $sql = "SELECT * FROM mechanic WHERE MechanicID = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param('i', $mechanic_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $mechanic = $result->fetch_assoc();
    
    if ($mechanic) {
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Edit Mechanic</title>
            <link rel="stylesheet" href="styles.css">
        </head>
        <body>
            <form action="update_mechanic.php" method="post">
                <input type="hidden" name="mechanic_id" value="<?= $mechanic['MechanicID'] ?>">
                <label for="name">Name:</label>
                <input type="text" name="name" value="<?= $mechanic['Name'] ?>"><br>
                <label for="specialization">Specialization:</label>
                <input type="text" name="specialization" value="<?= $mechanic['Specialization'] ?>"><br>
                <button type="submit">Update</button>
            </form>
        </body>
        </html>
        <?php
    } else {
        echo "No mechanic found with ID $mechanic_id";
    }

    $stmt->close();
    $mysqli->close();
}
?>
