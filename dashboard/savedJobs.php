<!-- Session -->
<?php include '../includes/session.php'; ?>
<!-- Session ends -->
<!-- Header --> 
<?php include '../includes/dashboardHeader.php'; ?>
<!-- Header end -->

<!-- account type -->
<?php include '../includes/jobseekerDashboard.php'; ?>
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
            <div class="dashboard-box margin-top-0"> 
              <div class="headline">
                <h3>Saved Jobs</h3>
              </div>
              <div class="content">
                <ul class="utf-dashboard-box-list">
                  <!-- getting related job posts -->
                <?php 
                  $id_user = $_SESSION['id_user'];

                  //define total number of results you want per page  
                  $results_per_page = 10;  
                
                  //find the total number of results stored in the database  
                  $query = "SELECT * FROM saved_jobposts WHERE id_user = '$id_user' ORDER BY id_saved DESC";  
                  $result = mysqli_query($conn, $query);  
                  $number_of_result = mysqli_num_rows($result);  
                
                  //determine the total number of pages available  
                  $number_of_page = ceil ($number_of_result / $results_per_page);  
                
                  //determine which page number visitor is currently on  
                  if (!isset ($_GET['page']) ) {  
                      $page = 1;  
                  } else {  
                      $page = $_GET['page'];  
                  }  
                
                  //determine the sql LIMIT starting number for the results on the displaying page  
                  $page_first_result = ($page-1) * $results_per_page; 

                  $sql =  "SELECT * FROM saved_jobposts WHERE id_user = '$id_user' ORDER BY id_saved DESC LIMIT " . $page_first_result . ',' . $results_per_page;
                  $query = $conn->query($sql);
                  while($row = $query->fetch_assoc()){
                    $id_jobpost = $row['id_jobpost'];
                    $job = $conn->query("SELECT jobtitle, job_status, city_id, industry_id, minimumsalary, maximumsalary, createdat, id_company, deadline FROM job_post WHERE id_jobpost = '$id_jobpost'");
                    $job = $job->fetch_row();

                    $city_id = $job[2];
                    $industry = $job[3];
                    $jobtype = $job[1];
                    $profile_pic = $job[7];

                    $location = $conn->query("SELECT name FROM cities WHERE id = '$city_id'");
                    $category = $conn->query("SELECT name FROM industry WHERE id = '$industry'");
                    $profile_pic = $conn->query("SELECT profile_pic FROM company WHERE id_company = '$profile_pic'");
                    $jobtype = $conn->query("SELECT type FROM job_type WHERE id = '$jobtype'");

                    $jobtype = $jobtype->fetch_row();
                    $location = $location->fetch_row();
                    $category = $category->fetch_row();
                    $profile_pic = $profile_pic->fetch_row();
                  ?>
                  <li> 
                    <div class="utf-job-listing">                       
                      <div class="utf-job-listing-details"> 
                        <a href="#" class="utf-job-listing-company-logo"><img src="../assets/images/<?php echo $profile_pic[0] ?>" alt=""></a> 
                        <div class="utf-job-listing-description">
                          <?php  
                            $firstappointment = date_create($job[8] );
                            $now = date_create(date("Y-m-d"));
                            $difference = date_diff($firstappointment, $now); 
                            if ($now > $firstappointment) { 
                              echo '<span class="dashboard-status-button utf-status-item red">Expired</span> '; 
                            } else { 
                              echo '<span class="dashboard-status-button utf-status-item green">Active</span> '; ; 
                            } 
                          ?>
                          <h3 class="utf-job-listing-title"><a href="#"><?php echo $job[0] ?></a><span class="dashboard-status-button green"><i class="icon-material-outline-business-center"></i> <?php echo $jobtype[0] ?></span></h3>                          
                          <div class="utf-job-listing-footer">
                            <ul>
                              <li><i class="icon-feather-briefcase"></i> <?php echo $category[0] ?></li>
                              <li><i class="icon-material-outline-date-range"></i> <?php echo $job[6] ?></li>
                              <li><i class="icon-material-outline-money"></i> GH₵<?php echo $job[4].' - GH₵'.$job[5] ?></li>
                              <li><i class="icon-material-outline-location-on"></i> <?php echo $location[0] ?></li>
                            </ul>
                            <div class="utf-buttons-to-right"> 
                              <a class="button green ripple-effect ico view popup-with-zoom-anim" href="#small-dialog-1" data-id="<?php echo $id_jobpost ?>" title="View" data-tippy-placement="top"><i class="icon-feather-eye"></i>
                              <?php 
                                //already saved
                                $saved = $conn->query("SELECT * FROM applied_jobposts WHERE id_user = '$id_user' AND id_jobpost = '$id_jobpost' ");
                                if ($saved->num_rows > 0):
                              ?>
                              <a href="#" class="button yellow ripple-effect ico" title="Applied" data-tippy-placement="top"><i class="icon-feather-file"></i></a>
                              <?php else: ?>
                              <a href="#" class="button yellow ripple-effect ico apply" data-id="<?php echo $id_jobpost.','.$job[7]?>" onclick="return confirm('Do you want to apply for this job?')" title="Apply" data-tippy-placement="top"><i class="icon-feather-edit"></i></a>
                              <?php endif; ?>
                              <a href="#" class="button red ripple-effect ico delete" data-id="<?php echo $id_jobpost ?>" onclick="return confirm('Do you want to delete this saved job?')" title="Remove" data-tippy-placement="top"><i class="icon-feather-trash-2"></i></a> 
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>                    
                  </li>
                  <?php 
                    }
                  ?> 
                </ul>
              </div>
            </div>
      <!-- Pagination -->
      <div class="clearfix"></div>
      <div class="utf-pagination-container-aera margin-top-20 margin-bottom-0">
        <nav class="pagination">
          <ul>
          <li class="utf-pagination-arrow"><a href="#" class="ripple-effect"><i class="icon-material-outline-keyboard-arrow-left"></i></a></li>
            <?php //display the link of the pages in URL  
            for($page = 1; $page<= $number_of_page; $page++) {  ?>
          <li><a href="savedJobs.php?page=<?php echo $page ?>" class="ripple-effect"><?php echo $page ?></a></li>
          <?php }  ?>
            <li class="utf-pagination-arrow"><a href="#" class="ripple-effect"><i class="icon-material-outline-keyboard-arrow-right"></i></a></li>
          </ul>
        </nav>
      </div>
      <div class="clearfix"></div>
          </div>
        </div>
        <!-- Row / End --> 



        <div class="utf-dashboard-footer-spacer-aera"></div>
        <?php include '../includes/dashboardFooter.php' ?>     
      </div>
    </div>    
	<!-- Dashboard Content End -->
  </div>
</div>
<!-- Wrapper / End --> 


<!-- Edit View Popup -->
<?php include '../modals/viewJob.php' ?>
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

//apply
$(document).on("click", ".apply", function(e){
    e.preventDefault();
    var id = $(this).data('id');
    var name = "apply";
    getRow(id, name);

    setInterval('location.reload()', 2000);        // Using .reload() method.

    
});   

//delete
$(document).on("click", ".delete", function(e){
    e.preventDefault();
    var id = $(this).data('id');
    var name = "delete";
    getRow(id, name);
    
}); 

function getRow(id, name){
  $.ajax({
    type: 'POST',
    url: '../process/jobpost_row.php',
    data: {id:id, name:name},
    dataType: 'json',
    success: function(response){
      if("refresh" in response){
        location.reload();
      }
      else if("apply" in response){
        location.reload();
        console.log("hello");
      }
      else{
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
    }
  });
}


</script>

</body>
</html>