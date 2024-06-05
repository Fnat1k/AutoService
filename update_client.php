<?php
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $client_id = $_POST['client_id'];
    $fullname = $_POST['fullname'];
    $phonenumber = $_POST['phonenumber'];

    $sql = "UPDATE client SET FullName = ?, PhoneNumber = ? WHERE ClientID = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param('ssi', $fullname, $phonenumber, $client_id);
    
    if ($stmt->execute()) {
        echo "Record updated successfully";
        echo "<script>window.close();</script>";
    } else {
        echo "Error updating record: " . $mysqli->error;
    }

    $stmt->close();
    $mysqli->close();
}
?>
