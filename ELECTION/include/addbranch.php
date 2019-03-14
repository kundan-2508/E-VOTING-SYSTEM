<?php

ob_start();
session_start();
define("name", "Placement Cell Bit Sindri"); // change the website name if you want 

include_once "dbh.inc.php"; // database connection

?>

<?php

if(!isset($_POST['add_branch_submit_btn']))
{
	header("location:../admin/dashboard.php?sessionExpired");
	exit();
}
else
{
	$branch = $_POST['branch'];
	$status = $_POST['status'];
	//echo $branch."<br>".$status;
	if(empty($branch) || empty($status))
	{
		$_SESSION['admin_error'] = "Please fill all the fields";
		header("location:../admin/dashboard.php?fillAlltheFields");
		exit();
	}
	else
	{
		if($_FILES['branch_logo']['error'] != 4)
		{
			$whitelist = array("gif", "jpeg", "jpg", "png");
			$temp = explode(".", $_FILES["branch_logo"]["name"]);
			$extension = end($temp);
			if(($_FILES["branch_logo"]["size"]/1024)/1024 < 30)
			{
				if((($_FILES["branch_logo"]["type"] == "image/gif") 
					|| ($_FILES["branch_logo"]["type"] == "image/jpeg") 
					|| ($_FILES["branch_logo"]["type"] == "image/jpg") 
					|| ($_FILES["branch_logo"]["type"] == "image/pjpeg") 
					|| ($_FILES["branch_logo"]["type"] == "image/x-png") 
					|| ($_FILES["branch_logo"]["type"] == "image/png")) 
						&& in_array($extension, $whitelist))
				{
					if($_FILES["branch_logo"]["error"] > 0)
					{
						$_SESSION['admin_error'] = "Something went wrong..try again";
						header("location:../admin/dashboard.php?errorOccured");
						exit();
					}
					else
					{
						$ofile = getRand().'-'.$_FILES["branch_logo"]['name'];
						if(file_exists("images/branch_logo/" . $ofile))
						{
							$_SESSION['admin_error'] = "Image already exists";
							header("location:../admin/dashboard.php?imageAlreadyExists");
							exit();
						}
						else
						{
							// check if branch is already exist or not 
							$sql = "SELECT * FROM branches WHERE Branch = '$branch'";
							$result = mysqli_query($conn,$sql);
							$resultCheck = mysqli_num_rows($result);
							if($resultCheck > 0)
							{
								$_SESSION['admin_error'] = "Branch already exists";
								header("location:../admin/dashboard.php?branchAlreadyExists");
								exit();
							}
							else
							{
								if(move_uploaded_file($_FILES["branch_logo"]["tmp_name"], "../images/branch_logo/".$ofile))
								{
									//echo "Success";
									// now insert into database
									$sql = "INSERT INTO branches (Branch, Pic, status)
										VALUES ('$branch','$ofile','$status')";
									if(mysqli_query($conn,$sql)) 
									{
										$_SESSION['admin_error'] = "Branch Added Successfully.";
										header("location:../admin/dashboard.php?addedSuccessfully");
										exit();
									}
									else
									{
										$_SESSION['admin_error'] = "Unable to add branch..try again.";
										header("location:../admin/dashboard.php?errorOccured");
										exit();
									}
								}
								else
								{
									$_SESSION['admin_error'] = "Something went wrong..try again";
									header("location:../admin/dashboard.php?errorOccured");
									exit();
								}
							}
						}
					}
				}
				else
				{
					$_SESSION['admin_error'] = "Invalid file extension..only jpg,png are allowed";
					header("location:../admin/dashboard.php?InvalidExtension");
					exit();
					//echo "Invalid extension";
				}
			}
			else
			{
				$_SESSION['admin_error'] = "File size is too large";
				header("location:../admin/dashboard.php?FileSizeTooLarge");
				exit();
				//echo "File size too large";
			}
		}
		else
		{
			$_SESSION['admin_error'] = "Do attach a file";
			header("location:../admin/dashboard.php?attachFile");
			exit();
		}
	}
}
function getRand()
	{
		$str = str_shuffle("abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789");
		return md5(@crypt(sha1(substr($str,0,20),true)));
	}
?>



