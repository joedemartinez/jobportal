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
  
<!-- checking hash and key from url -->
<?php if(isset($_GET['key']) && isset($_GET['id'])) :
	$job_id = $_GET['id'];
	// getting the job details
	$sql = "SELECT * FROM job_post WHERE id_jobpost='$job_id'";
	$query = $conn->query($sql);
	$row = $query->fetch_assoc();

	//getting state info
	$state_id = $row['state_id'];
	$sql1 =  "SELECT * FROM states WHERE id = '$state_id'";
	$query1 = $conn->query($sql1);
	$row1 = $query1->fetch_assoc();

	//getting city info
	$city_id = $row['city_id'];
	$sql6 =  "SELECT * FROM cities WHERE id = '$city_id'";
	$query6 = $conn->query($sql6);
	$row6 = $query6->fetch_assoc();

	//getting company info
	$company_id = $row['id_company'];
	$sql2 =  "SELECT * FROM company WHERE id_company = '$company_id'";
	$query2 = $conn->query($sql2);
	$row2 = $query2->fetch_assoc();

	//getting industry info
	$industry_id = $row['industry_id'];
	$sql3 =  "SELECT * FROM industry WHERE id = '$industry_id'";
	$query3 = $conn->query($sql3);
	$row3 = $query3->fetch_assoc();

	//job status
	$job_status = $row['job_status'];
	$jobtype = $conn->query("SELECT type FROM job_type WHERE id = '$job_status'");
	$jobtype = $jobtype->fetch_row();
