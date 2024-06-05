<?php include 'header.php'; ?>
<?php
require_once 'config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clients</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <button onclick="window.location.href='add_client.php'">Add Client</button>
    <table>
        <tr>
            <th>ClientID</th>
            <th>FullName</th>
            <th>PhoneNumber</th>
            <th>Actions</th>
        </tr>
       
        <?php
        $clients = mysqli_query($mysqli, "SELECT * FROM client");
        $clients = mysqli_fetch_all($clients, MYSQLI_ASSOC);
        foreach($clients as $client) {
            ?> 
        <tr>
            <td><?= $client['ClientID'] ?></td>
            <td><?= $client['FullName'] ?></td>
            <td><?= $client['PhoneNumber'] ?></td>
            <td class="actions">
                <button onclick="openEditWindow(<?= $client['ClientID'] ?>)">Edit</button>
                <form action="delete_client.php" method="post" style="display:inline;" onsubmit="return confirmDelete();">
                    <input type="hidden" name="client_id" value="<?= $client['ClientID'] ?>">
                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
            <?php
        }
        ?>
    </table>

    <script>
        function openEditWindow(clientID) {
            const url = 'edit_client.php?client_id=' + clientID;
            window.open(url, '_blank', 'width=600,height=400');
        }

        function confirmDelete() {
            return confirm('Are you sure you want to delete this record?');
        }
    </script>
</body>
</html>

<?php include 'footer.php'; ?>
