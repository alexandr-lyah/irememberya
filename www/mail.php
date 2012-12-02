<?php
	require_once('common.php');
	
	
	$name_safe = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
	$emailAddr = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
	$comment_safe  = filter_input(INPUT_POST, 'comment', FILTER_SANITIZE_STRING);
	
	$errors="";
		
	if(strlen($name_safe) > 128 ){
		$errors = $errors . "<br />Name must contain at least 10 characters.";
	}

	if(strlen($comment_safe) > 1024 ){
		$errors = $errors . "<br />Name must contain at least 10 characters.";
	}
		
	//validate the email address on the server side
	if(!eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $emailAddr) ) {
		$errors = $errors . '<br />An invalid email address was entered'; //email was not valid
	}
	
	if(empty($errors)){
		
		$uid = 0;
		if(isset($_SESSION['userId']) && $_SESSION['userId'] != ''){
			$uid = $_SESSION['userId'];
		}
		
	    insert("INSERT INTO feedback (name,email,message) values (?,?,?)",
	                    array($name_safe,$emailAddr,$comment_safe));				

		echo "success";
	}
	else
		echo $errors;
?>
