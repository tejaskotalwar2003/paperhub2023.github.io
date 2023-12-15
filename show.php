<?php
include 'connection.php';
	if (isset($_POST['submit'])) {

		$academic_year_id = $_POST['academic_year_id'];
        $department_id = $_POST['department_id'];
        $semester_id = $_POST['semester_id'];
        $exam_type_id = $_POST['exam_type_id'];
        $subject_id = $_POST['subject_id'];
        
		if (isset($_FILES['pdf_file']['name']))
		{
		$paper_file = $_FILES['pdf_file']['name'];
		$file_tmp = $_FILES['pdf_file']['tmp_name'];


		move_uploaded_file($file_tmp,"./uploads/".$paper_file);

		$insertquery = 
		"INSERT INTO exam_papers(academic_year_id,department_id,semester_id,exam_type_id,subject_id,paper_file) VALUES('$academic_year_id','$department_id','$semester_id','$exam_type_id','$subject_id','$paper_file')";
		$iquery = mysqli_query($conn, $insertquery);
        echo "upoload success.";
		}
		else
		{
		?>
			<div class=
			"alert alert-danger alert-dismissible 
			fade show text-center">
			<a class="close" data-dismiss="alert"
				aria-label="close"></a>
			<strong>Failed!</strong> 
				File must be uploaded in PDF format!
			</div>
		<?php
		}
	}
?>


<div class="card-body">
    <div class="table-responsive">
        <table>
            <thead>
                <th>paper_id</th>
                <th>academic_year_id</th>
                <th>department_id</th>
                <th>semester_id</th>
                <th>exam_type_id</th>
                <th>subject_id</th>
                <th>File_name</th>
            </thead>
            <tbody>
                <?php
                    $selectQuery = "select * from exam_papers";
                    $squery = mysqli_query($conn, $selectQuery);

                    while (($result = mysqli_fetch_assoc($squery))) {
                ?>
                <tr>
                    <td><?php echo $result['paper_id']; ?></td>
                    <td><?php echo $result['academic_year_id']; ?></td>
                    <td><?php echo $result['department_id']; ?></td>
                    <td><?php echo $result['semester_id']; ?></td>
                    <td><?php echo $result['exam_type_id']; ?></td>
                    <td><?php echo $result['subject_id']; ?></td>
                    
                    <td>
                        <!-- Add a link to download the file -->
                        <a href="download.php?paper_file=<?php echo urlencode($result['paper_file']); ?>">
                            <?php echo $result['paper_file']; ?>
                        </a>
                    </td>
                </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>
