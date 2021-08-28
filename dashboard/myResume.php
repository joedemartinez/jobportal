<!-- Session -->
<?php include '../includes/session.php'; ?>
<!-- Session ends -->
<!-- Header --> 
<?php include '../includes/dashboardHeader.php'; ?>
<!-- Header end -->

<!-- account type -->
<?php include '../includes/jobseekerDashboard.php'; ?>
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
	<!-- error message  -->
    <?php include '../includes/errorMessage.php' ?>
    

    <div class="row"> 

        <!-- job seeker -->
        <?php if(($_SESSION['role_id']) == 1) :
          $id_user = $_SESSION['id_user'];
          // getting the job details
          $sql = "SELECT resume FROM users WHERE id_user='$id_user'";
          $query = $conn->query($sql);
          $row = $query->fetch_assoc();

        ?>
          <div class="col-xl-8">
            <div class="dashboard-box margin-top-0 margin-bottom-30"> 
              <div class="headline">
                <h3>My Resume</h3>
              </div>

              <div class="content with-padding padding-bottom-0">
                <div class="row">
                  <div class="col">
                    <?php if($row['resume'] == '') :?>
                      <p>No Resume!! Please Upload.</p>
                    <?php else: ?>
                    <iframe width="100%" height="700px" src="../assets/resume/<?php echo $row['resume'] ?>" frameborder="0" ></iframe>
                    <?php endif;?>
                  </div>
                </div>
              </div>
            </div>      
          </div>

          <div class="col-xl-4">
            <div id="test1" class="dashboard-box margin-top-0"> 
              <div class="headline">
                <h3>Change Resume</h3>
              </div>
              <div class="content with-padding">
                <div class="row">
                  <div class="col-xl-10 col-md-5 col-sm-5">
                    <div class="" data-tippy-placement="right" title="Change Resume"> 
                      <img class="" src="../assets/images/pdf.png" alt="" />
                      <form method="POST" action="../process/changeResume.php" enctype="multipart/form-data">
                        <input name="resume" type="file" accept=".pdf" required="">
                        <button type="submit" class="button ripple-effect big margin-top-10" name="changeResume">Changes Resume</a> 
                      </form>
                    </div>
                  </div>                  
                </div>
              </div>        
            </div>
          </div>  
          <?php endif; ?>      

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