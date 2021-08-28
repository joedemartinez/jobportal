<div class="col-xl-4 col-lg-4">
          <div class="utf-sidebar-container-aera"> 
          <form method="post" action="searchBlog.php"> 
            <div class="utf-sidebar-widget-item">
        <h3>Search Blog</h3>  
              <div class="utf-input-with-icon">
                <input type="text" placeholder="Search Keywords..." name="searchKeyword" required="">
                <button type="submit" name="submitSearch"><i style="top: 35%" class="icon-material-outline-search"></i> </button>
        </div>
            </div>
          </form>
            <div class="utf-sidebar-widget-item">
              <h3>Latest Blogs Post</h3>
        <ul class="utf-featured-list">
          <?php
          //getting all categories
            $sql = "SELECT * FROM blogs ORDER BY RAND() LIMIT 5";
            $query = $conn->query($sql);
            while($row = $query->fetch_assoc()){
              $hash = md5($row['id']);
                $job_id = $row['id'];
          ?>
         <li class="utf-sidebr-pro-widget">
          <div class="utf-blog-thumb-info">
           <div class="utf-blog-thumb-info-image">
            <img src="assets/images/blogsLogo.jpeg" alt="">            
           </div>
           <div class="utf-blog-thumb-info-content">
            <h4><a href="./blogDetails.php?key=<?php echo $hash.'&id='.$job_id;?>"><?php echo $row['blog_title'] ?></a></h4>
            <p><?php echo $row['createdat'] ?></p>
           </div>
          </div>
         </li>
          <?php } ?>  
        </ul>     
            </div>
        
        <div class="utf-detail-social-sharing margin-top-25">
      <span><strong>Social Sharing:-</strong></span>
      <ul class="margin-top-15">
        <li><a href="#" title="Facebook" data-tippy-placement="top"><i class="icon-brand-facebook-f"></i></a></li>
        <li><a href="#" title="Twitter" data-tippy-placement="top"><i class="icon-brand-twitter"></i></a></li>
        <li><a href="#" title="LinkedIn" data-tippy-placement="top"><i class="icon-brand-linkedin-in"></i></a></li>
        <li><a href="#" title="Google Plus" data-tippy-placement="top"><i class="icon-brand-google-plus-g"></i></a></li>
        <li><a href="#" title="Whatsapp" data-tippy-placement="top"><i class="icon-brand-whatsapp"></i></a></li>
        <li><a href="#" title="Pinterest" data-tippy-placement="top"><i class="icon-brand-pinterest-p"></i></a></li>
      </ul>
      </div>

          </div>
        </div>