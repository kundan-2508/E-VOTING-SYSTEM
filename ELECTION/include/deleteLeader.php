<?php

ob_start();
session_start();
define("name", "Placement Cell Bit Sindri"); // change the website name if you want 

include_once "../include/dbh.inc.php"; // database connection

?>
<?php

if(isset($_POST['deleteLeaderBtn']))
{
	$leaderRoll = @$_POST['leaderRoll'];
	if(empty($leaderRoll))
	{
		$_SESSION['admin_error'] = "Please fill all the fields";
		header("location:../admin/leaders.php?fillAlltheFields");
		exit();
	}
	else{
		$sql = "DELETE FROM leaders WHERE Roll = '$leaderRoll'";
		 if(mysqli_query($conn,$sql)) {
			 $_SESSION['admin_error'] = "Leader deleted Successfully.";
			 header("location:../admin/leaders.php?addedsuccessfully");
			 exit();
		 }
		 else{
			 $_SESSION['admin_error'] = "Unable to delete Leader..try again.";
			 header("location:../admin/leaders.php?erroroccured");
			 exit();
		 }
	}
}
else
{
	header("location: ../admin/leaders.php");
}

?>