<?php
require_once 'config.php';

if (isset($_GET['repair_id'])) {
    $repair_id = $_GET['repair_id'];
    $sql = "SELECT * FROM repair WHERE RepairID = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param('i', $repair_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $repair = $result->fetch_assoc();
    
    if ($repair) {
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Edit Repair</title>
            <link rel="stylesheet" href="styles.css">
        </head>
        <body>
            <form action="update_repair.php" method="post">
                <input type="hidden" name="repair_id" value="<?= $repair['RepairID'] ?>">
                <label for="repair_cost">Repair Cost:</label>
                <input type="number" step="0.01" name="repair_cost" value="<?= $repair['RepairCost'] ?>"><br>
                <label for="status">Status:</label>
                <input type="text" name="status" value="<?= $repair['Status'] ?>"><br>
                <label for="diagnostics_id">Diagnostics ID:</label>
                <input type="number" name="diagnostics_id" value="<?= $repair['DiagnosticsID'] ?>"><br>
                <label for="guarantee_id">Guarantee ID:</label>
                <input type="number" name="guarantee_id" value="<?= $repair['GuaranteeID'] ?>"><br>
                <label for="repair_duration">Repair Duration:</label>
                <input type="number" name="repair_duration" value="<?= $repair['RepairDuration'] ?>"><br>
                <button type="submit">Update</button>
            </form>
        </body>
        </html>
        <?php
    } else {
        echo "No repair found with ID $repair_id";
    }

    $stmt->close();
    $mysqli->close();
}
?>
