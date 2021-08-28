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
  <div class="intro-banner" data-background-image="assets/images/blogsWallpaper.jpg">
    <div class="container"> 
      <div class="row">
        <div class="col-md-12">
          <div class="utf-banner-headline-text-part">
            <h3>Blogs</h3>
          </div>
        </div>
      </div>
      
      <div class="row">

      </div>
      </div>
    </div>
  </div>

   <!-- Section -->
  <div class="section">
    <div class="container padding-top-40">
      <div class="row">
        <div class="col-xl-8 col-lg-8"> 
          <div class="margin-top-0 margin-bottom-0"> 
          <?php
            if(isset($_GET['page']) || isset($_POST['submitSearch'])){
              $sqlState = '';
              if(isset($_POST['searchKeyword'])){
                if($_POST['searchKeyword'] != ''){
                  $searchKeyword = $_POST['searchKeyword'];
                  $sqlState .= "blog_title LIKE '%$searchKeyword%'";
                }
              }

            //define total number of results you want per page  
            $results_per_page = 5;  
          
            //determine which page number visitor is currently on  
            if (!isset($_GET['page']) ) {  
                $page = 1;  
            } else {  
                $page = $_GET['page'];
                $searchKeyword = $_GET['ask'];
                $sqlState =  "blog_title LIKE '%$searchKeyword%'";
            } 

            //find the total number of results stored in the database 
            if ($sqlState == '') { 
            $query = "SELECT * FROM blogs WHERE id = 0 ORDER BY createdat DESC";
            }else{
              $query = "SELECT * FROM blogs WHERE ".$sqlState." ORDER BY createdat DESC";
            }  
            $result = mysqli_query($conn, $query);  
            $number_of_result = mysqli_num_rows($result);  
          
            //determine the total number of pages available  
            $number_of_page = ceil ($number_of_result / $results_per_page);  
          
          
            //determine the sql LIMIT starting number for the results on the displaying page  
            $page_first_result = ($page-1) * $results_per_page;  

            //getting all blogs
              if ($sqlState == '') { 
                $sql = "SELECT * FROM blogs WHERE id = 0 ORDER BY createdat DESC";
              }else{
                $sql = "SELECT * FROM blogs WHERE ".$sqlState." ORDER BY createdat DESC LIMIT " . $page_first_result . ',' . $results_per_page;
              }
              // $sql = "SELECT * FROM blogs ORDER BY createdat DESC LIMIT " . $page_first_result . ',' . $results_per_page;
              $query = $conn->query($sql);

              if ($query->num_rows < 1) { ?>
                <div style="text-align: center;" class="utf-notify-box-aera margin-top-15">
                  <div class="utf-switch-container-item">
                    <span>No results found</span>
                  </div>  
                </div>          
            <?php }
            else {

              while($row = $query->fetch_assoc()){
                $hash = md5($row['id']);
                $job_id = $row['id'];
                $postedBY = $row['createdby'];
                $industry = $row['industry_id'];
                $postedBY = $conn->query("SELECT fullname FROM users WHERE id_user = '$postedBY'");
                $category = $conn->query("SELECT name FROM industry WHERE id = '$industry'");
                $row1 = $postedBY->fetch_row();
                $row2 = $category->fetch_row();
          ?>
          <a href="./blogDetails.php?key=<?php echo $hash.'&id='.$job_id;?>" class="blog-post"> 
            <div class="utf-blog-post-thumbnail">
            <div class="utf-blog-post-thumbnail-inner"> 
              <img src="assets/images/blogsLogo.jpeg" alt=""> 
            </div>
            </div>
            <div class="utf-blog-post-content"> 
            <h3><?php echo $row['blog_title'] ?></h3>
            <span class="blog-post-info"><?php echo $row1[0] ?></span>
            <span class="blog-post-date"><?php echo $row['createdat'] ?></span>
            <p class="text-truancation"><?php echo $row['blog'] ?></p>
            </div>
            <div class="entry-icon"></div>
          </a> 
          <?php } } ?> 
          <div class="row">
            <div class="col-md-12"> 
              <div class="utf-pagination-container-aera margin-top-10 margin-bottom-50">
                <nav class="pagination">
                  <ul>
            <li class="utf-pagination-arrow"><a href="#" class="ripple-effect"><i class="icon-material-outline-keyboard-arrow-left"></i></a></li>
                    <?php //display the link of the pages in URL  
                    for($page = 1; $page<= $number_of_page; $page++) {  ?>
                  <li><a href="./searchBlog.php?page=<?php echo $page ?>&ask=<?php echo $searchKeyword ?>" class="ripple-effect"><?php echo $page ?></a></li>
                  <?php }  ?>
                    <li class="utf-pagination-arrow"><a href="#" class="ripple-effect"><i class="icon-material-outline-keyboard-arrow-right"></i></a></li>
                  </ul>
                </nav>
              </div>
            </div>
          </div>
        <?php }else{
      ?>
        <div style="text-align: center;" class="utf-notify-box-aera margin-top-15">
          <div class="utf-switch-container-item">
            <span>No results found </span>
          </div>  
        </div>
      <?php }
      ?>
      </div>  
          <div class="clearfix"></div>

        </div>
        <!-- blogSidebar -->
        <?php include 'includes/blogSidebar.php' ?>

      </div>
    </div>
  </div>
  <!-- Section / End --> 

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