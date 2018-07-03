<?php
	include 'trial.php';
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
	
		<title>School System</title>
	</head>
	<body>
		<!-- BEGAIN PRELOADER -->
	<div class="preloader" id="preloader">
		<div class="item">
		  <img src="img/loading.gif"  class="uyo">
		</div>
	</div>
	 <!-- SCROLL TOP BUTTON -->
    <a class="scrollToTop" href="#"><i class="fa fa-angle-up fa-3x"></i></a>
    <!-- END SCROLL TOP BUTTON -->
			<header id="navigation" class="navbar-fixed-top">
            <div class="container">

                <div class="navbar-header">
                    <!-- responsive nav button -->
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- /responsive nav button -->

                    <!-- logo -->
                    <h1 class="navbar-brand">
                        <a class="navbar-brand linker" href="index.php">School System</a>
                    </h1>
                    <!-- /logo -->

                    </div>

                    <!-- main nav -->
                    <nav class="collapse navigation navbar-collapse navbar-right" role="navigation">
                        <ul id="nav" class="nav navbar-nav">
                           <li><a href="student-login.php">Student Login</a></li>
												<li><a href="teacher-login.php">Teacher Login</a></li>
                        </ul>
                    </nav>
                    <!-- /main nav -->
                </div>

            </div>
        </header><br><br><br><br><br><br>
		<div class="container" id="home">
			<div class="row">
				<div class="col-md-12" id="home1">
					<?php
						include 'about.php';
					?>
				</div>
				<div class="col-md-12" id="contact">
					<div class="row">
						<div class="col-md-8 col-md-offset-2">
							<h2>Contact Us</h2>
							<h4>My Name Is: <?php echo $name; ?></h4>
							<p> We value your eed back. Thank you for contacting us.</p><br><br>
						</div>
						<div class="col-md-12" >
							<div class="col-md-7">
							<?php
								echo $msg;
							?>
								<form method="post">
									<div class="form-group col-md-10 col-md-offset-1">
										<Label class"label">Name</Label>
										<input type="text" name="name" class="form-control" placeholder="Enter your Name" required/>
									</div>
									<div class="form-group col-md-10 col-md-offset-1">
										<Label class"label">Location</Label>
										<input type="text" name="location" class="form-control" placeholder="Enter your Location" required/>
									</div>
									<div class="form-group col-md-10 col-md-offset-1">
										<Label class"label">Message</Label>
										<textarea class="form-control" name="message" required/> 
											
										</textarea>
									</div>
										<div class="col-md-8 col-md-offset-2"> 
											<div class="form-group col-md-6 ">
												<input type="reset" name"reset" class="btn btn-success" value="RESET" />
											</div>
											<div class="form-group col-md-6 ">
												<input type="submit" name"btn-submit" class="btn btn-primary" value="SEND" />
											</div>
										</div>
								</form>
							</div>
							<div class="col-md-5">
								<div class="col-md-10 col-md-offset-1">
									<h3>Address</h3>
									<address>
										<p><b>Location: </b>Kitui, 40333</p><br>
										<p><b>Email :</b>schoolsystem@gmail.com</p>
									</address><hr>
									<h3>Follow us</h3>
									<ul style="list-style: none; display: inline-flex; font-size: 30px;">
										<li> <a class="fa fa-facebook" target="_blank" href="#"></a></li>
										<li> <a class="fa fa-twitter" target="_blank" href="#"></a></li>
										<li> <a class="fa fa-google-plus" target="_blank" href="#"></a></li>
										<li> <a class="fa fa-instagram" target="_blank" href="#"></a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div><br><br>
		<footer>
			<div class="col-md-12">
				<div class="col-md-6 col-md-offset-3 text-center">
					<p>&copy; &nbsp;<?php echo date('Y'); ?> &nbsp;All Rights Reserved | Developed <span><a href="index.php" target="_blank">School System</a></span></p>
				</div>
				
			</div>
		</footer>



</body>

		<script type="text/javascript" src="js/jquery2.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
		<script type="text/javascript" src="js/main.js"></script>
</html>