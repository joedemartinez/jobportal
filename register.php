
<!-- Session -->
<?php include 'includes/session.php'; ?>
<!-- Session ends -->
<!-- if user is logged in -->
<?php
  if ($_SESSION) {
    if (isset($_SESSION['email'])) {
      header('location: ./index.php');
    }
  }
?>
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
  

  <!-- Page Content -->
 <!-- Page Content -->
  <div class="container padding-top-40">
    <div class="row">
      <div class="col-xl-6 offset-xl-3">
        <!-- Error messaged -->
        <?php include 'includes/errorMessage.php'?>

        <div class="utf-login-register-page-aera margin-bottom-50"> 
          <div class="utf-welcome-text-item">
            <h3>Create Your New Account!</h3>
            <span>Already Have an Account? <a href="./login.php">Log In!</a></span> 
      </div>
          
          <form method="post" id="utf-register-account-form1" action="./process/register.php">
            <div class="utf-no-border margin-bottom-18">
              <select class="selectpicker utf-with-border acctype" data-size="5" title="Select Account Type" required="" name="acctype" id="acctype">
              <option value="Applicant">Job Seeker/Applicant</option>
              <option value="Employer">Employer</option>      
            </select>
        </div>
            <div class="utf-no-border">
              <input type="text" class="utf-with-border" name="fullname" placeholder="Full Name / Company's Name" required/>
            </div>
      <div class="utf-no-border">
              <input type="email" class="utf-with-border emailregister" name="email" placeholder="Email Address" required/>
              <div class="emailmessage"></div>
            </div>
            <div class="utf-no-border" title="Should be at least 8 characters long" data-tippy-placement="bottom">
              <input type="password" class="utf-with-border" name="password" id="passwordregister1" placeholder="Password" minlength="8" required/>
              <span title="Show Password" toggle="#passwordregister1" class="icon-feather-eye toggle-password showPassword"></span>
            </div>
            <div class="utf-no-border" title="Should be at least 8 characters long" data-tippy-placement="bottom">
              <input type="password" class="utf-with-border" name="passwordrepeat" id="passwordrepeat1" placeholder="Repeat Password" minlength="8" required/>
              <span title="Show Password" toggle="#passwordrepeat1" class="icon-feather-eye toggle-password showPassword"></span> 
            </div>
            <div class="notification warning" id="passworderror1" style="display: none;">
              <p>Password and Repeat Password do not match!</p>
            </div>
            <div class="notification success" id="passwordsuccess1" style="display: none;">
              <p>Password and Repeat Password match!</p>
            </div>
      <div class="checkbox margin-top-10">
        <input type="checkbox" id="two-step0">
        <label for="two-step0"><span class="checkbox-icon"></span> By Registering You Confirm That You Accept <a href="#">Terms & Conditions</a> and <a href="#">Privacy Policy</a></label>
        </div>
          </form>
          <button class="button full-width utf-button-sliding-icon ripple-effect margin-top-10" type="submit" form="utf-register-account-form1" name="registerbtn" id="regisbtn1">Create An Account <i class="icon-feather-chevrons-right"></i></button>
        </div>
      </div>
    </div>
  </div>
  
  <!-- Subscribe Block Start -->
  <!-- <?php include 'includes/newsLetter.php' ?> -->
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