<?php
// Assuming you have a database connection established
$mysqli = new mysqli("localhost", "root", "", "paperhub");

// Check if a file is being uploaded
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["paper_file"])) {
    $academic_year_id = $_POST["academic_year_id"];
    $semester_id = $_POST["semester_id"];
    $branch_id = $_POST["branch_id"];
    $exam_type_id = $_POST["exam_type_id"];
    $subject_id = $_POST["subject_id"];
    $uploaded_by = $_POST["uploaded_by"];

    $file_name = $_FILES["paper_file"]["name"];
    $file_tmp = $_FILES["paper_file"]["tmp_name"];

    $paper_image = file_get_contents($file_tmp);

    $uploaded_at = date("Y-m-d H:i:s");

    $query = "INSERT INTO exam_papers (academic_year_id, semester_id, branch_id, exam_type_id, subject_id, paper_image, uploaded_by, uploaded_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("iiiiiiss", $academic_year_id, $semester_id, $branch_id, $exam_type_id, $subject_id, $paper_image, $uploaded_by, $uploaded_at);

    if ($stmt->execute()) {
        echo "File uploaded successfully!";
    } else {
        echo "Error uploading file.";
    }

    $stmt->close();
} elseif ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["paper_id"])) {
    // Check if a paper_id is provided for download
    $paper_id = $_GET["paper_id"];

    $query = "SELECT paper_image FROM exam_papers WHERE paper_id = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("i", $paper_id);
    $stmt->execute();
    $stmt->bind_result($paper_image);

    if ($stmt->fetch()) {
        header("Content-Type: image/jpeg"); // Adjust the content type based on your image type
        echo $paper_image;
        exit();
    } else {
        echo "Image not found";
    }

    $stmt->close();
} else {
    // Display the HTML form for file upload
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Image Upload and Download</title>
    </head>
    <body>
        <form action="" method="post" enctype="multipart/form-data">
            <label for="academic_year_id">Academic Year ID:</label>
            <input type="text" name="academic_year_id" required><br>

            <!-- Add other form fields here -->

            <label for="paper_file">Upload File:</label>
            <input type="file" name="paper_file" accept="image/*" required><br>

            <label for="uploaded_by">Uploaded By:</label>
            <input type="text" name="uploaded_by" required><br>

            <input type="submit" value="Upload">
        </form>
        
        <!-- Display a list of uploaded images with download links -->
        <h2>Uploaded Images:</h2>
        <?php
        $result = $mysqli->query("SELECT paper_id, uploaded_at FROM exam_papers");
        while ($row = $result->fetch_assoc()) {
            echo "<p>Image ID: {$row['paper_id']} - Uploaded At: {$row['uploaded_at']} - <a href='upload_and_download.php?paper_id={$row['paper_id']}'>Download</a></p>";
        }
        ?>
    </body>
    </html>
    <?php
}

// Close the database connection
$mysqli->close();
?>