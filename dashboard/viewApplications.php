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
	
    <div> <a href="manageApplications.php" class="button red" data-tippy-placement="top" data-tippy="" data-original-title="Go Back"><i class="icon-material-outline-arrow-back"></i> Go Back</a> </div>

    <div class="row"> 
          <div class="col-xl-12">
            <div class="dashboard-box margin-top-0"> 
              <div class="headline">
                <h3>Applicants</h3>
              </div>
              <div class="content">
                <ul class="utf-dashboard-box-list">
                  <!-- getting related job posts -->
                <?php 
                  if(isset($_GET['id']) && isset($_GET['hash'])):
                  $id_company = $_SESSION['id_company'];
                  $job = $_GET['id'];

                  //define total number of results you want per page  
                  $results_per_page = 10;  
                
                  //find the total number of results stored in the database  
                  $query = "SELECT * FROM applied_jobposts WHERE id_company = '$id_company' AND id_jobpost = '$job' ORDER BY id_applied DESC";  
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

                  $sql =  "SELECT * FROM applied_jobposts WHERE id_company = '$id_company' AND id_jobpost = '$job' ORDER BY id_applied DESC LIMIT " . $page_first_result . ',' . $results_per_page;
                  $query = $conn->query($sql);
                  while($row = $query->fetch_assoc()){
                    $id_user = $row['id_user'];
                    $sql1 =  "SELECT * FROM users WHERE id_user = '$id_user'";
                    $query1 = $conn->query($sql1);
                    while($row1 = $query1->fetch_assoc()){
                      $city_id = $row1['city_id'];
                      $education = $row1['education_id'];
                      $location = $conn->query("SELECT name FROM cities WHERE id = '$city_id'");
                      $education = $conn->query("SELECT name FROM education WHERE id = '$education'");
                      $location = $location->fetch_row();
                      $education = $education->fetch_row();
                  ?>
                  <li> 
                    <div class="utf-job-listing">                       
                      <div class="utf-job-listing-details"> 
                        <a href="#" class="utf-job-listing-company-logo"><img src="../assets/images/<?php echo $row1['profile_pic'] ?>" alt=""></a> 
                        <div class="utf-job-listing-description">                       
                          <h3 class="utf-job-listing-title"><a href="#"><?php echo $row1['fullname'] ?></a><span class="dashboard-status-button green"><i class="icon-material-outline-business-center"></i> <?php echo $row1['headline'] ?></span></h3>                          
                          <div class="utf-job-listing-footer">
                            <ul>
                              <li><i class="icon-feather-mail"></i> <?php echo $row1['email'] ?></li>
                              <li><i class="icon-feather-briefcase"></i> <?php echo $education[0] ?></li>
                              <li><i class="icon-feather-phone"></i> <?php echo $row1['contactno']?></span>
                              <li><i class="icon-material-outline-location-on"></i> <?php echo $row1['address'] ?></li>
                            </ul>
                            <div class="utf-buttons-to-right"> 
                              <a class="button orange ripple-effect ico" href="../assets/resume/<?php echo $row1['resume'] ?>"  title="View Resume" data-tippy-placement="top" target="_blank"><i class="icon-feather-eye"></i></a>
                              <a class="button green ripple-effect ico" href="../assets/resume/<?php echo $row1['resume'] ?>"  title="Download Resume" data-tippy-placement="top" download="Resume_<?php echo $row1['fullname'] ?>"><i class="icon-feather-download"></i></a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>                    
                  </li>
                  <?php 
                    }
                  }

                endif;
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
          <li><a href="viewApplications.php?page=<?php echo $page.'&hash='.md5($job).'&id='.$job?>" class="ripple-effect"><?php echo $page ?></a></li>
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


<!-- Scripts -->
<?php include '../includes/dashboardScripts.php' ?>

</body>
</html>