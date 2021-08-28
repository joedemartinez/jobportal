<!-- Session -->
<?php include 'includes/session.php'; ?>
<!-- Session ends -->
<!-- Header -->
<?php include 'includes/indexHeader.php'; ?>
<!-- Header end -->
<body>
<!--Loader-->
<?php include 'includes/loader.php'; ?>
<!-- Loader end -->

<!-- Wrapper -->
<div id="wrapper"> 
  <!-- Header Container -->
  <?php include 'includes/indexNavbar.php' ?>
  <!-- Header Container / End -->
  
  <!-- Intro Banner  --> 
  <div class="intro-banner" data-background-image="assets/images/findJobsWallpaper.jpg">
    <div class="container"> 
      <div class="row">
        <div class="col-md-12">
          <div class="utf-banner-headline-text-part">
            <h3>Find Nearby Jobs <span class="typed-words"></span></h3>
          </div>
        </div>
      </div>
      
      <form method="post" action="searchJob.php">
        <div class="row">
          <!-- Job Search Field -->
          <?php include 'includes/jobSearchField.php' ?>
          <p class="utf-trending-silver-item"><span class="utf-trending-black-item">Trending Jobs Keywords:</span> Nurse,  Architect,  Graphic Designer,  Teller,  Electrical Engineer,  Android Developer</p>
      	</div>
      </form>
      </div>
    </div>
  </div>

    <!-- Page Content -->
  <div class="container padding-top-40">
    <div class="row">
      
      <!-- search page sidebar -->
      <?php include 'includes/searchSidebar.php' ?>
	  
      <div class="col-xl-9 col-lg-8">
        <div class="utf-inner-search-section-title">
			<h4><i class="icon-material-outline-search"></i> Jobs Listing Results</h4>
		  </div>
		
        <div class="utf-listings-container-part compact-list-layout margin-top-35"> 
        	<?php

            //define total number of results you want per page  
            $results_per_page = 8;  
          
            //find the total number of results stored in the database  
            $query = "SELECT * FROM job_post ORDER BY createdat DESC";  
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


	          //getting all job posts
	            $sql = "SELECT *FROM job_post ORDER BY createdat DESC LIMIT " . $page_first_result . ',' . $results_per_page;
	            $query = $conn->query($sql);
	            while($row = $query->fetch_assoc()){
	              $hash = md5($row['id_jobpost']);
	              $job_id = $row['id_jobpost'];
	            	$city_id = $row['city_id'];
	            	$industry = $row['industry_id'];
	            	$location = $conn->query("SELECT name FROM cities WHERE id = '$city_id'");
	            	$category = $conn->query("SELECT name FROM industry WHERE id = '$industry'");
	            	$row1 = $location->fetch_row();
	            	$row2 = $category->fetch_row();
                //job status
                $job_status = $row['job_status'];
                $jobtype = $conn->query("SELECT type FROM job_type WHERE id = '$job_status'");
                $jobtype = $jobtype->fetch_row();
	        ?>
			<a href="./jobDetails.php?key=<?php echo $hash.'&id='.$job_id;?>" class="utf-job-listing"> 
			  <div class="utf-job-listing-details"> 
				<div class="utf-job-listing-company-logo"> <img src="assets/images/jobsLogo.jpg" alt=""> </div>
				<div class="utf-job-listing-description">
				  <span class="dashboard-status-button utf-job-status-item green"><i class="icon-material-outline-business-center"></i><?php echo $jobtype[0] ?></span>
				  <h3 class="utf-job-listing-title"><?php echo $row['jobtitle'] ?> <span class="utf-verified-badge" title="Verified Employer" data-tippy-placement="top"></span></h3>
				  <div class="utf-job-listing-footer">
					<ul>
					  <li><i class="icon-feather-briefcase"></i><?php echo $row2[0] ?></li>
					  <li><i class="icon-material-outline-account-balance-wallet"></i>GH₵<?php echo $row['minimumsalary'].' - GH₵'.$row['maximumsalary'] ?></li>
					  <li><i class="icon-material-outline-location-on"></i><?php echo $row1[0] ?></li>
					  <li  title="Deadline"><i class="icon-line-awesome-calendar-minus-o"></i> <?php echo $row['deadline'] ?></li>
					</ul>
				  </div>
				</div>
        <?php  
          $deadline = date_create($row['deadline'] );
          $now = date_create(date("Y-m-d"));
          $difference = date_diff($deadline, $now); 
          if ($now > $deadline) { 
            echo '<span class="dashboard-status-button utf-status-item red">Expired</span> '; 
          } else { 
            echo '<span class="dashboard-status-button utf-status-item green">Active</span> '; 
          } 
        ?>
			   </div>
			</a> 
			<?php } ?>
		</div>
        
        <!-- Pagination -->
        <div class="clearfix"></div>
        <div class="row">
          <div class="col-md-12"> 
            <div class="utf-pagination-container-aera margin-top-30 margin-bottom-60">
              <nav class="pagination">
                <ul>
                  <li class="utf-pagination-arrow"><a href="#"><i class="icon-material-outline-keyboard-arrow-left"></i></a></li>
                  <?php //display the link of the pages in URL  
                    for($page = 1; $page<= $number_of_page; $page++) {  ?>
                  <li><a href="./findJobs.php?page=<?php echo $page ?>" class="ripple-effect"><?php echo $page ?></a></li>
                  <?php }  ?>
                  <li class="utf-pagination-arrow"><a href="#"><i class="icon-material-outline-keyboard-arrow-right"></i></a></li>
                </ul>
              </nav>
            </div>
          </div>
        </div>        
      </div>
    </div>
  </div>
  
  <!-- Subscribe Block Start -->
  <?php include 'includes/newsLetter.php' ?>
  <!-- Subscribe Block End -->
  
  <!-- Footer -->
  <div id="footer"> 
    <!-- Footer Widgets -->
    <?php include 'includes/indexFooterWidgets.php'; ?>
    
    <!-- Footer Copyrights -->
    <?php include 'includes/footer.php' ?>
    <!-- Footer Copyrights / End -->     
  </div>
  <!-- Footer / End -->   
</div>
<!-- Wrapper / End --> 

<!-- Sign In Popup -->
<?php include 'modals/signIn_Register.php' ?>
<!-- Sign In Popup / End --> 
<!-- Scripts -->
<?php include 'includes/scripts.php' ?>
</body>
</html>