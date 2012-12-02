<?php
require_once('common.php');
checkPermissions();

if (isset($_SESSION['redirect']) && $_SESSION['redirect'] != '') {
    header("Location: " . $_SESSION['redirect']);
    exit();
}

$s->display('header.tpl');
$s->display('choosepic.tpl');
$s->display('footer.tpl');

?>