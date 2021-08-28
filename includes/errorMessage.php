<?php	if(isset($_SESSION['message'])): ?>
<div class="notification <?php echo $_SESSION['messagetype'] ?> closeable">
  <p><?php echo $_SESSION['message'] ?></p>
  <a class="close" href="#"></a> 
</div>
<!-- unset message -->
<?php unset($_SESSION['message']); ?>
<?php endif; ?>