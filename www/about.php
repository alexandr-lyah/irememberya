<?php
require_once('common.php');

if (!(isset($_SESSION['authorized']) && $_SESSION['authorized'] === true)){
	$s->assign('displayshare',true);
}

$s->assign('title', "Top3Skills.com - About");

$s->display('header.tpl');
$s->display('about.tpl');
$s->display('footer.tpl');

?>