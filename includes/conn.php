<?php
	$conn = new mysqli('localhost', 'root', '', 'JobPortal_database');

	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}
	
?> 