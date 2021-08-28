<?php
	include '../includes/session.php';

	if(isset($_POST['email'])){
		$email = $_POST['email'];
    $acctype = $_POST['acctype'];

    //getting role id
    if ($acctype === "Applicant") {
      $acctype = 1;
    }else $acctype = 2;

    if ($acctype == 1) {
		  $sql = "SELECT * FROM users WHERE email='$email'";
    }else{
      $sql = "SELECT * FROM company WHERE email='$email'";
    }
		$query = $conn->query($sql);

		if($query->num_rows > 0){
        echo '<div class="notification warning">
          <p>Email Address Already Exits!! Please Login.!</p>
        </div>';
     }else  {  
     echo '<div class="notification success">
        <p>Email Address Is Available For Use!! Please Proceed.!</p>
      </div>';  
    }
	}

?>