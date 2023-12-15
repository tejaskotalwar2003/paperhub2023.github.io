<?php

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Collect user inputs
  $academic_year = $_POST["academic_year"];
  $semester = $_POST["semester"];
  $branch = $_POST["branch"];
  $exam_type = $_POST["exam_type"];
  $subject = $_POST["subject"];

  // Get uploaded file information
  $file_name = $_FILES["exam_paper"]["name"];
  $file_tmp_name = $_FILES["exam_paper"]["tmp_name"];
  $file_size = $_FILES["exam_paper"]["size"];
  $file_error = $_FILES["exam_paper"]["error"];

  // Validate user inputs and uploaded file
  if (empty($academic_year)) {
    $errors[] = "Academic year is required.";
  }
  if (empty($semester)) {
    $errors[] = "Semester is required.";
  }
  if (empty($branch)) {
    $errors[] = "Branch is required.";
  }
  if (empty($exam_type)) {
    $errors[] = "Exam type is required.";
  }
  if (empty($subject)) {
    $errors[] = "Subject is required.";
  }
  if ($file_error > 0) {
    $errors[] = "Error uploading file.";
  }

  // If no errors, proceed with saving data to database
  if (empty($errors)) {
    // Connect to database
    $db = new mysqli("host", "username", "password", "database");

    // Prepare SQL query
    $sql = "INSERT INTO exam_papers (academic_year, semester, branch, exam_type, subject, file_name, file_size) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $db->prepare($sql);
    $stmt->bind_param("sssssss", $academic_year, $semester, $branch, $exam_type, $subject, $file_name, $file_size);

    // Upload file
    move_uploaded_file($file_tmp_name, "uploads/" . $file_name);

    // Execute query and check for success
    if ($stmt->execute()) {
      $success = "Exam paper uploaded successfully.";
    } else {
      $errors[] = "Error saving data to database.";
    }

    // Close database connection
    $db->close();
  }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Upload Exam Paper</title>
</head>
<body>
  <h1>Upload Exam Paper</h1>

  <?php if (isset($success)) : ?>
    <p style="color: green;"><?php echo $success; ?></p>
  <?php endif; ?>

  <?php if (isset($errors)) : ?>
    <ul style="color: red;">
      <?php foreach ($errors as $error) : ?>
        <li><?php echo $error; ?></li>
      <?php endforeach; ?>
    </ul>
  <?php endif; ?>

  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
    <label for="academic_year">Academic Year:</label>
    <input type="text" name="academic_year" id="academic_year">

    <label for="semester">Semester:</label>
    <input type="text" name="semester" id="semester">

    <label for="branch">Branch:</label>
    <input type="text" name="branch" id="branch">

    <label for="exam_type">Exam Type:</label>
    <input type="text" name="exam_type" id="exam_type">

    <label for="subject">Subject:</label>
    <input type="text" name="subject" id="subject">

    <label for="exam_paper">Exam Paper File:</label>
    <input type="file" name="exam_paper" id="exam_paper">

    <br>
    <button type="submit">Upload Exam Paper</button>
  </form>
</body>
</html>