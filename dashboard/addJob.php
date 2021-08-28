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
	  <!-- error message  -->
    <?php include '../includes/errorMessage.php' ?>
    

    <form method="post" action="../process/newJob.php">
    <div class="row"> 
      <div class="col-xl-12">
            <div class="dashboard-box"> 
              <div class="headline">
                <h3>Add New Job</h3>
              </div>
              <div class="content with-padding padding-bottom-10">
                <div class="row">
                  <div class="col-xl-6 col-md-6 col-sm-6">
                    <div class="utf-submit-field">
                      <h5>Job Title/Designation <i class="asterisks">*</i></h5>
                      <input type="text" class="utf-with-border" placeholder="Job Title" name="jobtitle" required="" >
                    </div>
                  </div>
              <div class="col-xl-6 col-md-6 col-sm-6">
                    <div class="utf-submit-field">
                      <h5>Job Category <i class="asterisks">*</i></h5>
                      <select class="selectpicker utf-with-border" data-size="7" title="Select Category" data-live-search="true"
data-selected-text-format="count" required="" name="industry">
                        <?php
                        //getting all industry
                          $sql = "SELECT * FROM industry";
                          $query = $conn->query($sql);
                          while($row = $query->fetch_assoc()){
                        ?>
                          <option value="<?php echo $row['id']?>"><?php echo $row['name']?></option> 
                        <?php
                          }
                        ?>
                      </select>
                    </div>
                  </div>
          <div class="col-xl-6 col-md-6 col-sm-6">
                    <div class="utf-submit-field">
                      <h5>Job Type <i class="asterisks">*</i></h5>
                      <select class="selectpicker utf-with-border" data-size="7" title="Select Job Type"data-live-search="true"
data-selected-text-format="count" required="" name="job_type">
                        <?php
                        //getting all job_type
                          $sql = "SELECT * FROM job_type";
                          $query = $conn->query($sql);
                          while($row = $query->fetch_assoc()){
                        ?>
                          <option value="<?php echo $row['id']?>"><?php echo $row['type']?></option> 
                        <?php
                          }
                        ?>
                      </select>
                    </div>
                  </div>
          <div class="col-xl-6 col-md-6 col-sm-6">
                    <div class="utf-submit-field">
                      <div class="row">
                        <div class="col-xl-6 col-md-6 col-sm-6">
                          <h5>Experience (Years) <i class="asterisks">*</i></h5>
                          <div class="utf-input-with-icon">
                            <input class="utf-with-border" type="number" placeholder="Experience" min="0" required="" name="experience">
                          </div>
                        </div>
                        <div class="col-xl-6 col-md-6 col-sm-6">
                            <h5>Edu. Qualification <i class="asterisks">*</i></h5>
                          <div class="utf-input-with-icon">
                            <select class="selectpicker utf-with-border" data-size="7" title="Select Education Qualification"data-live-search="true"
data-selected-text-format="count" required="" name="edu_qualification">
                              <?php
                              //getting all job_type
                                $sql = "SELECT * FROM education";
                                $query = $conn->query($sql);
                                while($row = $query->fetch_assoc()){
                              ?>
                                <option value="<?php echo $row['id']?>"><?php echo $row['name']?></option> 
                              <?php
                                }
                              ?>
                            </select>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
          
                  <div class="col-xl-6 col-md-6 col-sm-6">
                    <div class="utf-submit-field">
                      <h5>Location <i class="asterisks">*</i></h5>
                      <div class="row">
                        <div class="col-xl-6 col-md-6 col-sm-6">
                          <div class="utf-input-with-icon">
                            <select class="selectpicker utf-with-border" data-size="7" title="Select Region"data-live-search="true"
data-selected-text-format="count" required="" name="state">
                              <?php
                              //getting all job_type
                                $sql = "SELECT * FROM states";
                                $query = $conn->query($sql);
                                while($row = $query->fetch_assoc()){
                              ?>
                                <option value="<?php echo $row['id']?>"><?php echo $row['name']?></option> 
                              <?php
                                }
                              ?>
                            </select>
                          </div>
                        </div>
                        <div class="col-xl-6 col-md-6 col-sm-6">
                          <div class="utf-input-with-icon">
                            <select class="selectpicker utf-with-border" data-size="7" title="Select City"data-live-search="true"
data-selected-text-format="count" required="" name="city">
                              <?php
                              //getting all job_type
                                $sql = "SELECT * FROM cities";
                                $query = $conn->query($sql);
                                while($row = $query->fetch_assoc()){
                              ?>
                                <option value="<?php echo $row['id']?>"><?php echo $row['name']?></option> 
                              <?php
                                }
                              ?>
                            </select>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-xl-6 col-md-6 col-sm-6">
                    <div class="utf-submit-field">
                      <h5>Monthly Salary <i class="asterisks">*</i></h5>
                      <div class="row">
                        <div class="col-xl-6 col-md-6 col-sm-6">
                          <div class="utf-input-with-icon">
                            <input class="utf-with-border" type="number" placeholder="Min Salary" min="0" required="" name="minimumsalary">
                            <i class="currency">GH₵</i> 
              </div>
                        </div>
                        <div class="col-xl-6 col-md-6 col-sm-6">
                          <div class="utf-input-with-icon">
                            <input class="utf-with-border" type="number" placeholder="Max Salary" min="0" required="" name="maximumsalary">
                            <i class="currency">GH₵</i> 
              </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-xl-6 col-md-6 col-sm-6">
                    <div class="utf-submit-field">
                      <h5> Deadline<i class="asterisks">*</i></h5>
                      <input class="utf-with-border" type="date" placeholder="Deadline" value="<?php echo date('Y-m-d'); ?>" min="<?php echo date('Y-m-d'); ?>" required="" name="deadline"> 
                    </div>
                  </div>
                  <div class="col-xl-12 col-md-12 col-sm-12">
                   
                    <div class="utf-submit-field">
                      <!-- <i class="help-icon" data-tippy-placement="top" title="Maximum of 6 Skills"></i> -->
                      <h5>Job Skills <i class="asterisks">*</i></h5>
                        <textarea cols="20" rows="2" class="utf-with-border" placeholder="Skills..." name="skills" required=""></textarea>
                    </div>
                  </div>
                  <div class="col-xl-12 col-md-12 col-sm-12">
                    <div class="utf-submit-field">
                      <h5>Job Description <i class="asterisks">*</i></h5>
                      <textarea cols="20" rows="2" class="utf-with-border" placeholder="Job Description..." required="" name="description"></textarea>                      
                    </div>
                  </div>
                  <div class="col-xl-12 col-md-12 col-sm-12">
                    <div class="utf-submit-field">
                      <h5>Responsibilities <i class="asterisks">*</i></h5>
                      <textarea cols="20" rows="2" class="utf-with-border" placeholder="Responsibilities..." required="" name="responsibility"></textarea>                      
                    </div>
                  </div>
                </div>
              </div>        
            </div>
          </div>  
        </div>
    <div class="utf-centered-button">
      <button type="submit" name="submitJob" class="button utf-ripple-effect-dark utf-button-sliding-icon margin-top-0">Submit Jobs <i class="icon-feather-plus"></i></button>      
    </div>  
    </form>      



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