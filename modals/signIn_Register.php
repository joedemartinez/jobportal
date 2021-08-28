<div id="utf-signin-dialog-block" class="zoom-anim-dialog mfp-hide dialog-with-tabs"> 
  <div class="utf-signin-form-part">
    <ul class="utf-popup-tabs-nav-item">
      <li><a href="#login">Log In</a></li>
      <li><a href="#register">Register</a></li>
    </ul>
    <div class="utf-popup-container-part-tabs"> 
      <!-- Login -->
      <div class="utf-popup-tab-content-item" id="login"> 
        <div class="utf-welcome-text-item">
          <h3>Welcome Back Sign in to Continue</h3>
          <span>Don't Have an Account? <a href="#" class="register-tab">Sign Up!</a></span> 
		</div>
        <form method="post" id="login-form" action="./process/login.php">
          <div class="utf-no-border margin-bottom-18">
              <select class="selectpicker utf-with-border" data-size="5" title="Select Account Type" required="" name="acctype">
                <option value="Applicant">Job Seeker/Applicant</option>
                <option value="Employer">Employer</option>      
              </select>
            </div>
          <div class="utf-no-border">
            <input type="email" class="utf-with-border" name="email" id="email" placeholder="Email Address" required/>
          </div>
          <div class="utf-no-border" title="Should be at least 8 characters long" data-tippy-placement="bottom">
            <input type="password" class="utf-with-border" name="password" id="password" placeholder="Password" minlength="8" required/>
            <span title="Show Password" toggle="#password" class="icon-feather-eye toggle-password showPassword"></span>
          </div>
		  <div class="checkbox margin-top-0">
			<input type="checkbox" id="two-step1">
			<label for="two-step1"><span class="checkbox-icon"></span> Remember Me</label>
		  </div>
          <a href="#" class="forgot-password">Forgot Password?</a>
        </form>
        <button class="button full-width utf-button-sliding-icon ripple-effect" type="submit" form="login-form" name="loginbtn">Log In <i class="icon-feather-chevrons-right"></i></button>
      </div>
      
      <!-- Register -->
      <div class="utf-popup-tab-content-item" id="register"> 
        <div class="utf-welcome-text-item">
          <h3>Create your Account!</h3>
           <span>Already Have an Account? <a href="#" class="login-tab">Log In!</a></span>
        </div>        
        <form method="post" id="utf-register-account-form" action="./process/register.php">
          <div class="utf-no-border margin-bottom-18">
            <select class="selectpicker utf-with-border acctype" data-size="5" title="Select Account Type" required="" name="acctype" id="acctype1">
            <option value="Applicant">Job Seeker/Applicant</option>
            <option value="Employer">Employer</option>      
          </select>
        </div>
          <div class="utf-no-border">
            <input type="text" class="utf-with-border" name="fullname"  placeholder="Full Name / Company's Name" required/>
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
		  <div class="checkbox margin-top-0">
			<input type="checkbox" id="two-step2" >
			<label for="two-step2"><span class="checkbox-icon"></span> By Registering You Confirm That You Accept <a href="#">Terms & Conditions</a> and <a href="#">Privacy Policy</a></label>
		  </div>
        </form>
        <button class="margin-top-10 button full-width utf-button-sliding-icon ripple-effect" type="submit" id="regisbtn" form="utf-register-account-form" name="registerbtn">Create an Account <i class="icon-feather-chevrons-right"></i></button>
      </div>
    </div>
  </div>
</div>
