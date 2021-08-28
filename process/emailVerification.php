<?php
	include '../includes/session.php';
	//login button clicked
	if(isset($_GET['token'])){
		$token = $_GET['token'];
		$email = $_GET['email'];

		$sql = "SELECT * FROM users WHERE email = '$email' AND hash = '$token'";
		$query = $conn->query($sql);


		if($query->num_rows < 1){
			$_SESSION['message'] = 'Registration not 
			Successful! Try Again';
			$_SESSION['messagetype'] = 'warning';
		}
		else{
			$row = $query->fetch_assoc();
			if($row['active'] == '0'){
				$sql1 = "UPDATE users SET active='1' WHERE email='$email' AND hash='$token'";
				if($conn->query($sql1)) {
					$_SESSION['message'] = 'Email Confirmation Successful';
					$_SESSION['messagetype'] = 'success';
				}
			}
			else{
				$_SESSION['message'] = 'Email Address has Already been Verified, Please Login';
				$_SESSION['messagetype'] = 'success';
			}
		}
	}
	else{
		$_SESSION['message'] = 'Error Occurred - Email Confirmation';
		$_SESSION['messagetype'] = 'warning';
	}

	header('location: ../login.php');
	exit();
?>