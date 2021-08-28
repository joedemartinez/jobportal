<?php
	include '../includes/session.php';

	if(isset($_GET['id'])){
		
		if (!isset($_SESSION['email'])) {
			$_SESSION['message'] = 'Please Log In to Save Job';
			$_SESSION['messagetype'] = 'warning';
			header('location: ../login.php');
			exit();
		}
		else {
			$id_jobpost = $_GET['id'];
			$id_user = $_SESSION['id_user'];
			$createdat = date("Y-m-d h:i:s");

			$sql = "INSERT INTO saved_jobposts (id_jobpost, id_user, createdat) VALUES ('$id_jobpost', '$id_user', '$createdat')";

			if($query = $conn->query($sql)){
	            $_SESSION['message'] = 'Job Saved Successfully';
				$_SESSION['messagetype'] = 'success';
				header('location: ../jobDetails.php?key='.md5($id_jobpost).'&id='.$id_jobpost.'');
				exit();
	         }else  {  
	         	$_SESSION['message'] = $conn->error;
				$_SESSION['messagetype'] = 'warning';
				header('location: ../login.php');
				exit(); 
	        }
		}
	}

?>