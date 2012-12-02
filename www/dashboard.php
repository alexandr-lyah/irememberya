<?php
require_once('common.php');
checkPermissions();

if (isset($_SESSION['redirect']) && $_SESSION['redirect'] != '') {
    header("Location: " . $_SESSION['redirect']);
    exit();
}

header("Location: choosepic.php");
exit();
    
?>