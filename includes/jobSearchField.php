<div class="col-md-12">
      <div class="utf-intro-banner-search-form-block margin-top-40"> 
        <?php if(!isset($_GET['comNames'])) : ?>
        <div class="utf-intro-search-field-item">
	  <i class="icon-feather-search"></i>
          <input id="intro-keywords" type="text" name="searchKeyword" placeholder="Search Jobs Keywords...">
        </div>
        <?php endif;?>
	<div class="utf-intro-search-field-item">
          <select class="selectpicker default" data-live-search="true" name="searchLocation" data-selected-text-format="count" data-size="5" title="Select Location">
          <?php
          //getting all states
            $sql = "SELECT * FROM cities";
            $query = $conn->query($sql);
            while($row = $query->fetch_assoc()){
          ?>
            <option value="<?php echo $row['id']?>"><?php echo $row['name']?></option> 
          <?php
            }
          ?>
          </select>
        </div>
	<div class="utf-intro-search-field-item">
          <select class="selectpicker default" data-live-search="true" name="searchCategory" data-selected-text-format="count" data-size="5" title="All Categories">
          <?php
          //getting all industry
            $sql = "SELECT * FROM industry";
            $query = $conn->query($sql);
            while($row = $query->fetch_assoc()){
          ?>
            <option value="<?php echo $row['id']?>"><?php echo $row['name']?></option> 
          <?php
            }
          ?>
          </select>
        </div>
        <div class="utf-intro-search-button">
          <button class="button ripple-effect" type="submit" name="submitSearch"><i class="icon-material-outline-search"></i> Search </button>
        </div>
      </div>

