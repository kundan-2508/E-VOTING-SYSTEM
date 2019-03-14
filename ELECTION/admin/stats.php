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
		else if($pwd != "aDmin@123")
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
				<div class="col-sm-8 col-md-8" id = "printStats">
					<div class="panel">
						<h4 style="display: inline-block;">STANDINGS</h4>
						<button onclick = "printDiv()" class="btn" style = "float: right;"><i class="fa fa-print"></i> Print</button>
					</div>
						<div class = "panel">
							<div class="table-responsive">
								<table class="table" style = "font-weight: bold;">
									<thead>
								      <tr>
								        <th>Sl No</th>
								        <th>Name</th>
								        <th>Branch</th>
								        <th>Choice1</th>
								        <th>Choice2</th>
								        <th>Choice3</th>
								        <th>Total</th>
								      </tr>
								    </thead>
									<tbody>
										<?php
										$cnt = 0;
										$sql="SELECT *FROM leaders ORDER BY Branch"; // to fetch leaders
										if ($result=mysqli_query($conn,$sql))
										{
											while ($row=mysqli_fetch_assoc($result))
											{								
												echo '<tr>';
												echo '<td>'.++$cnt.'</td>';
												echo '<td>'.$row['Name'].'</td>';
												echo '<td>'.$row['Branch'].'</td>';
												// now count votes
												$leader_name = $row['Name'];
												$count_one = 0;
												$count_two = 0;
												$count_three = 0;
												// counting votes as first choice
												$res_one = mysqli_query($conn,"SELECT COUNT(Choice1) AS `count` FROM `votes` WHERE Choice1 = '$leader_name'");
												$final_one = mysqli_fetch_assoc($res_one);
												$count_one = $final_one['count'];
												echo '<td>'.$count_one.'</td>';
												// counting votes as second choice
												$res_two = mysqli_query($conn,"SELECT COUNT(Choice2) AS `count` FROM `votes` WHERE Choice2 = '$leader_name'");
												$final_two = mysqli_fetch_assoc($res_two);
												$count_two = $final_two['count'];
												echo '<td>'.$count_two.'</td>';
												// counting votes as third choice
												$res_three = mysqli_query($conn,"SELECT COUNT(Choice3) AS `count` FROM `votes` WHERE Choice3 = '$leader_name'");
												$final_three = mysqli_fetch_assoc($res_three);
												$count_three = $final_three['count'];
												echo '<td>'.$count_three.'</td>';
												$count_final = $count_one + $count_two + $count_three;
												echo '<td>'.$count_final.'</td>';
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

