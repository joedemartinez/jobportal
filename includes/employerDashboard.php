<!-- Checks if a user is employer-->
<?php
	if($_SESSION['role_id'] != 2){
		header('location: dashboard.php');
	}
?>