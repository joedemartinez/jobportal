<?php 
	include '../includes/session.php';
    require '../phpmailer/PHPMailerAutoload.php';

	if(isset($_POST['id']) && isset($_POST['name'])){
        	$jid = $_POST['id'];
            $jid = explode(",", $jid);
            $id = $jid[0];
            $id_company = $jid[1];


                //view
                if($_POST['name'] == 'view'){
                	$sql = "SELECT * FROM job_post WHERE id_jobpost='$id'";
                	$query = $conn->query($sql);
                	$row = $query->fetch_assoc();

        		// getting other fields
                        $industry = $conn->query("SELECT name FROM industry WHERE id = '$row[industry_id]'");
                        $company = $conn->query("SELECT companyname FROM company WHERE id_company = '$row[id_company]'");
                        $jobtype = $conn->query("SELECT type FROM job_type WHERE id = '$row[job_status]'");
                        $state = $conn->query("SELECT name FROM states WHERE id = '$row[state_id]'");
                        $city = $conn->query("SELECT name FROM cities WHERE id = '$row[city_id]'");

                        // fetching row
                        $jobtype = $jobtype->fetch_row();
                        $state = $state->fetch_row();
                        $city = $city->fetch_row();
                        $industry = $industry->fetch_row();
                        $company = $company->fetch_row();

                        //adding to results
                        $row['jobtype'] = $jobtype[0];
                        $row['state'] = $state[0];
                        $row['city'] = $city[0];
                        $row['industry'] = $industry[0];
                        $row['company'] = $company[0];

                	echo json_encode($row);
                }
                //apply
                if($_POST['name'] == 'apply'){
                        $id_user = $_SESSION['id_user'];
                        $createdat = date("Y-m-d h:i:s");

                        $fullname = $conn->query("SELECT fullname, resume, email FROM users WHERE id_user = '$id_user'");
                        $fullname = $fullname->fetch_row();

                        if ($fullname[1] == '') {
                          $_SESSION['message'] = 'Please upload your resume first!!!';
                          $_SESSION['messagetype'] = 'warning';

                          $row = array("refresh"=>"Yes");
                          echo json_encode($row);
                        }else{

                                $sql = "INSERT INTO applied_jobposts (id_jobpost, id_user, id_company, createdat) VALUES ('$id', '$id_user', '$id_company', '$createdat')";
                                $query = $conn->query($sql);

                                //get job title
                                $job = $conn->query("SELECT jobtitle FROM job_post WHERE id_jobpost = '$id_jobpost'");
                                $job = $job->fetch_row();
                                //get company name
                                $company = $conn->query("SELECT companyname FROM company WHERE id_company = '$id_company'");
                                $company = $company->fetch_row();

                               // sending email 
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
                                    $mail->addAddress($fullname[2], $fullname[0]);
                                    $mail->isHTML(true);
                                    $mail->Subject = 'CAREER PATHWAY - Job Application';
                                    $mail->Body = '
                                            <p>Hi '.$resume[1].',</p>
                                            <p>You have applied for '.$job[0].' at '.$company[0].'. Your job application has been processed and forwarded</p>
                                            <img src="../assets/images/logo.png" >
                                          ';
                                    $mail->send();


                                $_SESSION['message'] = 'Job Application Successful!!!';
                                $_SESSION['messagetype'] = 'success';

                                $row = array("apply"=>"Yes");
                                echo json_encode($row);
                                

                        }
                        // $row = array("apply"=>"Yes");
                        // echo json_encode($row);
                }
                //delete saved job for jobseekers
                if($_POST['name'] == 'delete'){
                        $sql = "DELETE FROM saved_jobposts WHERE id_jobpost='$id'";
                        $query = $conn->query($sql);

                        $_SESSION['message'] = 'Job Post Deleted!!!';
                        $_SESSION['messagetype'] = 'warning';

                        $row = array("refresh"=>"Yes");
                        echo json_encode($row);
                }

                //delete for employers
                if($_POST['name'] == 'deleteJob'){
                        $sql = "DELETE FROM job_post WHERE id_jobpost='$id'";
                        $query = $conn->query($sql);

                        $_SESSION['message'] = 'Job Post Deleted!!!';
                        $_SESSION['messagetype'] = 'warning';

                        $row = array("refresh"=>"Yes");
                        echo json_encode($row);
                }
    }

?>