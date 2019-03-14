<?php

// ob_start();
// session_start();
define("name", "Placement Cell Bit Sindri"); // change the website name if you want 


?>

<!doctype html>
<html lang = "en-us">

<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<!--bootstrap css starts here-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<!--bootstrap css ends here-->
	
	<!--font awesome starts here-->
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<!--font awesome end here-->
	
	<!--jquery cdn starts here-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<!--jquery cdn end here-->
	
	<!--bootstrap js starts here-->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<!--bootstrap js end here-->
  
	<!--title logo starts here-->
	<link rel="shortcut icon" href="../images/logo.png" type="image/png" />
	<!--title logo ends here-->
	
	<!--title starts here-->
	<title> <?php echo name;?></title>
	<!--title endss here-->
	
	<!--custom css starts here-->
	<link href = "../css/animate.css" rel = "stylesheet" type = "text/css"/> <!--animation library-->
	<link rel="stylesheet" href="../css/style.css" type="text/css"/> <!--required stylsheet-->
	<!--custom css ends here-->
	
	<!--custom js starts here-->
	<script src = "../js/basicElement.js"></script> <!-- Required Javascript -->
	<!--custom js ends here-->
	
	
</head>

<body>
		
		<br><h2 class="top-heading"><b>ADMIN LOGIN</b></h2><br><br><br><br>
		<div class = "container">
			<div class="row">
				<div class="col-sm-4 col-md-4"></div>
				<div class="col-sm-4 col-md-4">
					<div class="panel">
						<form action="dashboard.php" method = "POST">
							<div class="row">
								<div class="col-sm-3 col-md-3"></div>
								<div class="col-sm-6 col-md-6">
									<img src="../images/admin_logo.png" alt="" class = "img-responsive img-circle">
								</div>
								<div class="col-sm-3 col-md-3"></div>
							</div>
							<div class="form-group">
						      <label for="usr">Username:</label>
						      <input type="text" class="form-control" id="usr" name = "username">
						    </div>
						    <div class="form-group">
						      <label for="pwd">Password:</label>
						      <input type="password" class="form-control" id="pwd" name = "pwd">
						    </div>
						    <div class="form-group">
						      <input type="submit" value = "Login" class="btn btn-primary btn-block" id="" name = "admin-login-submit-btn">
						    </div>
						</form>
					</div>
				</div>
				<div class="col-sm-4 col-md-4"></div>
			</div>
		</div>
		
		<br><br>
	<!--footer starts here-->
		<h4 class = "footer">&copy;copyright reserved Placement cell Bit Sindri. Made with &#10084; by kundan kumar</h4>
	<!--footer ends here-->

</body>
</html>

