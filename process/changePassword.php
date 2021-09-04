<?php
	include '../includes/session.php';

	if(isset($_POST['myPassword'])){ //job seeker
		$email = $_SESSION['email'];
		$newPassword = $_POST['newPassword'];
	    // $confirmPassword = $_POST['confirmPassword'];
	    
	    $password = password_hash($newPassword, PASSWORD_DEFAULT);

	    $sql = "UPDATE users SET password = '$password' WHERE email = '$email'";
	 	if($conn->query($sql)){
	 		$_SESSION['message'] = 'Password changed successfully!!';
	 		$_SESSION['messagetype'] = 'success';
	 	}
	 	else{
	 		$_SESSION['message'] = $conn->error;
	 		$_SESSION['messagetype'] = 'warning';
	 	}
	}

	if(isset($_POST['thePassword'])){ //employer
		$email = $_SESSION['email'];
		$newPassword = $_POST['newPassword'];
	    // $confirmPassword = $_POST['confirmPassword'];
	    
	    $password = password_hash($newPassword, PASSWORD_DEFAULT);

	    $sql = "UPDATE company SET password = '$password' WHERE email = '$email'";
	 	if($conn->query($sql)){
	 		$_SESSION['message'] = 'Password changed successfully!!';
	 		$_SESSION['messagetype'] = 'success';
	 	}
	 	else{
	 		$_SESSION['message'] = $conn->error;
	 		$_SESSION['messagetype'] = 'warning';
	 	}
	}

	if(isset($_POST['aPassword'])){ //admin
		$email = $_SESSION['email'];
		$newPassword = $_POST['newPassword'];
	    // $confirmPassword = $_POST['confirmPassword'];
	    
	    $password = password_hash($newPassword, PASSWORD_DEFAULT);

	    $sql = "UPDATE admin SET password = '$password' WHERE email = '$email'";
	 	if($conn->query($sql)){
	 		$_SESSION['message'] = 'Password changed successfully!!';
	 		$_SESSION['messagetype'] = 'success';
	 	}
	 	else{
	 		$_SESSION['message'] = $conn->error;
	 		$_SESSION['messagetype'] = 'warning';
	 	}
	}

	header('location: ../dashboard/myProfile.php');
	exit();

?>