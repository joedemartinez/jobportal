<?php
	include '../includes/session.php';
	//login button clicked
	if(isset($_POST['loginbtn'])){
		$email = $_POST['email'];
		$password = $_POST['password'];
		$acctype = $_POST['acctype'];

		//getting role id
        if ($acctype === "Applicant") {
        	$acctype = 1;
        }elseif ($acctype === "Employer"){
        	$acctype = 2;
        }else{
        	$acctype = 3;
        }

        //if it does not exist... register user
    	if ($acctype == 1) {
    		$sql = "SELECT * FROM users WHERE email = '$email' AND active = '1'"; 
    	}elseif ($acctype == 2){
    		$sql = "SELECT * FROM company WHERE email = '$email' AND active = '1'"; 
    	}else{
    		$sql = "SELECT * FROM admin WHERE email = '$email' AND active = '1'"; 
    	}

		
		$query = $conn->query($sql);


		if($query->num_rows < 1){
			$_SESSION['message'] = 'Cannot find account with this details - Check if email has been verified';
			$_SESSION['messagetype'] = 'warning';
			if ($acctype == 3) {
				header('location: ../aLogin.php');
			}else{
				header('location: ../login.php');
			}
			exit();
		}
		else{
			$row = $query->fetch_assoc();
			if(password_verify($password, $row['password']) && $row['email'] == $email){

				$_SESSION['email'] = $row['email'];
				$_SESSION['role_id'] = $row['role_id'];
				$_SESSION['lastActive'] = time();

				//if a jobseeker
				if($row['role_id'] == 1):
				$_SESSION['id_user'] = $row['id_user'];
					//if profile details are yet to be updated
					if ($row['headline'] == '' || $row['contactno']==''  || $row['dob']==''  || $row['gender']==''  || $row['state_id']==''  || $row['city_id']==''  || $row['address']==''  || $row['career_id']==''  || $row['education_id']=='' ) {
						$_SESSION['message'] = 'You have logged in successfully. Click on Edit Details to update your profile.';
						$_SESSION['messagetype'] = 'success';
						header('location: ../dashboard/myProfile.php');
						exit();
					}else{
						$_SESSION['message'] = 'You have logged in successfully';
						$_SESSION['messagetype'] = 'success';
						header('location: ../dashboard/dashboard.php');
						exit();
					}
				endif;
				//if a company
				if($row['role_id'] == 2):
				$_SESSION['id_company'] = $row['id_company'];
					//if profile details are yet to be updated
					if ($row['aboutme'] =='' || $row['industry_id']==''  || $row['contactno']==''  || $row['esta_date'] =='' || $row['empno']==''  || $row['state_id'] =='' || $row['city_id']==''  || $row['address']=='' ) {
						$_SESSION['message'] = 'You have logged in successfully. Click on Edit Details to update your profile..';
						$_SESSION['messagetype'] = 'success';
						header('location: ../dashboard/myProfile.php');
						exit();
					}else{
						$_SESSION['message'] = 'You have logged in successfully';
						$_SESSION['messagetype'] = 'success';
						header('location: ../dashboard/dashboard.php');
						exit();
					}
				endif;

				//if an admin
				if($row['role_id'] == 3):
				$_SESSION['id_admin'] = $row['id_admin'];
					//if profile details are yet to be updated
					if ($row['fullname'] ==''  || $row['gender']==''  || $row['dob'] =='' || $row['address']=='' ) {
						$_SESSION['message'] = 'You have logged in successfully. Click on Edit Details to update your profile..';
						$_SESSION['messagetype'] = 'success';
						header('location: ../dashboard/myProfile.php');
						exit();
					}else{
						$_SESSION['message'] = 'You have logged in successfully';
						$_SESSION['messagetype'] = 'success';
						header('location: ../dashboard/dashboard.php');
						exit();
					}
				endif;
			}
			else{
				$_SESSION['message'] = 'Email or Password is Incorrect!';
				$_SESSION['messagetype'] = 'warning';
				if ($acctype == 3) {
					header('location: ../aLogin.php');
				}else{
					header('location: ../login.php');
				}
				exit();
			}
		}
	}
	else{
		$_SESSION['message'] = 'Email or Password is Incorrect!';
		$_SESSION['messagetype'] = 'warning';
		if ($acctype == 3) {
			header('location: ../aLogin.php');
		}else{
			header('location: ../login.php');
		}
		exit();
	}
?>