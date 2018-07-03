<?php
session_start();
include 'db.php';
if (isset($_SESSION['studentSession'])) {
	header("Location: teacher-account.php");
}


if (isset($_POST['btn-log'])) {
	$tsc_no = $MySQLi_CON->real_escape_string(trim($_POST['tsc_no']));
	$password = $MySQLi_CON->real_escape_string(trim($_POST['password']));

	$query = $MySQLi_CON->query("SELECT * FROM student WHERE tsc_no='$tsc_no'");
	$row=$query->fetch_array();

	//for md5(); is as below
	// if ($password==md5($row['password'])) {
	// 	
	// }

	if(password_verify($password, $row['password']))
	{
		$_SESSION['studentSession'] = $row['tsc_no'];
		header("Location: teacher-account.php");
	} else{
			$message = "<p>Wrong pass or tsc number </p>";
				$messo = "<div class='alert alert-danger col-md-4 col-sm-4 col-md-offset-1 col-sm-offset-1'>
					<span class='glyphicon glyphicon-info-sign'></span> &nbsp; wrong email or pass </div>";
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
	
		<title>Teacher Login</title>
	</head>
	<body>
	<section>
		<div class="container">
			<div class="col-md-12">
				<div class="col-md-8 col-md-offset-2"><br><br><br><br>
					<h2 class="h2 text-center">Teacher <small>Login</small></h2><br><br><br><br>

					<form method="post">
						<div class="col-md-6 col-md-offset-3 form-group">
							<input type="text" class="form-control" name="tsc_no" placeholder="Enter TSC NO" required />
						</div>
						<div class="col-md-6 col-md-offset-3 form-group">
							<input type="password" class="form-control" name="password" placeholder="Enter Your Password" required />
						</div>
						<div class="col-md-6 col-md-offset-3 form-group">
							<input type="submit" class="col-md-8 col-md-offset-2 btn btn-primary btn-small" name="btn-log" value="Sign In" onclick="return confirm('Are you sure you are a Teacher ?')" />
						</div>
						<div class="col-md-6 col-md-offset-3 form-group">
							<div><input type="checkbox" class="" name="tsc-rem"   />Remember Me</div><br>
							<a href="reset.php" class="login-link" alt="Forgot Password">Forgot Password?</a><br><br>
							<a href="teacher-register.php" class="login-link" alt="Sign Up">Register Account</a>
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
		<script type="text/javascript" src="js/main.js"></script>
</html>