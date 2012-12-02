<?php
require_once('common.php');
checkPermissions();

if (isset($_GET['act']) && $_GET['act'] === "add") {

    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);

    $proceed = true;

    if (strlen($email) > 128) {
        $proceed = false;
        $error = "Email must have a maximum of 128 characters";
    }
    elseif (strlen($username) > 64 || strlen($username) < 2) {
        $proceed = false;
        $error = "Username must have between 2 and 63 characters";
    }
    elseif (!check_email_address($email)) {
        $proceed = false;
        $error = "Invalid email address";
    }
    elseif (isValidUsername($username,$_SESSION['userId']) != null) {
        $proceed = false;
        $error = "Username already in use.";
    }
    elseif (!preg_match('/^[a-zA-Z0-9]*$/', $username)) {
        $proceed = false;
        $error = "Username can only contain letters and numbers.";
    }

    $username = mb_strtolower($username);

    $user = getUserById($_SESSION['userId']);
    $s->assign('user', $user);


    if ($proceed) {
        update("update users set email = ?, username = ?, 3sactive = 1, createdAt = now() WHERE id = ?",
            array ($email, $username, (int) $_SESSION['userId']));
            
        completeTask($_SESSION['userId'], $Register_your_username);
            
        $user = getUserById($_SESSION['userId']);

        // Share with others if set
        if (isset($_POST['share'])) {
        	if($production){
        		shareStart($user['firstname'],$username);
        	}
        }

        Hooks::user_registered_endOK();
        header('Location: share.php');
        exit();
    } else {
        $s->assign('email', $email);
        $s->assign('error', $error);
        $s->assign('username', $username);
        $s->display('header.tpl');
        $s->display('register.tpl');
        $s->display('footer.tpl');
    }
}
else {
    $user = getUserById($_SESSION['userId']);
    $s->assign('user', $user);
    $s->assign('email', $user['email']);
    $s->assign('error', '');
    $s->assign('username', $user['username']);
    $s->display('header.tpl');
    $s->display('register.tpl');
    $s->display('footer.tpl');
}

?>