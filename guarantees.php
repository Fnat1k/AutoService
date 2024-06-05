<?php include 'header.php'; ?>
<?php
require_once 'config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guarantees</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <button onclick="window.location.href='add_guarantee.php'">Add Guarantee</button>
    <table>
        <tr>
            <th>GuaranteeID</th>
            <th>GuaranteePeriod</th>
            <th>Actions</th>
        </tr>
       
        <?php
        $guarantees = mysqli_query($mysqli, "SELECT * FROM guarantee");
        $guarantees = mysqli_fetch_all($guarantees, MYSQLI_ASSOC);
        foreach($guarantees as $guarantee) {
            ?> 
        <tr>
            <td><?= $guarantee['GuaranteeID'] ?></td>
            <td><?= $guarantee['GuaranteePeriod'] ?></td>
            <td class="actions">
                <button onclick="openEditWindow(<?= $guarantee['GuaranteeID'] ?>)">Edit</button>
                <form action="delete_guarantee.php" method="post" style="display:inline;" onsubmit="return confirmDelete();">
                    <input type="hidden" name="guarantee_id" value="<?= $guarantee['GuaranteeID'] ?>">
                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
            <?php
        }
        ?>
    </table>

    <script>
        function openEditWindow(guaranteeID) {
            const url = 'edit_guarantee.php?guarantee_id=' + guaranteeID;
            window.open(url, '_blank', 'width=600,height=400');
        }

        function confirmDelete() {
            return confirm('Are you sure you want to delete this record?');
        }
    </script>
</body>
</html>

<?php include 'footer.php'; ?>
