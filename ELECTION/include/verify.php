<?php

ob_start();
session_start();
define("name", "Placement Cell Bit Sindri"); // change the website name if you want 

include_once "../include/dbh.inc.php"; // database connection

?>


<?php

if(isset($_POST['submit-vote']))
{
	//echo $_SESSION['branch'];
	
	$code = trim(mysqli_real_escape_string($conn,$_POST['secret_key']));
	$branch = trim(mysqli_real_escape_string($conn,$_POST['branch']));
	$choice_one = $_POST['choice_one'];
	$choice_two = $_POST['choice_two'];
	$choice_three = $_POST['choice_three'];
	
	//echo $name.$branch.$email.$roll.$choice_one.$choice_two.$choice_three;
	// checking for empty field
	if(empty($code) || empty($branch) || empty($choice_one) || empty($choice_two) || empty($choice_three))
	{
		$_SESSION['error'] = "<b>Please fill all the fields</b>";
		header("location:../vote.php?branch=".$_SESSION['branch']);
		exit();
	}
	else if(($choice_one == $choice_two) || ($choice_two == $choice_three) || ($choice_three == $choice_one))
	{
		$_SESSION['error'] = "<b>All Choices should be different</b>";
		header("location:../vote.php?branch=".$_SESSION['branch']);
		exit();
	}
	else
	{
		$sql_code_check = "SELECT *FROM secret_key WHERE Secret_code = '$code'";
		$result = mysqli_query($conn,$sql_code_check);
		$result_check = mysqli_num_rows($result);
		// secret code validations here

		if($result_check > 0) // it means secret code is there
		{
			// now we will check it has expired or not
			while($row=mysqli_fetch_assoc($result))
			{
				if($row['Status'] == 1)
				{
					$_SESSION['error'] = "Secret Code has expired";
					header("location:../vote.php?branch=".$_SESSION['branch']);
					exit();
				}
				else
				{
					$sql = "INSERT INTO votes (Secret_code ,Branch, choice1, choice2, choice3)
					VALUES ('$code','$branch','$choice_one','$choice_two',
					'$choice_three')";
					if(mysqli_query($conn,$sql)) 
					{
						// set status of secret key as 1
						$sql_update_status = "UPDATE secret_key SET Status = '1' WHERE Secret_code = '$code'";
						if(mysqli_query($conn,$sql_update_status))
						{
							header("location:../success.php?votedSuccessfully");
							exit();
						}
						else
						{
							$_SESSION['error'] = "Something went wrong..try again.";
							header("location:../vote.php?branch=".$_SESSION['branch']);
							exit();
						}
					}
					else
					{
						$_SESSION['error'] = "Something went wrong..try again.";
						header("location:../vote.php?branch=".$_SESSION['branch']);
						exit();
					}
				}
				// echo $row['Status'];
			}
		}
		else
		{
			$_SESSION['error'] = "Invalid Code";
			header("location:../vote.php?branch=".$_SESSION['branch']);
			exit();
		}
	}
}
else
{
	header("location: ../index.php");
}

?>