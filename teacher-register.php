<?php
session_start();
require 'db.php';
if(isset($_SESSION['studentSession'])){
	header("Location teacher-account.php");}


if(isset($_POST['btn-register'])){
	$full_name = $MySQLi_CON->real_escape_string(trim($_POST['full_name']));
	$email = $MySQLi_CON->real_escape_string(trim($_POST['email']));
	$tsc_no = $MySQLi_CON->real_escape_string(trim($_POST['tsc_no']));
	$form = $MySQLi_CON->real_escape_string(trim($_POST['form']));
	$stream = $MySQLi_CON->real_escape_string(trim($_POST['stream']));
	$password = $MySQLi_CON->real_escape_string(trim($_POST['password']));
	$password_again = $MySQLi_CON->real_escape_string(trim($_POST['password_again']));

	$new_pass = password_hash($password, PASSWORD_DEFAULT);
	//$n_pass = md5($password);

	if ($password != $password_again) {
		$message = "<p>Passwords do not match!</p>";
		$messo = "<div class='alert alert-danger col-md-10 col-sm-10 col-md-offset-1 col-sm-offset-1'>
					<span class='glyphicon glyphicon-info-sign'></span> &nbsp; Passwords or TSC numbers Do Not Match! </div>";
	}else {
		$check_tsc_no = $MySQLi_CON->query("SELECT tsc_no FROM student WHERE tsc_no='$tsc_no'");
		$count=$check_tsc_no->num_rows;
		if ($count==0) {
			$query = "INSERT INTO student(full_name,tsc_no,stream,form,email,password) VALUES('$full_name','$tsc_no','$stream','$form','$email','$new_pass')";
			if($MySQLi_CON->query($query)){
				 $message = "<p>Registration Successful. Log in</p>";
				 $messo = "<div class='alert alert-success col-md-10 col-sm-10 col-md-offset-1 col-sm-offset-1'>
					<span class='glyphicon glyphicon-info-sign'></span> &nbsp; Registration Successful. Log in </div>";
				$_SESSION['studentSession'] = $tsc_no;
				header("Location: teacher-account.php");
			}else {
				$message = "<p>Error while registering</p>";
				$messo = "<div class='alert alert-danger col-md-10 col-sm-10 col-md-offset-1 col-sm-offset-1'>
					<span class='glyphicon glyphicon-info-sign'></span> &nbsp; Error while registering! </div>";
			}
		} else{
			$message = "<p>tsc_no $tsc_no already exists !</p>";
			$messo = "<div class='alert alert-danger col-md-10 col-sm-10 col-md-offset-1 col-sm-offset-1'>
					<span class='glyphicon glyphicon-info-sign'></span> &nbsp; tsc_no $tsc_no already exists ! </div>";
		}

	
}
}

$MySQLi_CON->close();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<link href="#SSS" rel="stylesheet" type="text/css" />
		 <link href="css/style.css" rel="stylesheet">
		<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
		 <link href="font/css/font-awesome.css" rel="stylesheet" />
		<link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
		 <!-- <link rel="shortcut icon" href="images/asawa.jpg"> -->
	
		<title>Teacher Register</title>
	</head>
	<body>
	<section>
		<div class="container">
			<div class="col-md-12">
				<div class="col-md-8 col-md-offset-2">
					<h2 class="h2 text-center">Teacher <small>Register</small></h2>

					<form method="post" id="register-form">
						<div class="col-md-8 col-md-offset-2 form-group">
							<label>Full Name:</label>
							<input type="text" class="form-control login-field" name="full_name" placeholder="Enter Full Names" id="login-name" required />
							<span class="help-block " id="error"></span>
						</div>
						<div class="col-md-8 col-md-offset-2 form-group">
							<label>Email:</label>
							<input type="email" class="form-control login-field" name="email" placeholder="Enter your Email" id="login-email" required />
							<span class="help-block " id="error"></span>
						</div>
						<div class="col-md-8 col-md-offset-2 form-group">
							<label>TSC No:</label>
							<input type="number" class="form-control login-field" name="tsc_no" placeholder="Enter TSC NO" id="login-no" required />
							<span class="help-block " id="error"></span>
						</div>
						<div class="col-md-8 col-md-offset-2 form-group">
							<div class="col-md-6 col-sm-6 ">
								<label>Form:</label>
								<select class="form-control login-field" name="form" id="login-form" required >
									<option value="">Choose Form</option>
							        <option value="1">Form 1</option>
							        <option value="2">Form 2</option>
							        <option value="3">Form 3</option>
							        <option value="4">Form 4</option>
							     </select>
								<span class="help-block " id="error"></span>
							</div>
							<div class="col-md-6 col-sm-6 ">
								<label>Stream:</label>
								<select class="form-control login-field" name="stream" id="login-stream" required >
							        <option value="">Choose Stream</option>
							        <option value="red">Red</option>
							        <option value="blue">Blue</option>
							     </select>
								<span class="help-block " id="error"></span>
							</div>
						</div>
						<div class="col-md-8 col-md-offset-2 form-group">
							<label>Password:</label>
							<input type="password" class="form-control login-field" name="password" placeholder="Enter Your Password" id="password" required />
							<span class="help-block " id="error"></span>
						</div>
						<div class="col-md-8 col-md-offset-2 form-group">
							<label>Confirm Password:</label>
							<input type="password" class="form-control login-field" name="password_again" placeholder="Confirm Your Password" id="login-pass" required />
							<span class="help-block " id="error"></span>
						</div>
						<div class="col-md-8 col-md-offset-2 form-group">
							<div><input type="checkbox" class="" name="check" value="1" required  /> &nbsp; &nbsp;Agree to Terms and Conditions</div>
							<span class="help-block " id="error"></span>
						</div>
						<div class="col-md-8 col-md-offset-2 form-group">
							<input type="submit" class="col-md-8 col-md-offset-2 btn btn-primary btn-small" name="btn-register" value="Sign Up" />
						</div>
						<div class="col-md-8 col-md-offset-2 form-group">
							
							<p>Already Have Account?<a href="teacher-login.php" class="login-link" alt="">Login In</a></p>
							
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>
	<footer>
			<div class="col-md-12">
				<div class="col-md-6 col-md-offset-3 text-center">
					<p>&copy; &nbsp;<?php echo date('Y'); ?> &nbsp;All Rights Reserved | Developed <span><a href="index.php" target="_blank">School System</a></span></p>
				</div>
				
			</div>
		</footer>
			<?php 
		if (isset($messo)) {
			echo $messo;
		}
		?>
	</body>
	<script type="text/javascript" src="js/jquery2.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
		<!-- <script type="text/javascript" src="js/main.js"></script> -->
		<script src="js/jquery.validate.min.js"></script>
		<script type="text/javascript" src="js/register.js"></script>
</html>