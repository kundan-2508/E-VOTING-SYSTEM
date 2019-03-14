<?php

//@$branch = $_GET['branch'];

//echo $branch;

?>

<?php

ob_start();
session_start();
define("name", "Placement Cell Bit Sindri"); // change the website name if you want 

include_once "include/dbh.inc.php"; // database connection
$_SESSION['branch'] = $_GET['branch'];

?>

<?php

	$branch = $_SESSION['branch'];
	$sql="SELECT *FROM branches WHERE Branch = '$branch'";
	if ($result=mysqli_query($conn,$sql))
	{
		$row = mysqli_fetch_assoc($result);
		//echo $row['Status'];
		if($row['Status'] == 'Disabled')
		{
			echo "Your branch is not enabled";
			//unset($_SESSION['branch']);
			exit();
		}
		else if($row['Status'] == '')
		{
			echo "Something went wrong";
			exit();
		}
		//echo "Enabled";
	}
	else
	{
		echo "Something went wrong";
		exit();
	}
	mysqli_free_result($result);

?>

<?php
	// showing error (if any)
	if(isset($_SESSION['error']))
	{
		echo '<div class="alert alert-danger alert-dismissible"><b>'.$_SESSION['error'];
		echo '</b><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
		echo '</div>';
		unset($_SESSION['error']);
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
	<h2 class="top-heading"><b>Your Vote is Precious, waste it wisely !</b></h2><br>

	<!-- form starts here -->
	
	<div class="container">
		<div class="row">
			<div class="col-sm-3 col-md-3"></div>
			<div class="col-sm-6 col-md-6">
				<form action = "include/verify.php?branch=<?php echo $_SESSION['branch']; ?>" method = "POST">
				    <div class="form-group">
				      <label for="secret_key">Secret Code:</label>
				      <input type="text" class="form-control" id="secret_key" name = "secret_key" value = "">
				    </div>
				    <div class="form-group">
				      <label for="branch">Branch:</label>
				      <input type="text" class="form-control" id="branch" name = "branch" value = "<?php echo $branch ?>" readonly >
				    </div>
				    <div class="form-group">
				      <label for="choice">Choice 1:</label>
				      <select name="choice_one" id="" class="form-control">
				      	<option value="">CHOICE 1</option>
				      	<?php
							$branch = $_SESSION['branch'];
							$sql="SELECT *FROM leaders WHERE BRANCH = '$branch'";
							if ($result=mysqli_query($conn,$sql))
							{
								while ($row=mysqli_fetch_assoc($result))
								{								
									echo '<option value="'.$row['Name'].'">'.$row['Name'].'</option>';
								}
							}
							else
							{
								echo "Something went wrong";
							}
							mysqli_free_result($result);
						?>
				      </select>
				    </div>
				    <div class="form-group">
				      <label for="choice">Choice 2:</label>
				      <select name="choice_two" id="" class="form-control">
				      	<option value="">CHOICE 2</option>
				      	<?php
							$branch = $_SESSION['branch'];
							$sql="SELECT *FROM leaders WHERE BRANCH = '$branch'";
							if ($result=mysqli_query($conn,$sql))
							{
								while ($row=mysqli_fetch_assoc($result))
								{								
									echo '<option value="'.$row['Name'].'">'.$row['Name'].'</option>';
								}
							}
							else
							{
								echo "Something went wrong";
							}
							mysqli_free_result($result);
						?>
				      </select>
				    </div>
				    <div class="form-group">
				      <label for="choice">Choice 3:</label>
				      <select name="choice_three" id="" class="form-control">
				      	<option value="">CHOICE 3</option>
				      	<?php
							$branch = $_SESSION['branch'];
							$sql="SELECT *FROM leaders WHERE BRANCH = '$branch'";
							if ($result=mysqli_query($conn,$sql))
							{
								while ($row=mysqli_fetch_assoc($result))
								{								
									echo '<option value="'.$row['Name'].'">'.$row['Name'].'</option>';
								}
							}
							else
							{
								echo "Something went wrong";
							}
							mysqli_free_result($result);
						?>
				      </select>
				    </div>
				    <input type="submit" value = "SUBMIT" class="form-control" name = "submit-vote">
				</form>
			</div>
			<div class="col-sm-3 col-md-3"></div>
		</div>
	</div>

	<!-- form ends here -->
	
	<br><br>
	<!--footer starts here-->
		<h4 class = "footer">&copy;copyright reserved Placement cell Bit Sindri. Made with &#10084; by kundan kumar</h4>
	<!--footer ends here-->

</body>
</html>


