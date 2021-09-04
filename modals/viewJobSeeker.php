<!-- Edit View Popup -->
<div id="small-dialog-1" class="zoom-anim-dialog mfp-hide dialog-with-tabs" > 
  <div class="utf-signin-form-part">
    <ul class="utf-popup-tabs-nav-item">
    <li class="modal-title" id="jobtitle_header"></li>
  </ul>
    <div class="utf-popup-container-part-tabs"> 
      <div class="utf-popup-tab-content-item" id="tab1"> 
        <!-- Page Content -->
          <div class="container popup-scroll">
            <div class="row"> 
              <div class="col-xl-12">
                        <div class="row">
                          <div class="col-xl-5-offset col-md-3-offset col-sm-4-offset">
                            <div class="utf-avatar-wrapper" data-tippy-placement="right" title="Profile Picture"> 
                              <img id="profile_pic" src="../assets/images/user.png" class="profile-pic" alt="" >
                            </div>
                          </div>

                        </div>
                      </div>  
                      <div class="col-xl-12 col-md-6 col-sm-6">
                        <div class="utf-submit-field">
                          <h5>Full Name  </h5>
                          <input type="text" class="utf-with-border " id="fullname" readonly required>
                        </div>
                      </div>
                      <div class="col-xl-12 col-md-6 col-sm-6">
                        <div class="utf-submit-field">
                          <h5>Email Address </h5>
                          <input type="text" class="utf-with-border" id="email" readonly  required>
                        </div>
                      </div>
                      <div class="col-xl-12 col-md-12 col-sm-12">
                        <div class="utf-submit-field">
                          <h5>About Me </h5>
                          <textarea id="aboutme" class="utf-with-border " name="aboutme" cols="20" rows="3" readonly=""></textarea>
                        </div>
                      </div>
                      <div class="col-xl-12 col-md-6 col-sm-6 row">
                        <div class="col-xl-6 col-md-3 col-sm-3 utf-submit-field">
                          <h5>Headline</h5>
                          <input type="text" class="utf-with-border " id="headline" readonly required placeholder="Position e.g System Admin">
                        </div>
                        <div class="col-xl-6 col-md-3 col-sm-3 utf-submit-field">
                          <h5>Phone Number</h5>
                          <input type="text" class="utf-with-border " id="phoneno" readonly required onkeypress="return validatePhone(event);" maxlength="10">
                        </div>
                      </div>
                      <div class="col-xl-12 col-md-6 col-sm-6 row">
                        <div class="col-xl-6 col-md-3 col-sm-3 utf-submit-field">
                          <h5>Date of Birth </h5>
                          <input type="date" class="utf-with-border " id="dob" readonly required>
                        </div>
                        <div class="col-xl-6 col-md-3 col-sm-3 utf-submit-field">
                          <h5>Gender </h5>
                          <input type="text" class="utf-with-border " id="gender" readonly required>
                        </div>
                      </div>
                      <div class="col-xl-12 col-md-6 col-sm-6 row">
                        <div class="col-xl-6 col-md-3 col-sm-3 utf-submit-field">
                          <h5>Region </h5>
                          <input type="text" class="utf-with-border displayNone" name="region" id="region" readonly required>
                        </div>
                        <div class="col-xl-6 col-md-3 col-sm-3 utf-submit-field">
                          <h5>City </h5>
                          <input type="text" class="utf-with-border displayNone" id="city" readonly required>
                          
                        </div>
                      </div>
                      <div class="col-xl-12 col-md-6 col-sm-6">
                        <div class="utf-submit-field">
                          <h5>Residential Address </h5>
                          <input type="text" class="utf-with-border " id="address" readonly required>
                        </div>
                      </div>
                      <div class="col-xl-12 col-md-6 col-sm-6 row">
                        <div class="col-xl-6 col-md-3 col-sm-3 utf-submit-field">
                          <h5>Highest Education</h5>
                          <input type="text" class="utf-with-border displayNone" id="education" readonly required>
                          
                        </div>
                        <div class="col-xl-6 col-md-3 col-sm-3 utf-submit-field">
                          <h5>Career Industry</h5>
                          <input type="text" class="utf-with-border displayNone" id="career" readonly required>
                          
                        </div>
                      </div> 
                      <div class="col-xl-12 col-md-12 col-sm-12">
                        <div class="utf-submit-field">
                          <h5>Skills</h5>
                          <textarea class="utf-with-border " id="skills" cols="20" rows="3" readonly=""></textarea>
                        </div>
                      </div> 
                    </div>
                  </div>
            </div>
          </div>
      </div>
    </div>
  </div>
</div>
<!-- Edit View Popup / End --> 