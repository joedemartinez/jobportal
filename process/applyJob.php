<?php
	include '../includes/session.php';
  require '../phpmailer/PHPMailerAutoload.php';

	if(isset($_GET['id']) && isset($_GET['cid'])){
    
    if (!isset($_SESSION['email'])) {
      $_SESSION['message'] = 'Please Log In to Apply Job';
      $_SESSION['messagetype'] = 'warning';
      header('location: ../login.php');
      exit();
    }else {
      $id_jobpost = $_GET['id'];
      $id_company = $_GET['cid'];
      $id_user = $_SESSION['id_user'];
      $createdat = date("Y-m-d h:i:s");


        //check if user resume is uploaded
        $resume = $conn->query("SELECT resume, fullname, email FROM users WHERE id_user = '$id_user'");
        $resume = $resume->fetch_row();
        // check if user resume is uploaded
        if ($resume[0] == '') {
          $_SESSION['message'] = 'Please upload your resume first!!!';
          $_SESSION['messagetype'] = 'warning';

          header('location: ../dashboard/myResume.php');
          exit();
        }
        else{

          $sql = "INSERT INTO applied_jobposts (id_jobpost, id_user, id_company, createdat) VALUES ('$id_jobpost', '$id_user', '$id_company', '$createdat')"; 

          if($query = $conn->query($sql)){
            $_SESSION['message'] = 'Successful!!!';
            $_SESSION['messagetype'] = 'success';

            //get job title
            $job = $conn->query("SELECT jobtitle FROM job_post WHERE id_jobpost = '$id_jobpost'");
            $job = $job->fetch_row();
            //get company name
            $company = $conn->query("SELECT companyname FROM company WHERE id_company = '$id_company'");
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
            $mail->addAddress($resume[2], $resume[1]);
            $mail->isHTML(true);
            $mail->Subject = 'CAREER PATHWAY - Job Application';
            $mail->Body = '
                    <p>Hi '.$resume[1].',</p>
                    <p>You have applied for '.$job[0].' at '.$company[0].'. Your job application has been processed and forwarded</p>
                    <img src="../assets/images/logo.png" >
                  ';
            $mail->send();

            header('location: ../jobDetails.php?key='.md5($id_jobpost).'&id='.$id_jobpost.'');
            exit();
          }
          else{  
            $_SESSION['message'] = $conn->error;
            $_SESSION['messagetype'] = 'warning';
            header('location: ../login.php');
            exit(); 
          }
        }
    } 
	}

?>