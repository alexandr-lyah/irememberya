<?php
require_once('common.php');
checkPermissions();

if (isset($_SESSION['redirect']) && $_SESSION['redirect'] != '') {
    header("Location: " . $_SESSION['redirect']);
    exit();
}
$li = initLinkedin();

$result = retrieveRandomConnection($_SESSION['linkedinId']); 

$s->assign('users', $result);
$s->display('header.tpl');
$s->display('dashboard.tpl');
$s->display('footer.tpl');

?>