<?php include 'header.php'; ?>
<?php
require_once 'config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parts</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <button onclick="window.location.href='add_part.php'">Add Part</button>
    <table>
        <tr>
            <th>PartID</th>
            <th>PartName</th>
            <th>Cost</th>
            <th>Actions</th>
        </tr>
       
        <?php
        $parts = mysqli_query($mysqli, "SELECT * FROM part");
        $parts = mysqli_fetch_all($parts, MYSQLI_ASSOC);
        foreach($parts as $part) {
            ?> 
        <tr>
            <td><?= $part['PartID'] ?></td>
            <td><?= $part['PartName'] ?></td>
            <td><?= $part['Cost'] ?></td>
            <td class="actions">
                <button onclick="openEditWindow(<?= $part['PartID'] ?>)">Edit</button>
                <form action="delete_part.php" method="post" style="display:inline;" onsubmit="return confirmDelete();">
                    <input type="hidden" name="part_id" value="<?= $part['PartID'] ?>">
                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
            <?php
        }
        ?>
    </table>

    <script>
        function openEditWindow(partID) {
            const url = 'edit_part.php?part_id=' + partID;
            window.open(url, '_blank', 'width=600,height=400');
        }

        function confirmDelete() {
            return confirm('Are you sure you want to delete this record?');
        }
    </script>
</body>
</html>

<?php include 'footer.php'; ?>