?>

  <!-- Titlebar -->
  <div class="single-page-header" data-background-image="assets/images/findJobsWallpaper.jpg">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="utf-single-page-header-inner-aera">
            <div class="utf-left-side">
              <div class="utf-header-image"><a href="single-company-profile.html"><img src="assets/images/<?php echo $row2['profile_pic'] ?>" alt=""></a></div>
              <div class="utf-header-details">
				<span class="dashboard-status-button utf-job-status-item green"><i class="icon-material-outline-business-center"></i><?php echo $jobtype[0]?></span>
				<ul>
                  <li><?php echo $row1['name'] ?> <img class="flag" alt="" title="Flag" data-tippy-placement="top"><i class="icon-feather-flag"></i></li>				  
                </ul>
                <h3><?php echo $row['jobtitle'] ?><span class="utf-verified-badge" title="Verified" data-tippy-placement="top"></span></h3>
                <h5><i class="icon-material-outline-business-center"></i><?php echo $row2['companyname']?></h5>
				<div class="utf-star-rating" data-rating="4.9"></div>                
              </div>
            </div>
            <div class="utf-right-side">
            <?php if(($_SESSION['role_id']) == 1) :?>
              <div class="salary-box">
              	<?php 
              		$id_user = $_SESSION['id_user']; 
              		//already applied 
              		$applied = $conn->query("SELECT * FROM applied_jobposts WHERE id_user = '$id_user' AND id_jobpost = '$job_id' ");
					if ($applied->num_rows > 0):
              	?>	
				<a href="#" class="apply-now-button margin-top-0">Applied<i class="utf-verified-badge"></i></a> 
				<?php else: 
					  $firstappointment = date_create($row['deadline'] );
			          $now = date_create(date("Y-m-d"));
			          $difference = date_diff($firstappointment, $now); 

			          if ($now > $firstappointment): 
					?>	
					<a href="#" class="apply-now-button margin-top-0">Expired<i class="icon-feather-chevrons-right"></i></a> 
					<?php else: ?>
					<a href="process/applyJob.php?key=<?php echo md5($job_id).'&id='.$job_id.'&cid='.$company_id;?>" class="apply-now-button margin-top-0">Apply Job<i class="icon-feather-chevrons-right"></i></a> 
				<?php 
					endif;
				endif; ?>	
				<?php 
					//already saved
					$saved = $conn->query("SELECT * FROM saved_jobposts WHERE id_user = '$id_user' AND id_jobpost = '$job_id' ");
					if ($saved->num_rows > 0):
				?>
				<a href="#" class="button save-job-btn margin-top-20">Saved <i class="icon-feather-save"></i></a> 	
				<?php else: ?>		
				<a href="process/saveJob.php?key=<?php echo md5($job_id).'&id='.$job_id;?>" class="button save-job-btn margin-top-20">Save Job <i class="icon-feather-chevrons-right"></i></a>
				<?php endif; ?>		  
			  </div>
			  <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Page Content -->
  <div class="container">
    <div class="row"> 
      <div class="col-xl-8 col-lg-8 utf-content-right-offset-aera">
        <div class="utf-single-page-section-aera">
		  <div class="job-description-image-aera">
			  <img src="assets/images/jobCategory.jpg" alt="" />
		  </div>	
		  <div class="utf-boxed-list-headline-item">
            <h3><i class="icon-material-outline-description"></i> Jobs Description</h3>
          </div>
          <p><?php echo $row['description'] ?></p>
        </div>
		
		<div class="utf-single-page-section-aera">
		  <div class="utf-boxed-list-headline-item">
            <h3><i class="icon-feather-briefcase"></i> Primary Responsibilities</h3>
          </div>
          <p><?php echo $row['responsibility'] ?></p>          
        </div>
		
		<div class="utf-single-page-section-aera">
		  <div class="utf-boxed-list-headline-item">
            <h3><i class="icon-material-outline-business-center"></i> Required Skills and Abilities</h3>
          </div>
          <p><?php echo $row['skills_ability'] ?></p>	  
        </div>
		
        <div class="utf-single-page-section-aera">
		  <div class="utf-boxed-list-headline-item">
            <h3><i class="icon-material-outline-location-on"></i> Jobs Location</h3>
          </div>
          <div id="utf-single-job-map-container-item">
            <div id="singleListingMap" data-latitude="48.8566" data-longitude="2.3522" data-map-icon="im im-icon-Hamburger"></div>
		  </div>
        </div>
		
		<div class="utf-boxed-list-item margin-bottom-60">
          <div class="utf-boxed-list-headline-item">
            <h3><i class="icon-material-outline-business-center"></i> People Also Viewed</h3>
          </div>
          <div class="utf-listings-container-part compact-list-layout"> 
          	<!-- getting related job posts -->
          	<?php 
			$sql4 =  "SELECT * FROM job_post WHERE industry_id = '$industry_id' AND id_jobpost != '$job_id' LIMIT 5";
			$query4 = $conn->query($sql4);
			while($row4 = $query4->fetch_assoc()){
				$hash = md5($row4['id_jobpost']);
             	$job_id = $row4['id_jobpost'];
            	$city_id = $row4['city_id'];
            	$industry = $row4['industry_id'];
            	$location = $conn->query("SELECT name FROM cities WHERE id = '$city_id'");
            	$category = $conn->query("SELECT name FROM industry WHERE id = '$industry'");
            	$location = $location->fetch_row();
            	$category = $category->fetch_row();
            	$jobtype = $row4['job_status'];
				$jobtype = $conn->query("SELECT type FROM job_type WHERE id = '$jobtype'");
                $jobtype = $jobtype->fetch_row();
			?>

            <a href="./jobDetails.php?key=<?php echo $hash.'&id='.$job_id;?>" class="utf-job-listing"> 
				<div class="utf-job-listing-details"> 
				  <div class="utf-job-listing-company-logo"> <img src="assets/images/jobsLogo.jpg" alt=""> </div>
				  <div class="utf-job-listing-description">
				    <span class="dashboard-status-button utf-job-status-item green"><i class="icon-material-outline-business-center"></i><?php echo $jobtype[0] ?></span>
				    <?php  
	                $firstappointment = date_create($row4['deadline'] );
	                $now = date_create(date("Y-m-d"));
	                $difference = date_diff($firstappointment, $now); 
	                if ($now > $firstappointment) { 
	                  echo '<span class="dashboard-status-button utf-status-item red">Expired</span> '; 
	                } else { 
	                  echo '<span class="dashboard-status-button utf-status-item green">Active</span> '; ; 
	                } 
                ?>
					<h3 class="utf-job-listing-title"><?php echo $row4['jobtitle'] ?></h3>
					<div class="utf-job-listing-footer">
					  <ul>
						<li><i class="icon-feather-briefcase"></i><?php echo $category[0] ?></li>
						<li><i class="icon-material-outline-account-balance-wallet"></i> GH₵<?php echo $row4['minimumsalary'].' - GH₵'.$row4['maximumsalary'] ?></li>
						<li><i class="icon-material-outline-location-on"></i><?php echo $location[0] ?></li>
						<li title="Deadline"><i class="icon-line-awesome-calendar-minus-o"></i> <?php echo $row4['deadline']?></li>
					  </ul>
					</div>
				  </div>
				</div>
			</a>
			<?php 
				}
			?> 
		  </div>
		  <div class="utf-centered-button margin-top-10"> <a href="./findJobs.php" class="button utf-button-sliding-icon">View More Jobs <i class="icon-feather-chevrons-right"></i></a> </div>
        </div>		
      </div>
      
      <!-- Sidebar -->
      <div class="col-xl-4 col-lg-4">
        <div class="utf-sidebar-container-aera"> 		
		  <div class="utf-sidebar-widget-item">	
			  <h3><i class="icon-material-outline-money"></i> Offered Salary</h3>
			  <div class="utf-right-side">
				<div class="salary-box">
					<div class="salary-amount">GH₵<?php echo $row['minimumsalary'].' - GH₵'. $row['maximumsalary'] ?></div>
				</div>
			  </div>
		  </div>
		  <div class="utf-sidebar-widget-item">	
			  <h3><i class="icon-line-awesome-calendar-minus-o"></i> Deadline</h3>
			  <div class="utf-right-side">
				<div class="salary-box">
					<div class="salary-amount"><?php echo $row['deadline'] ?></div>
				</div>
			  </div>
		  </div>
          <div class="utf-sidebar-widget-item">
            <div class="utf-job-overview">
              <div class="utf-job-overview-headline">Jobs Position Information</div>
              <div class="utf-job-overview-inner">
                <ul>
                  <li> 
				    <i class="icon-material-outline-business-center"></i> <span>Job Vacancy:</span>
                    <h5><?php echo $row['jobtitle']?></h5>
                  </li>
                  <li> 
				    <i class="icon-line-awesome-glass"></i> <span>Experience</span>
                    <h5><?php echo $row['experience']?>Years</h5>
                  </li>
				  <li> 
				    <i class="icon-material-outline-location-on"></i> <span>Location</span>
                    <h5><?php echo $row1['name'].'-'. $row6['name'] ?></h5>
                  </li>
				  <li> 
				    <i class="icon-material-outline-business-center"></i> <span>Jobs Type</span>
                    <h5><?php echo $row['job_status'] ?></h5>
                  </li>
				  <li> 
				    <i class="icon-line-awesome-gg-circle"></i> <span>Qualification</span>
                    <h5><?php echo $row['edu_qualification']?></h5>
                  </li>
				  <li> 
				    <i class="icon-material-outline-access-time"></i> <span>Date Posted</span>
                    <h5><?php echo $row['createdat']?></h5>
                  </li>
                </ul>
              </div>			  
            </div>			
          </div>
          
          <div class="utf-sidebar-widget-item">
			<h3>Category</h3>
			<div class="task-tags"> 
			  <a href="#"><span><?php echo $row3['name'] ?></span></a> 
			</div>
		  </div>

		  <div class="utf-detail-social-sharing margin-top-25">
			<span><strong>Social Sharing:-</strong></span>
			<ul class="margin-top-15">
				<li><a href="#" title="Facebook" data-tippy-placement="top"><i class="icon-brand-facebook-f"></i></a></li>
				<li><a href="#" title="Twitter" data-tippy-placement="top"><i class="icon-brand-twitter"></i></a></li>
				<li><a href="#" title="LinkedIn" data-tippy-placement="top"><i class="icon-brand-linkedin-in"></i></a></li>
				<li><a href="#" title="Google Plus" data-tippy-placement="top"><i class="icon-brand-google-plus-g"></i></a></li>
				<li><a href="#" title="Whatsapp" data-tippy-placement="top"><i class="icon-brand-whatsapp"></i></a></li>
				<li><a href="#" title="Pinterest" data-tippy-placement="top"><i class="icon-brand-pinterest-p"></i></a></li>
			</ul>
		  </div>
		  
        </div>
      </div>
    </div>
  </div>

<?php else: ?> 
	<!-- load 404 page -->
	<?php include 'includes/404.php' ?>

<?php endif; ?>	
  
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