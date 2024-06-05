<?php
require_once 'config.php';

if (isset($_GET['order_id'])) {
    $order_id = $_GET['order_id'];
    $sql = "SELECT * FROM partsorder WHERE OrderID = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param('i', $order_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $partsorder = $result->fetch_assoc();
    
    if ($partsorder) {
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Edit Parts Order</title>
            <link rel="stylesheet" href="styles.css">
        </head>
        <body>
            <form action="update_partsorder.php" method="post">
                <input type="hidden" name="order_id" value="<?= $partsorder['OrderID'] ?>">
                <label for="order_date">Order Date:</label>
                <input type="date" name="order_date" value="<?= $partsorder['OrderDate'] ?>"><br>
                <label for="repair_id">Repair ID:</label>
                <input type="number" name="repair_id" value="<?= $partsorder['RepairID'] ?>"><br>
                <button type="submit">Update</button>
            </form>
        </body>
        </html>
        <?php
    } else {
        echo "No parts order found with ID $order_id";
    }

    $stmt->close();
    $mysqli->close();
}
?>
