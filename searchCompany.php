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
  <div class="intro-banner" data-background-image="assets/images/browseCompaniesWallpaper.jpg">
    <div class="container"> 
      <div class="row">
        <div class="col-md-12">
          <div class="utf-banner-headline-text-part">
            <h3>Browse Companies</h3>
          </div>
        </div>
      </div>
      
      <form method="post" action="searchCompany.php?comNames=names">
	      <div class="row">
	        <!-- Job Search Field -->
	        <?php include 'includes/jobSearchField.php' ?> 
	    	</div>
	    </form>
      </div>
    </div>
  </div>

    <!-- Page Content -->
<div class="container padding-top-40">
	<div class="utf-inner-search-section-title">
		<div class="col-xl-12">
			<h4><i class="icon-material-outline-search"></i> Showing Results</h4>
		</div>
	</div>
	<div class="row">
	     <div class="utf-companies-list-aera">
			<div class="col-xl-12">
				<div class="row">
					<!-- getting all companies -->
					<?php
						if(isset($_GET['page']) || isset($_POST['submitSearch'])){
							$sqlState = '';
			                if(isset($_POST['searchLocation'])){
			                  if($_POST['searchLocation'] != ''){
			                    $searchLocation = $_POST['searchLocation'];
			                    $sqlState .= " city_id = '$searchLocation'";
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

			               //define total number of results you want per page  
				            $results_per_page = 12;  
				          
				            //determine which page number visitor is currently on  
				            if (!isset($_GET['page']) ) {  
				                $page = 1;  
				            } else {  
				            	$sqlState = '';
				                $page = $_GET['page'];
				                if ($_GET['loc'] != ''){
				                	$searchLocation = $_GET['loc'];
				                	$sqlState .=  "city_id = '$searchLocation'";
				                }
				                if ($_GET['cat'] != ''){
				                	$searchCategory = $_GET['cat'];
				                	if($sqlState != ''){
				                		$sqlState .=  " AND industry_id = '$searchCategory'";
				                	}else $sqlState .=  " industry_id = '$searchCategory'";
				                }   
				                
				            } 

			            if ($sqlState == '') {
			                $query = "SELECT * FROM company WHERE id_company = 0 ";
			            }else $query = "SELECT * FROM company WHERE ".$sqlState;

			            $result = mysqli_query($conn, $query);  
			            $number_of_result = mysqli_num_rows($result);  
			          
			            //determine the total number of pages available  
			            $number_of_page = ceil ($number_of_result / $results_per_page);

			            //determine the sql LIMIT starting number for the results on the displaying page  
            			$page_first_result = ($page-1) * $results_per_page;  

            			if ($sqlState == '') {
			                $sql = "SELECT * FROM company WHERE id_company = 0";
			            }else $sql = "SELECT * FROM company WHERE ".$sqlState." LIMIT ". $page_first_result . ',' . $results_per_page;

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
				            $hash = md5($row['id_company']);
				            $job_id = $row['id_company'];
			            	$city_id = $row['city_id'];
			            	$industry = $row['industry_id'];
			            	$state_id = $row['state_id'];
			            	$location = $conn->query("SELECT name FROM cities WHERE id = '$city_id'");
			            	$category = $conn->query("SELECT name FROM industry WHERE id = '$industry'");
			            	$state = $conn->query("SELECT name FROM states WHERE id = '$state_id'");
			            	$row1 = $location->fetch_row();
			            	$row2 = $category->fetch_row();
			            	$row3 = $state->fetch_row();
			          ?>
					<div class="col-xl-4 col-md-6 col-sm-12">
						<div class="utf-company-inner-alignment">
							<a href="./companyDetails.php?key=<?php echo $hash.'&id='.$job_id;?>" class="company">
								<!-- <span class="dashboard-status-button utf-job-status-item green"><i class="icon-material-outline-business-center"></i> Full Time</span> -->
								<span class="company-logo"><img src="assets/images/<?php echo $row['profile_pic'] ?>" alt=""></span>
								<h4><?php echo $row['companyname'] ?></h4>
								<h5 class="utf-job-listing-company"><span><i class="icon-feather-briefcase"></i><?php echo $row2[0] ?></span></h5>
								<p class="text-muted"><i class="icon-material-outline-location-on"></i> <?php echo $row3[0].', '.$row1[0] ?></p>
								<div class="utf-star-rating" data-rating="4.5"></div>
							</a>
						</div>						
					</div>
					<?php } } ?> 
			              <div class="utf-pagination-container-aera margin-top-10 margin-bottom-50">
			                <nav class="pagination">
			                  <ul>
			            <li class="utf-pagination-arrow"><a href="#" class="ripple-effect"><i class="icon-material-outline-keyboard-arrow-left"></i></a></li>
			                    <?php //display the link of the pages in URL  
			                    for($page = 1; $page<= $number_of_page; $page++) {  ?>
			                  <li><a href="./searchCompany.php?comNames=names&page=<?php echo $page ?>&loc=<?php echo $searchLocation ?>&cat=<?php echo $searchCategory ?>" class="ripple-effect"><?php echo $page ?></a></li>
			                  <?php }  ?>
			                    <li class="utf-pagination-arrow"><a href="#" class="ripple-effect"><i class="icon-material-outline-keyboard-arrow-right"></i></a></li>
			                  </ul>
			                </nav>
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
			<!-- <div class="utf-pagination-container-aera margin-top-20 margin-bottom-40">
			  <nav class="pagination">
				<ul>
				  <li class="utf-pagination-arrow"><a href="#" class="ripple-effect"><i class="icon-material-outline-keyboard-arrow-left"></i></a></li>
				  <li><a href="#" class="ripple-effect current-page">1</a></li>
				  <li><a href="" class="ripple-effect">2</a></li>
				  <li><a href="#" class="ripple-effect">3</a></li>
				  <li class="utf-pagination-arrow"><a href="#" class="ripple-effect"><i class="icon-material-outline-keyboard-arrow-right"></i></a></li>
				</ul>
			  </nav>
			</div>
			<div class="clearfix"></div> -->
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