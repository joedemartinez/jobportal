<?php
	include '../includes/session.php';
	require '../phpmailer/PHPMailerAutoload.php';


	if(isset($_POST['submitJob'])){
		$id_company = $_SESSION['id_company'];
		$jobtitle = $_POST['jobtitle'];
		$industry = $_POST['industry'];
		$job_type = $_POST['job_type'];
		$experience = $_POST['experience'];
		$state_id = $_POST['state'];
		$city_id = $_POST['city'];
		$minimumsalary = $_POST['minimumsalary'];
		$maximumsalary = $_POST['maximumsalary'];
		$skills_ability = $_POST['skills'];
		$description = $_POST['description'];
		$responsibility = $_POST['responsibility'];
		$edu_qualification = $_POST['edu_qualification'];
		$deadline = $_POST['deadline'];


		$sql = "INSERT INTO job_post (id_company, jobtitle, industry_id, job_status, description, minimumsalary, maximumsalary, state_id, city_id, experience, skills_ability, edu_qualification, responsibility, deadline) VALUES ('$id_company', '$jobtitle', '$industry', '$job_type', '$description', '$minimumsalary', '$maximumsalary', '$state_id', '$city_id', '$experience', '$skills_ability', '$edu_qualification', '$responsibility', '$deadline')";

		if($conn->query($sql)){
			//check if user resume is uploaded
	        $company = $conn->query("SELECT companyname,email FROM company WHERE id_company = '$id_company'");
	        $company = $company->fetch_row();

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
            $mail->addAddress($company[1], $company[0]);
            $mail->isHTML(true);
            $mail->Subject = 'CAREER PATHWAY - New Job Post';
            $mail->Body = '
                    <p>Hi '.$company[0].',</p>
                    <p>Your new job post titled,'.$jobtitle.', has been posted successfully</p>
                  ';
            $mail->send();

			$_SESSION['message'] = 'New Job Posted Successfully!!!';
			$_SESSION['messagetype'] = 'success';
			header('location: ../dashboard/manageJobs.php');
			exit();
		}
		else{
			$_SESSION['message'] = $conn->error;
			$_SESSION['messagetype'] = 'warning';
			header('location: ../dashboard/addJob.php');
			exit();
		}
	}

	header('location: ../dashboard/addJob.php');
	exit();

?>