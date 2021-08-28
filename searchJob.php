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
          <p class="utf-trending-silver-item"><span class="utf-trending-black-item">Trending Jobs Keywords:</span> Web Designer,  Web Developer,  Graphic Designer,  PHP Developer,  IOS Developer,  Android Developer</p>
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
			<h4><i class="icon-material-outline-search"></i> Showing Jobs Results</h4>
		  </div>
		
        <div class="utf-listings-container-part compact-list-layout margin-top-35"> 
        	<?php
	          //getting all job search result
	            if(isset($_GET['page']) || isset($_POST['submitSearch'])){
                $sqlState = '';
                if(isset($_POST['searchKeyword'])){
                  if($_POST['searchKeyword'] != ''){
                    $searchKeyword = $_POST['searchKeyword'];
                    $sqlState .= "jobtitle LIKE '%$searchKeyword%'";
                  }
                }
                if(isset($_POST['searchLocation'])){
                  if($_POST['searchLocation'] != ''){
                    $searchLocation = $_POST['searchLocation'];
                    if($sqlState != ''){
                      $sqlState .= " AND city_id = '$searchLocation'";
                    }else $sqlState .= " city_id = '$searchLocation'";
                  }
                }
                if(isset($_POST['searchCategory'])){
                  if($_POST['searchCategory'] != ''){
                    $searchCategory = $_POST['searchCategory'];
                    if($sqlState != ''){
                      $sqlState .= " AND industry_id = '$searchCategory'";
                    }else $sqlState .= " industry_id = '$searchCategory'";
                  }
                }
                if(isset($_POST['searchJobType'])){
                  if($_POST['searchJobType'] != ''){
                    $searchJobType = $_POST['searchJobType'];
                    if($sqlState != ''){
                      $sqlState .= " AND job_status = '$searchJobType'";
                    }else $sqlState .= " job_status = '$searchJobType'";
                  }
                }


                //define total number of results you want per page  
                $results_per_page = 5; 

                 //determine which page number visitor is currently on  
                if (!isset($_GET['page']) ) {  
                    $page = 1;  
                } else {  
                    $sqlState = '';
                    $page = $_GET['page'];  

                    if ($_GET['ask'] != ''){
                      $searchKeyword = $_GET['ask'];
                      $sqlState .=  "jobtitle LIKE '%$searchKeyword%'";
                    }
                    if ($_GET['loc'] != ''){
                      $searchLocation = $_GET['loc'];
                      if($sqlState != ''){
                        $sqlState .=  " AND city_id = '$searchLocation'";
                       }else $sqlState .=  " city_id = '$searchLocation'";
                    }
                    if ($_GET['cat'] != ''){
                      $searchCategory = $_GET['cat'];
                      if($sqlState != ''){
                        $sqlState .=  " AND industry_id = '$searchCategory'";
                      }else $sqlState .=  " industry_id = '$searchCategory'";
                    }
                    if ($_GET['type'] != ''){
                      $searchJobType = $_GET['type'];
                      if($sqlState != ''){
                        $sqlState .=  " AND job_status = '$searchJobType'";
                      }else $sqlState .=  " job_status = '$searchJobType'";
                    } 
                }

                //find the total number of results stored in the database 
                if ($sqlState == '') { 
                $query = "SELECT * FROM job_post WHERE id_jobpost = 0 ORDER BY createdat DESC";
                }else{
                  $query = "SELECT * FROM job_post WHERE ".$sqlState." ORDER BY createdat DESC";
                }  
                $result = mysqli_query($conn, $query);  
                $number_of_result = mysqli_num_rows($result);  
              
                //determine the total number of pages available  
                $number_of_page = ceil ($number_of_result / $results_per_page);  
   
              
                //determine the sql LIMIT starting number for the results on the displaying page  
                $page_first_result = ($page-1) * $results_per_page;   

              if ($sqlState == '') {
                $sql = "SELECT * FROM job_post WHERE id_jobpost = 0 ORDER BY createdat DESC";
              }else $sql = "SELECT * FROM job_post WHERE ".$sqlState." ORDER BY createdat DESC LIMIT " . $page_first_result . ',' . $results_per_page;

              $query = $conn->query($sql); 

              if ($query->num_rows < 1) { ?>
                <div style="text-align: center;" class="utf-notify-box-aera margin-top-15">
                  <div class="utf-switch-container-item">
                    <span>No results found</span>
                  </div>  
                </div>          
            <?php }
            else {
              while($row = $query->fetch_assoc()){
                $hash = md5($row['id_jobpost']);
                $job_id = $row['id_jobpost'];
                $city_id = $row['city_id'];
                $industry = $row['industry_id'];
                $job_status = $row['job_status'];
                $location = $conn->query("SELECT name FROM cities WHERE id = '$city_id'");
                $category = $conn->query("SELECT name FROM industry WHERE id = '$industry'");
                $jobtype = $conn->query("SELECT type FROM job_type WHERE id = '$job_status'");
                $row1 = $location->fetch_row();
                $row2 = $category->fetch_row();
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
    					  <li><i class="icon-line-awesome-calendar-minus-o"></i> <?php echo $row['deadline']?></li>
    					</ul>
    				  </div>
    				</div>
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
    			   </div>
    			</a> 
			<?php } } ?> 
      <div class="clearfix"></div>
          <div class="row">
            <div class="col-md-12"> 
              <div class="utf-pagination-container-aera margin-top-10 margin-bottom-50">
                <nav class="pagination">
                  <ul>
            <li class="utf-pagination-arrow"><a href="#" class="ripple-effect"><i class="icon-material-outline-keyboard-arrow-left"></i></a></li>
                    <?php //display the link of the pages in URL  
                    for($page = 1; $page<= $number_of_page; $page++) {  ?>
                  <li><a href="./searchJob.php?page=<?php echo $page ?>&ask=<?php echo $searchKeyword ?>&loc=<?php echo $searchLocation ?>&cat=<?php echo $searchCategory ?>&type=<?php echo $searchJobType ?>" class="ripple-effect"><?php echo $page ?></a></li>
                  <?php }  ?>
                    <li class="utf-pagination-arrow"><a href="#" class="ripple-effect"><i class="icon-material-outline-keyboard-arrow-right"></i></a></li>
                  </ul>
                </nav>
              </div>
            </div>
          </div>
        <?php }else{
      ?>
        <div style="text-align: center;" class="utf-notify-box-aera margin-top-15">
          <div class="utf-switch-container-item">
            <span>No results found </span>
          </div>  
        </div>
      <?php }
      ?>
		</div>
    </div>
        <!-- Pagination -->
        <div class="clearfix"></div>

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