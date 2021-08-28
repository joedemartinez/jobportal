<!-- Checks if a user is admin-->
<?php
	if($_SESSION['role_id'] != 3){
		header('location: dashboard.php');
	}
?>