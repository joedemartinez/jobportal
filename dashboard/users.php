<!-- Session -->
<?php include '../includes/session.php'; ?>
<!-- Session ends -->
<!-- Header -->
<?php include '../includes/dashboardHeader.php'; ?>
<!-- Header end -->

<!-- account type -->
<?php include '../includes/adminDashboard.php'; ?>
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
    
    <div> <a href="#utf-signin-dialog-block" class="button orange popup-with-zoom-anim" data-tippy-placement="top" data-tippy="" data-original-title="Go Back"><i class="icon-material-outline-add"></i> Add new</a> </div>

    <div class="row"> 
      <div class="col-xl-12">
            <div class="dashboard-box"> 
              <div class="headline">
                <h3>All Users - Admin</h3>
              </div>
              <div class="content with-padding padding-bottom-10">
                <div>
                  <table id="example2" class="table table-bordered">
                    <thead>
                      <th>#</th>
                      <th>Profile Pic</th>
                      <th>Fullname</th>
                      <th>Email</th>
                      <th>Gender</th>
                      <th>Contact</th>
                      <th>DoB</th>
                      <th>Address</th>
                      <th>Action</th>
                    </thead>
                    <tbody>
                        <?php
                          $sql =  "SELECT * FROM admin ORDER BY id_admin DESC";
                          $query = $conn->query($sql);
                         //id auto increament in tables initiation
                          $i = 1;
                          while($row = $query->fetch_assoc()){

                            $admin_id = $row['id_admin'];
                                                            
                            echo "
                              <tr>
                                <td>". $i."</td>
                                <td><img height='50' width='50' src='../assets/images/".$row['profile_pic']."'></td>
                                <td>".$row['fullname']."</td>
                                <td>".$row['email']."</td>
                                <td>".$row['gender']."</td>
                                <td>".$row['contactno']."</td>
                                <td>".$row['dob']."</td>
                                <td>".$row['address']."</td>
                                <td>
                                <a href='#' class='button red ripple-effect ico delete' data-id='".$admin_id."' onclick='return confirm('Do you want to delete this job post?')' title='Remove' data-tippy-placement='top'><i class='icon-feather-trash-2'></i></a> 
                                </td>
                                </tr>";
                            $i++;
                          }
                        ?>
                    </tbody>
                  </table>
                </div>
              </div>        
            </div>
          </div>  
        </div>  


        <div class="utf-dashboard-footer-spacer-aera"></div>
        <?php include '../includes/dashboardFooter.php' ?>     
      </div>
    </div>    
	<!-- Dashboard Content End -->
  </div>
</div>
<!-- Wrapper / End --> 

<!-- Edit View Popup -->
<div id="utf-signin-dialog-block" class="zoom-anim-dialog mfp-hide dialog-with-tabs"> 
  <div class="utf-signin-form-part">
    <ul class="utf-popup-tabs-nav-item">
      <li><a href="#register">Register</a></li>
    </ul>
    <div class="utf-popup-container-part-tabs"> 
      <!-- Register -->
      <div class="utf-popup-tab-content-item" id="register"> 
        <div class="utf-welcome-text-item">
          <h3>Create your Account - Admin!</h3>
        </div>        
        <form method="post" id="utf-register-account-form" action="./process/register.php">
          <!-- <div class="utf-no-border margin-bottom-18">
            <select class="selectpicker utf-with-border acctype" data-size="5" title="Select Account Type" required="" name="acctype" id="acctype1">
            <option value="Applicant">Job Seeker/Applicant</option>
            <option value="Employer">Employer</option>      
          </select>
        </div> -->
          <div class="utf-no-border">
            <input type="text" class="utf-with-border" name="fullname"  placeholder="Full Name" required/>
          </div>
      <div class="utf-no-border">
            <input type="email" class="utf-with-border emailregister" name="email" placeholder="Email Address" required/>
            <div class="emailmessage"></div>
          </div>
          <div class="utf-no-border" title="Should be at least 8 characters long" data-tippy-placement="bottom">
            <input type="password" class="utf-with-border" name="password" id="passwordregister" placeholder="Password" minlength="8" required/>
            <span title="Show Password" toggle="#passwordregister" class="icon-feather-eye toggle-password showPassword"></span>
          </div>
          <div class="utf-no-border" title="Should be at least 8 characters long" data-tippy-placement="bottom">
            <input type="password" class="utf-with-border" name="passwordrepeat" id="passwordrepeat" placeholder="Repeat Password" minlength="8" required/>
            <span title="Show Password" toggle="#passwordrepeat" class="icon-feather-eye toggle-password showPassword"></span>
          </div>
        <div class="notification warning" id="passworderror" style="display: none;">
          <p>Password and Repeat Password do not match!</p>
        </div>
        <div class="notification success" id="passwordsuccess" style="display: none;">
          <p>Password and Repeat Password match!</p>
        </div>
      <!-- <div class="checkbox margin-top-0">
      <input type="checkbox" id="two-step2" >
      <label for="two-step2"><span class="checkbox-icon"></span> By Registering You Confirm That You Accept <a href="#">Terms & Conditions</a> and <a href="#">Privacy Policy</a></label>
      </div> -->
        </form>
        <button class="margin-top-10 button full-width utf-button-sliding-icon ripple-effect" type="submit" id="regisbtn" form="utf-register-account-form" name="aregisterbtn">Create an Account <i class="icon-feather-chevrons-right"></i></button>
      </div>
    </div>
  </div>
</div>

<!-- Edit View Popup / End --> 

<!-- Scripts -->
<?php include '../includes/dashboardScripts.php' ?>

<script>

//view
$(document).on("click", ".view", function(e){
    e.preventDefault();
    var id = $(this).data('id');
    var name = "view";
    // getRow(id, name);
    
}); 

function getRow(id, name){
  $.ajax({
    type: 'POST',
    url: '../process/jobpost_row.php',
    data: {id:id, name:name},
    dataType: 'json',
    success: function(response){
        // view
        $('#jobtitle_header').html(response.jobtitle);
        $('#jobdescription').html(response.description);
        $('#skills').html(response.skills_ability);
        $('#responsibility').html(response.responsibility);
        $('#salary').html('GH₵'+response.minimumsalary+' - GH₵'+response.maximumsalary);
        $('#industry').html(response.industry);
        $('#createdat').html(response.createdat);
        $('#edu_qualification').html(response.edu_qualification);
        $('#id_company').html(response.company);
        $('#experience').html(response.experience+" Years");
        $('#job_status').html(response.jobtype);
        $('#location').html(response.state+" - "+response.city);
        $('#deadline').html(response.deadline);
    }
  });
}


</script>

</body>
</html>