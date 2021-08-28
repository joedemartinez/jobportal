<header id="utf-header-container-block" class="fullwidth dashboard-header not-sticky"> 
    <div id="header">
      <div class="container"> 
        <div class="utf-left-side"> 
          <div id="logo"> <a href="./dashboard.php"><img src="../assets/images/logo.png" alt="" style="height: 60px"></a> </div>
          <nav id="navigation">
            <ul id="responsive">
              <li><a href="../">Home</a></li>
              <li><a href="../findJobs.php">Find Jobs</a></li>
              <li><a href="../browseCompanies.php">Browse Companies</a></li>
            <li><a href="../blogs.php">Blog</a></li>
            <li><a href="../aboutUs.php">About Us</a></li>
            <li><a href="../contactUs.php">Contact Us</a></li>
            </ul>
          </nav>
          <div class="clearfix"></div>           
        </div>
        
        <div class="utf-right-side">           
          <div class="utf-header-widget-item hide-on-mobile"> 
            <div class="utf-header-notifications"> 
              <div class="utf-header-notifications-trigger notifications-trigger-icon"> <a href="#"><i class="icon-feather-bell"></i><span>5</span></a> </div>
              <div class="utf-header-notifications-dropdown-block">
                <div class="utf-header-notifications-headline">
                  <h4>View All Notifications</h4>                  
                </div>
                <div class="utf-header-notifications-content">
                  <div class="utf-header-notifications-scroll" data-simplebar>

                  </div>
                </div>
              </div>
            </div>            
          </div>
          
          <div class="utf-header-widget-item"> 
            <div class="utf-header-notifications user-menu">
              <div class="utf-header-notifications-trigger user-profile-title"> 
				<a href="#">
            <!-- job seeker -->
              <?php if(($_SESSION['role_id']) == 1) :
                $id_user = $_SESSION['id_user'];
                // getting the job details
                $sql = "SELECT * FROM users WHERE id_user='$id_user'";
                $query = $conn->query($sql);
                $row = $query->fetch_assoc();

                if($row['profile_pic'] != ''):
              ?>
					      <div class="user-avatar status-online"><img src="../assets/images/<?php echo $row['profile_pic'] ?>" alt=""> </div>	
              <?php else: ?>
                <div class="user-avatar status-online"><img src="../assets/images/user.png" alt=""> </div> 
              <?php endif; ?> 
					 <div class="user-name">Hi, <?php echo  $row['fullname'] ?>!</div>	
              <?php endif; ?>

              <!-- employer or company -->
              <?php if(($_SESSION['role_id']) == 2) :
                $id_company = $_SESSION['id_company'];
                // getting the job details
                $sql = "SELECT * FROM company WHERE id_company='$id_company'";
                $query = $conn->query($sql);
                $row = $query->fetch_assoc();

                if($row['profile_pic'] != ''):
              ?>
                <div class="user-avatar status-online"><img src="../assets/images/<?php echo $row['profile_pic'] ?>" alt=""> </div> 
              <?php else: ?>
                <div class="user-avatar status-online"><img src="../assets/images/user.png" alt=""> </div> 
              <?php endif; ?> 
           <div class="user-name">Hi, <?php echo  $row['companyname'] ?>!</div>  
              <?php endif; ?>


              <!-- admin -->
              <?php if(($_SESSION['role_id']) == 3) :
                $id_admin = $_SESSION['id_admin'];
                // getting the
                $sql = "SELECT * FROM admin WHERE id_admin='$id_admin'";
                $query = $conn->query($sql);
                $row = $query->fetch_assoc();

                if($row['profile_pic'] != ''):
              ?>
                <div class="user-avatar status-online"><img src="../assets/images/<?php echo $row['profile_pic'] ?>" alt=""> </div> 
              <?php else: ?>
                <div class="user-avatar status-online"><img src="../assets/images/user.png" alt=""> </div> 
              <?php endif; ?> 
           <div class="user-name">Hi, <?php echo  $row['fullname'] ?>!</div>  
              <?php endif; ?>
                </a> 
			  </div>
              <div class="utf-header-notifications-dropdown-block"> 
        <ul class="utf-user-menu-dropdown-nav">
                  <li><a href="dashboard.php"><i class="icon-material-outline-dashboard"></i> Dashboard</a></li>
                  <li><a href="myProfile.php"><i class="icon-feather-user"></i> My Profile</a></li>
                  <li><a href="../process/logout.php"><i class="icon-material-outline-power-settings-new"></i> Logout</a></li>
                </ul>
              </div>
            </div>
          </div>
          <span class="mmenu-trigger">
			<button class="hamburger utf-hamburger-collapse-item" type="button"> <span class="utf-hamburger-box-item"> <span class="utf-hamburger-inner-item"></span> </span> </button>
          </span> 
		</div>        
      </div>
    </div>    
  </header>
  <div class="clearfix"></div>