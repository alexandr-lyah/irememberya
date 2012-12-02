<?php
require_once('common.php');


session_unset();
$_SESSION = array();
if (session_destroy()) {
    // session destroyed
    header('Location: index.php');
} else {
    // session not destroyed
    echo "Error clearing user's session";
}

/*
$li = initLinkedin();

//$response = $li->revoke();
if ($response['success'] === TRUE) {
    // revocation successful, clear session
    session_unset();
    $_SESSION = array();
    if (session_destroy()) {
        // session destroyed
        header('Location: index.php');
    } else {
        // session not destroyed
        echo "Error clearing user's session";
    }
} else {
    // revocation failed
    echo"Error revoking user's token:<br /><br />RESPONSE:<br /><br /><pre>" . print_r($response, TRUE) .
            "</pre><br /><br />LINKEDIN OBJ:<br /><br /><pre>" . print_r($OBJ_linkedin, TRUE) . "</pre>";
}


 */
?>