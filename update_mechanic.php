<?php
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $mechanic_id = $_POST['mechanic_id'];
    $name = $_POST['name'];
    $specialization = $_POST['specialization'];

    $sql = "UPDATE mechanic SET Name = ?, Specialization = ? WHERE MechanicID = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param('ssi', $name, $specialization, $mechanic_id);
    
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
