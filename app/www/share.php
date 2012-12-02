<?php
require_once('common.php');
checkPermissions();

// Get User Data
$userData = getUserById($_SESSION['userId']);
$s->assign('user', $userData);

$shareMsg = "What are my Top 3 Skills and professional strengths? Tell me at http://Top3Skills.com/" .
        $userData['username'];
$s->assign('shareMsg', urlencode($shareMsg));


$s->assign('title', 'Top3Skills.com - ' . $userData['firstname'] . ' ' . $userData['lastname'] . ' Share');

$s->assign('sharescreen', true);

$s->display('header.tpl');
$s->display('share.tpl');
$s->display('footer.tpl');

?>