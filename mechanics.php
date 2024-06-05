<?php include 'header.php'; ?>
<?php
require_once 'config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mechanics</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <button onclick="window.location.href='add_mechanic.php'">Add Mechanic</button>
    <table>
        <tr>
            <th>MechanicID</th>
            <th>Name</th>
            <th>Specialization</th>
            <th>Actions</th>
        </tr>
       
        <?php
        $mechanics = mysqli_query($mysqli, "SELECT * FROM mechanic");
        $mechanics = mysqli_fetch_all($mechanics, MYSQLI_ASSOC);
        foreach($mechanics as $mechanic) {
            ?> 
        <tr>
            <td><?= $mechanic['MechanicID'] ?></td>
            <td><?= $mechanic['Name'] ?></td>
            <td><?= $mechanic['Specialization'] ?></td>
            <td class="actions">
                <button onclick="openEditWindow(<?= $mechanic['MechanicID'] ?>)">Edit</button>
                <form action="delete_mechanic.php" method="post" style="display:inline;" onsubmit="return confirmDelete();">
                    <input type="hidden" name="mechanic_id" value="<?= $mechanic['MechanicID'] ?>">
                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
            <?php
        }
        ?>
    </table>

    <script>
        function openEditWindow(mechanicID) {
            const url = 'edit_mechanic.php?mechanic_id=' + mechanicID;
            window.open(url, '_blank', 'width=600,height=400');
        }

        function confirmDelete() {
            return confirm('Are you sure you want to delete this record?');
        }
    </script>
</body>
</html>

<?php include 'footer.php'; ?>
