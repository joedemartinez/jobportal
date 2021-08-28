<!-- Checks if a user is logged in -->
<?php
	if(!$_SESSION || !isset($_SESSION['email'])){
		header('location: ../login.php');
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta name="author" content="">
<meta name="description" content="">
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Career Pathway Dashboard</title>

<!--  Favicon -->
<link rel="shortcut icon" href="../assets/images/logo2.png">

<!-- CSS -->
<link rel="stylesheet" href="../assets/css/bootstrap-grid.css">
<link rel="stylesheet" href="../assets/css/icons.css">
<link rel="stylesheet" href="../assets/css/style.css">
<!-- <link rel="stylesheet" href="../assets/css/bootstrap.min.css"> -->
<link rel="stylesheet" href="../assets/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="../assets/css/buttons.dataTables.min.css">



<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css?family=Nunito:300,400,600,700,800&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800&display=swap" rel="stylesheet">   
<style type="text/css">
	.text-truancation{
		overflow: hidden; white-space: nowrap; text-overflow: ellipsis; width: 400px;
	}
	textarea{
		resize: none;
	}
	.utf-dashboard-container-aera{
		
	}
	.showPassword{
		float: right;margin-right: 20px;margin-bottom: 0px;margin-top: -50px; position: relative; z-index: 2; cursor:pointer;
	}
	.salary-box .salary-amount {	
    font-size: 22px;
	}
	.popup-scroll{
	  /* Overflow Scroll */
	  overflow-y: scroll;
	  max-height: 700px;
	  padding:0 1em 0 0;
	}

	/* custom scrollbars - webkit only */
	.popup-scroll::-webkit-scrollbar {background-color:#EEE;width:10px;}
	.popup-scroll::-webkit-scrollbar-thumb {
		border:1px #EEE solid;border-radius:2px;background:#777;
		-webkit-box-shadow: 0 0 8px #555 inset;box-shadow: 0 0 8px #555 inset;
		-webkit-transition: all .3s ease-out;transition: all .3s ease-out;
	}
	.popup-scroll::-webkit-scrollbar-track {-webkit-box-shadow: 0 0 2px #ccc;box-shadow: 0 0 2px #ccc;}	

	.asterisks{
		color: red;
	}

	
	
</style>
</head>
<?php
    include_once('../Check_user.php');
?>