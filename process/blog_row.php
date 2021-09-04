<?php 
	include '../includes/session.php';

	if(isset($_POST['id']) && isset($_POST['name'])){
        	$blog_id = $_POST['id'];

            //view
            if($_POST['name'] == 'view'){
            	$sql = "SELECT * FROM blogs WHERE id='$blog_id'";
            	$query = $conn->query($sql);
            	$row = $query->fetch_assoc();

    		// getting other fields
                    $industry = $conn->query("SELECT name FROM industry WHERE id = '$row[industry_id]'");
                    $company = $conn->query("SELECT companyname FROM company WHERE id_company = '$row[createdby]'");

                    // fetching row
                    $industry = $industry->fetch_row();
                    $company = $company->fetch_row();

                    //adding to results
                    $row['industry'] = $industry[0];
                    $row['company'] = $company[0];

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