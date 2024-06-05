<?php include 'header.php'; ?>
<?php
require_once 'config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cars</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <button onclick="window.location.href='add_car.php'">Add Car</button>
    <table>
        <tr>
            <th>ID</th>
            <th>Make</th>
            <th>Model</th>
            <th>Year</th>
            <th>ClientID</th>
            <th>Actions</th>
        </tr>
       
        <?php
        $cars = mysqli_query($mysqli, "SELECT * FROM car");
        $cars = mysqli_fetch_all($cars, MYSQLI_ASSOC);
        foreach($cars as $car) {
            ?> 
        <tr>
            <td><?= $car['CarID'] ?></td>
            <td><?= $car['Make'] ?></td>
            <td><?= $car['Model'] ?></td>
            <td><?= $car['Year'] ?></td>
            <td><?= $car['ClientID'] ?></td>
            <td class="actions">
                <button onclick="openEditWindow(<?= $car['CarID'] ?>)">Edit</button>
                <form action="delete_car.php" method="post" style="display:inline;" onsubmit="return confirmDelete();">
                    <input type="hidden" name="car_id" value="<?= $car['CarID'] ?>">
                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
            <?php
        }
        ?>
    </table>

    <script>
        function openEditWindow(carID) {
            const url = 'edit_car.php?car_id=' + carID;
            window.open(url, '_blank', 'width=600,height=400');
        }

        function confirmDelete() {
            return confirm('Are you sure you want to delete this record?');
        }
    </script>
</body>
</html>

<?php include 'footer.php'; ?>
