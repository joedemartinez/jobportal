<!-- Checks if a user is employer-->
<?php
	if($_SESSION['role_id'] != 1){
		header('location: dashboard.php');
	}
?>