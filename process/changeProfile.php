<?php
	include '../includes/session.php';

	if(isset($_POST['myProfile'])){
		$fullname = $_POST['fullname'];
		$email = $_SESSION['email'];
		$aboutme = $_POST['aboutme'];
		$headline = $_POST['headline'];
		$phoneno = $_POST['phoneno'];
		$dob = $_POST['dob'];
		$gender = $_POST['gender'];
		$region = $_POST['region'];
		$city = $_POST['city'];
		$address = $_POST['address'];
		$career = $_POST['career'];
		$education = $_POST['education'];
		$skills = $_POST['skills'];


		$sql = "UPDATE users SET fullname='$fullname',email='$email',address='$address',headline='$headline',city_id='$city',state_id='$region',contactno='$phoneno', career_id='$career', education_id='$education',dob='$dob',aboutme='$aboutme',skills='$skills',gender='$gender' WHERE email = '$email'";
	 	if($conn->query($sql)){
	 		$_SESSION['message'] = 'Profile Updated successfully!!';
	 		$_SESSION['messagetype'] = 'success';
	 	}
	 	else{
	 		$_SESSION['message'] = $conn->error;
	 		$_SESSION['messagetype'] = 'warning';
	 	}
	}

	if(isset($_POST['theProfile'])){
		$companyname = $_POST['companyname'];
		$email = $_SESSION['email'];
		$aboutme = $_POST['aboutme'];
		$industry = $_POST['industry'];
		$phoneno = $_POST['contactno'];
		$website = $_POST['website'];
		$esta_date = $_POST['esta_date'];
		$region = $_POST['region'];
		$city = $_POST['city'];
		$empno = $_POST['empno'];
		$address = $_POST['address'];


		$sql = "UPDATE company SET industry_id='$industry',companyname='$companyname',address='$address',state_id='$region',city_id='$city',contactno='$phoneno',website='$website',email='$email',aboutme='$aboutme',esta_date='$esta_date',empno='$empno' WHERE email = '$email'";
	 	if($conn->query($sql)){
	 		$_SESSION['message'] = 'Profile Updated successfully!!';
	 		$_SESSION['messagetype'] = 'success';
	 	}
	 	else{
	 		$_SESSION['message'] = $conn->error;
	 		$_SESSION['messagetype'] = 'warning';
	 	}
	}

	if(isset($_POST['aProfile'])){
		$fullname = $_POST['fullname'];
		$email = $_SESSION['email'];
		$phoneno = $_POST['phoneno'];
		$dob = $_POST['dob'];
		$gender = $_POST['gender'];
		$address = $_POST['address'];


		$sql = "UPDATE admin SET fullname='$fullname',email='$email',address='$address',contactno='$phoneno',dob='$dob',gender='$gender' WHERE email = '$email'";
	 	if($conn->query($sql)){
	 		$_SESSION['message'] = 'Profile Updated successfully!!';
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