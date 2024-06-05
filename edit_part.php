<?php
require_once 'config.php';

if (isset($_GET['part_id'])) {
    $part_id = $_GET['part_id'];
    $sql = "SELECT * FROM part WHERE PartID = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param('i', $part_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $part = $result->fetch_assoc();
    
    if ($part) {
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Edit Part</title>
            <link rel="stylesheet" href="styles.css">
        </head>
        <body>
            <form action="update_part.php" method="post">
                <input type="hidden" name="part_id" value="<?= $part['PartID'] ?>">
                <label for="part_name">Part Name:</label>
                <input type="text" name="part_name" value="<?= $part['PartName'] ?>"><br>
                <label for="cost">Cost:</label>
                <input type="number" step="0.01" name="cost" value="<?= $part['Cost'] ?>"><br>
                <button type="submit">Update</button>
            </form>
        </body>
        </html>
        <?php
    } else {
        echo "No part found with ID $part_id";
    }

    $stmt->close();
    $mysqli->close();
}
?>
