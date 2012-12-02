<?php
require_once('common.php');

if(isset($_GET['p']) && $_GET['p'] != ''){
	
	if($_GET['p'] == 'addmyskills'){
            // Redirect to addSkills with new Random Connection
            header("Location: addskills.php?lid=" . $_SESSION['linkedinId']);
            exit();
	}
	else if($_GET['p'] == 'addconnskills'){
		$connections = getAllFriends($_SESSION['linkedinId']);
	    $nextconnection = '';
	    if (!empty($connections)) {
	        shuffle($connections);
	        $rand_keys = array_rand($connections, 1);
	        $nextconnection = $connections[$rand_keys];
			header("Location: addskills.php?lid=" . $nextconnection['linkedin_id']);
            exit();
	    }	    
	}	
}



?>