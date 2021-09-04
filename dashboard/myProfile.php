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
      <!-- error message  -->
    <?php include '../includes/errorMessage.php' ?>

      <div class="row"> 

        <!-- job seeker -->
        <?php if(($_SESSION['role_id']) == 1) :
          $id_user = $_SESSION['id_user'];
          // getting the job details
          $sql = "SELECT * FROM users WHERE id_user='$id_user'";
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

          //getting education info
          $education_id = $row['education_id'];
          $sql2 =  "SELECT * FROM education WHERE id = '$education_id'";
          $query2 = $conn->query($sql2);
          $row2 = $query2->fetch_assoc();

          //getting career industry info
          $career_id = $row['career_id'];
          $sql7 =  "SELECT * FROM industry WHERE id = '$career_id'";
          $query7 = $conn->query($sql7);
          $row7 = $query7->fetch_assoc();
        ?>
          <div class="col-xl-6">
            <div class="dashboard-box margin-top-0 margin-bottom-30"> 
              <div class="headline">
                <h3>My Profile Details</h3>
              </div>

              <div class="content with-padding padding-bottom-0">
                <div class="row">
                  <div class="col">
                    <div class="row">
                      <div class="col-xl-12">
                        <div class="row">
                          <div class="col-xl-5 col-md-3 col-sm-4">
                            <div class="utf-avatar-wrapper" data-tippy-placement="right" title="Tap to Change Profile Picture"> 
                              <?php if($row['profile_pic'] != ''): ?>
                                <img class="profile-pic" src="../assets/images/<?php echo $row['profile_pic'] ?>" alt="" />
                              <?php else: ?>
                                <img class="profile-pic" src="../assets/images/user.png" alt="" />
                              <?php endif;?>
                              <div class="upload-button"></div>
                              <form method="POST" action="../process/changePic.php" enctype="multipart/form-data">
                                <input class="file-upload" type="file" name="picture" accept="image/*" required="">
                                <button type="submit" class="button ripple-effect big margin-top-10" name="myPic">Changes Profile Pic</a> 
                              </form>
                            </div>
                          </div>
                          <div class="col-xl-7 col-md-9 col-sm-8"> 
                            <div class="utf-submit-field">
                              <h5>Account Type</h5>
                              <div class=".pricing-plan utf-pricing-plan-title-block">
                                <div class="utf-pricing-plan-label utf-pricing-monthly-label"><h4><i class="icon-material-outline-account-circle"></i> Job Seeker/Applicant</h4></div>
                              </div>
                            </div>
                          </div>

                        </div>
                      </div>  
                      <form method="POST" action="../process/changeProfile.php">
                      <div class="col-xl-12 col-md-6 col-sm-6">

                        <div class="utf-submit-field">
                          <h5>Full Name <i class="asterisks">*</i> <span id="enableAll" class="button yellow ripple-effect ico" title="Click to Edit Details" data-tippy-placement="top" style="left: 50%;"><i class="icon-feather-edit"></i></span></h5>
                          <input type="text" class="utf-with-border readonlyField" name="fullname" value="<?php echo $row['fullname'] ?>" readonly required>
                        </div>
                      </div>
                      <div class="col-xl-12 col-md-6 col-sm-6">
                        <div class="utf-submit-field">
                          <h5>Email Address <i class="asterisks">*</i></h5>
                          <input type="text" class="utf-with-border" name="email" value="<?php echo $row['email'] ?>" readonly  required>
                        </div>
                      </div>
                      <div class="col-xl-12 col-md-12 col-sm-12">
                        <div class="utf-submit-field">
                          <h5>About Me </h5>
                          <textarea id="aboutme" class="utf-with-border readonlyField" name="aboutme" cols="20" rows="3" readonly=""><?php echo $row['aboutme'] ?></textarea>
                        </div>
                      </div>
                      <div class="col-xl-12 col-md-6 col-sm-6 row">
                        <div class="col-xl-6 col-md-3 col-sm-3 utf-submit-field">
                          <h5>Headline <i class="asterisks">*</i></h5>
                          <input type="text" class="utf-with-border readonlyField" name="headline" value="<?php echo $row['headline'] ?>" readonly required placeholder="Position e.g System Admin">
                        </div>
                        <div class="col-xl-6 col-md-3 col-sm-3 utf-submit-field">
                          <h5>Phone Number <i class="asterisks">*</i></h5>
                          <input type="text" class="utf-with-border readonlyField" name="phoneno" value="<?php echo $row['contactno'] ?>" readonly required onkeypress="return validatePhone(event);" maxlength="10">
                        </div>
                      </div>
                      <div class="col-xl-12 col-md-6 col-sm-6 row">
                        <div class="col-xl-6 col-md-3 col-sm-3 utf-submit-field">
                          <h5>Date of Birth <i class="asterisks">*</i></h5>
                          <input type="date" class="utf-with-border readonlyField" name="dob" value="<?php echo $row['dob'] ?>" readonly required>
                        </div>
                        <div class="col-xl-6 col-md-3 col-sm-3 utf-submit-field">
                          <h5>Gender <i class="asterisks">*</i></h5>
                          <input type="text" class="utf-with-border readonlyField" name="gender" value="<?php echo $row['gender'] ?>" readonly required>
                        </div>
                      </div>
                      <div class="col-xl-12 col-md-6 col-sm-6 row">
                        <div class="col-xl-6 col-md-3 col-sm-3 utf-submit-field">
                          <h5>Region <i class="asterisks">*</i></h5>
                          <!-- <input type="text" class="utf-with-border displayNone" name="region" value="<?php echo $row1['name'] ?>" readonly required> -->
                          <select class="utf-with-border  selectpicker disabledField" name="region" data-live-search="true"  data-selected-text-format="count" data-size="10" required="">
                            <option value="<?php echo $state_id ?>" selected=""><?php echo $row1['name'] ?></option>
                            <?php
                            //getting all category
                              $regionsql = "SELECT * FROM states";
                              $regionquery = $conn->query($regionsql);
                              while($region = $regionquery->fetch_assoc()){
                            ?>
                            <option value="<?php echo $region['id']?>"><?php echo $region['name']?></option>
                            <?php
                              }
                            ?>
                          </select>
                        </div>
                        <div class="col-xl-6 col-md-3 col-sm-3 utf-submit-field">
                          <h5>City <i class="asterisks">*</i></h5>
                          <!-- <input type="text" class="utf-with-border displayNone" name="city" value="<?php echo $row6['name'] ?>" readonly required> -->
                          <select class="utf-with-border  selectpicker disabledField" name="city" data-live-search="true"  data-selected-text-format="count" data-size="10" required="">
                            <option value="<?php echo $city_id ?>" selected=""><?php echo $row6['name'] ?></option>
                            <?php
                            //getting all category
                              $citysql = "SELECT * FROM cities";
                              $cityquery = $conn->query($citysql);
                              while($cityrow = $cityquery->fetch_assoc()){
                            ?>
                            <option value="<?php echo $cityrow['id']?>"><?php echo $cityrow['name']?></option>
                            <?php
                              }
                            ?>
                          </select>
                        </div>
                      </div>
                      <div class="col-xl-12 col-md-6 col-sm-6">
                        <div class="utf-submit-field">
                          <h5>Residential Address <i class="asterisks">*</i></h5>
                          <input type="text" class="utf-with-border readonlyField" name="address" value="<?php echo $row['address'] ?>" readonly required>
                        </div>
                      </div>
                      <div class="col-xl-12 col-md-6 col-sm-6 row">
                        <div class="col-xl-6 col-md-3 col-sm-3 utf-submit-field">
                          <h5>Highest Education <i class="asterisks">*</i></h5>
                          <!-- <input type="text" class="utf-with-border displayNone" name="education" value="<?php echo $row2['name'] ?>" readonly required> -->
                          <select class="utf-with-border  selectpicker disabledField" name="education" data-live-search="true"  data-selected-text-format="count" data-size="10"  required="">
                            <option value="<?php echo $education_id ?>" selected=""><?php echo $row2['name'] ?></option>
                            <?php
                            //getting all category
                              $educationsql = "SELECT * FROM education";
                              $educationquery = $conn->query($educationsql);
                              while($educationrow = $educationquery->fetch_assoc()){
                            ?>
                            <option value="<?php echo $educationrow['id']?>"><?php echo $educationrow['name']?></option>
                            <?php
                              }
                            ?>
                          </select>
                        </div>
                        <div class="col-xl-6 col-md-3 col-sm-3 utf-submit-field">
                          <h5>Career Industry<i class="asterisks">*</i></h5>
                          <!-- <input type="text" class="utf-with-border displayNone" name="career" value="<?php echo $row7['name'] ?>" readonly required> -->
                          <select class="utf-with-border  selectpicker disabledField" name="career" data-live-search="true"  data-selected-text-format="count" data-size="10" required="">
                            <option value="<?php echo $career_id ?>" selected=""><?php echo $row7['name'] ?></option>
                            <?php
                            //getting all category
                              $careersql = "SELECT * FROM industry";
                              $careerquery = $conn->query($careersql);
                              while($careerrow = $careerquery->fetch_assoc()){
                            ?>
                            <option value="<?php echo $careerrow['id']?>"><?php echo $careerrow['name']?></option>
                            <?php
                              }
                            ?>
                          </select>
                        </div>
                      </div> 
                      <div class="col-xl-12 col-md-12 col-sm-12">
                        <div class="utf-submit-field">
                          <h5>Skills</h5>
                          <textarea class="utf-with-border readonlyField" name="skills" cols="20" rows="3" readonly=""><?php echo $row['skills'] ?></textarea>
                        </div>
                      </div>
                      <div class="col-xl-12 col-md-12 col-sm-12">
                        <div class="utf-submit-field text-center">   
                          <button type="submit" name="myProfile" class="button ripple-effect big margin-top-10 margin-bottom-20 readonlyBtn" disabled="">Save Changes</button>
                        </div>
                      </div>
                      </form>  
                    </div>
                  </div>
                </div>
                
              </div>
            </div>      
          </div>

          <div class="col-xl-6">
            <div id="test1" class="dashboard-box margin-top-0"> 
              <div class="headline">
                <h3>Change Password</h3>
              </div>
              <div class="content with-padding">
                <form method="POST" action="../process/changePassword.php">
                <div class="row">
                  <div class="col-xl-12 col-md-6 col-sm-6">
                    <div class="utf-submit-field">
                      <h5>New Password <i class="asterisks">*</i></h5>
                      <input type="password" class="utf-with-border" id="passwordregister" title="The password must be at least 8 characters" data-tippy-placement="top" placeholder="New Password" minlength="8" required="" name="newPassword">
                      <span title="Show Password" toggle="#passwordregister" class="icon-feather-eye toggle-password showPassword"></span>
                    </div>
                  </div>
                  <div class="col-xl-12 col-md-6 col-sm-6">
                    <div class="utf-submit-field">
                      <h5>Confirm New Password <i class="asterisks">*</i></h5>
                      <input type="password" class="utf-with-border" id="passwordrepeat" title="The password must be at least 8 characters" data-tippy-placement="top" placeholder="Confirm New Password" minlength="8" required="" name="confirmPassword">
                      <span title="Show Password" toggle="#passwordrepeat" class="icon-feather-eye toggle-password showPassword"></span>
                    </div>
                  </div> 
                  <div class="col-xl-12 col-md-6 col-sm-6">
                    <div class="notification warning" id="passworderror" style="display: none;">
                      <p>New Password and Confirm Password do not match!</p>
                    </div>
                    <div class="notification success" id="passwordsuccess" style="display: none;">
                      <p>New Password and Confirm Password match!</p>
                    </div> 
                  </div>                
                </div>
                <button type="submit" name="myPassword" id="regisbtn" class="button ripple-effect big margin-top-10">Changes Password</button> 
                </form>
              </div>        
            </div>

            <div id="test1" class="dashboard-box margin-top-0"> 
              <div class="headline">
                <h3>Deactivate Account</h3>
              </div>
              <div class="content with-padding">
                <form method="POST" action="#">
                <button type="submit" name="myPassword"  class="button ripple-effect big margin-top-10"> Deactivate Account</button> 
                </form>
              </div>        
            </div>
          </div> 


          <?php endif; ?>      


          <!-- employer   -->
          <?php if(($_SESSION['role_id']) == 2) :
          $id_company = $_SESSION['id_company'];
          // getting the employer details
          $sql = "SELECT * FROM company WHERE id_company='$id_company'";
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

          //getting education info
          $education_id = $row['education_id'];
          $sql2 =  "SELECT * FROM education WHERE id = '$education_id'";
          $query2 = $conn->query($sql2);
          $row2 = $query2->fetch_assoc();

          //getting industry info
          $industry_id = $row['industry_id'];
          $sql3 =  "SELECT * FROM industry WHERE id = '$industry_id'";
          $query3 = $conn->query($sql3);
          $row3 = $query3->fetch_assoc();

          // //job status
          // $job_status = $row['job_status'];
          // $jobtype = $conn->query("SELECT type FROM job_type WHERE id = '$job_status'");
          // $jobtype = $jobtype->fetch_row();
        ?>
          <div class="col-xl-6">
            <div class="dashboard-box margin-top-0 margin-bottom-30"> 
              <div class="headline">
                <h3> Profile Details</h3>
              </div>

              <div class="content with-padding padding-bottom-0">
                <div class="row">
                  <div class="col">
                    <div class="row">
                      <div class="col-xl-12">
                      <div class="row">
                        <div class="col-xl-5 col-md-3 col-sm-4">
                          <div class="utf-avatar-wrapper" data-tippy-placement="right" title="Tap to Change Profile Picture"> 
                            <?php if($row['profile_pic'] != ''): ?>
                              <img class="profile-pic" src="../assets/images/<?php echo $row['profile_pic'] ?>" alt="" />
                            <?php else: ?>
                              <img class="profile-pic" src="../assets/images/user.png" alt="" />
                            <?php endif;?>
                            <div class="upload-button"></div>
                            <form method="POST" action="../process/changePic.php" enctype="multipart/form-data">
                              <input class="file-upload" type="file" name="picture" accept="image/*" required="">
                              <button type="submit" class="button ripple-effect big margin-top-10" name="thePic">Changes Profile Pic</a> 
                            </form>
                          </div>
                        </div>
                        <div class="col-xl-7 col-md-9 col-sm-8"> 
                          <div class="utf-submit-field">
                            <h5>Account Type</h5>
                            <div class=".pricing-plan utf-pricing-plan-title-block">
                              <div class="utf-pricing-plan-label utf-pricing-monthly-label"><h4><i class="icon-material-outline-business-center"></i> Employer</h4></div>
                            </div>
                          </div>
                        </div>
                      </div>
                      </div> 
                      <form method="POST" action="../process/changeProfile.php"> 
                      <div class="col-xl-12 col-md-6 col-sm-6">
                        <div class="utf-submit-field">
                          <h5>Company's Name <i class="asterisks">*</i>  <span id="enableAll" class="button yellow ripple-effect ico" title="Click to Edit Details" data-tippy-placement="top" style="left: 50%;"><i class="icon-feather-edit"></i></span></h5>
                          <input type="text" class="utf-with-border readonlyField" name="companyname" value="<?php echo $row['companyname'] ?>" readonly required>
                        </div>
                      </div>
                      <div class="col-xl-12 col-md-6 col-sm-6">
                        <div class="utf-submit-field">
                          <h5>Email Address <i class="asterisks">*</i></h5>
                          <input type="text" class="utf-with-border" name="email" value="<?php echo $row['email'] ?>" readonly required>
                        </div>
                      </div>
                      <div class="col-xl-12 col-md-12 col-sm-12">
                        <div class="utf-submit-field">
                          <h5>About Me <i class="asterisks">*</i></h5>
                          <textarea name="aboutme" id="aboutme" class="utf-with-border readonlyField" cols="20" rows="3" readonly="" required=""><?php echo $row['aboutme'] ?></textarea>
                        </div>
                      </div>
                      <div class="col-xl-12 col-md-6 col-sm-6 row">
                        <div class="col-xl-6 col-md-3 col-sm-3 utf-submit-field">
                          <h5>Industry <i class="asterisks">*</i></h5>
                          <!-- <input type="text" class="utf-with-border readonlyField" name="industry" value="<?php echo $row3['name'] ?>" readonly required> -->
                          <select class="utf-with-border  selectpicker disabledField" name="industry" data-live-search="true"  data-selected-text-format="count" data-size="10" required="">
                            <option value="<?php echo $industry_id ?>" selected=""><?php echo $row3['name'] ?></option>
                            <?php
                            //getting all category
                              $careersql = "SELECT * FROM industry";
                              $careerquery = $conn->query($careersql);
                              while($careerrow = $careerquery->fetch_assoc()){
                            ?>
                            <option value="<?php echo $careerrow['id']?>"><?php echo $careerrow['name']?></option>
                            <?php
                              }
                            ?>
                          </select>
                        </div>
                        <div class="col-xl-6 col-md-3 col-sm-3 utf-submit-field">
                          <h5>Phone Number <i class="asterisks">*</i></h5>
                          <input type="text" class="utf-with-border readonlyField" name="contactno" value="<?php echo $row['contactno'] ?>" readonly required maxlength="10" onkeypress="return validatePhone(event);">
                        </div>
                      </div>
                      <div class="col-xl-12 col-md-6 col-sm-6 row">
                        <div class="col-xl-6 col-md-3 col-sm-3 utf-submit-field">
                          <h5>Date of Establishment <i class="asterisks">*</i></h5>
                          <input type="text" class="utf-with-border readonlyField" name="esta_date" value="<?php echo $row['esta_date'] ?>" readonly required>
                        </div>
                        <div class="col-xl-6 col-md-3 col-sm-3 utf-submit-field">
                          <h5>No. of Employees <i class="asterisks">*</i></h5>
                          <input type="Number" class="utf-with-border readonlyField" name="empno" value="<?php echo $row['empno'] ?>" readonly required min="0">
                        </div>
                      </div>

                      <div class="col-xl-12 col-md-6 col-sm-6">
                        <div class="utf-submit-field">
                          <h5>Website link</h5>
                          <input type="text" class="utf-with-border readonlyField" name="website" value="<?php echo $row['website'] ?>" readonly>
                        </div>
                      </div> 
                      <div class="col-xl-12 col-md-6 col-sm-6 row">
                        <div class="col-xl-6 col-md-3 col-sm-3 utf-submit-field">
                          <h5>Region <i class="asterisks">*</i></h5>
                          <!-- <input type="text" class="utf-with-border readonlyField" name="region" value="<?php echo $row1['name'] ?>" readonly required> -->
                          <select class="utf-with-border  selectpicker disabledField" name="region" data-live-search="true"  data-selected-text-format="count" data-size="10" required="">
                            <option value="<?php echo $state_id ?>" selected=""><?php echo $row1['name'] ?></option>
                            <?php
                            //getting all category
                              $regionsql = "SELECT * FROM states";
                              $regionquery = $conn->query($regionsql);
                              while($region = $regionquery->fetch_assoc()){
                            ?>
                            <option value="<?php echo $region['id']?>"><?php echo $region['name']?></option>
                            <?php
                              }
                            ?>
                          </select>
                        </div>
                        <div class="col-xl-6 col-md-3 col-sm-3 utf-submit-field">
                          <h5>City <i class="asterisks">*</i></h5>
                          <!-- <input type="text" class="utf-with-border readonlyField" name="city" value="<?php echo $row6['name'] ?>" readonly required> -->
                          <select class="utf-with-border  selectpicker disabledField" name="city" data-live-search="true"  data-selected-text-format="count" data-size="10" required="">
                            <option value="<?php echo $city_id ?>" selected=""><?php echo $row6['name'] ?></option>
                            <?php
                            //getting all category
                              $citysql = "SELECT * FROM cities";
                              $cityquery = $conn->query($citysql);
                              while($cityrow = $cityquery->fetch_assoc()){
                            ?>
                            <option value="<?php echo $cityrow['id']?>"><?php echo $cityrow['name']?></option>
                            <?php
                              }
                            ?>
                          </select>
                        </div>
                      </div>  
                      <div class="col-xl-12 col-md-6 col-sm-6">
                        <div class="utf-submit-field">
                          <h5>Residential Address <i class="asterisks">*</i></h5>
                          <input type="text" class="utf-with-border readonlyField" name="address" value="<?php echo $row['address'] ?>" readonly required>
                        </div>
                      </div>  
                      <div class="col-xl-12 col-md-12 col-sm-12">
                        <div class="utf-submit-field text-center">   
                          <button type="submit" name="theProfile" class="button ripple-effect big margin-top-10 margin-bottom-20 readonlyBtn" disabled="">Save Changes</button>
                        </div>
                      </div> 
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>      
          </div>

          <div class="col-xl-6">
            <div id="test10" class="dashboard-box margin-top-0"> 
              <div class="headline">
                <h3>Change Password</h3>
              </div>
              <div class="content with-padding">
                <form method="POST" action="../process/changePassword.php">
                <div class="row">
                  <div class="col-xl-12 col-md-6 col-sm-6">
                    <div class="utf-submit-field">
                      <h5>New Password <i class="asterisks">*</i></h5>
                      <input type="password" class="utf-with-border" id="passwordregister1" title="The password must be at least 8 characters" data-tippy-placement="top" placeholder="New Password" minlength="8" required="" name="newPassword">
                      <span title="Show Password" toggle="#passwordregister1" class="icon-feather-eye toggle-password showPassword"></span>
                    </div>
                  </div>
                  <div class="col-xl-12 col-md-6 col-sm-6">
                    <div class="utf-submit-field">
                      <h5>Confirm New Password <i class="asterisks">*</i></h5>
                      <input type="password" class="utf-with-border" id="passwordrepeat1" title="The password must be at least 8 characters" data-tippy-placement="top" placeholder="Confirm New Password" minlength="8" required="" name="confirmPassword">
                      <span title="Show Password" toggle="#passwordrepeat1" class="icon-feather-eye toggle-password showPassword"></span>
                    </div>
                  </div> 
                  <div class="col-xl-12 col-md-6 col-sm-6">
                    <div class="notification warning" id="passworderror " style="display: none;">
                      <p>New Password and Confirm Password do not match!</p>
                    </div>
                    <div class="notification success" id="passwordsuccess " style="display: none;">
                      <p>New Password and Confirm Password match!</p>
                    </div> 
                  </div>                
                </div>
                <button type="submit" name="thePassword" id="regisbtn1" class="button ripple-effect big margin-top-10">Changes Password</button> 
                </form>
              </div>        
            </div>

            <div id="test00" class="dashboard-box margin-top-0"> 
              <div class="headline">
                <h3>Deactivate Account</h3>
              </div>
              <div class="content with-padding">
                <form method="POST" action="#">
                <button type="submit" name="thePassword"  class="button ripple-effect big margin-top-10"> Deactivate Account</button> 
                </form>
              </div>        
            </div>
          </div>

          <?php endif; ?>      



          <!-- Admin -->
        <?php if(($_SESSION['role_id']) == 3) :
          $id_admin = $_SESSION['id_admin'];
          // getting the job details
          $sql = "SELECT * FROM admin WHERE id_admin='$id_admin'";
          $query = $conn->query($sql);
          $row = $query->fetch_assoc();
        ?>
          <div class="col-xl-6">
            <div class="dashboard-box margin-top-0 margin-bottom-30"> 
              <div class="headline">
                <h3>My Profile Details</h3>
              </div>

              <div class="content with-padding padding-bottom-0">
                <div class="row">
                  <div class="col">
                    <div class="row">
                      <div class="col-xl-12">
                        <div class="row">
                          <div class="col-xl-5 col-md-3 col-sm-4">
                            <div class="utf-avatar-wrapper" data-tippy-placement="right" title="Tap to Change Profile Picture"> 
                              <?php if($row['profile_pic'] != ''): ?>
                                <img class="profile-pic" src="../assets/images/<?php echo $row['profile_pic'] ?>" alt="" />
                              <?php else: ?>
                                <img class="profile-pic" src="../assets/images/user.png" alt="" />
                              <?php endif;?>
                              <div class="upload-button"></div>
                              <form method="POST" action="../process/changePic.php" enctype="multipart/form-data">
                                <input class="file-upload" type="file" name="picture" accept="image/*" required="">
                                <button type="submit" class="button ripple-effect big margin-top-10" name="aPic">Changes Profile Pic</a> 
                              </form>
                            </div>
                          </div>
                          <div class="col-xl-7 col-md-9 col-sm-8"> 
                            <div class="utf-submit-field">
                              <h5>Account Type</h5>
                              <div class=".pricing-plan utf-pricing-plan-title-block">
                                <div class="utf-pricing-plan-label utf-pricing-monthly-label"><h4><i class="icon-material-outline-account-circle"></i> Admin</h4></div>
                              </div>
                            </div>
                          </div>

                        </div>
                      </div>  
                      <form method="POST" action="../process/changeProfile.php">
                      <div class="col-xl-12 col-md-6 col-sm-6">

                        <div class="utf-submit-field">
                          <h5>Full Name <i class="asterisks">*</i> <span id="enableAll" class="button yellow ripple-effect ico" title="Click to Edit Details" data-tippy-placement="top" style="left: 50%;"><i class="icon-feather-edit"></i></span></h5>
                          <input type="text" class="utf-with-border readonlyField" name="fullname" value="<?php echo $row['fullname'] ?>" readonly required>
                        </div>
                      </div>
                      <div class="col-xl-12 col-md-6 col-sm-6">
                        <div class="utf-submit-field">
                          <h5>Email Address <i class="asterisks">*</i></h5>
                          <input type="text" class="utf-with-border" name="email" value="<?php echo $row['email'] ?>" readonly  required>
                        </div>
                      </div>
                      <div class="col-xl-12 col-md-6 col-sm-6">
                        <div class="utf-submit-field">
                          <h5>Phone Number <i class="asterisks">*</i></h5>
                          <input type="text" class="utf-with-border readonlyField" name="phoneno" value="<?php echo $row['contactno'] ?>" readonly required onkeypress="return validatePhone(event);" maxlength="10">
                        </div>
                      </div>
                      <div class="col-xl-12 col-md-6 col-sm-6 row">
                        <div class="col-xl-6 col-md-3 col-sm-3 utf-submit-field">
                          <h5>Date of Birth <i class="asterisks">*</i></h5>
                          <input type="date" class="utf-with-border readonlyField" name="dob" value="<?php echo $row['dob'] ?>" readonly required>
                        </div>
                        <div class="col-xl-6 col-md-3 col-sm-3 utf-submit-field">
                          <h5>Gender <i class="asterisks">*</i></h5>
                          <input type="text" class="utf-with-border readonlyField" name="gender" value="<?php echo $row['gender'] ?>" readonly required>
                        </div>
                      </div>
                      
                      <div class="col-xl-12 col-md-6 col-sm-6">
                        <div class="utf-submit-field">
                          <h5>Residential Address <i class="asterisks">*</i></h5>
                          <input type="text" class="utf-with-border readonlyField" name="address" value="<?php echo $row['address'] ?>" readonly required>
                        </div>
                      </div>
                      <div class="col-xl-12 col-md-12 col-sm-12">
                        <div class="utf-submit-field text-center">   
                          <button type="submit" name="aProfile" class="button ripple-effect big margin-top-10 margin-bottom-20 readonlyBtn" disabled="">Save Changes</button>
                        </div>
                      </div>
                      </form>  
                    </div>
                  </div>
                </div>
                
              </div>
            </div>      
          </div>

          <div class="col-xl-6">
            <div id="test1" class="dashboard-box margin-top-0"> 
              <div class="headline">
                <h3>Change Password</h3>
              </div>
              <div class="content with-padding">
                <form method="POST" action="../process/changePassword.php">
                <div class="row">
                  <div class="col-xl-12 col-md-6 col-sm-6">
                    <div class="utf-submit-field">
                      <h5>New Password <i class="asterisks">*</i></h5>
                      <input type="password" class="utf-with-border" id="passwordregister" title="The password must be at least 8 characters" data-tippy-placement="top" placeholder="New Password" minlength="8" required="" name="newPassword">
                      <span title="Show Password" toggle="#passwordregister" class="icon-feather-eye toggle-password showPassword"></span>
                    </div>
                  </div>
                  <div class="col-xl-12 col-md-6 col-sm-6">
                    <div class="utf-submit-field">
                      <h5>Confirm New Password <i class="asterisks">*</i></h5>
                      <input type="password" class="utf-with-border" id="passwordrepeat" title="The password must be at least 8 characters" data-tippy-placement="top" placeholder="Confirm New Password" minlength="8" required="" name="confirmPassword">
                      <span title="Show Password" toggle="#passwordrepeat" class="icon-feather-eye toggle-password showPassword"></span>
                    </div>
                  </div> 
                  <div class="col-xl-12 col-md-6 col-sm-6">
                    <div class="notification warning" id="passworderror" style="display: none;">
                      <p>New Password and Confirm Password do not match!</p>
                    </div>
                    <div class="notification success" id="passwordsuccess" style="display: none;">
                      <p>New Password and Confirm Password match!</p>
                    </div> 
                  </div>                
                </div>
                <button type="submit" name="aPassword" id="regisbtn" class="button ripple-effect big margin-top-10">Changes Password</button> 
                </form>
              </div>        
            </div>

            <div id="test1" class="dashboard-box margin-top-0"> 
              <div class="headline">
                <h3>Deactivate Account</h3>
              </div>
              <div class="content with-padding">
                <form method="POST" action="#">
                <button type="submit" name="aPassword"  class="button ripple-effect big margin-top-10"> Deactivate Account</button> 
                </form>
              </div>        
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