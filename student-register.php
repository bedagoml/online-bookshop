<?php
session_start();
require 'db.php';

// if(isset($_SESSION['studentSession']))



if(isset($_POST['btn-register'])){
	$full_name = $MySQLi_CON->real_escape_string(trim($_POST['full_name']));
	$email = $MySQLi_CON->real_escape_string(trim($_POST['email']));
	$reg_no = $MySQLi_CON->real_escape_string(trim($_POST['reg_no']));
	$sec_no = $MySQLi_CON->real_escape_string(trim($_POST['sec_no']));
	$description = $MySQLi_CON->real_escape_string(trim($_POST['description']));
	
	

	
		$check_reg_no = $MySQLi_CON->query("SELECT reg_no FROM student1 WHERE reg_no='$reg_no'");
		$count=$check_reg_no->num_rows;
		if ($count==0) {
			$query = "INSERT INTO student1 (full_name,reg_no,sec_no,email,description) VALUES('$full_name','$reg_no','$sec_no','$email','$description')";
			if($MySQLi_CON->query($query)){
				$message = "<p>Registration Successful. Log in</p>";
				$messo = "<div class='alert alert-success col-md-10 col-sm-10 col-md-offset-1 col-sm-offset-1'>
				<span class='glyphicon glyphicon-info-sign'></span> &nbsp; Your item has been registered successfully, use your security number to retrieve your item from the administrator </div>";
				$_SESSION['studentSession'] = $reg_no;
				
			}else {
				$message = "<p>Error while registering</p>";
				$messo = "<div class='alert alert-danger col-md-10 col-sm-10 col-md-offset-1 col-sm-offset-1'>
					<span class='glyphicon glyphicon-info-sign'></span> &nbsp; Error while registering! </div>";
			}
		} else{
			$message = "<p>reg_no $reg_no already exists !</p>";
			$messo = "<div class='alert alert-danger col-md-10 col-sm-10 col-md-offset-1 col-sm-offset-1'>
					<span class='glyphicon glyphicon-info-sign'></span> &nbsp; reg_no $reg_no already exists ! </div>";
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
	
		<title>Register your Item</title>
	</head>
	<body>
	<section>
		<div class="container">
			<div class="col-md-12">
				<div class="col-md-8 col-md-offset-2">
					<h2 class="h2 text-center">Item <small>Registration</small></h2>
                      <?php if (isset($messo)){ echo $messo;} ?>
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
							<label>Registration Number:</label>
							<input type="text" class="form-control login-field" name="reg_no" placeholder="Enter your Registration Number" id="login-no" required />
							<span class="help-block " id="error"></span>
						</div>
						<div class="col-md-8 col-md-offset-2 form-group">
							
								<label>Security Number:</label>
								<input type="password" class="form-control login-field" name="sec_no" placeholder="Enter Security Number" id="login-no" required />
							<span class="help-block " id="error"></span>
							
							
						</div>
						
						
						<div class="col-md-8 col-md-offset-2 form-group">
							<label>Item's Description:</label>
							<textarea rows="10" cols="100" class="form-control" name="description" placeholder="Enter Your item's description" required/> 
						     </textarea>
							<span class="help-block " id="error"></span>
						</div>
				
						
						<div class="col-md-8 col-md-offset-2 form-group">
							<div><input type="checkbox" class="" name="check" required  /> &nbsp; &nbsp;Agree to Terms and Conditions</div>
							<span class="help-block " id="error"></span>
						</div>
						<div class="col-md-8 col-md-offset-2 form-group">
							<input type="submit" class="col-md-8 col-md-offset-2 btn btn-primary btn-small" name="btn-register" value="Register" />
						</div>
						
					</form>
					
				</div>
			</div>
		</div>
	</section>
	<footer>
			<div class="col-md-12">
				<div class="col-md-6 col-md-offset-3 text-center">
					<p>&copy; &nbsp;<?php echo date ('Y'); ?> &nbsp;All Rights Reserved | Developed by Bedah for <span><a href="index2.php">Margaret Thatchers Library Security System</a></span></p>
				</div>
				
			</div>
		</footer>
	</body>
	<script type="text/javascript" src="js/jquery2.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
		<!-- <script type="text/javascript" src="js/main.js"></script> -->
		<script src="js/jquery.validate.min.js"></script>
		<script type="text/javascript" src="js/register.js"></script>
</html>