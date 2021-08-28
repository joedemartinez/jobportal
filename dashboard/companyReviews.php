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
                <h3>Visitor Reviews</h3>
              </div>
              <div class="content">
                <ul class="utf-dashboard-box-list">   
                  <!-- getting related job posts -->
                  <?php 
                    $id_company = $_SESSION['id_company'];

                    //define total number of results you want per page  
                    $results_per_page = 10;  
                  
                    //find the total number of results stored in the database  
                    $query = "SELECT * FROM company_reviews WHERE company_id = '$id_company' ORDER BY id DESC";  
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

                    $sql =  "SELECT * FROM company_reviews WHERE company_id = '$id_company' ORDER BY id DESC LIMIT " . $page_first_result . ',' . $results_per_page;
                    $query = $conn->query($sql);
                    while($row = $query->fetch_assoc()){
                      $createdby = $row['createdby'];
                      $user_id = $conn->query("SELECT fullname FROM users WHERE id_user = '$createdby'");
                      $user_id = $user_id->fetch_row();
                  ?>
                  <li>
                    <div class="utf-boxed-list-item-item"> 
                      <div class="item-content">
                        <h4><?php echo $user_id[0] ?> <i class="utf-verified-badge" title="Verified" data-tippy-placement="top"></i></h4>
                        <div class="item-details margin-top-10">
                          <div class="utf-detail-item"><i class="icon-material-outline-date-range"></i> <?php echo $row['createdat'] ?></div>
                        </div>
                        <div class="utf-item-description">
                          <p><?php echo $row['review'] ?></p>
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
                <li><a href="companyReviews.php?page=<?php echo $page ?>" class="ripple-effect"><?php echo $page ?></a></li>
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