<?php include 'header.php'; ?>
<?php
require_once 'config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parts Orders</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <button onclick="window.location.href='add_partsorder.php'">Add Parts Order</button>
    <table>
        <tr>
            <th>OrderID</th>
            <th>OrderDate</th>
            <th>RepairID</th>
            <th>Actions</th>
        </tr>
       
        <?php
        $partsorders = mysqli_query($mysqli, "SELECT * FROM partsorder");
        $partsorders = mysqli_fetch_all($partsorders, MYSQLI_ASSOC);
        foreach($partsorders as $partsorder) {
            ?> 
        <tr>
            <td><?= $partsorder['OrderID'] ?></td>
            <td><?= $partsorder['OrderDate'] ?></td>
            <td><?= $partsorder['RepairID'] ?></td>
            <td class="actions">
                <button onclick="openEditWindow(<?= $partsorder['OrderID'] ?>)">Edit</button>
                <form action="delete_partsorder.php" method="post" style="display:inline;" onsubmit="return confirmDelete();">
                    <input type="hidden" name="order_id" value="<?= $partsorder['OrderID'] ?>">
                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
            <?php
        }
        ?>
    </table>

    <script>
        function openEditWindow(orderID) {
            const url = 'edit_partsorder.php?order_id=' + orderID;
            window.open(url, '_blank', 'width=600,height=400');
        }

        function confirmDelete() {
            return confirm('Are you sure you want to delete this record?');
        }
    </script>
</body>
</html>

<?php include 'footer.php'; ?>
