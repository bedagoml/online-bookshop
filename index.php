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
			<header id="navigation" >
				
				  <section id="stuck_container">
				  <!--==============================
							  Stuck menu
				  =================================-->
					<div class="container " id="navver">
						  <div class="row">
							<div class="col-md-12 ">
							  <!--.................Nav..............-->
				
								 <div class="navbar navbar-inverse navbar-top"  id="nav">
									<div class="container">
										<div class="navbar-header">
											<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
												<span class="icon-bar"></span>
												<span class="icon-bar"></span>
												<span class="icon-bar"></span>
											</button>
											 <a class="navbar-brand" href="index.php">School System</a>
										</div>
										<div class="navbar-collapse collapse">
											<ul class="nav navbar-nav navbar-right">
												<li><a href="student-login.php">Student Login</a></li>
												<li><a href="teacher-login.php">Teacher Login</a></li>
												<!-- <li><a href="#">Services</a></li>
												<li><a href="#">Account</a></li>
												<li><a href="#">Contacts</a></li> -->
											</ul>
										</div>
					           
									</div>
								</div> 
							</div>
						 </div> 
					</div> 
				  </section>
		</header><br>

		<div class="container" id="home">
			<div class="row">
				<div class="col-md-12" id="home1">
					<div class="col-md-8 col-md-offset-2" >
						<h2> About Us</h2>
						<p> One reason for this is that they help us build upon the combined experience of many developers <br /> that came before us and ensure we structure our code in an <br />optimized way, meeting the needs of problems we're attempting to solve.
						Design patterns also provide us a common vocabulary to describe solutions. This can be significantly simpler than describing syntax and semantics when we're attempting to convey a way of structuring a solution in code form to others.<hr>
						</p><br><br>
					</div>
				</div>
				<div class="col-md-12" id="contact">
					<div class="row">
						<div class="col-md-8 col-md-offset-2">
							<h2>Contact Us</h2>
							<p> We value your eed back. Thank you for contacting us.</p><br><br>
						</div>
						<div class="col-md-12" >
							<div class="col-md-7">
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