<?php
// download.php
include 'connection.php';

if (isset($_GET['paper_file'])) {
    $paper_file = $_GET['paper_file'];
    $filepath = './uploads/' . $paper_file;  // Assuming files are stored in the "uploads" directory

    // Check if the file exists
    if (file_exists($filepath)) {
        // Set appropriate headers for the file download
        header('Content-Description: File Transfer');
        header('Content-Type: application/pdf');  // Adjust the content type based on your file type
        header('Content-Disposition: attachment; filename="' . basename($filepath) . '"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($filepath));

        // Read the file and output it to the browser
        readfile($filepath);
        exit;
    } else {
        echo 'File not found.';
    }
} else {
    echo 'Invalid request.';
}
?>
