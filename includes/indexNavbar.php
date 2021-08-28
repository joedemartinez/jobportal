  <header id="utf-header-container-block"> 
    <div id="header">
      <div class="container"> 
        <div class="utf-left-side"> 
          <div id="logo"> <a href="./"><img src="assets/images/logo.png" alt=""></a> </div>
          <nav id="navigation">
            <ul id="responsive">
              <li><a href="./">Home</a></li>
              <li><a href="./findJobs.php">Find Jobs</a></li>
              <li><a href="./browseCompanies.php?comNames=names">Browse Companies</a></li>
            <li><a href="./blogs.php">Blog</a></li>
            <li><a href="./aboutUs.php">About Us</a></li>
    			  <li><a href="./contactUs.php">Contact Us</a></li>
            </ul>
          </nav>
          <div class="clearfix"></div>                    
        </div>
        
        <div class="utf-right-side"> 
      <!-- if a user is not logged in || !$_SESSION['email']-->
      <?php if(!$_SESSION || !isset($_SESSION['email'])): ?>
		  <div class="utf-header-widget-item"> <a href="#utf-signin-dialog-block" class="popup-with-zoom-anim log-in-button"><i class="icon-feather-log-in"></i> <span>Sign In</span></a> </div>	
      <?php endif;?>
		  <div class="utf-header-widget-item"> 
      <!-- if a user is logged in  || $_SESSION['email']-->
        <?php if($_SESSION):?>
          <?php if(isset($_SESSION['email'])): ?>
            <div class="utf-header-notifications user-menu">
              <div class="utf-header-notifications-trigger user-profile-title"> 
				<a href="#">
              <?php if(($_SESSION['role_id']) == 1) :
                $id_user = $_SESSION['id_user'];
                // getting the job details
                $sql = "SELECT * FROM users WHERE id_user='$id_user'";
                $query = $conn->query($sql);
                $row = $query->fetch_assoc();

                if($row['profile_pic'] != ''):
              ?>
                <div class="user-avatar status-online"><img src="assets/images/<?php echo $row['profile_pic'] ?>" alt=""> </div> 
              <?php else: ?>
                <div class="user-avatar status-online"><img src="assets/images/user.png" alt=""> </div> 
              <?php endif; ?> 
           <div class="user-name">Hi, <?php echo  $row['fullname'] ?>!</div>  

              <?php endif; ?>

              <?php if(($_SESSION['role_id']) == 2) :
                $id_company = $_SESSION['id_company'];
                // getting the job details
                $sql = "SELECT * FROM company WHERE id_company='$id_company'";
                $query = $conn->query($sql);
                $row = $query->fetch_assoc();

                if($row['profile_pic'] != ''):
              ?>
                <div class="user-avatar status-online"><img src="assets/images/<?php echo $row['profile_pic'] ?>" alt=""> </div> 
              <?php else: ?>
                <div class="user-avatar status-online"><img src="assets/images/user.png" alt=""> </div> 
              <?php endif; ?> 
           <div class="user-name">Hi, <?php echo  $row['companyname'] ?>!</div>  
              <?php endif; ?>
                </a> 
			  </div>
              <div class="utf-header-notifications-dropdown-block"> 
				<ul class="utf-user-menu-dropdown-nav">
                  <li><a href="./dashboard/dashboard.php"><i class="icon-material-outline-dashboard"></i> Dashboard</a></li>
				          <li><a href="./dashboard/myProfile.php"><i class="icon-feather-user"></i> My Profile</a></li>
                  <li><a href="./process/logout.php"><i class="icon-material-outline-power-settings-new"></i> Logout</a></li>
                </ul>
              </div>
            </div>
            <?php endif; ?>
          <?php endif; ?>
          </div>
          <span class="mmenu-trigger">
			<button class="hamburger utf-hamburger-collapse-item" type="button"> <span class="utf-hamburger-box-item"> <span class="utf-hamburger-inner-item"></span> </span> </button>
          </span> 
		</div>
      </div>
    </div>
  </header>
  <div class="clearfix"></div>