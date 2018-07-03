<?php
session_start();
include 'db.php';
if (!isset($_SESSION['studentSession'])) {
	header("Location: student-login.php");
}
		$query = $MySQLi_CON->query("SELECT * FROM student WHERE reg_no ='$_SESSION[studentSession]'");
          $row=$query->fetch_array();

          if (isset($_POST['btn-update'])) {
          	
          	$subject1 = $MySQLi_CON->real_escape_string(trim($_POST['subject1']));
          	$subject2 = $MySQLi_CON->real_escape_string(trim($_POST['subject2']));
          	$subject3 = $MySQLi_CON->real_escape_string(trim($_POST['subject3']));
          	$subject4 = $MySQLi_CON->real_escape_string(trim($_POST['subject4']));

          	$updateQuery1 = "UPDATE student SET subject1='$subject1' WHERE reg_no='$_SESSION[studentSession]'";
          	$updateQuery2 = "UPDATE student SET subject2='$subject2' WHERE reg_no='$_SESSION[studentSession]'";
          	$updateQuery3 = "UPDATE student SET subject3='$subject3' WHERE reg_no='$_SESSION[studentSession]'";
          	$updateQuery4 = "UPDATE student SET subject4='$subject4' WHERE reg_no='$_SESSION[studentSession]'";
          
			if(mysqli_query($MySQLi_CON,$updateQuery1)){
				$message = "<div class='alert alert-success col-md-10 col-sm-10 col-md-offset-1 col-sm-offset-1'>
							<span class='glyphicon glyphicon-info-sign'></span> &nbsp; Details updated successfully </div>";
							header("refresh:3;student-update.php");
			} else {
				$message = "<div class='alert alert-danger col-md-10 col-sm-10 col-md-offset-1 col-sm-offset-1'>
							<span class='glyphicon glyphicon-info-sign'></span> &nbsp; Error occured. Try again! </div>";
			}
			if(mysqli_query($MySQLi_CON,$updateQuery2)){
				$message = "<div class='alert alert-success col-md-10 col-sm-10 col-md-offset-1 col-sm-offset-1'>
							<span class='glyphicon glyphicon-info-sign'></span> &nbsp; Details updated successfully </div>";
							header("refresh:4;student-update.php");
			} else {
				$message = "<div class='alert alert-danger col-md-10 col-sm-10 col-md-offset-1 col-sm-offset-1'>
							<span class='glyphicon glyphicon-info-sign'></span> &nbsp; Error occured. Try again! </div>";
			}

if(mysqli_query($MySQLi_CON,$updateQuery3)){
				$message = "<div class='alert alert-success col-md-10 col-sm-10 col-md-offset-1 col-sm-offset-1'>
							<span class='glyphicon glyphicon-info-sign'></span> &nbsp; Details updated successfully </div>";
							header("refresh:5;student-update.php");
			} else {
				$message = "<div class='alert alert-danger col-md-10 col-sm-10 col-md-offset-1 col-sm-offset-1'>
							<span class='glyphicon glyphicon-info-sign'></span> &nbsp; Error occured. Try again! </div>";
			}
			if(mysqli_query($MySQLi_CON,$updateQuery4)){
				$message = "<div class='alert alert-success col-md-10 col-sm-10 col-md-offset-1 col-sm-offset-1'>
							<span class='glyphicon glyphicon-info-sign'></span> &nbsp; Details updated successfully </div>";
							header("refresh:6;student-update.php");
			} else {
				$message = "<div class='alert alert-danger col-md-10 col-sm-10 col-md-offset-1 col-sm-offset-1'>
							<span class='glyphicon glyphicon-info-sign'></span> &nbsp; Error occured. Try again! </div>";
			}
			header("refresh:7;student-account.php");



          }

?>
<!DOCTYPE html>
<html>
<head>
	<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<title>Update</title>
</head>
<body>
	<h1>Update your subjects</h1>

	<h2 Name: <?php echo $row['full_name']; ?></h2> <span>Gender: <?php if($row['gender']=='$gender') {echo 'unkown';} else { echo $row['gender']; }?></span></h2>
	<h3 class="text-primary">Email: <?php echo $row['email']; ?></h3>
	<h3 class="text-primary">reg_no: <?php echo $row['reg_no']; ?></h3> 
		<h4 class="text-primary">Subject1 is: <?php if($row['subject1']=='') {echo 'NOT selected yet '; } else { echo $row['subject1']; }?></h4>
		<h4 class="text-primary">subject2 is: <?php if($row['subject2']=='') {echo 'NOT selected yet '; } else { echo $row['subject2']; }?></h4>
		<h4 class="text-primary">subject3 is: <?php if($row['subject3']=='') {echo 'NOT selected yet '; } else { echo $row['subject3']; }?></h4>
		<h4 class="text-primary">subject4 is: <?php if($row['subject4']=='') {echo 'NOT selected yet '; } else { echo $row['subject4']; }?></h4>
	<?php 
		if (isset($message)) {
			echo $message;
		}
	?>
	<form method="post">
		<div class="container">
			<div class="form-group col-md-6 col-md-offset-3">
				<input type="text" class="form-control " name="full_name" value="<?php echo $row['full_name']; ?>" readonly />
				<input type="email" class="form-control " name="email" value="<?php echo $row['email']; ?>" readonly />
				<input type="" class="form-control " name="reg_no" value="<?php echo $row['reg_no']; ?>" readonly/>
				<select name="subject1" class="form-control col-md-3"  required >
					<option value="<?php echo $row['subject1']; ?>">Choose one compulsory</option>
					<option value="Math">Math</option>
					<option value="Eng">Eng</option>
					<option value="Kis">Kis</option>
				</select>
				<select name="subject2" class="form-control col-md-3"  required >
					<option value="<?php echo $row['subject2']; ?>">Choose one science</option>
					<option value="Bio">Bio</option>
					<option value="Che">Chem</option>
					<option value="Phy">Phy</option>
				</select>
				<select name="subject3" class="form-control col-md-3"  required >
					<option value="<?php echo $row['subject3']; ?>">Choose one humanity</option>
					<option value="Geo">Geo</option>
					<option value="Hist">Hist</option>
					<option value="C.R.E">C.R.E</option>
				</select>
				<select name="subject4" class="form-control col-md-3"  required >
					<option value="<?php echo $row['subject4']; ?>">Choose one applied and technical</option>
					<option value="Bust">Bust</option>
					<option value="Comp">Comp</option>
					<option value="Agric">Agric</option>
					<option value="French">French</option>
				</select>
				<input type="submit" class="btn btn-primary" name="btn-update" value="Update" /><br>

				<span><a href="student-account.php">Home</a></span>
			</div ><br>
					
		</div>
	</form>
	
	</body>
</html>