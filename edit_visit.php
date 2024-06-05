<?php
require_once 'config.php';

if (isset($_GET['visit_id'])) {
    $visit_id = $_GET['visit_id'];
    $sql = "SELECT * FROM visit WHERE VisitID = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param('i', $visit_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $visit = $result->fetch_assoc();
    
    if ($visit) {
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Edit Visit</title>
            <link rel="stylesheet" href="styles.css">
        </head>
        <body>
            <form action="update_visit.php" method="post">
                <input type="hidden" name="visit_id" value="<?= $visit['VisitID'] ?>">
                <label for="visit_date">Visit Date:</label>
                <input type="date" name="visit_date" value="<?= $visit['VisitDate'] ?>"><br>
                <label for="reason">Reason:</label>
                <input type="text" name="reason" value="<?= $visit['Reason'] ?>"><br>
                <label for="car_id">Car ID:</label>
                <input type="number" name="car_id" value="<?= $visit['CarID'] ?>"><br>
                <label for="mechanic_id">Mechanic ID:</label>
                <input type="number" name="mechanic_id" value="<?= $visit['MechanicID'] ?>"><br>
                <label for="diagnostics_id">Diagnostics ID:</label>
                <input type="number" name="diagnostics_id" value="<?= $visit['DiagnosticsID'] ?>"><br>
                <button type="submit">Update</button>
            </form>
        </body>
        </html>
        <?php
    } else {
        echo "No visit found with ID $visit_id";
    }

    $stmt->close();
    $mysqli->close();
}
?>
