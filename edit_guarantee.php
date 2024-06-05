<?php
require_once 'config.php';

if (isset($_GET['guarantee_id'])) {
    $guarantee_id = $_GET['guarantee_id'];
    $sql = "SELECT * FROM guarantee WHERE GuaranteeID = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param('i', $guarantee_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $guarantee = $result->fetch_assoc();
    
    if ($guarantee) {
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Edit Guarantee</title>
            <link rel="stylesheet" href="styles.css">
        </head>
        <body>
            <form action="update_guarantee.php" method="post">
                <input type="hidden" name="guarantee_id" value="<?= $guarantee['GuaranteeID'] ?>">
                <label for="guarantee_period">Guarantee Period:</label>
                <input type="number" name="guarantee_period" value="<?= $guarantee['GuaranteePeriod'] ?>"><br>
                <button type="submit">Update</button>
            </form>
        </body>
        </html>
        <?php
    } else {
        echo "No guarantee found with ID $guarantee_id";
    }

    $stmt->close();
    $mysqli->close();
}
?>
