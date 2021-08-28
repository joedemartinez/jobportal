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
	$company_id = $_GET['id'];
	// getting the company details
	$sql = "SELECT * FROM company WHERE id_company='$company_id'";
	$query = $conn->query($sql);
	$row = $query->fetch_assoc();

	//getting state info
	$state_id = $row['state_id'];
	$sql1 =  "SELECT * FROM states WHERE id = '$state_id'";
	$query1 = $conn->query($sql1);
	$row1 = $query1->fetch_assoc();

	//getting city info
	$city_id = $row['city_id'];
	$sql2 =  "SELECT * FROM cities WHERE id = '$city_id'";
	$query2 = $conn->query($sql2);
	$row2 = $query2->fetch_assoc();

	//getting industry info
	$industry_id = $row['industry_id'];
	$sql3 =  "SELECT * FROM industry WHERE id = '$industry_id'";
	$query3 = $conn->query($sql3);
	$row3 = $query3->fetch_assoc();
?>
  

  <!-- Titlebar -->
  <div class="single-page-header" data-background-image="assets/images/browseCompaniesWallpaper.jpg">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="utf-single-page-header-inner-aera">
            <div class="utf-left-side">
              <div class="utf-header-image"><img src="assets/images/<?php echo $row['profile_pic'] ?>" alt=""></div>
              <div class="utf-header-details">
                <h3><?php echo $row['companyname'] ?><span class="utf-verified-badge" title="Verified" data-tippy-placement="top"></span></h3>
				<h4 class="text-muted"><i class="icon-material-outline-business-center"></i> <?php echo $row3['name'] ?></h4>
				<h5><i class="icon-material-outline-location-on"></i> <?php echo $row1['name'].', '.$row2['name'] ?></h5>
				<div class="utf-star-rating" data-rating="4.9"></div>                
              </div>
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
		  <div class="utf-boxed-list-headline-item">
            <h3><i class="icon-feather-info"></i> About Company Details</h3>
          </div>
		  <div class="job-description-image-aera">
			  <img src="assets/images/browseCompaniesWallpaper.jpg" alt="" />
		  </div>
          <p><?php echo $row['aboutme'] ?></p>

        </div>
        
        <div class="utf-boxed-list-item margin-bottom-30">
          <div class="utf-boxed-list-headline-item">
            <h3><i class="icon-material-outline-business-center"></i> Company Jobs Posts</h3>
          </div>
          <div class="utf-listings-container-part compact-list-layout"> 
           <!-- listing company job posts -->
           <?php 

			$sql4 =  "SELECT * FROM job_post WHERE id_company = '$company_id' LIMIT 5";
			$query4 = $conn->query($sql4);
			// if ($row4 = $query4->fetch_assoc() > 0 ){
			while($row4 = $query4->fetch_assoc()){
				$hash = md5($row4['id_jobpost']);
             	$job_id = $row4['id_jobpost'];
            	$city_id = $row4['city_id'];
            	$industry = $row4['industry_id'];
            	$location = $conn->query("SELECT name FROM cities WHERE id = '$city_id'");
            	$category = $conn->query("SELECT name FROM industry WHERE id = '$industry'");
            	$location = $location->fetch_row();
            	$category = $category->fetch_row();
			?>
            <a href="./jobDetails.php?key=<?php echo $hash.'&id='.$job_id;?>" class="utf-job-listing"> 
				<div class="utf-job-listing-details">
				  <div class="utf-job-listing-company-logo"> <img src="assets/images/jobsLogo.jpg" alt=""> </div>	
				  <div class="utf-job-listing-description">
				    <span class="dashboard-status-button utf-job-status-item green"><i class="icon-material-outline-business-center"></i> <?php echo $row4['job_status'] ?></span>
					<h3 class="utf-job-listing-title"><?php echo $row4['jobtitle']?></h3>
					<div class="utf-job-listing-footer">
					  <ul>
						<li><i class="icon-feather-briefcase"></i><?php echo $category[0] ?></li>
					    <li><i class="icon-material-outline-location-on"></i> <?php echo $location[0] ?></li>
						<li><i class="icon-material-outline-access-time"></i> 15 Minute Ago</li>
					  </ul>
					</div>
				  </div>
				</div>
				<span class="bookmark-icon"></span> 
			</a>
			<?php } 
			
			?> 
		  </div>
        </div>
        
        <div class="utf-boxed-list-item margin-bottom-60">
          <div class="utf-boxed-list-headline-item">
            <h3><i class="icon-material-outline-star-border"></i> Reviews</h3>
          </div>
          <ul class="utf-boxed-list-item-ul">
           
           <!-- getting blog comments -->
              <?php 
              $sql5 =  "SELECT * FROM company_reviews WHERE company_id = '$company_id'";
              $query5 = $conn->query($sql5);
              while($row5 = $query5->fetch_assoc()){
                      $user = $row5['createdby'];
                      $user = $conn->query("SELECT fullname,aboutme FROM users WHERE id_user = '$user'");
                      $row1 = $user->fetch_row();
                      
              ?>

            <li>
              <div class="utf-boxed-list-item-item"> 
                <div class="item-content">
                  <h4><?php echo $row1[0] ?> <span><?php echo $row1[1] ?></span></h4>
				  <!-- <a href="#" class="reply"><i class="icon-line-awesome-reply-all"></i> Reply</a> -->
                  <div class="item-details margin-top-10">
                    <div class="utf-detail-item"><i class="icon-material-outline-date-range"></i> <?php echo $row5['createdat'] ?></div>
					<div class="utf-star-rating" data-rating="5.0"></div>
                  </div>
                  <div class="utf-item-description">
                    <p><?php echo $row5['review'] ?></p>
                  </div>
                </div>
              </div>
            </li>
            <?php } ?> 
          </ul>

        </div>

        <!-- Leava a Comment -->
       <?php if(($_SESSION['role_id']) == 1) :?>
        <div class="row">
          <div class="col-xl-12">
            <div class="utf-inner-blog-section-title">
            <h3><i class="icon-line-awesome-comments-o"></i> Leave a Review</h3>
          </div>
           <!-- if a user is logged in  || $_SESSION['email']-->
            <?php if($_SESSION):?>
              <?php if($_SESSION['email'] != ''): ?>
                <form method="post" id="add-comment">
                  <textarea class="utf-with-border" name="comment" id="comment" cols="30" rows="3" placeholder="Comment" style="resize: none;"></textarea>
                </form>
                <button class="button margin-bottom-40" type="submit">Submit Review</button>
            <?php else: ?>
            <p> Sign In to Review</p>
            <?php endif; ?>
            <?php else: ?>
            <p> Sign In to Review</p>
            <?php endif; ?>
              </div>
            </div>
       <?php endif; ?>
      </div>
      
      <!-- Sidebar -->
      <div class="col-xl-4 col-lg-4">
        <div class="utf-sidebar-container-aera"> 
		  	
         <div class="utf-sidebar-widget-item">
            <div class="utf-job-overview">
              <div class="utf-job-overview-headline">More Information</div>
              <div class="utf-job-overview-inner">
                <ul>
                  <li> 
				    <i class="icon-feather-phone"></i> <span>Phone Number:</span>
                    <h5><?php echo $row['contactno']?></h5>
                  </li>
                  <li> 
				    <i class="icon-material-outline-email"></i> <span>Email</span>
                    <h5><?php echo $row['email']?></h5>
                  </li>
				  <li> 
				    <i class="icon-material-outline-location-on"></i> <span>Location</span>
                    <h5><?php echo $row1['name'].', '. $row2['name'] ?></h5>
                  </li>
				  <li> 
				    <i class="icon-line-awesome-external-link"></i> <span>Website</span>
                    <h5><?php echo $row['website'] ?></h5>
                  </li>
				  <li> 
				    <i class="icon-line-awesome-building-o"></i> <span>Established</span>
                    <h5><?php echo $row['esta_date']?></h5>
                  </li>
                </ul>
              </div>			  
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
		  
		  <div class="utf-sidebar-widget-item margin-top-25">
            <h3>Location</h3>
            <div id="utf-single-job-map-container-item">
              <div id="singleListingMap" data-latitude="48.8566" data-longitude="2.3522" data-map-icon="im im-icon-Hamburger"></div>
			</div>
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