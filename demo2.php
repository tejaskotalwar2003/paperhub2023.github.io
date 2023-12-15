<!-- CREATE TABLE IF NOT EXISTS `pdf_data` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `filename` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
create table
-->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form method="post" action="show.php" enctype="multipart/form-data">
	<div class="form-input py-2">
	
		<div class="form-group">
		<input type="text" class="form-control" name="academic_year_id"
				placeholder="Enter Academic year" required>
		</div>	
		<div class="form-group">
		<input type="text" class="form-control" name="department_id"
				placeholder="Enter Department" required>
		</div>	
		<div class="form-group">
		<input type="text" class="form-control" name="semester_id"
				placeholder="Enter Semester" required>
		</div>	
		<div class="form-group">
		<input type="text" class="form-control" name="exam_type_id"
				placeholder="Enter Exam-Type" required>
		</div>	
		<div class="form-group">
		<input type="text" class="form-control" name="subject_id"
				placeholder="Enter Subject" required>
		</div>							 
		<div class="form-group">
		<input type="file" name="pdf_file"
				class="form-control" accept=".pdf"
				title="Upload PDF"/>
		</div>
		<div class="form-group">
		<input type="submit" class="btnRegister"
				name="submit" value="Submit">
		</div>
</div>
</form>

</body>
</html>