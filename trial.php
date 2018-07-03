<?php

	// $a = 5;
	// $b = 8;
	// $sum = $a + $b;
	// echo "<div >
	// 		<h1>Calc </h1>
	// 		</p> $a added by $b equal to $sum </p>
	// 	</div>

	// ";

	//next line example
	$name = "Emmanuel Magak \n Yule Msee";

	$msg = "<div class='alert alert-danger col-md-10 col-sm-10 col-md-offset-1 col-sm-offset-1'>
					<span class='glyphicon glyphicon-info-sign'></span> &nbsp; Email Sent!
				</div>";

	/// addd 
if(isset($_POST['btn-add']))
{
	$first = ($_POST['first']);
	$second = ($_POST['second']);
		$added= $first + $second;

		$msg1="Sum = $added";


}

?>
<!DOCTYPE html>
<html>
<head>
	<title>php</title>
</head>
<body>
	<h1>Addtion</h1>
	<form method="post">
		<input type="number" name="first" value="" placeholder="Enter No" required />
		<input type="number" name="second" value="" placeholder="Enter No" required />
		<input type="submit" name="btn-add" value="Add" />
	</form>
			<?php 
				echo $msg1;
			?>
</body>
</html>