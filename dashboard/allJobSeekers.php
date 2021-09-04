<!-- Session -->
<?php include '../includes/session.php'; ?>
<!-- Session ends -->
<!-- Header -->
<?php include '../includes/dashboardHeader.php'; ?>
<!-- Header end -->

<!-- account type -->
<?php include '../includes/adminDashboard.php'; ?>
<body>
<!--Loader-->
<?php include '../includes/loader.php'; ?>
<!-- Loader end -->


<!-- Wrapper -->
<div id="wrapper"> 
  <!-- Header Container -->
  <?php include '../includes/dashboardNavbar.php' ?> 
  <!-- Header Container / End --> 
  
  <!-- Dashboard Container -->
  <div class="utf-dashboard-container-aera"> 
    <!-- Dashboard Sidebar -->
    <?php include '../includes/dashboardSidebar.php' ?>
    <!-- Dashboard Sidebar / End --> 
    
    <!-- Dashboard Content -->
    <div class="utf-dashboard-content-container-aera" data-simplebar>


	  <div class="utf-dashboard-content-inner-aera">   
	  <!-- error message  -->
    <?php include '../includes/errorMessage.php' ?>
    

    <div class="row"> 
      <div class="col-xl-12">
            <div class="dashboard-box"> 
              <div class="headline">
                <h3>All Job Seekers</h3>
              </div>
              <div class="content with-padding padding-bottom-10">
                <div>
                  <table id="example2" class="table table-bordered">
                    <thead>
                      <th>#</th>
                      <th>Profile Pic</th>
                      <th>Fullname</th>
                      <th>Gender</th>
                      <th>Telephone</th>
                      <th>Education</th>
                      <th>Region</th>
                      <th>City</th>
                      <th>Address</th>
                      <th>Action</th>
                    </thead>
                    <tbody>
                        <?php
                          $sql =  "SELECT * FROM users ORDER BY id_user DESC";
                          $query = $conn->query($sql);
                         //id auto increament in tables initiation
                          $i = 1;
                          while($row = $query->fetch_assoc()){
                            //getting other detaills
                            $id_user = $row['id_user'];
                            //city
                            $city_id = $row['city_id'];
                            $city_id = $conn->query("SELECT name FROM cities WHERE id = '$city_id'");
                            $city_id = $city_id->fetch_row();

                            //region
                            $state_id = $row['state_id'];
                            $state_id = $conn->query("SELECT name FROM states WHERE id = '$state_id'");
                            $state_id = $state_id->fetch_row();

                            // education
                            $education = $row['education_id'];
                            $education = $conn->query("SELECT name FROM education WHERE id = '$education'");
                            $education = $education->fetch_row();
                                
                            echo "
                              <tr>
                                <td>". $i."</td>
                                <td><img height='50' width='50' src='../assets/images/".$row['profile_pic']."'></td>
                                <td>".$row['fullname']."</td>
                                <td>".$row['gender']."</td>
                                <td>".$row['contactno']."</td>
                                <td>".$education[0]."</td>
                                <td>".$state_id[0]."</td>
                                <td>".$city_id[0]."</td>
                                <td>".$row['address']."</td>
                                <td><a class='button green ripple-effect ico view popup-with-zoom-anim' href='#small-dialog-1' data-id=".$id_user." title='View' data-tippy-placement='top'><i class='icon-feather-eye'></i></a>
                                <a href='#' class='button red ripple-effect ico delete' data-id='".$id_user."' onclick='return confirm('Do you want to delete this job post?')' title='Remove' data-tippy-placement='top'><i class='icon-feather-trash-2'></i></a> 
                                </td>
                                </tr>";
                            $i++;
                          }
                        ?>
                    </tbody>
                  </table>
                </div>
              </div>        
            </div>
          </div>  
        </div>  


        <div class="utf-dashboard-footer-spacer-aera"></div>
        <?php include '../includes/dashboardFooter.php' ?>     
      </div>
    </div>    
	<!-- Dashboard Content End -->
  </div>
</div>
<!-- Wrapper / End --> 

<!-- Edit View Popup -->
<?php include '../modals/viewJobSeeker.php' ?> 
<!-- Edit View Popup / End --> 

<!-- Scripts -->
<?php include '../includes/dashboardScripts.php' ?>

<script>

//view
$(document).on("click", ".view", function(e){
    e.preventDefault();
    var id = $(this).data('id');
    var name = "view";
    getRow(id, name);
    
}); 

function getRow(id, name){
  $.ajax({
    type: 'POST',
    url: '../process/jobseeker_row.php',
    data: {id:id, name:name},
    dataType: 'json',
    success: function(response){
        // view
        $('#fullname').val(response.fullname);
        $('#email').val(response.email);
        $('#aboutme').val(response.aboutme);
        $('#headline').val(response.headline);
        $('#phoneno').val(response.contactno);
        $('#dob').val(response.dob);
        $('#gender').val(response.gender);
        $('#region').val(response.state_id);
        $('#city').val(response.city_id);
        $('#address').val(response.address);
        $('#education').val(response.education);
        $('#career').val(response.industry);
        $('#skills').val(response.skills);
        $('#profile_pic').src('../assets/images/'+response.profile_pic);
    }
  });
}


</script>

</body>
</html>