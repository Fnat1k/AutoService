<?php
require_once 'config.php';

if (isset($_GET['diagnostic_id'])) {
    $diagnostic_id = $_GET['diagnostic_id'];
    $sql = "SELECT * FROM diagnostics WHERE DiagnosticsID = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param('i', $diagnostic_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $diagnostic = $result->fetch_assoc();
    
    if ($diagnostic) {
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Edit Diagnostic</title>
            <link rel="stylesheet" href="styles.css">
        </head>
        <body>
            <form action="update_diagnostic.php" method="post">
                <input type="hidden" name="diagnostic_id" value="<?= $diagnostic['DiagnosticsID'] ?>">
                <label for="problem_description">Problem Description:</label>
                <input type="text" name="problem_description" value="<?= $diagnostic['ProblemDescription'] ?>"><br>
                <label for="required_parts">Required Parts:</label>
                <input type="text" name="required_parts" value="<?= $diagnostic['RequiredParts'] ?>"><br>
                <button type="submit">Update</button>
            </form>
        </body>
        </html>
        <?php
    } else {
        echo "No diagnostic found with ID $diagnostic_id";
    }

    $stmt->close();
    $mysqli->close();
}
?>
