
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
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
	<link rel="stylesheet" type="text/css" href="css/bootstrap_2.css">
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
	<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />
</head>
<body>

    <div class="container">
    	
        <div class="page-header">
        <h2><a href="index2.php">Margaret Thatcher's Library Security System</a></h2>
        </div>
        
        <table class="table table-bordered table-condensed table-hover table-striped">
        
        	<tr>
            	<!-- <th>#ID</th> -->
                <th>Name</th>
                <th>Registration Number</th>
                <!-- <th>Security Number</th> -->
                <th>Item's Description</th>
                <th>Action</th>
            </tr>
            
            
            <?php
			require_once 'dbconfig.php';
			$query = "SELECT  full_name, reg_no, sec_no, description  FROM student1";
			$stmt = $DBcon->prepare( $query );
			$stmt->execute();
			while ($row=$stmt->fetch(PDO::FETCH_ASSOC) ) {
				extract($row);
				?>
                <tr>
                <!-- <td><?php echo $ID; ?></td> -->
                <td><?php echo $full_name; ?></td>
                 <td><?php echo $reg_no; ?></td>
                  <!-- <td><?php echo $sec_no; ?></td> -->
                   <td><?php echo $description; ?></td>
                <td>
                <a class="delete_product" data-id="<?php echo $full_name; ?>" href="javascript:void(0)">
                <i class="glyphicon glyphicon-trash"></i>
                </a></td>
                </tr>
                <?php
			}
			?>
            
        
        </table>
    
    </div>

<script src="jquery-1.12-0.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="bootbox.min.js"></script>

<script>
	$(document).ready(function(){
		
		$('.delete_product').click(function(e){
			
			e.preventDefault();
			
			var pid = $(this).attr('data-id');
			var parent = $(this).parent("td").parent("tr");
			
			bootbox.dialog({
			  message: "You are about to unregister an item to <?php echo $full_name; ?> with security number <?php echo $sec_no; ?> click unregister after confirmation of the security number",
			  title: "<i class='glyphicon glyphicon-trash'></i>item removal system !",
			  buttons: {
				success: {
				  label: "Does not have security number",
				  className: "btn-success",
				  callback: function() {
					 $('.bootbox').modal('hide');
				  }
				},
				danger: {
				  label: "unregister!",
				  className: "btn-danger",
				  callback: function() {
					  
					  /*
					  
					  using $.ajax();
					  
					  $.ajax({
						  
						  type: 'POST',
						  url: 'delete.php',
						  data: 'delete='+pid
						  
					  })
					  .done(function(response){
						  
						  bootbox.alert(response);
						  parent.fadeOut('slow');
						  
					  })
					  .fail(function(){
						  
						  bootbox.alert('Something Went Wrog ....');
						  						  
					  })
					  */
					  
					  
					  $.post('delete.php', { 'delete':pid })
					  .done(function(response){
						  bootbox.alert(response);
						  parent.fadeOut('slow');
					  })
					  .fail(function(){
						  bootbox.alert('Something Went Wrog ....');
					  })
					  					  
				  }
				}
			  }
			});
			
			
		});
		
	});
</script>
</body>
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
					<p>&copy;<?php echo date ('Y'); ?> All Rights Reserved. Developed by <a href="http://www.bedahouma.co.ke/">Bedah Ouma of School of Information Sciences(IT)</a> exclusively for <a href="http://www.mu.ac.ke">Moi University Library (MTL)</a></p>
				</div>
				<div class="col-sm-4 text-right text-center-mobile">
					<ul class="social-footer">
						<li><a href="http://www.facebook.com/pages/Codrops/159107397912"><i class="fa fa-facebook"></i></a></li>
						<li><a href="http://www.twitter.com/codrops"><i class="fa fa-twitter"></i></a></li>
						<li><a href="https://plus.google.com/101095823814290637419"><i class="fa fa-google-plus"></i></a></li>
					</ul>
				</div>
			</div>
		</div>
	</footer>
</html>