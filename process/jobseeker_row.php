<?php 
	include '../includes/session.php';

	if(isset($_POST['id']) && isset($_POST['name'])){
        	$user_id = $_POST['id'];

            //view
            if($_POST['name'] == 'view'){
            	$sql = "SELECT * FROM users WHERE id_user='$user_id'";
            	$query = $conn->query($sql);
            	$row = $query->fetch_assoc();

    		// getting other fields
                    $industry = $conn->query("SELECT name FROM industry WHERE id = '$row[career_id]'");
                    $education = $conn->query("SELECT name FROM education WHERE id = '$row[education_id]'");
                    $state = $conn->query("SELECT name FROM states WHERE id = '$row[state_id]'");
                    $city = $conn->query("SELECT name FROM cities WHERE id = '$row[city_id]'");


                    // fetching row
                    $industry = $industry->fetch_row();
                    $education = $education->fetch_row();
                    $state = $state->fetch_row();
                    $city = $city->fetch_row();

                    //adding to results
                    $row['industry'] = $industry[0];
                    $row['education'] = $education[0];
                    $row['state_id'] = $state[0];
                    $row['city_id'] = $city[0];

            	echo json_encode($row);
            }

                //delete 
                // if($_POST['name'] == 'deleteJob'){
                //         $sql = "DELETE FROM job_post WHERE id_jobpost='$id'";
                //         $query = $conn->query($sql);

                //         $_SESSION['message'] = 'Job Post Deleted!!!';
                //         $_SESSION['messagetype'] = 'warning';

                //         $row = array("refresh"=>"Yes");
                //         echo json_encode($row);
                // }
    }

?>