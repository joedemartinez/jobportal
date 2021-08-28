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
  <div class="container padding-top-40">
    <div class="row">
      <div class="col-xl-6 offset-xl-3">
        <!-- Error messaged -->
        <?php include 'includes/errorMessage.php'?>

        <div class="utf-login-register-page-aera margin-bottom-50"> 
          <div class="utf-welcome-text-item">
            <h3>Welcome Back Sign in to Continue</h3>
            <span>Don't Have an Account? <a href="./register.php">Sign Up!</a></span> 
      </div>
          <form method="post" id="login-form1" action="process/login.php">
            <div class="utf-no-border margin-bottom-18">
              <select class="selectpicker utf-with-border" data-size="5" title="Select Account Type" required="" name="acctype">
                <option value="Applicant">Job Seeker/Applicant</option>
                <option value="Employer">Employer</option>      
              </select>
            </div>
            <div class="utf-no-border">
              <input type="email" class="utf-with-border" name="email" placeholder="Email Address" required/>
            </div>
            <div class="utf-no-border" title="Should be at least 8 characters long" data-tippy-placement="bottom">
              <input type="password" class="utf-with-border" name="password" id="passwords" placeholder="Password" minlength="8" required/>
              <span title="Show Password" toggle="#passwords" class="icon-feather-eye toggle-password showPassword"></span>
            </div>
      <div class="checkbox margin-top-10">
        <input type="checkbox" id="two-step">
        <label for="two-step"><span class="checkbox-icon"></span> Remember Me</label>
      </div>
            <a href="#" class="forgot-password">Forgot Password?</a>
          </form>
          <button class="button full-width utf-button-sliding-icon ripple-effect margin-top-10" type="submit" name="loginbtn" form="login-form1">Log In <i class="icon-feather-chevrons-right"></i></button>
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