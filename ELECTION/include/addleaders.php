<?php

ob_start();
session_start();
define("name", "Placement Cell Bit Sindri"); // change the website name if you want 

include_once "dbh.inc.php"; // database connection

?>

<?php

if(!isset($_POST['addLeaderSubmit']))
{
	header("location:../admin/leaders.php?sessionExpired");
	exit();
}
else
{
	$name = $_POST['leaderName'];
	$gnd = $_POST['leaderGend'];
	$email = $_POST['leaderEmail'];
	$mob = $_POST['leaderMob'];
	$roll = $_POST['leaderRoll'];
	$branch = $_POST['leaderBranch'];
	if(empty($name) || empty($gnd) || empty($email) || empty($mob) || empty($roll) || empty($branch))
	{
		$_SESSION['admin_error'] = "Please fill all the fields";
		header("location:../admin/leaders.php?fillAlltheFields");
		exit();
	}
	else
	{
		if(!preg_match("/^[a-zA-Z ]*$/",$name))
		{
			$_SESSION['admin_error'] = "Notice! Alphabet and space are allowed in Name only";
			header("location:../admin/leaders.php?fillAlltheFields");
			exit();
			
		}
		else
		{
			if(!filter_var($email,FILTER_VALIDATE_EMAIL))
			{
				$_SESSION['admin_error'] = "<b>Invalid email</b>";
				header("location:../admin/leaders.php?fillAlltheFields");
				exit();
			}
			else
			{
				$sql = "SELECT *FROM leaders WHERE Email = '$email' OR Roll = '$roll'";
				$result = mysqli_query($conn,$sql);
				$resultCheck = mysqli_num_rows($result);
				if($resultCheck > 0)
				{
					$_SESSION['admin_error'] = "You have already registered.";
					header("location:../admin/leaders.php?fillAlltheFields");
					exit();
				}
				else
				{
					$sql_leaders = "INSERT INTO leaders (
							Name, Gender,Email,Mobile, Roll, Branch, Pic)
							VALUES ('$name', '$gnd','$email','$mob','$roll','$branch','')";
					if(mysqli_query($conn,$sql_leaders)) 
					{
						$_SESSION['admin_error'] = "Added successfully.";
						header("location:../admin/leaders.php?fillAlltheFields");
					}
					else
					{
						$_SESSION['admin_error'] = "Something went wrong..try again.";
						header("location:../admin/leaders.php?fillAlltheFields");
						exit();
					}

				}
			}
		}
	}
}