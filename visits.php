<?php include 'header.php'; ?>
<?php
require_once 'config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visits</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <button onclick="window.location.href='add_visit.php'">Add Visit</button>
    <table>
        <tr>
            <th>VisitID</th>
            <th>VisitDate</th>
            <th>Reason</th>
            <th>CarID</th>
            <th>MechanicID</th>
            <th>DiagnosticsID</th>
            <th>Actions</th>
        </tr>
       
        <?php
        $visits = mysqli_query($mysqli, "SELECT * FROM visit");
        $visits = mysqli_fetch_all($visits, MYSQLI_ASSOC);
        foreach($visits as $visit) {
            ?> 
        <tr>
            <td><?= $visit['VisitID'] ?></td>
            <td><?= $visit['VisitDate'] ?></td>
            <td><?= $visit['Reason'] ?></td>
            <td><?= $visit['CarID'] ?></td>
            <td><?= $visit['MechanicID'] ?></td>
            <td><?= $visit['DiagnosticsID'] ?></td>
            <td class="actions">
                <button onclick="openEditWindow(<?= $visit['VisitID'] ?>)">Edit</button>
                <form action="delete_visit.php" method="post" style="display:inline;" onsubmit="return confirmDelete();">
                    <input type="hidden" name="visit_id" value="<?= $visit['VisitID'] ?>">
                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
            <?php
        }
        ?>
    </table>

    <script>
        function openEditWindow(visitID) {
            const url = 'edit_visit.php?visit_id=' + visitID;
            window.open(url, '_blank', 'width=600,height=400');
        }

        function confirmDelete() {
            return confirm('Are you sure you want to delete this record?');
        }
    </script>
</body>
</html>

<?php include 'footer.php'; ?>
