<?php
session_start();
require 'db.php';

if(isset($_SESSION['studentSession'])){
	header("Location:student-account.php");}


if(isset($_POST['btn-register'])){
	$full_name = $MySQLi_CON->real_escape_string(trim($_POST['full_name']));
	$email = $MySQLi_CON->real_escape_string(trim($_POST['email']));
	$reg_no = $MySQLi_CON->real_escape_string(trim($_POST['reg_no']));
	$form = $MySQLi_CON->real_escape_string(trim($_POST['form']));
	$stream = $MySQLi_CON->real_escape_string(trim($_POST['stream']));
	$password = $MySQLi_CON->real_escape_string(trim($_POST['password']));
	$password_again = $MySQLi_CON->real_escape_string(trim($_POST['password_again']));
	$gender = $MySQLi_CON->real_escape_string(trim($_POST['gender']));

	$new_pass = password_hash($password, PASSWORD_DEFAULT);
	//$n_pass = md5($password);

	if ($password != $password_again) {
		$message = "<p>Passwords do not match!</p>";
		$messo = "<div class='alert alert-danger col-md-10 col-sm-10 col-md-offset-1 col-sm-offset-1'>
					<span class='glyphicon glyphicon-info-sign'></span> &nbsp; Passwords or TSC numbers Do Not Match! </div>";
	}else {
		$check_reg_no = $MySQLi_CON->query("SELECT reg_no FROM student WHERE reg_no='$reg_no'");
		$count=$check_reg_no->num_rows;
		if ($count==0) {
			$query = "INSERT INTO student(full_name,reg_no,email,password,stream,form) VALUES('$full_name','$reg_no','$email','$new_pass','$stream','$form')";
			if($MySQLi_CON->query($query)){
				$message = "<p>Registration Successful. Log in</p>";
				$messo = "<div class='alert alert-success col-md-10 col-sm-10 col-md-offset-1 col-sm-offset-1'>
				<span class='glyphicon glyphicon-info-sign'></span> &nbsp; Registration Successful. Log in </div>";
				$_SESSION['studentSession'] = $reg_no;
				header("Location: student-account.php");
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
}

$MySQLi_CON->close();
?>
<!DOCTYPE html>
<html lang="en">


<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Item Registration</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/modern-business.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Moi University Library Security system </title>
    <meta name="description" content="Cardio is a free one page template made exclusively for Codrops by Luka Cvetinovic" />
    <meta name="keywords" content="html template, css, free, one page, gym, fitness, web design" />
    <meta name="author" content="Luka Cvetinovic for Codrops" />
    <!-- Favicons (created with http://realfavicongenerator.net/)-->
    <link rel="apple-touch-icon" sizes="57x57" href="img/favicons/apple-touch-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="img/favicons/apple-touch-icon-60x60.png">
    <link rel="icon" type="image/png" href="img/favicons/favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="img/favicons/favicon-16x16.png" sizes="16x16">
    <link rel="manifest" href="img/favicons/manifest.json">
    <link rel="shortcut icon" href="img/favicons/favicon.ico">
    <meta name="msapplication-TileColor" content="#00a8ff">
    <meta name="msapplication-config" content="img/favicons/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">
    <!-- Normalize -->
    <link rel="stylesheet" type="text/css" href="css/normalize.css">
    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <!-- Owl -->
    <link rel="stylesheet" type="text/css" href="css/owl.css">
    <!-- Animate.css -->
    <link rel="stylesheet" type="text/css" href="css/animate.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.1.0/css/font-awesome.min.css">
    <!-- Elegant Icons -->
    <link rel="stylesheet" type="text/css" href="fonts/eleganticons/et-icons.css">
    <!-- Main style -->
    <link rel="stylesheet" type="text/css" href="css/cardio.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
   <nav class="navbar">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <h3>Margaret Thatchers Library System</h3>
                <a class="navbar-brand" href="#"><img src="img/logo.png" data-active-url="img/logo-active.png" alt=""><i>The Library Motto</i></a>
                
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right main-nav">
                     <li><a href="index.html" class="btn btn-blue">Home</a></li>
                    <li><a href="services.html" class="btn btn-blue">Services</a></li>
                    <li><a href="about.html" class="btn btn-blue">About</a></li>
                    <!-- <li><a href="#pricing">Pricing</a></li> -->
                    <!-- <li><a href="#" data-toggle="modal" data-target="#modal1" class="btn btn-blue">Sign Up</a></li> -->
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    <small></small>
                </h1>
                <ol class="">
                    <li><a href="index.html"></a>
                    </li>
                    <li class="active"></li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <!-- Content Row -->
        <div class="row">
            <!-- Map Column -->
            <div class="col-md-8">
                <!-- Embedded Google Map -->
              
            </div>
            <!-- Contact Details Column -->
            <div class="col-md-4">
                
            </div>
        </div>
        <!-- /.row -->

        <!-- Contact Form -->
        <!-- In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->
        <div class="row">
            <div class="col-md-8">
                <h3 align="center">Register your Item here</h3>
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
							<label>Adm No:</label>
							<input type="text" class="form-control login-field" name="reg_no" placeholder="Enter ADM NO" id="login-no" required />
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
							<div class="col-md-6 col-sm-6 ">
								<label>Gender:</label>
								<select class="form-control login-field" name="gender" id="login-gender" required >
									<option value="">Choose your Gender</option>
							        <option value="1">Male</option>
							        <option value="2">Female</option>
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
							<div><input type="checkbox" class="" name="check" required  /> &nbsp; &nbsp;Agree to Terms and Conditions</div>
							<span class="help-block " id="error"></span>
						</div>
						<div class="col-md-8 col-md-offset-2 form-group">
							<input type="submit" class="col-md-8 col-md-offset-2 btn btn-primary btn-small" name="btn-register" value="Sign Up" />
						</div>
						<div class="col-md-8 col-md-offset-2 form-group">
							
							<p>Already Have Account?<a href="student-login.php" class="login-link" alt="">Login In</a></p>
							
						</div>
					</form>
            </div>

        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        <footer>
        <div class="container">
            <div class="row">
                <div class="col-sm-6 text-center-mobile">
                    <h3 class="white">Moi University Library (MTL)!</h3>
                    <h5 class="light regular light-white">A peaceful and conducive environment to study</h5>
                    <!-- <a href="#" data-toggle="modal" data-target="#modal1" class="btn btn-blue ripple trial-button">Start Free Trial</a> -->
                </div>
                <div class="col-sm-6 text-center-mobile">
                    <h3 class="white">Opening Hours <span class="open-blink"></span></h3>
                    <div class="row opening-hours">
                        <div class="col-sm-6 text-center-mobile">
                            <h5 class="light-white light">Mon - Sat</h5>
                            <h3 class="regular white">9:00 - 22:00</h3>
                        </div>
                        <div class="col-sm-6 text-center-mobile">
                            <h5 class="light-white light">Sun</h5>
                            <h3 class="regular white">9:00 - 13:00</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row bottom-footer text-center-mobile">
                <div class="col-sm-8">
                    <p>&copy; 2018 All Rights Reserved. Powered by <a href="http://www.bedahouma.co.ke/">Alumni Bedah Ouma of School of Information Sciences(IT)</a> exclusively for <a href="http://www.mu.ac.ke">Moi University Library (MTL)</a></p>
                </div>
                <div class="col-sm-4 text-center text-center-mobile">
                    <ul class="social-footer">
                        <li><a href="http://www.facebook.com/pages/Codrops/159107397912"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="http://www.twitter.com/codrops"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="https://plus.google.com/101095823814290637419"><i class="fa fa-google-plus"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Contact Form JavaScript -->
    <!-- Do not edit these files! In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.onepagenav.js"></script>
    <script src="js/main.js"></script>
   <script src="js/owl.carousel.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/typewriter.js"></script>
    <script src="js/jquery.onepagenav.js"></script>
    <script src="js/main.js"></script>
    <script src="js/register.js"></script>
    <script type="text/javascript" src="js/register.js"></script>
    

</body>

</html>
