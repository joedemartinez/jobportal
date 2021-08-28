<div class="col-xl-3 col-lg-4">
    <div class="utf-sidebar-container-aera">
        <form method="post" action="searchJob.php"> 
        <div class="utf-sidebar-widget-item">
            <h3>Search Keywords</h3>
            <div class="utf-input-with-icon">
                <input type="text" placeholder="Search Keywords..." name="searchKeyword" required="">
                <button type="submit" name="submitSearch"><i style="top: 35%" class="icon-material-outline-search"></i> </button>
            </div>
        </div>
        </form>

        <div class="utf-sidebar-widget-item" style="height: 100%; overflow: hidden;">
            <h3>Location</h3>
            <form method="post" action="searchJob.php">
                <select name="searchLocation" class="selectpicker" data-live-search="true" data-container="body" data-selected-text-format="count" data-size="10" title="All Location" required="">
                  <?php
                  //getting all states
                    $sql = "SELECT * FROM cities";
                    $query = $conn->query($sql);
                    while($row = $query->fetch_assoc()){
                  ?>
                  <option value="<?php echo $row['id']?>"><?php echo $row['name']?></option>
                <?php } ?>
                </select>
                <div class="utf-intro-search-button">
                  <button class="button ripple-effect" type="submit" name="submitSearch" style="padding: 0 12px; text-transform: capitalize; height: 39px;line-height: 39px;"> Search </button>
                </div>
            </form>
         </div>

        <div class="utf-sidebar-widget-item">
            <h3>Category</h3>
            <form method="post" action="searchJob.php">
                <select class="selectpicker" name="searchCategory" data-live-search="true"  data-selected-text-format="count" data-size="10" title="All Categories" required="">
                <?php
                  //getting all category
                    $sql = "SELECT * FROM industry";
                    $query = $conn->query($sql);
                    while($row = $query->fetch_assoc()){
                  ?>
                  <option value="<?php echo $row['id']?>"><?php echo $row['name']?></option>
                <?php
                    }
                  ?>
                </select>
                <div class="utf-intro-search-button">
                  <button class="button ripple-effect" type="submit" name="submitSearch" style="padding: 0 12px; text-transform: capitalize; height: 39px;line-height: 39px;"> Search </button>
                </div>
            </form>
        </div>

        

        <div class="utf-sidebar-widget-item">
            <h3>Job Type</h3>
            <form method="post" action="searchJob.php">
                <select class="selectpicker" name="searchJobType" data-live-search="true"  data-selected-text-format="count" data-size="10" title="All Job Types" required="">
                <?php
                  //getting all category
                    $sql = "SELECT * FROM job_type";
                    $query = $conn->query($sql);
                    while($row = $query->fetch_assoc()){
                  ?>
                  <option value="<?php echo $row['id']?>"><?php echo $row['type']?></option>
                <?php
                    }
                  ?>
                </select>
                <div class="utf-intro-search-button">
                  <button class="button ripple-effect" type="submit" name="submitSearch" style="padding: 0 12px; text-transform: capitalize; height: 39px;line-height: 39px;"> Search </button>
                </div>
            </form>
        </div>
        <div class="clearfix"></div>
        <div class="clearfix"></div>
    </div>
</div>