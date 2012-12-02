<?php
require_once('common.php');

if (isset($_SESSION['authorized']) && $_SESSION['authorized'] === true) {
    header("Location: dashboard.php");
    exit();
}

// If you are in index.php you don't need any redirects
$_SESSION['redirect'] = '';

$s->assign('displayshare', true);

$s->display('headerindex.tpl');
$s->display('index.tpl');
$s->display('footer.tpl');

?>