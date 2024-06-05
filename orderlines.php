<?php include 'header.php'; ?>
<?php
require_once 'config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Lines</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <button onclick="window.location.href='add_orderline.php'">Add Order Line</button>
    <table>
        <tr>
            <th>OrderLineID</th>
            <th>OrderID</th>
            <th>PartID</th>
            <th>Quantity</th>
            <th>Actions</th>
        </tr>
       
        <?php
        $orderlines = mysqli_query($mysqli, "SELECT * FROM orderline");
        $orderlines = mysqli_fetch_all($orderlines, MYSQLI_ASSOC);
        foreach($orderlines as $orderline) {
            ?> 
        <tr>
            <td><?= $orderline['OrderLineID'] ?></td>
            <td><?= $orderline['OrderID'] ?></td>
            <td><?= $orderline['PartID'] ?></td>
            <td><?= $orderline['Quantity'] ?></td>
            <td class="actions">
                <button onclick="openEditWindow(<?= $orderline['OrderLineID'] ?>)">Edit</button>
                <form action="delete_orderline.php" method="post" style="display:inline;" onsubmit="return confirmDelete();">
                    <input type="hidden" name="orderline_id" value="<?= $orderline['OrderLineID'] ?>">
                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
            <?php
        }
        ?>
    </table>

    <script>
        function openEditWindow(orderlineID) {
            const url = 'edit_orderline.php?orderline_id=' + orderlineID;
            window.open(url, '_blank', 'width=600,height=400');
        }

        function confirmDelete() {
            return confirm('Are you sure you want to delete this record?');
        }
    </script>
</body>
</html>

<?php include 'footer.php'; ?>
