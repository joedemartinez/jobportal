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
  <div class="intro-banner" data-background-image="assets/images/homeWallpaper.jpg">
    <div class="container"> 
      <div class="row">
        <div class="col-md-12">
          <div class="utf-banner-headline-text-part">
          	<!-- check script file for words -->
            <h3>Find Nearby Jobs <span class="typed-words"></span></h3>
            <span>It is a Long Established Fact That a Reader Will be Distracted by The Readable.</span> 
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
  
  <!-- Jobs Category Boxes -->
  <div class="section margin-top-60 margin-bottom-40">
    <div class="container">
      <div class="row"> 
        <div class="col-xl-12">
          <div class="utf-section-headline-item centered margin-top-0 margin-bottom-40">
            <span>Jobs Categories</span>
			<h3>Choose Your Sector</h3>
			<div class="utf-headline-display-inner-item">Jobs Categories</div>
			<p class="utf-slogan-text">Lorem Ipsum is simply dummy text printing and type setting industry Lorem Ipsum been industry standard dummy text ever since when unknown printer took a galley.</p>
          </div>
        </div>
        <?php
          //getting all categories
            $sql = "SELECT * FROM industry ORDER BY RAND() LIMIT 8";
            $query = $conn->query($sql);
            while($row = $query->fetch_assoc()){
            	$industry_id = $row['id'];
            	$result = $conn->query("SELECT * FROM job_post WHERE industry_id = '$industry_id'");
          ?>
		    <div class="col-xl-3 col-md-6 col-lg-4"> 
					<a class="photo-box photo-category-box small" data-background-image="assets/images/jobCategory.jpg">
					  <!-- <div class="utf-opening-position-counter-item"><im</div>	 -->
					  <div class="utf-opening-box-content-part">
						<div class="utf-category-box-icon-item"> <img src="assets/images/favicon.png" style="background-color: white;border-radius: 50%;border: 3px solid rgba(0, 0, 0, 0.04);"> </div>
						<h3><?php echo $row['name'] ?></h3>				
						<span>
						<?php 
							echo $result->num_rows;
						?> 

						Jobs</span> 
					  </div>
					</a> 
				</div>
				<?php } ?>
		</div>
		<!-- <div class="col-xl-12 utf-centered-button margin-top-10">
			<a href="jobs-categorie-two.html" class="button utf-ripple-effect-dark utf-button-sliding-icon margin-top-0">View All Categories <i class="icon-feather-chevrons-right"></i></a> 
		</div> -->
      </div>
    </div>
  </div>
  <!-- Jobs Category Boxes / End --> 
  
  <!-- Latest Jobs -->
  <div class="section gray padding-top-40 padding-bottom-60">
    <div class="container">
      <div class="row">
        <div class="col-xl-12"> 
          <div class="utf-section-headline-item centered margin-top-0 margin-bottom-40">
            <span>Latest Jobs Post</span>
			<h3>Jobs You May Be Interested</h3>
			<div class="utf-headline-display-inner-item">Latest Jobs Post</div>
			<p class="utf-slogan-text">Lorem Ipsum is simply dummy text printing and type setting industry Lorem Ipsum been industry standard dummy text ever since when unknown printer took a galley.</p>
          </div>
          <div class="utf-listings-container-part compact-list-layout margin-top-35"> 
          <?php
          //getting all job posts
            $sql = "SELECT * FROM job_post ORDER BY RAND() LIMIT 5";
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
            <a href="./jobDetails.php?key=<?php echo $hash.'&id='.$job_id;?>" class="utf-job-listing utf-apply-button-item"> 
				<div class="utf-job-listing-details"> 
				  <div class="utf-job-listing-company-logo"> <img src="assets/images/jobsLogo.jpg" alt=""> </div>
				  <div class="utf-job-listing-description">
				    <span class="dashboard-status-button utf-job-status-item green"><i class="icon-material-outline-business-center"></i><?php echo $jobtype[0] ?></span>
				    <?php  
	                $firstappointment = date_create($row['deadline'] );
	                $now = date_create(date("Y-m-d"));
	                $difference = date_diff($firstappointment, $now); 
	                if ($now > $firstappointment) { 
	                  echo '<span class="dashboard-status-button utf-status-item red">Expired</span> '; 
	                } else { 
	                  echo '<span class="dashboard-status-button utf-status-item green">Active</span> '; ; 
	                } 
                ?>
					<h3 class="utf-job-listing-title"><?php echo $row['jobtitle'] ?></h3>
					<div class="utf-job-listing-footer">
					  <ul>
						<li><i class="icon-feather-briefcase"></i><?php echo $row2[0] ?></li>
						<li><i class="icon-material-outline-account-balance-wallet"></i> GH₵<?php echo $row['minimumsalary'].' - GH₵'.$row['maximumsalary'] ?></li>
						<li><i class="icon-material-outline-location-on"></i><?php echo $row1[0] ?></li>
						<li><i class="icon-material-outline-access-time"></i> <?php echo $row['deadline'] ?></li>
					  </ul>
					</div>
				  </div>
				  <span class="list-apply-button ripple-effect">Browse Job <i class="icon-line-awesome-bullhorn"></i></span> 
				</div>
            </a> 
          <?php } ?>
		  </div>
		  <div class="utf-centered-button margin-top-10">
			<a href="./findJobs.php" class="button utf-ripple-effect-dark utf-button-sliding-icon margin-top-20">Browse All Jobs <i class="icon-feather-chevrons-right"></i></a> 
		  </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Latest Jobs / End --> 
  
  <!-- Photo Section -->
	<div class="utf-photo-section-block" data-background-image="assets/images/homeWallpaper.jpg">
		<div class="text-content white-font">
			<div class="container">
				<div class="row">
					<div class="col-lg-8 col-md-12 col-sm-12">
						<h2>Browse Hundreds of Jobs</h2>
						<p>Lorem Ipsum is simply dummy text of printing and type setting industry. Lorem Ipsum been industry standard dummy text ever since, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic type setting, remaining essentially unchanged. It was popularised.</p>						
					</div>
					<div class="col-lg-4 col-md-6 col-sm-12">
						<div class="download-img">
							<img src="assets/images/mockup3.png" alt="">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
  <!-- Photo Section / End --> 
  
   <!-- Icon Boxes -->
  <div class="section padding-top-65 padding-bottom-50">
    <div class="container">
      <div class="row">
        <div class="col-xl-12"> 
          <div class="utf-section-headline-item centered margin-top-0 margin-bottom-40">
			<h3>How It Works?</h3>
			<div class="utf-headline-display-inner-item">How It Works?</div>
			<p class="utf-slogan-text">Lorem Ipsum is simply dummy text printing and type setting industry Lorem Ipsum been industry standard dummy text ever since when unknown printer took a galley.</p>
          </div>
        </div>
		<div class="col-xl-3 col-md-6 col-sm-12"> 
          <div class="icon-box with-line"> 
            <div class="utf-icon-box-circle">
              <div class="utf-icon-box-circle-inner"> <i class="icon-line-awesome-user-plus"></i></div>
            </div>
            <h3>Create Account</h3>
            <p>Lorem Ipsum is simply dummy text the printing and type setting industry Lorem Ipsum has been industry.</p>
          </div>
        </div>
		<div class="col-xl-3 col-md-6 col-sm-12"> 
          <div class="icon-box with-line"> 
            <div class="utf-icon-box-circle">
              <div class="utf-icon-box-circle-inner"> <i class="icon-line-awesome-file-pdf-o"></i></div>
            </div>
            <h3>Upload Resume</h3>
            <p>Lorem Ipsum is simply dummy text the printing and type setting industry Lorem Ipsum has been industry.</p>
          </div>
        </div>
		<div class="col-xl-3 col-md-6 col-sm-12"> 
          <div class="icon-box"> 
            <div class="utf-icon-box-circle">
              <div class="utf-icon-box-circle-inner"> <i class="icon-line-awesome-edit"></i></div>
            </div>
            <h3>Search Jobs</h3>
            <p>Lorem Ipsum is simply dummy text the printing and type setting industry Lorem Ipsum has been industry.</p>
          </div>
        </div>
		<div class="col-xl-3 col-md-6 col-sm-12"> 
          <div class="icon-box"> 
            <div class="utf-icon-box-circle">
              <div class="utf-icon-box-circle-inner"> <i class="icon-line-awesome-save"></i></div>
            </div>
            <h3>Save & Apply</h3>
            <p>Lorem Ipsum is simply dummy text the printing and type setting industry Lorem Ipsum has been industry.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Icon Boxes / End --> 
  
  <!-- Start Section Callout -->
  <div class="jbm-section-callout">
	<div class="container-fluid">
		<div class="row">
			<div class="col-xl-6 col-md-6 col-xs-12 callout-bg-1 callout-section-left pos-relative">
				<div class="callout-bg"></div>
				<div class="jbm-callout-in jbm-callout-in-padding pull-right">
					<div class="jbm-section-title margin-top-80 margin-bottom-80">
						<h2>Find Your Browse Companies</h2>
						<span class="section-tit-line"></span>
						<p>Lorem Ipsum is simply dummy text of printing and type setting industry. Lorem Ipsum been industry standard dummy text ever since, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries.</p>
						<a href="./browseCompanies.php" class="button utf-ripple-effect-dark utf-button-sliding-icon margin-top-10">Browse Companies <i class="icon-feather-chevrons-right"></i></a>
					</div>
				</div>
			</div>
			<div class="col-xl-6 col-md-6 col-xs-12 callout-bg-2 callout-section-right pos-relative">
				<div class="callout-bg"></div>
				<div class="jbm-callout-in jbm-callout-in-padding pull-left">
					<div class="jbm-section-title margin-bottom-80 margin-top-80">
						<h2>Find Your Browse Jobs</h2>
						<span class="section-tit-line"></span>
						<p>Lorem Ipsum is simply dummy text of printing and type setting industry. Lorem Ipsum been industry standard dummy text ever since, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries.</p>
						<a href="./findJobs.php" class="button utf-ripple-effect-dark utf-button-sliding-icon margin-top-10">Browse Jobs <i class="icon-feather-chevrons-right"></i></a>
					</div>
				</div>
			</div>
		</div>
	</div>
  </div>
  <!-- End Section Callout -->
  
  <!-- Start Need Any Help -->
  <section class="section padding-top-65 padding-bottom-75">
	  <div class="container">
		<div class="col-xl-12">
			<div class="utf-section-headline-item centered margin-top-0 margin-bottom-40">
				<span>Business Help Service</span>
				<h3>Need Any Help?</h3>
				<div class="utf-headline-display-inner-item">Business Help Service</div>
				<p class="utf-slogan-text">Lorem Ipsum is simply dummy text printing and type setting industry Lorem Ipsum been industry standard dummy text ever since when unknown printer took a galley.</p>
			</div>
		</div>
		<div class="row need-help-area justify-content-center">
		  <div class="col-xl-4">
			<div class="info-box-1">
			  <div class="utf-icon-box-circle">
				<div class="utf-icon-box-circle-inner"> <i class="icon-brand-rocketchat"></i></div>
              </div>	
			  <h4>Chat to Us Online</h4>
			  <p>Chat to us online if you have any question.</p>
			  <a href="javascript:void(Tawk_API.toggle());" class="button utf-ripple-effect-dark utf-button-sliding-icon margin-top-10">Click Here to Chat <i class="icon-feather-chevrons-right"></i></a> 
			</div>
		  </div>
		  <div class="col-xl-4">
			<div class="info-box-1">
			  <div class="utf-icon-box-circle">
				<div class="utf-icon-box-circle-inner"> <i class="icon-feather-phone"></i></div>
              </div>	
			  <h4>Our Support Agent</h4>
			  <p>Our support agent will work with you to meet your lending needs.</p>
			  <a href="./contactUs.php" class="button utf-ripple-effect-dark utf-button-sliding-icon margin-top-10">Contact Us <i class="icon-feather-chevrons-right"></i></a> 
			</div>
		  </div>
		  <div class="col-xl-4">
			<div class="info-box-1">
			  <div class="utf-icon-box-circle">
				<div class="utf-icon-box-circle-inner"> <i class="icon-brand-bimobject"></i></div>
              </div> 
			  <h4>Read Latest Blog Post</h4>
			  <p>Visit our Blog page and know more about news and career tips</p>
			  <a href="./blogs.php" class="button utf-ripple-effect-dark utf-button-sliding-icon margin-top-10">Read Blog Post <i class="icon-feather-chevrons-right"></i></a> 
			</div>
		  </div>
		</div>
	  </div>
  </section>
  <!-- End Need Any Help -->
  
  <!-- Counters -->
  <div class="section gradient_item_area padding-top-70 padding-bottom-75">
    <div class="container">
      <div class="row">
	    <div class="col-xl-12">
			<div class="utf-section-headline-item centered margin-top-0 margin-bottom-40">
				<span>Success Business</span>
				<h3>Our Success</h3>
				<div class="utf-headline-display-inner-item">Success Business Award</div>
				<p class="utf-slogan-text">Lorem Ipsum is simply dummy text printing and type setting industry Lorem Ipsum been industry standard dummy text ever since when unknown printer took a galley.</p>
			</div>
		</div>
        <div class="col-xl-12 counter_inner_block">
		  <div class="utf-counters-container-aera"> 
			<div class="col-xl-4">
				<div class="utf-single-counter"> <i class="icon-feather-briefcase"></i>
				  <div class="utf-counter-inner-item">
					<h3><span class="counter">
						<?php
                $sql = "SELECT * FROM job_post";
                $query = $conn->query($sql);

                echo "<h3>".$query->num_rows."</h3>";
              ?>
					</span></h3>
					<span class="utf-counter-title">Jobs</span> 
				  </div>
				</div>
			</div>
			<div class="col-xl-4">	
				<div class="utf-single-counter"> <i class="icon-feather-users"></i>
				  <div class="utf-counter-inner-item">
					<h3><span class="counter">
						<?php
                $sql = "SELECT * FROM users";
                $query = $conn->query($sql);

                echo "<h3>".$query->num_rows."</h3>";
              ?>
					</span></h3>
					<span class="utf-counter-title">Jobs Candidate</span> 
				  </div>
				</div>
			</div>
			
			<div class="col-xl-4">	
				<div class="utf-single-counter"> <i class="icon-material-outline-location-city"></i>
				  <div class="utf-counter-inner-item">
					<h3><span class="counter">
						<?php
                $sql = "SELECT * FROM company";
                $query = $conn->query($sql);

                echo "<h3>".$query->num_rows."</h3>";
              ?>
					</span></h3>
					<span class="utf-counter-title">Companies</span> 
				  </div>
				</div>
			</div>	
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Counters / End --> 
  
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

<script type="text/javascript">
	var typed = new Typed('.typed-words', {
	strings: ["Nurse."," Graphic Designer."," Artisans."," Sales Marketing."," Interns."," Engineering."," Banking."],
	typeSpeed: 80,
	backSpeed: 80,
	backDelay: 4000,
	startDelay: 1000,
	loop: true,
	showCursor: true
});
</script>

</body>
</html>