<?php
require_once 'config.php';

if (isset($_GET['orderline_id'])) {
    $orderline_id = $_GET['orderline_id'];
    $sql = "SELECT * FROM orderline WHERE OrderLineID = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param('i', $orderline_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $orderline = $result->fetch_assoc();
    
    if ($orderline) {
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Edit Order Line</title>
            <link rel="stylesheet" href="styles.css">
        </head>
        <body>
            <form action="update_orderline.php" method="post">
                <input type="hidden" name="orderline_id" value="<?= $orderline['OrderLineID'] ?>">
                <label for="order_id">Order ID:</label>
                <input type="number" name="order_id" value="<?= $orderline['OrderID'] ?>"><br>
                <label for="part_id">Part ID:</label>
                <input type="number" name="part_id" value="<?= $orderline['PartID'] ?>"><br>
                <label for="quantity">Quantity:</label>
                <input type="number" name="quantity" value="<?= $orderline['Quantity'] ?>"><br>
                <button type="submit">Update</button>
            </form>
        </body>
        </html>
        <?php
    } else {
        echo "No order line found with ID $orderline_id";
    }

    $stmt->close();
    $mysqli->close();
}
?>
