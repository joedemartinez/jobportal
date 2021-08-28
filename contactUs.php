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
  <div class="intro-banner" data-background-image="assets/images/contactUsWallpaper.jpg">
    <div class="container"> 
      <div class="row">
        <div class="col-md-12">
          <div class="utf-banner-headline-text-part">
            <h3>Contact Us</h3>
          </div>
        </div>
      </div>
      
      <div class="row">

      </div>
      </div>
    </div>
  </div>

  <!-- Content --> 
  <div class="container padding-top-40">
    <div class="row">
      <div class="col-xl-12">
        <div class="utf-contact-location-info-aera margin-bottom-50">
          <div id="utf-single-job-map-container-item">
            <div id="singleListingMap" data-latitude="48.8566" data-longitude="2.3522" data-map-icon="im im-icon-Hamburger"></div>
          </div>
        </div>
      </div>      
    <div class="col-xl-4 col-lg-4">
    <div class="utf-boxed-list-headline-item margin-bottom-35">
            <h3><i class="icon-feather-map-pin"></i> Office Address</h3>
        </div>
    <div class="utf-contact-location-info-aera margin-bottom-50">
      <div class="contact-address">
        <ul>
          <li><strong>Phone:-</strong> (+21) 124 123 4546</li>
          <li><strong>Website:-</strong> <a href="#">www.example.com</a></li>
          <li><strong>E-Mail:-</strong> <a href="#">info@example.com</a></li>              
          <li><strong>Address:-</strong> 3241, Lorem ipsum dolor sit amet, consectetur adipiscing elit Proin fermentum condimentum mauris.</li>
        </ul>
      </div>
    </div>    
    </div>
    <div class="col-xl-8 col-lg-8">
        <section id="contact" class="margin-bottom-50">
          <div class="utf-boxed-list-headline-item margin-bottom-35">
            <h3><i class="icon-material-outline-description"></i> Contact Form</h3>
          </div>
      <div class="utf-contact-form-item">
        <form method="post" name="contactform" id="contactform">
        <div class="row">
          <div class="col-md-6">
          <div class="utf-no-border">
            <input class="utf-with-border" name="name" type="text" id="firstname" placeholder="Frist Name" required />
          </div>
          </div>
          <div class="col-md-6">
          <div class="utf-no-border">
            <input class="utf-with-border" name="name" type="text" id="lastname" placeholder="Last Name" required />
          </div>
          </div>
          <div class="col-md-6">
          <div class="utf-no-border">
            <input class="utf-with-border" name="email" type="email" id="email" placeholder="Email Address" required />
          </div>
          </div>
          <div class="col-md-6">
          <div class="utf-no-border">
            <input class="utf-with-border" name="subject" type="text" id="subject" placeholder="Subject" required />
          </div>
          </div>
        </div>
        <div>
          <textarea class="utf-with-border" name="comments" cols="40" rows="3" id="comments" placeholder="Message..." required></textarea>
        </div>
        <div class="utf-centered-button margin-top-10">
          <input type="submit" class="submit button" id="submit" value="Submit Message" />
        </div>
        </form>
      </div>
        </section>
      </div>
    </div>
  </div>
  <!-- Container / End --> 

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