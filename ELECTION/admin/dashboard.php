<?php

ob_start();
session_start();
define("name", "Placement Cell Bit Sindri"); // change the website name if you want 

include_once "../include/dbh.inc.php"; // database connection

?>

<?php

if(!isset($_SESSION['username']) || !isset($_SESSION['pwd']))
{
	if(!isset($_POST['admin-login-submit-btn']))
	{
		header("location:index.php?kindly Login");
		exit();
	}
	else
	{
		$username = trim($_POST['username']);
		$pwd = $_POST['pwd'];
		if($username != "admin")
		{
			header("location:index.php?wrongUsername");
			exit();	
		}
		else if($pwd != "Welcome")
		{
			header("location:index.php?wrongPassword");
			exit();
		}
		else
		{
			$_SESSION['username'] = $username;
			$_SESSION['pwd'] = $pwd;
		}
	}
}

?>

<?php
	// showing error (if any)
	if(isset($_SESSION['admin_error']))
	{
		echo '<div class="alert alert-danger alert-dismissible"><b>'.$_SESSION['admin_error'];
		echo '</b><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
		echo '</div>';
		unset($_SESSION['admin_error']);
	}
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
		<!--boxes start here-->

		<h2 class="top-heading"><b>ADMIN DASHBOARD</b></h2><br><br>
		<div class = "container">
			<div class="row">
				<div class="col-sm-3 col-md-3">
					<div class="menus-panel">
						<ul class="menus">
							<a href="dashboard.php"><li><i class="fa fa-book"></i> Branches</li></a>
							<a href="leaders.php"><li><i class="fa fa-users"></i> Leaders</li></a>
							<a href="stats.php"><li><i class="fa fa-area-chart"></i> Stats</li></a>
							<a href=""><li><i class="fa fa-sign-out"></i> Logout</li></a>
						</ul>
					</div>
				</div>
				<div class="col-sm-1 col-md-1"></div>
				<div class="col-sm-8 col-md-8">
					<div class="panel">
						<h4 style = "display: inline-block;">BRANCHES</h4>
						<button id = "add_branch_toggle" class="btn" style = "float: right;"><i class="fa fa-plus"></i> Add Branch</button>
					</div>
					<div class="panel" id = "add_branch_window" style = "display: none;">
						<form action="../include/addbranch.php" method = "POST" enctype="multipart/form-data">
							<div class="row">
								<div class="col-sm-3 col-md-3">
									<select name="branch" id="" class="form-control">
										<option value="">Choose Branch</option>
										<option value="MECHANICAL">MECHANICAL</option>
										<option value="ELECTRICAL">ELECTRICAL</option>
										<option value="PRODUCTION">PRODUCTION</option>
										<option value="CHEMICAL">CHEMICAL</option>
										<option value="CIVIL">CIVIL</option>
										<option value="METALLURGY">METALLURGY</option>
										<option value="MINING">MINING</option>
										<option value="CSE">CSE</option>
										<option value="IT">IT</option>
										<option value="ECE">ECE</option>
									</select>
								</div>
								<div class="col-sm-3 col-md-3">
									<select name="status" id="" class="form-control">
										<option value="">Status</option>
										<option value="Enabled">Enabled</option>
										<option value="Disabled">Disabled</option>
									</select>
								</div>
								<div class="col-sm-4 col-md-4">
									<input type="file" name = "branch_logo" class = "form-control">
								</div>
								<div class="col-sm-2 col-md-2">
									<input type="submit" name = "add_branch_submit_btn" class = "form-control btn-primary" value = "Add">
								</div>
							</div>
						</form>
					</div>
						<div class = "panel">
							<div class="table-responsive">
								<table class="table" style = "font-weight: bold;">
									<thead>
								      <tr>
								        <th>Sl No</th>
								        <th>Branch</th>
								        <th>Status</th>
								      </tr>
								    </thead>
									<tbody>
										<?php
										$cnt = 0;
										$sql="SELECT *FROM branches";
										if ($result=mysqli_query($conn,$sql))
										{
											while ($row=mysqli_fetch_assoc($result))
											{								
												echo '<form action = "#"><tr>';
												echo '<td>'.++$cnt.'</td>';
												echo '<td>'.$row['Branch'].'</td>';
												echo '<td>';
												echo '<select class = "form-control">';
												echo '<option value = "Enabled"';?><?php if($row['Status']=="Enabled") echo 'selected="selected"'; ?><?php echo '>Enabled</option>';
												echo '<option value = "Disabled"';?><?php if($row['Status']=="Disabled") echo 'selected="selected"'; ?><?php echo '>Disabled</option>';
												echo '</select>';
												echo '</td>';
												echo '</tr>';
											}
										}
										else
										{
											echo "Something went wrong";
										}
										$cnt = 0;
										mysqli_free_result($result);
										?>
									</tbody>

								</table>
								<input type = "submit" value = "Commit changes" class = "btn btn-primary" style = "float:right;"></form>
							</div>
						</div>
				</div>
			</div>	
		</div>
		
		<!--boxes end here-->
		<br>
	<!--footer starts here-->
		<h4 class = "footer">&copy;copyright reserved Placement cell Bit Sindri. Made with &#10084; by kundan kumar</h4>
	<!--footer ends here-->

</body>
</html>

