<?php
	include '../includes/session.php';

	if(isset($_POST['myPic'])){
		$email = $_SESSION['email'];
		$profile_pic = $_FILES['picture']['name'];

		//hash email 
		$hash = md5($email);
		$filename = $hash.$profile_pic;

		if($profile_pic != ''){
			if(move_uploaded_file($_FILES['picture']['tmp_name'], '../assets/images/'.$filename)){
				$sql = "UPDATE users SET profile_pic = '$filename' WHERE email = '$email'";
			 	if($conn->query($sql)){
			 		$_SESSION['message'] = 'Profile picture updated successfully';
			 		$_SESSION['messagetype'] = 'success';
			 	}
			 	else{
			 		$_SESSION['message'] = $conn->error;
			 		$_SESSION['messagetype'] = 'warning';
			 	}
			}else{
				$_SESSION['message'] = "There was an error, file couldn't be uploaded";
			 	$_SESSION['messagetype'] = 'warning';
			}	
		}
	
	}

	if(isset($_POST['thePic'])){
		$email = $_SESSION['email'];
		$profile_pic = $_FILES['picture']['name'];

		//hash email 
		$hash = md5($email);
		$filename = $hash.$profile_pic;

		if($profile_pic != ''){
			if(move_uploaded_file($_FILES['picture']['tmp_name'], '../assets/images/'.$filename)){
				$sql = "UPDATE company SET profile_pic = '$filename' WHERE email = '$email'";
			 	if($conn->query($sql)){
			 		$_SESSION['message'] = 'Profile picture updated successfully';
			 		$_SESSION['messagetype'] = 'success';
			 	}
			 	else{
			 		$_SESSION['message'] = $conn->error;
			 		$_SESSION['messagetype'] = 'warning';
			 	}
			}else{
				$_SESSION['message'] = "There was an error, file couldn't be uploaded";
			 	$_SESSION['messagetype'] = 'warning';
			}	
		}
	
	}

	if(isset($_POST['aPic'])){
		$email = $_SESSION['email'];
		$profile_pic = $_FILES['picture']['name'];

		//hash email 
		$hash = md5($email);
		$filename = $hash.$profile_pic;

		if($profile_pic != ''){
			if(move_uploaded_file($_FILES['picture']['tmp_name'], '../assets/images/'.$filename)){
				$sql = "UPDATE admin SET profile_pic = '$filename' WHERE email = '$email'";
			 	if($conn->query($sql)){
			 		$_SESSION['message'] = 'Profile picture updated successfully';
			 		$_SESSION['messagetype'] = 'success';
			 	}
			 	else{
			 		$_SESSION['message'] = $conn->error;
			 		$_SESSION['messagetype'] = 'warning';
			 	}
			}else{
				$_SESSION['message'] = "There was an error, file couldn't be uploaded";
			 	$_SESSION['messagetype'] = 'warning';
			}	
		}
	
	}

	
	header('location: ../dashboard/myProfile.php');
	exit();

?>