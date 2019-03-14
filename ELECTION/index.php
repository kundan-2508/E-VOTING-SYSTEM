<?php

ob_start();
session_start();
define("name", "Placement Cell Bit Sindri"); // change the website name if you want 

include_once "include/dbh.inc.php"; // database connection

?>

<?php
/*
$sql="SELECT *FROM branches";
if ($result=mysqli_query($conn,$sql))
{
	//echo "okay !!";
	//fetch everything
	while ($row=mysqli_fetch_assoc($result))
	{
		// showing only enabled branches
		if($row['Status']=="Enabled")
		{
			echo $row['Branch'].'<br>';
			echo $row['Pic'].'<br>';
		}
		else
		{
			// nothing ... don't show
		}
	}
	mysqli_free_result($result);
}
else
{
	echo "Something went wrong";
}
*/

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
	<link rel="shortcut icon" href="images/logo.png" type="image/png" />
	<!--title logo ends here-->
	
	<!--title starts here-->
	<title> <?php echo name;?></title>
	<!--title endss here-->
	
	<!--custom css starts here-->
	<link href = "css/animate.css" rel = "stylesheet" type = "text/css"/> <!--animation library-->
	<link rel="stylesheet" href="css/style.css" type="text/css"/> <!--required stylsheet-->
	<!--custom css ends here-->
	
	<!--custom js starts here-->
	<script src = "js/basicElement.js"></script> <!-- Required Javascript -->
	<!--custom js ends here-->
	
	
</head>

<body>
		<!--boxes start here-->

		<h2 class="top-heading"><b>STUDENT COORDINATOR ELECTION</b></h2><br>
		<div class = "container">
			
				<?php
					$sql="SELECT *FROM branches";
					if ($result=mysqli_query($conn,$sql))
					{
						//echo "okay !!";
						//fetch everything
						$cnt = 0;
						echo '<div class = "row">';
						while ($row=mysqli_fetch_assoc($result))
						{
							// showing only enabled branches
							
							if($row['Status']=="Enabled")
							{
								$cnt++;
								
								echo '<div class = "col-sm-3 col-md-3">
										<div class = "box">';
								//echo '<img src = "images/'.$row['Pic'].'class = "img-responsive"/>'; 
								echo '<a href = "vote.php?branch='.$row['Branch'].'"><img src = "images/branch_logo/'.$row['Pic'].'" class = "img-responsive"/>';		
								echo '<p>'.$row['Branch'].'</p></a>';
								echo '</div>
										</div>';
										
								if($cnt%4 == 0)
								{
									//$cnt = 0;
									echo '</div></br><div class = "row">';
								}
								else if($cnt == 10)
								{
									echo '</div>';
								}
							}
							else
							{
								// nothing ... don't show
							}
						}
						if($cnt==0)
						{
							echo '<div class = "row">';
							echo '<div class = "col-sm-3 col-md-3"></div>';
							echo '<div class = "col-sm-6 col-md-6" style = "text-align:center;">';
							echo '<b><i class="fa fa-smile-o faa-wrench animated fa-4x" style = "color:#e55b0b;opacity:.8;font-size:400px;"></i></b>';
							echo '<br><div class = "faa-pulse animated fa-4x" style = "font-size:40px;font-family:KoHo, sans-serif;">Something cool will come in a while !!</div>';
							echo '';
							echo '</div>';
							echo '<div class = "col-sm-3 col-md-3"></div>';

						}
						mysqli_free_result($result);
					}
					else
					{
						echo "Something went wrong";
					}
				?>
		</div>
		
		<!--boxes end here-->
		<br>
	<!--footer starts here-->
		<h4 class = "footer">&copy;copyright reserved Placement cell Bit Sindri. Made with &#10084; by kundan kumar</h4>
	<!--footer ends here-->

</body>
</html>

