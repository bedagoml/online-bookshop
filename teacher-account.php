<?php
session_start();
include 'db.php';
if (!isset($_SESSION['studentSession'])) {
	header("Location: teacher-login.php");
}
//include 'log.php';

		$query = $MySQLi_CON->query("SELECT * FROM student WHERE tsc_no ='$_SESSION[studentSession]'");
          $row=$query->fetch_array();
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
			<h1>Teacher Account Here....</h1>
			<h2> Name: <?php echo $row['full_name']; ?></h2> 
			<h2> TSC Number: <?php echo $row['tsc_no']; ?></h2>
		 <h3><span class="text-success">Gender: <?php if($row['gender']=='') {echo 'Uknown';} else { echo $row['gender']; }?></span></h3>
	<h3 class="text-primary">Email: <?php echo $row['email']; ?></h3>
	<h4 class="text-success">Subject one: <?php if($row['subject1']=='') {echo 'NOT selected yet '; } else { echo $row['subject1']; }?></h4>
	<h4 class="text-success">Subject two: <?php if($row['subject2']=='') {echo 'NOT selected yet '; } else { echo $row['subject2']; }?></h4>
	<h4 class="text-success">Subject three: <?php if($row['subject3']=='') {echo 'NOT selected yet '; } else { echo $row['subject3']; }?></h4>
	<h4 class="text-success">Subject four: <?php if($row['subject4']=='') {echo 'NOT selected yet '; } else { echo $row['subject4']; }?></h4>
			<span><a class="btn btn-success" href="teacher-update.php">Update info</a></span><br><br>
			<span>You can <a class="btn btn-danger" href="logout-teacher.php">Logout</a> here</span>
		</div>
	</div>
</body>
</html>