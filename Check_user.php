<?Php
include 'includes/session.php';

if (isset($_POST['type'])) {
	if (isset($_SESSION['lastActive'])) {
		# code...
	    if ((time() - $_SESSION['lastActive']) > 300) {  // 60*5mins in Seconds		

	        echo json_encode(array("logout"=>"Yes"));
	    }
	}
}else{
	if (isset($_SESSION['lastActive'])) {
		# code...
	    $_SESSION['lastActive'] = time();
	}
}

?>