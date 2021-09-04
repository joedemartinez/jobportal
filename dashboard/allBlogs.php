<!-- Session -->
<?php include '../includes/session.php'; ?>
<!-- Session ends -->
<!-- Header -->
<?php include '../includes/dashboardHeader.php'; ?>
<!-- Header end -->

<body>
<!--Loader-->
<?php include '../includes/loader.php'; ?>
<!-- Loader end -->


<!-- Wrapper -->
<div id="wrapper"> 
  <!-- Header Container -->
  <?php include '../includes/dashboardNavbar.php' ?> 
  <!-- Header Container / End --> 
  
  <!-- Dashboard Container -->
  <div class="utf-dashboard-container-aera"> 
    <!-- Dashboard Sidebar -->
    <?php include '../includes/dashboardSidebar.php' ?>
    <!-- Dashboard Sidebar / End --> 
    
    <!-- Dashboard Content -->
    <div class="utf-dashboard-content-container-aera" data-simplebar>


	  <div class="utf-dashboard-content-inner-aera">   
	  <!-- error message  -->
    <?php include '../includes/errorMessage.php' ?>

    <div class="row"> 
      <div class="col-xl-12">
            <div class="dashboard-box"> 
              <div class="headline">
                <h3>All Blogs</h3>
              </div>
              <div class="content with-padding padding-bottom-10">
                <div>
                  <table id="example2" class="table table-bordered">
                    <thead>
                      <th>#</th>
                      <th>Title</th>
                      <th>Blog</th>
                      <th>Industry</th>
                      <th>Posted By</th>
                      <th>Action</th>
                    </thead>
                    <tbody>
                        <?php
                          if ($_SESSION['role_id'] == 3):
                            $sql =  "SELECT * FROM blogs ORDER BY id DESC";
                          endif;
                          if ($_SESSION['role_id'] == 2):
                            $sql =  "SELECT * FROM blogs WHERE createdby = '$_SESSION[id_company]' ORDER BY id DESC";
                          endif;
                          $query = $conn->query($sql);
                         //id auto increament in tables initiation
                          $i = 1;
                          while($row = $query->fetch_assoc()){
                            //getting other detaills
                            $blog_id = $row['id'];
                            
                            // industry
                            $industry = $row['industry_id'];
                            $industry = $conn->query("SELECT name FROM industry WHERE id = '$industry'");
                            $industry = $industry->fetch_row();

                            // posted by
                            $posted = $row['createdby'];
                            $posted = $conn->query("SELECT companyname FROM company WHERE id_company = '$posted'");
                            $posted = $posted->fetch_row();
                                
                            echo "
                              <tr>
                                <td>". $i."</td>
                                <td>".$row['blog_title']."</td>
                                <td><p class='text-truancation'>".$row['blog']."</p></td>
                                <td>".$industry[0]."</td>
                                <td>".$posted[0]."</td>
                                <td><a class='button green ripple-effect ico view popup-with-zoom-anim' href='#small-dialog-1' data-id=".$blog_id." title='View' data-tippy-placement='top'><i class='icon-feather-eye'></i></a>

                              <a href='#'' class='button red ripple-effect ico delete' data-id='".$blog_id."' onclick='return confirm('Do you want to delete this job post?')' title='Remove' data-tippy-placement='top'><i class='icon-feather-trash-2'></i></a> 
                                </td>
                                </tr>";
                            $i++;
                          }
                        ?>
                    </tbody>
                  </table>
                </div>
              </div>        
            </div>
          </div>  
        </div>  


        <div class="utf-dashboard-footer-spacer-aera"></div>
        <?php include '../includes/dashboardFooter.php' ?>     
      </div>
    </div>    
	<!-- Dashboard Content End -->
  </div>
</div>
<!-- Wrapper / End --> 

<!-- Edit View Popup -->
<?php include '../modals/viewBlog.php' ?> 
<!-- Edit View Popup / End --> 

<!-- Scripts -->
<?php include '../includes/dashboardScripts.php' ?>

<script>

//view
$(document).on("click", ".view", function(e){
    e.preventDefault();
    var id = $(this).data('id');
    var name = "view";
    getRow(id, name);
    
}); 

function getRow(id, name){
  $.ajax({
    type: 'POST',
    url: '../process/blog_row.php',
    data: {id:id, name:name},
    dataType: 'json',
    success: function(response){
        // view
        $('#title').html(response.blog_title);
        $('#blog').html(response.blog);
        $('#industry').html(response.industry);
        $('#createdat').html(response.createdat);
        $('#createdby').html(response.company);
    }
  });
}


</script>

</body>
</html>