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
  
  <!-- checking hash and key from url -->
<?php if(isset($_GET['key']) && isset($_GET['id'])) :
	$blog_id = $_GET['id'];
	// getting the job details
	$sql = "SELECT * FROM blogs WHERE id='$blog_id'";
	$query = $conn->query($sql);
	$row = $query->fetch_assoc();

	//getting createdby info
	$createdby = $row['createdby'];
	$sql1 =  "SELECT fullname FROM users WHERE id_user = '$createdby'";
	$query1 = $conn->query($sql1);
	$row1 = $query1->fetch_assoc();

	//getting no of comments info
	$result = $conn->query("SELECT * FROM blog_comment WHERE blog_id = '$blog_id'");

	//getting industry info
	$industry_id = $row['industry_id'];
	$sql3 =  "SELECT name FROM industry WHERE id = '$industry_id'";
	$query3 = $conn->query($sql3);
	$row3 = $query3->fetch_assoc();
?>

  <!-- Titlebar -->
  <div class="single-page-header" data-background-image="assets/images/blogsWallpaper.jpg"> </div>

  <!-- Post Content -->
  <div class="container">
    <div class="row"> 
      <div class="col-xl-8 col-lg-8"> 
        <div class="blog-post single-post"> 
          <div class="utf-blog-post-thumbnail">
            <div class="utf-blog-post-thumbnail-inner"> 
				<img src="assets/images/blogsLogo.jpeg" alt=""> 
			</div>
          </div>
          <div class="utf-blog-post-content">
            <h3 class="margin-bottom-10"><?php echo $row['blog_title'] ?></h3>
            <div class="blog-post-info-list margin-bottom-20"> 
				<a href="#" class="blog-post-info"><?php echo $row1['fullname'] ?></a> 
				<a href="#" class="blog-item-tag"><?php echo $row3['name'] ?></a>
				<a href="#" class="blog-post-info"><?php echo $row['createdat'] ?></a> 
				<a href="#" class="blog-post-info"><?php echo $result->num_rows; ?> Comments</a> 
			</div>
            <p><?php echo $row['blog'] ?></p>
          </div>
        </div>
        
        <div class="row"> 
			<div class="col-xl-12">
				<div class="utf-inner-blog-section-title">
					<h3><i class="icon-brand-bimobject"></i> Related Blog Posts</h3>
				</div>
			</div>
			<div class="utf-blog-carousel-block-related"> 
				<!-- getting related blog posts -->
          	<?php 
			$sql4 =  "SELECT * FROM blogs WHERE industry_id = '$industry_id' AND id != '$blog_id' LIMIT 5";
			$query4 = $conn->query($sql4);
			while($row4 = $query4->fetch_assoc()){
				$hash = md5($row4['id']);
             	$job_id = $row4['id'];
            	$user = $row4['createdby'];
            	$user = $conn->query("SELECT fullname FROM users WHERE id_user = '$user'");
            	$row1 = $user->fetch_row();
            	
			?>
				<a href="./blogDetails.php?key=<?php echo $hash.'&id='.$job_id;?>" class="utf-blog-item-container-part">
					<div class="utf-blog-compact-item"> <img src="assets/images/blogsLogo.jpeg" alt=""> 
					  <div class="utf-blog-compact-item-content">
						<h3><?php echo $row['blog_title'] ?></h3>
						<ul class="utf-blog-post-tags">
						  <li><?php echo $row1[0] ?></li>	
						  <li><?php echo $row['createdat'] ?></li>
						</ul>
						<p class="text-truancation" style="width: 200px !important"><?php echo $row['blog'] ?></p>
					  </div>
					</div>
				</a> 
				<?php 
				}
			?> 
			</div>
        </div>
        
        <!-- Comments -->
        <div class="row">
          <div class="col-xl-12">
            <section class="comments">
              <div class="utf-inner-blog-section-title">
				<h3><i class="icon-line-awesome-commenting-o"></i> Comments</h3>
			  </div>
			  <ul>
			  		<!-- getting blog comments -->
	          	<?php 
				$sql5 =  "SELECT * FROM blog_comment WHERE blog_id = '$blog_id'";
				$query5 = $conn->query($sql5);
				while($row5 = $query5->fetch_assoc()){
	            	$user = $row5['createdby'];
	            	$user = $conn->query("SELECT fullname FROM users WHERE id_user = '$user'");
	            	$row1 = $user->fetch_row();
	            	
				?>
                <li>
                  <div class="avatar"><img src="assets/images/user.png" alt=""></div>
                  <div class="utf-comment-content">
                    <div class="utf-arrow-comment"></div>
                    <div class="utf-comment-by"><?php echo $row1[0] ?><span class="date"><?php echo $row5['createdat'] ?></span></div>
                    <p><?php echo $row5['comment'] ?></p>
                  </div>
                </li>
			<?php } ?> 
              </ul>
            </section>
          </div>
        </div>
        <!-- Comments / End --> 
        
        <!-- Leava a Comment -->
       
        <div class="row">
          <div class="col-xl-12">
            <div class="utf-inner-blog-section-title">
				<h3><i class="icon-line-awesome-comments-o"></i> Leave Your Comment</h3>
			</div>
			 <!-- if a user is logged in  || $_SESSION['email']-->
        <?php if($_SESSION):?>
          <?php if($_SESSION['email'] != ''): ?>
            <form method="post" id="add-comment">
              <textarea class="utf-with-border" name="comment" id="comment" cols="30" rows="3" placeholder="Comment" style="resize: none;"></textarea>
            </form>
            <button class="button margin-bottom-40" type="submit">Submit Comment</button>
        <?php else: ?>
        <p> Sign In to Comment</p>
      	<?php endif; ?>
      	<?php else: ?>
        <p> Sign In to Comment</p>
      	<?php endif; ?>
          </div>
        </div>
        
        <!-- Leava a Comment / End -->         
      </div>
      <!-- Inner Content / End -->
      
      <!-- blogSidebar -->
        <?php include 'includes/blogSidebar.php' ?>

    </div>
  </div>
  <div class="padding-top-20"></div>
  
<?php else: ?> 
	<!-- load 404 page -->
	<?php include 'includes/404.php' ?>

<?php endif; ?>

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