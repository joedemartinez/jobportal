<!-- Session -->
<?php include '../includes/session.php'; ?>
<!-- Session ends -->
<!-- Header -->
<?php include '../includes/dashboardHeader.php'; ?>
<!-- Header end -->
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
		<!-- error message	 -->
    <?php include '../includes/errorMessage.php' ?>

        <div class="utf-funfacts-container-aera">
          <!-- job seeker -->
          <?php if(($_SESSION['role_id']) == 1) :?>
          <div class="fun-fact" data-fun-fact-color="#2a41e8">
			      <div class="fun-fact-icon"><i class="icon-feather-home"></i></div>
              <div class="fun-fact-text"> 
              <h4>
                <?php
                $id_user = $_SESSION['id_user'];
                $career_id = $conn->query("SELECT career_id FROM users WHERE id_user = '$id_user'");
                $career_id = $career_id->fetch_row();
                $career = $conn->query("SELECT name FROM industry WHERE id = '$career_id[0]'");
                $career = $career->fetch_row();

                $sql = "SELECT * FROM job_post WHERE industry_id = '$career_id[0]'";
                $query = $conn->query($sql);

                echo $query->num_rows;
                ?> 
              </h4>
			        <span><?php echo $career[0] ?> Jobs</span>
            </div>            
          </div>
          <div class="fun-fact" data-fun-fact-color="#36bd78">
			      <div class="fun-fact-icon"><i class="icon-feather-briefcase"></i></div>
            <div class="fun-fact-text"> 
              <h4>
                <?php
                  $id_user = $_SESSION['id_user'];
                  $sql = "SELECT * FROM applied_jobposts WHERE id_user = '$id_user'";
                  $query = $conn->query($sql);

                  echo $query->num_rows;
                ?> 
              </h4>
			        <span>Applied Jobs</span>
            </div>            
          </div>
          <div class="fun-fact" data-fun-fact-color="#efa80f">
			   <div class="fun-fact-icon"><i class="icon-feather-heart"></i></div>
            <div class="fun-fact-text"> 
            <h4>
              <?php
                $id_user = $_SESSION['id_user'];
                $sql = "SELECT * FROM saved_jobposts WHERE id_user = '$id_user'";
                $query = $conn->query($sql);

                echo $query->num_rows;
                ?> 
            </h4>
			      <span>Saved Jobs</span>
            </div>            
          </div>
          <?php endif; ?> 

          <!-- company or employer -->
          <?php if(($_SESSION['role_id']) == 2) :?>
          <div class="fun-fact" data-fun-fact-color="#0fc5bf">
            <div class="fun-fact-icon"><i class="icon-brand-telegram-plane"></i></div>
			        <div class="fun-fact-text"> 
              <h4>
                <?php
                $id_company = $_SESSION['id_company'];

                $sql = "SELECT * FROM job_post WHERE id_company = '$id_company'";
                $query = $conn->query($sql);

                echo $query->num_rows;
                ?> 
              </h4>
			        <span>Jobs Posted</span>
            </div>            
          </div>
		  <div class="fun-fact" data-fun-fact-color="#f02727">
            <div class="fun-fact-icon"><i class="icon-material-outline-rate-review"></i></div>
			<div class="fun-fact-text"> 
              <h4>
                <?php
                $id_company = $_SESSION['id_company'];

                $sql = "SELECT * FROM company_reviews WHERE id_company = '$id_company'";
                $query = $conn->query($sql);

                echo $query->num_rows;
                ?>
              </h4>
			  <span>Reviews</span>
            </div>            
          </div>
          <div class="fun-fact" data-fun-fact-color="#efa80f">
         <div class="fun-fact-icon"><i class="icon-brand-blogger"></i></div>
            <div class="fun-fact-text"> 
            <h4>
              <?php
                $id_company = $_SESSION['id_company'];
                $sql = "SELECT * FROM blogs WHERE createdby = '$id_company'";
                $query = $conn->query($sql);

                echo $query->num_rows;
                ?> 
            </h4>
            <span>Blogs</span>
            </div>            
          </div>
          <?php endif; ?>


          <!-- admin -->
          <?php if(($_SESSION['role_id']) == 3) :?>
          <div class="fun-fact" data-fun-fact-color="#2a41e8">
            <div class="fun-fact-icon"><i class="icon-feather-briefcase"></i></div>
              <div class="fun-fact-text"> 
              <h4>
                <?php
                $sql = "SELECT * FROM job_post";
                $query = $conn->query($sql);

                echo $query->num_rows;
                ?> 
              </h4>
              <span> Jobs</span>
            </div>            
          </div>
          <div class="fun-fact" data-fun-fact-color="#36bd78">
            <div class="fun-fact-icon"><i class="icon-line-awesome-building"></i></div>
            <div class="fun-fact-text"> 
              <h4>
                <?php
                  $sql = "SELECT * FROM company";
                  $query = $conn->query($sql);

                  echo $query->num_rows;
                ?> 
              </h4>
              <span>Companies/Employers</span>
            </div>            
          </div>
          <div class="fun-fact" data-fun-fact-color="#efa80f">
         <div class="fun-fact-icon"><i class="icon-material-outline-group"></i></div>
            <div class="fun-fact-text"> 
            <h4>
              <?php
                $sql = "SELECT * FROM users";
                $query = $conn->query($sql);

                echo $query->num_rows;
                ?> 
            </h4>
            <span>Job Seekers</span>
            </div>            
          </div>
          <div class="fun-fact" data-fun-fact-color="#efa80f">
         <div class="fun-fact-icon"><i class="icon-brand-blogger"></i></div>
            <div class="fun-fact-text"> 
            <h4>
              <?php
                $sql = "SELECT * FROM blogs";
                $query = $conn->query($sql);

                echo $query->num_rows;
                ?> 
            </h4>
            <span>Blogs</span>
            </div>            
          </div>
          <?php endif; ?> 
        </div>
        

				
		
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