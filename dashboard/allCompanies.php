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
                <h3>All Companies/Employers</h3>
              </div>
              <div class="content with-padding padding-bottom-10">
                <div>
                  <table id="example2" class="table table-bordered">
                    <thead>
                      <th>#</th>
                      <th>Logo</th>
                      <th>Company Name</th>
                      <th>Industry</th>
                      <th>Telephone</th>
                      <th>Website</th>
                      <th>Region</th>
                      <th>City</th>
                      <th>Address</th>
                      <th>Action</th>
                    </thead>
                    <tbody>
                        <?php
                          $sql =  "SELECT * FROM company ORDER BY id_company DESC";
                          $query = $conn->query($sql);
                         //id auto increament in tables initiation
                          $i = 1;
                          while($row = $query->fetch_assoc()){
                            //getting other detaills
                            $company_id = $row['id_company'];
                            //city
                            $city_id = $row['city_id'];
                            $city_id = $conn->query("SELECT name FROM cities WHERE id = '$city_id'");
                            $city_id = $city_id->fetch_row();

                            //region
                            $state_id = $row['state_id'];
                            $state_id = $conn->query("SELECT name FROM states WHERE id = '$state_id'");
                            $state_id = $state_id->fetch_row();

                            // industry
                            $industry = $row['industry_id'];
                            $industry = $conn->query("SELECT name FROM industry WHERE id = '$industry'");
                            $industry = $industry->fetch_row();
                                
                            echo "
                              <tr>
                                <td>". $i."</td>
                                <td><img height='50' width='50' src='../assets/images/".$row['profile_pic']."'></td>
                                <td>".$row['companyname']."</td>
                                <td>".$industry[0]."</td>
                                <td>".$row['contactno']."</td>
                                <td>".$row['website']."</td>
                                <td>".$state_id[0]."</td>
                                <td>".$city_id[0]."</td>
                                <td>".$row['address']."</td>
                                <td><a class='button green ripple-effect ico view popup-with-zoom-anim' href='#' data-id=".$company_id." title='View' data-tippy-placement='top'><i class='icon-feather-eye'></i></a>
                                <a href='#' class='button red ripple-effect ico delete' data-id='".$company_id."' onclick='return confirm('Do you want to delete this job post?')' title='Remove' data-tippy-placement='top'><i class='icon-feather-trash-2'></i></a> 
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
<!-- <?php include '../modals/viewJob.php' ?> -->
<!-- Edit View Popup / End --> 

<!-- Scripts -->
<?php include '../includes/dashboardScripts.php' ?>

<script>

//view
$(document).on("click", ".view", function(e){
    e.preventDefault();
    var id = $(this).data('id');
    var name = "view";
    // getRow(id, name);
    
}); 

function getRow(id, name){
  $.ajax({
    type: 'POST',
    url: '../process/jobpost_row.php',
    data: {id:id, name:name},
    dataType: 'json',
    success: function(response){
        // view
        $('#jobtitle_header').html(response.jobtitle);
        $('#jobdescription').html(response.description);
        $('#skills').html(response.skills_ability);
        $('#responsibility').html(response.responsibility);
        $('#salary').html('GH₵'+response.minimumsalary+' - GH₵'+response.maximumsalary);
        $('#industry').html(response.industry);
        $('#createdat').html(response.createdat);
        $('#edu_qualification').html(response.edu_qualification);
        $('#id_company').html(response.company);
        $('#experience').html(response.experience+" Years");
        $('#job_status').html(response.jobtype);
        $('#location').html(response.state+" - "+response.city);
        $('#deadline').html(response.deadline);
    }
  });
}


</script>

</body>
</html>