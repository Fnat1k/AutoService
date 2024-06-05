<?php
require_once 'config.php';

if (isset($_GET['client_id'])) {
    $client_id = $_GET['client_id'];
    $sql = "SELECT * FROM client WHERE ClientID = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param('i', $client_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $client = $result->fetch_assoc();
    
    if ($client) {
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Edit Client</title>
            <link rel="stylesheet" href="styles.css">
        </head>
        <body>
            <form action="update_client.php" method="post">
                <input type="hidden" name="client_id" value="<?= $client['ClientID'] ?>">
                <label for="fullname">Full Name:</label>
                <input type="text" name="fullname" value="<?= $client['FullName'] ?>"><br>
                <label for="phonenumber">Phone Number:</label>
                <input type="text" name="phonenumber" value="<?= $client['PhoneNumber'] ?>"><br>
                <button type="submit">Update</button>
            </form>
        </body>
        </html>
        <?php
    } else {
        echo "No client found with ID $client_id";
    }

    $stmt->close();
    $mysqli->close();
}
?>
