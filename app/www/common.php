<?php
require_once('../config.php');
require_once('../mysql.php');
ini_set('default_charset', 'UTF-8');
header('Content-Type: text/html; charset=UTF-8');

if ($production) {
    ini_set('display_errors', 'Off');
}

if ($_SERVER['SERVER_NAME'] == "localhost"){
    $baseUrl = $domainLocal;
}
else{
    $baseUrl = $domain;
}

ini_set('include_path', ini_get('include_path') . PATH_SEPARATOR . 'lib/oauth' . PATH_SEPARATOR . 'lib/smarty');
require_once('lib/simple-linkedin/linkedin_3.0.1.class.php');
require_once('include/functions.php');
require_once('include/functionsLI.php');
require_once('include/loggers.php');
require_once('include/hooks.php');
require_once('include/db.php');
require_once('include/enums.php');

session_name("top3skills");
session_set_cookie_params(2592000); // keep it for a month
session_start();

$whitelistfiles =
        array('about.php', 'addskills.php', 'connections.php', 'dashboard.php', 'index.php', 'leaderboard.php',
            'profile.php', 'statistics.php');

// start Smarty
require_once ('include/Smarty3s.php');
$s = new Smarty3s ();
$s->assign('production', $production);
$s->assign('TPL_DIR', $template_dir);
$s->assign('TPL_DEFAULT_DIR', "tpl");

// Set Title
$s->assign('title', "Top3Skills.com - What are your Top 3 Skills?");
$s->assign('displayshare', false);
$s->assign('sharescreen', false);
$s->assign('guestview', false);
$s->assign('currentPage', Pages::OTHER);
$s->assign('PAGES', Pages::toArray());
$s->assign('baseUrl', $baseUrl);

// parse lang
$lang = parse_ini_file('lang/en.ini');
$s->assign('LANG', $lang);

?>