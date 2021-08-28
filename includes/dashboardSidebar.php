<div class="utf-dashboard-sidebar-item"> 
      <div class="utf-dashboard-sidebar-item-inner" data-simplebar>
        <div class="utf-dashboard-nav-container"> 
          <!-- Responsive Navigation Trigger --> 
          <a href="#" class="utf-dashboard-responsive-trigger-item"> <span class="hamburger utf-hamburger-collapse-item" > <span class="utf-hamburger-box-item"> <span class="utf-hamburger-inner-item"></span> </span> </span> <span class="trigger-title">Dashboard Navigation Menu</span> </a> 
          <!-- Navigation -->
		  <div class="utf-dashboard-nav">
			<div class="utf-dashboard-nav-inner">
			  <div class="dashboard-profile-box">
          <!-- job seeker sidebar -->
          <?php if(($_SESSION['role_id']) == 1) :
            $id_user = $_SESSION['id_user'];
            // getting the job details
            $sql = "SELECT * FROM users WHERE id_user='$id_user'";
            $query = $conn->query($sql);
            $row = $query->fetch_assoc();
          ?>
				  <span class="avatar-img">
            <?php if($row['profile_pic'] != ''): ?>
              <img alt="" src="../assets/images/<?php echo $row['profile_pic'] ?>" class="photo">
            <?php else: ?>
					    <img alt="" src="../assets/images/user.png" class="photo">
            <?php endif; ?>
				  </span>
				  <div class="user-profile-text">
					<span class="fullname"><?php echo $row['fullname'] ?></span>
					<span class="user-role"><?php echo $row['headline'] ?></span>
				  </div>
          <?php endif; ?>

          <!-- employer sidebar -->
          <?php if(($_SESSION['role_id']) == 2) :
            $id_company = $_SESSION['id_company'];
            // getting the job details
            $sql = "SELECT * FROM company WHERE id_company='$id_company'";
            $query = $conn->query($sql);
            $row = $query->fetch_assoc();
          ?>
          <span class="avatar-img">
            <?php if($row['profile_pic'] != ''): ?>
              <img alt="" src="../assets/images/<?php echo $row['profile_pic'] ?>" class="photo">
            <?php else: ?>
              <img alt="" src="../assets/images/user.png" class="photo">
            <?php endif; ?>
          </span>
          <div class="user-profile-text">
          <span class="fullname"><?php echo $row['companyname'] ?></span>
          <span class="user-role">Online</span>
          </div>
          <?php endif; ?>

          <!-- admin sidebar -->
          <?php if(($_SESSION['role_id']) == 3) :
            $id_admin = $_SESSION['id_admin'];
            // getting the job details
            $sql = "SELECT * FROM admin WHERE id_admin='$id_admin'";
            $query = $conn->query($sql);
            $row = $query->fetch_assoc();
          ?>
          <span class="avatar-img">
            <?php if($row['profile_pic'] != ''): ?>
              <img alt="" src="../assets/images/<?php echo $row['profile_pic'] ?>" class="photo">
            <?php else: ?>
              <img alt="" src="../assets/images/user.png" class="photo">
            <?php endif; ?>
          </span>
          <div class="user-profile-text">
          <span class="fullname"><?php echo $row['fullname'] ?></span>
          <span class="user-role">Online</span>
          </div>
          <?php endif; ?>


			  </div>
			  <div class="clearfix"></div>
              <ul>
                <!-- Job seeker -->
                <?php if(($_SESSION['role_id']) == 1) :?>
                <li><a href="dashboard.php"><i class="icon-material-outline-dashboard"></i> Dashboard</a></li>
                <li><a href="industryJobs.php"><i class="icon-material-outline-group"></i> Industry Jobs <span class="nav-tag">
                  <?php
                  $id_user = $_SESSION['id_user'];
                  $career_id = $conn->query("SELECT career_id FROM users WHERE id_user = '$id_user'");
                  $career_id = $career_id->fetch_row();

                  $sql = "SELECT * FROM job_post WHERE industry_id = '$career_id[0]'";
                  $query = $conn->query($sql);

                  echo $query->num_rows;
                  ?>    
                </span></a></li>
        				<li><a href="appliedJobs.php"><i class="icon-material-outline-group"></i> Applied Jobs <span class="nav-tag">
                  <?php
                  $id_user = $_SESSION['id_user'];
                  $sql = "SELECT * FROM applied_jobposts WHERE id_user = '$id_user'";
                  $query = $conn->query($sql);

                  echo $query->num_rows;
                  ?>    
                </span></a></li>
        				<li><a href="myResume.php"><i class="icon-line-awesome-file-pdf-o"></i> Manage Resume</a></li>
        				<li><a href="savedJobs.php"><i class="icon-feather-heart"></i> Saved Jobs <span class="nav-tag">
                  <?php
                  $id_user = $_SESSION['id_user'];
                  $sql = "SELECT * FROM saved_jobposts WHERE id_user = '$id_user'";
                  $query = $conn->query($sql);

                  echo $query->num_rows;
                  ?>    
                </span></a></li>
				        <li><a href="myProfile.php"><i class="icon-feather-user"></i> My Profile</a></li>
                <li><a href="../process/logout.php"><i class="icon-material-outline-power-settings-new"></i> Logout</a></li>
                <?php endif; ?>


                <!-- Employer -->
                <?php if(($_SESSION['role_id']) == 2) :?>
                <li><a href="dashboard.php"><i class="icon-material-outline-dashboard"></i> Dashboard</a></li>
                <li><a href="addJob.php"><i class="icon-feather-file-plus"></i> Add New Job</a></li>
                <li><a href="manageJobs.php"><i class="icon-line-awesome-briefcase"></i> Manage Jobs <span class="nav-tag">
                  <?php
                  $id_company = $_SESSION['id_company'];
                  $sql = "SELECT * FROM job_post WHERE id_company = '$id_company'";
                  $query = $conn->query($sql);

                  echo $query->num_rows;
                  ?>
                </span></a></li>
                <li><a href="manageApplications.php"><i class="icon-line-awesome-file-pdf-o"></i> Manage Applications</a></li>
                <li><a href="companyReviews.php"><i class="icon-material-outline-rate-review"></i> Reviews <span class="nav-tag">
                0
                </span></a></li>
                <li><a href="myProfile.php"><i class="icon-feather-user"></i> My Profile</a></li>
                <li><a href="../process/logout.php"><i class="icon-material-outline-power-settings-new"></i> Logout</a></li>
                <?php endif; ?>


                <!-- admin -->
                <?php if(($_SESSION['role_id']) == 3) :?>
                <li><a href="dashboard.php"><i class="icon-material-outline-dashboard"></i> Dashboard</a></li>
                <li><a href="allJobPosts.php"><i class="icon-feather-briefcase"></i> All Job Posts <span class="nav-tag">
                  <?php
                  $sql = "SELECT * FROM job_post";
                  $query = $conn->query($sql);

                  echo $query->num_rows;
                  ?>    
                </span></a></li>
                <li><a href="allCompanies.php"><i class="icon-line-awesome-building"></i> All Companies <span class="nav-tag">
                  <?php
                  $sql = "SELECT * FROM company";
                  $query = $conn->query($sql);

                  echo $query->num_rows;
                  ?>    
                </span></a></li>
                <li><a href="allJobSeekers.php"><i class="icon-material-outline-group"></i> All Job Seekers <span class="nav-tag">
                  <?php
                  $sql = "SELECT * FROM users";
                  $query = $conn->query($sql);

                  echo $query->num_rows;
                  ?>    
                </span></a></li>
                <li><a href="allBlogs.php"><i class="icon-brand-blogger"></i> Blogs <span class="nav-tag">
                  <?php
                  $sql = "SELECT * FROM blogs";
                  $query = $conn->query($sql);

                  echo $query->num_rows;
                  ?>    
                </span></a></li>
                <li><a href="myProfile.php"><i class="icon-feather-user"></i> My Profile</a></li>
                <li><a href="../process/logout.php"><i class="icon-material-outline-power-settings-new"></i> Logout</a></li>
                <?php endif; ?>

              </ul>              
            </div>
          </div>          
        </div>
      </div>
    </div>