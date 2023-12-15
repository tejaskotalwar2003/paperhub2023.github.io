<?php
// Establish a database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "kiran";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if a subject is requested via GET method
if (isset($_GET['subject'])) {
    $subject = $_GET['subject'];

    // Fetch file path from the database based on the selected subject
    $sql = "SELECT file_path FROM study_materials WHERE subject = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $subject);
    $stmt->execute();
    $stmt->bind_result($file_path);

    if ($stmt->fetch()) {
        // Process the file download
        $file = $file_path; // Path to the file in your server

        if (file_exists($file)) {
            // Set headers for file download
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="' . basename($file) . '"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($file));
            readfile($file);
            exit;
        } else {
            echo "File not found.";
        }
    } else {
        echo "No file found for the selected subject.";
    }

    $stmt->close();
}

$conn->close();
?>
