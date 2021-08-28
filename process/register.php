<?php
	include '../includes/session.php';
	require '../phpmailer/PHPMailerAutoload.php';

	// when register btn is clicked
	if(isset($_POST['registerbtn'])){
		$fullname = $_POST['fullname'];
		$email = $_POST['email'];
		$acctype = $_POST['acctype'];
		$password = $_POST['password'];
		$password = password_hash($password, PASSWORD_DEFAULT);
		// $passwordrepeat = $_POST['passwordrepeat'];
		// $passwordrepeat = password_hash($passwordrepeat, PASSWORD_DEFAULT);
        $createdat = date('Y-m-d');
        //generate hash
		$hash = md5($password);

        //getting role id
        if ($acctype === "Applicant") { 
        	$acctype = 1;
        }else $acctype = 2;

        //checking if email already exists
        if ($acctype == 1) {
        $sql = "SELECT * FROM users WHERE email='$email'";
        }else{
        	$sql = "SELECT * FROM company WHERE email='$email'";
        }
		$query = $conn->query($sql);
		if($query->num_rows > 0){
            $_SESSION['message'] = 'Email Address Already Exits!! Please Login.!';
            $_SESSION['messagetype'] = 'warning'; 
            header('location: ../register.php');
            exit();
         }
        else{ 
        	//if it does not exist... register user
        	if ($acctype == 1) {
        		$sql = "INSERT INTO users (fullname, email, role_id, password, hash, createdat) VALUES ('$fullname', '$email', '$acctype', '$password', '$hash', '$createdat')";
        	}else{
        		$sql = "INSERT INTO company (companyname, email, role_id, password, hash, createdat) VALUES ('$fullname', '$email', '$acctype', '$password', '$hash', '$createdat')";
        	}
        	 

        	if($conn->query($sql)){
				$_SESSION['message'] = 'Registration Complete!! Please check your Email Inbox or Spam to confirm your email address before Login';
				$_SESSION['messagetype'] = 'success';

				//sending email 
				$mail = new PHPMailer();

				$mail->isSMTP();
				$mail->Host = "smtp.gmail.com";
				$mail->SMTPDebug = 2;
				$mail->Debugoutput = 'html';
				$mail->SMTPSecure = "tls";
				$mail->Port = 587;
				$mail->SMTPAuth = true;
				$mail->SMTPOptions = array(
				    'ssl' => array(
				        'verify_peer' => false,
				        'verify_peer_name' => false,
				        'allow_self_signed' => true
				    )
				);
				$mail->Username = 'careerpathway.co@gmail.com';
				$mail->Password = 'P@$$w0rd11';

				$mail->setFrom('careerpathway.co@gmail.com', 'Career Pathway');
				$mail->addAddress($email, $fullname);
				$mail->isHTML(true);
				$mail->Subject = 'CAREER PATHWAY - Email Address Confirmation';
				$mail->Body = '
								<p>Hi '.$fullname.',</p>
								<p>Thank you for registering your account. To finally activate your account please click the following link.</p>
								<p>Click The Link Below To Confirm your email address</p>
								<a href="127.0.0.1/JobPortal/process/emailVerification.php?token='.$hash.'&email='.$email.'">127.0.0.1/JobPortal/process/emailVerification.php?token='.$hash.'&email='.$email.'</a>
								<p>If clicking the link does not work, you can copy the link into your browser window or type it there directly.</p>
								<p><strong>NOTE:</strong> Ignore the E-Mail if the request to activate your account does not come from you.</p>
                                <img src="../assets/images/logo.png" >
							';
				$mail->send();

				header('location: ../login.php');
				exit();
			}
			else{
				$_SESSION['message'] = $conn->error;
				$_SESSION['messagetype'] = 'warning';
				header('location: ../register.php');
				exit();
			}
        }
	}	
	else{
		$_SESSION['message'] = 'Fill all information';
		$_SESSION['messagetype'] = 'warning';
		header('location: ../register.php');
		exit();
	}
?>