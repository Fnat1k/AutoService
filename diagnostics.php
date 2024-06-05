<?php include 'header.php'; ?>
<?php
require_once 'config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diagnostics</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <button onclick="window.location.href='add_diagnostic.php'">Add Diagnostic</button>
    <table>
        <tr>
            <th>DiagnosticsID</th>
            <th>ProblemDescription</th>
            <th>RequiredParts</th>
            <th>Actions</th>
        </tr>
       
        <?php
        $diagnostics = mysqli_query($mysqli, "SELECT * FROM diagnostics");
        $diagnostics = mysqli_fetch_all($diagnostics, MYSQLI_ASSOC);
        foreach($diagnostics as $diagnostic) {
            ?> 
        <tr>
            <td><?= $diagnostic['DiagnosticsID'] ?></td>
            <td><?= $diagnostic['ProblemDescription'] ?></td>
            <td><?= $diagnostic['RequiredParts'] ?></td>
            <td class="actions">
                <button onclick="openEditWindow(<?= $diagnostic['DiagnosticsID'] ?>)">Edit</button>
                <form action="delete_diagnostic.php" method="post" style="display:inline;" onsubmit="return confirmDelete();">
                    <input type="hidden" name="diagnostic_id" value="<?= $diagnostic['DiagnosticsID'] ?>">
                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
            <?php
        }
        ?>
    </table>

    <script>
        function openEditWindow(diagnosticID) {
            const url = 'edit_diagnostic.php?diagnostic_id=' + diagnosticID;
            window.open(url, '_blank', 'width=600,height=400');
        }

        function confirmDelete() {
            return confirm('Are you sure you want to delete this record?');
        }
    </script>
</body>
</html>

<?php include 'footer.php'; ?>
