<?php

ob_start();
session_start();
define("name", "Placement Cell Bit Sindri"); // change the website name if you want 

include_once "../include/dbh.inc.php"; // database connection

?>


<?php

if(isset($_POST['edit-branch-btn']))
{
	$branchName = @$_POST['branchName'];
	$branchStatus = @$_POST['branchStatus'];
	if(empty($branchName) || empty($branchStatus))
	{
		$_SESSION['admin_error'] = "Please fill all the fields";
		header("location:../admin/dashboard.php?fillAlltheFields");
		exit();
	}
	else{
		$sql = "UPDATE branches SET Status = '$branchStatus' WHERE Branch = '$branchName'";
		 if(mysqli_query($conn,$sql)) {
			 $_SESSION['admin_error'] = "Branch updated Successfully.";
			 header("location:../admin/dashboard.php?addedsuccessfully");
			 exit();
		 }
		 else{
			 $_SESSION['admin_error'] = "Unable to update branch..try again.";
			 header("location:../admin/dashboard.php?erroroccured");
			 exit();
		 }
	}
}
else
{
	header("location: ../admin/dashboard.php");
}

?>