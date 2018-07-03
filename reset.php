<?php 
 include 'db.php';
 if (isset($_POST['btn-reset'])) {
			$reg_no = $MySQLi_CON->real_escape_string(trim($_POST['reg_no']));
			// $phone = $MySQLi_CON->real_escape_string(trim($_POST['phone']));
			$password = $MySQLi_CON->real_escape_string(trim($_POST['password']));
			$c_password = $MySQLi_CON->real_escape_string(trim($_POST['c_password']));

			if ($password!=$c_password) {
				$message = "<div class='alert alert-danger col-md-10 col-sm-10 col-md-offset-1 col-sm-offset-1'>
							<span class='glyphicon glyphicon-info-sign'></span> &nbsp; passwords does not match! </div>";
			} else {

					$check = $MySQLi_CON->query("SELECT reg_no, FROM student WHERE reg_no='$reg_no'");
					$count=$check_reg_no->num_rows;
				if ($count==0) {
					$message = "<div class='alert alert-danger col-md-10 col-sm-10 col-md-offset-1 col-sm-offset-1'>
									<span class='glyphicon glyphicon-info-sign'></span> &nbsp; Email or phone does not exist! </div>";
				} else {
					$new_pass = password_hash($password,PASSWORD_DEFAULT);

					$update = "UPDATE student SET password='$new_pass' WHERE reg_no='$reg_no'";
					if(mysqli_query($MySQLi_CON,$update)){
						$message = "<div class='alert alert-success col-md-10 col-sm-10 col-md-offset-1 col-sm-offset-1'>
									<span class='glyphicon glyphicon-info-sign'></span> &nbsp; pass changed successfully </div>";
									header("refresh:5;log.php");
					} else {
						$message = "<div class='alert alert-danger col-md-10 col-sm-10 col-md-offset-1 col-sm-offset-1'>
									<span class='glyphicon glyphicon-info-sign'></span> &nbsp; Error occured. Try again! </div>";
					}
				}
			}

	}
?>
<!DOCTYPE html>
<html>
<head>
	<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<title>Reset Password</title>
</head>
<body>
	<h1>Reset Password</h1>
	<?php 
		if (isset($message)) {
			echo $message;
		}

	?>
	<form method="post">
		<div class="container">
			<div class="form-group col-md-6 col-md-offset-3">
				<input type="reg_no" class="form-control " name="reg_no" value="" placeholder="Enter your registration number" required />
				<!-- <input type="phone" class="form-control " name="phone" value="" placeholder="Enter Phone No" required /> -->
				<input type="password" class="form-control " name="password" value="" placeholder="Enter New Password" required />
				<input type="password" class="form-control " name="c_password" value="" placeholder="Confirm New Password" required />
				<input type="submit" class="btn btn-success" name="btn-reset" value="Reset Pass" /><br> <br>

				<p>Go<a class="btn btn-warning" href="student-login.php">Back</a>to login</p>
			</div ><br>
					
		</div>
	</form>
	
	</body>
</html>