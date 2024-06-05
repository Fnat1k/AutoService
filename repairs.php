<?php include 'header.php'; ?>
<?php
require_once 'config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Repairs</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <button onclick="window.location.href='add_repair.php'">Add Repair</button>
    <table>
        <tr>
            <th>RepairID</th>
            <th>RepairCost</th>
            <th>Status</th>
            <th>DiagnosticsID</th>
            <th>GuaranteeID</th>
            <th>RepairDuration</th>
            <th>Actions</th>
        </tr>
       
        <?php
        $repairs = mysqli_query($mysqli, "SELECT * FROM repair");
        $repairs = mysqli_fetch_all($repairs, MYSQLI_ASSOC);
        foreach($repairs as $repair) {
            ?> 
        <tr>
            <td><?= $repair['RepairID'] ?></td>
            <td><?= $repair['RepairCost'] ?></td>
            <td><?= $repair['Status'] ?></td>
            <td><?= $repair['DiagnosticsID'] ?></td>
            <td><?= $repair['GuaranteeID'] ?></td>
            <td><?= $repair['RepairDuration'] ?></td>
            <td class="actions">
                <button onclick="openEditWindow(<?= $repair['RepairID'] ?>)">Edit</button>
                <form action="delete_repair.php" method="post" style="display:inline;" onsubmit="return confirmDelete();">
                    <input type="hidden" name="repair_id" value="<?= $repair['RepairID'] ?>">
                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
            <?php
        }
        ?>
    </table>

    <script>
        function openEditWindow(repairID) {
            const url = 'edit_repair.php?repair_id=' + repairID;
            window.open(url, '_blank', 'width=600,height=400');
        }

        function confirmDelete() {
            return confirm('Are you sure you want to delete this record?');
        }
    </script>
</body>
</html>

<?php include 'footer.php'; ?>
