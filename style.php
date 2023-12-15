<?php
  $Username=$_POST['Username'];
  $Email=$_POST['Email'];
  $Mobile=$_POST['Mobile'];
  $Password=$_POST['Password'];

  if (!empty($Username) ||!empty($Email) || !empty($Mobile) || !empty($Password)){
  		$host ="localhost";
  		$dbUsername="root";
  		$dbPassword="";
  		$dbname="phpmyadmin";

  		$conn = new mysqli($host,$dbUsername,$dbPassword,$dbname);
  		if (mysqli_connect_error()) {
  			die('Connect Error ('. mysqli_connect_error().')'.mysqli_connect_error());
  		}else{
  			$SELECT = "SELECT Email From Register2 Where Email = ? Limit 1";
  			$INSERT = "INSERT Into Register2(Username,Email,Mobile,Password)values(?,?,?,?)";

  			$stmt = $conn -> prepare($SELECT);
  			$stmt -> bind_param("s",$Email);
  			$stmt->execute();
  			$stmt->bind_result($Email);
  			$stmt->store_result();
  			$rnum=$stmt->num_rows;

  			if($rnum==0){
  				$stmt->close();

  				$stmt = $conn -> prepare($INSERT);
  				$stmt ->bind_param("ssis",$Username,$Email,$Mobile,$Password);
  				$stmt->execute();
  				echo "New Record insert Sucessfully";
  			}else{
  				echo "Someone already register using this Email";
  			}
  			$stmt->close();
  			$conn->close();
  		}

  	
  }else{
  	echo "All Field Required";
  }
   
?>