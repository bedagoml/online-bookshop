<?php
session_start();
include 'db.php';
if (!isset($_SESSION['studentSession'])) {
	header("Location: student-login.php");
}
 if (isset($_POST['btn-update'])) {
          	
          	$subject1 = $MySQLi_CON->real_escape_string(trim($_POST['subject1']));
          	$subject2 = $MySQLi_CON->real_escape_string(trim($_POST['subject2']));
          	$subject3 = $MySQLi_CON->real_escape_string(trim($_POST['subject3']));
          	$subject4 = $MySQLi_CON->real_escape_string(trim($_POST['subject4']));
//include 'log.php';

		  $query = $MySQLi_CON->query("SELECT * FROM student WHERE reg_no ='$_SESSION[studentSession]'");
          $row = $query->fetch_array();
       }
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Account</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<div class="col-md-10 ">
			<h1>Student Account Here....</h1>
			<h2> Name: <?php echo $row['full_name']; ?></h2> 
			<h2> :<?php echo $row['full_name']; ?>, your registration number is <?php echo $row['reg_no']; ?></h2> 
		<h3><span class="text-success">Gender: <?php if($row['gender']=='') {echo 'Uknown';} else { echo $row['gender']; }?></span></h3>
	<h3 class="text-primary">Email: <?php echo $row['email']; ?></h3>
	<!-- <h3 class="text-warning">Phone: <?php if($row['phone']=='') {echo 'NO Number yet';} else { echo $row['phone']; }?></h3> -->
	<h4 class="text-success">Subject one: <?php if($row['subject1']=='') {echo 'NOT selected yet '; } else { echo $row['subject1']; }?></h4>
	<h4 class="text-success">Subject two: <?php if($row['subject2']=='') {echo 'NOT selected yet '; } else { echo $row['subject2']; }?></h4>
	<h4 class="text-success">Subject three: <?php if($row['subject3']=='') {echo 'NOT selected yet '; } else { echo $row['subject3']; }?></h4>
	<h4 class="text-success">Subject four: <?php if($row['subject4']=='') {echo 'NOT selected yet '; } else { echo $row['subject4']; }?></h4>
			<span><a class="btn btn-success" href="student-update.php">Update subjects</a></span><br><br>
			<span>You can <a class="btn btn-danger" href="logout-student.php">Logout</a> here</span>
		</div>
	</div>
</body>
</html>