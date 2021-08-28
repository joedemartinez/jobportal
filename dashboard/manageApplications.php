<!-- Session -->
<?php include '../includes/session.php'; ?>
<!-- Session ends -->
<!-- Header --> 
<?php include '../includes/dashboardHeader.php'; ?>
<!-- Header end -->

<!-- account type -->
<?php include '../includes/employerDashboard.php'; ?>
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
	
    

    <div class="row"> 
          <div class="col-xl-12">
            <div class="dashboard-box margin-top-0"> 
              <div class="headline">
                <h3>Job Applications</h3>
              </div>
              <div class="content">
                <ul class="utf-dashboard-box-list">
                  <!-- getting related job posts -->
                <?php 
                  $id_company = $_SESSION['id_company'];

                  //define total number of results you want per page  
                  $results_per_page = 10;  
                
                  //find the total number of results stored in the database  
                  $query = "SELECT * FROM applied_jobposts WHERE id_company = '$id_company' ORDER BY id_applied DESC";  
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

                  $sql =  "SELECT * FROM applied_jobposts WHERE id_company = '$id_company' ORDER BY id_applied DESC LIMIT " . $page_first_result . ',' . $results_per_page;
                  $query = $conn->query($sql);
                  while($row = $query->fetch_assoc()){
                    $id_jobpost = $row['id_jobpost'];
                    $sql1 =  "SELECT * FROM job_post WHERE id_company = '$id_company' AND id_jobpost = '$id_jobpost'";
                    $query1 = $conn->query($sql1);
                    while($row1 = $query1->fetch_assoc()){
                      $city_id = $row1['city_id'];
                      $industry = $row1['industry_id'];
                      $jobtype = $row1['job_status'];
                      $location = $conn->query("SELECT name FROM cities WHERE id = '$city_id'");
                      $category = $conn->query("SELECT name FROM industry WHERE id = '$industry'");
                      $profile_pic = $conn->query("SELECT profile_pic FROM company WHERE id_company = '$id_company'");
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
                          $sql11 = "SELECT * FROM applied_jobposts WHERE id_jobpost = '$id_jobpost'";
                          $query11 = $conn->query($sql11);

                          echo '<a class="green  ico" href="viewApplications.php?hash='.md5($id_jobpost).'&id='.$id_jobpost.'" title="View Applications" data-tippy-placement="top"> <span class="dashboard-status-button utf-status-item green">'. $query11->num_rows .' Applications <i class="icon-feather-eye"></i></a></span>';
                          ?>                          
                          <h3 class="utf-job-listing-title"><a href="#"><?php echo $row1['jobtitle'] ?></a><span class="dashboard-status-button green"><i class="icon-material-outline-business-center"></i> <?php echo $jobtype[0] ?></span>
                            <?php  
                            $firstappointment = date_create($row1['deadline'] );
                            $now = date_create(date("Y-m-d"));
                            $difference = date_diff($firstappointment, $now); 
                            if ($now > $firstappointment) { 
                              echo '<span class="dashboard-status-button utf-status-item red">Expired</span> '; 
                            } else { 
                              echo '<span class="dashboard-status-button utf-status-item green">Active</span> '; ; 
                            } 
                          ?>
                          </h3>                          
                          <div class="utf-job-listing-footer">
                            <ul>
                              <li><i class="icon-feather-briefcase"></i> <?php echo $category[0] ?></li>
                              <li><i class="icon-material-outline-date-range"></i> <?php echo $row1['createdat'] ?></li>
                              <li><i class="icon-material-outline-money"></i> GH₵<?php echo $row1['minimumsalary'].' - GH₵'.$row1['maximumsalary'] ?></li>
                              <li><i class="icon-material-outline-location-on"></i> <?php echo $location[0] ?></li>
                            </ul>
                            <div class="utf-buttons-to-right"> 
                              <a class="button green ripple-effect ico view popup-with-zoom-anim" href="#small-dialog-1" data-id="<?php echo $id_jobpost ?>" title="View" data-tippy-placement="top"><i class="icon-feather-eye"></i></a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>                    
                  </li>
                  <?php 
                    }
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
          <li><a href="manageApplications.php?page=<?php echo $page ?>" class="ripple-effect"><?php echo $page ?></a></li>
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

//delete
$(document).on("click", ".delete", function(e){
    e.preventDefault();
    var id = $(this).data('id');
    var name = "deleteJob";
    getRow(id, name);
    
}); 

$(document).on("click", ".view", function(e){
    e.preventDefault();
    var id = $(this).data('id');
    var name = "view";
    getRow(id, name);
    
});   

function getRow(id, name){
  $.ajax({
    type: 'POST',
    url: '../process/jobpost_row.php',
    data: {id:id, name:name},
    dataType: 'json',
    success: function(response){
      //delete
      if("refresh" in response){
        location.reload();
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