<?php
include 'connection.php';

// Fetch file details from the database based on the ID sent via POST
if(isset($_POST['download']) && isset($_POST['file_id'])) {
    $fileId = $_POST['file_id'];

    // Fetch file details from the database
    $sql = "SELECT * FROM exam_papers WHERE paper_id = 15";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $fileId);
    $stmt->execute();
    $stmt->bind_result($fileName, $filePath);

    if ($stmt->fetch()) {
        // File found, initiate download
        $file = $filePath . $fileName;

        // Set headers for file download
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . $fileName . '"');
        header('Content-Length: ' . filesize($file));

        // Output the file for download
        readfile($file);
        exit;
    } else {
        echo "File not found.";
    }

    $stmt->close();
}

$conn->close();
?>
