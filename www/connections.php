<?php
require_once('common.php');
checkPermissions();

$type = null;

if (isset($_GET['type'])) {
    $type = filter_input(INPUT_GET, 'type', FILTER_SANITIZE_STRING);
}

$companyId = -1;
if (isset($_GET['id'])) {
    $companyId = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);
}

switch ($type) {
    case "company":
        if ($companyId != -1) {
            $connections = getAllFriendsByCompany($_SESSION['linkedinId'], $companyId);
            break;
        }
    default:
        $connections = getAllFriends($_SESSION['linkedinId']);
}
$companies = getCompaniesPopularUser($_SESSION['linkedinId'], 10);

$companiesResult = array();
foreach ($companies as $c) {
    $id = $c['id'];
    $companiesResult[$id] = $c['name'];
}

$s->assign('popularCompanies', $companiesResult);
$s->assign('companyId', $companyId);
$s->assign('connections', $connections);

$s->display('header.tpl');
$s->display('connections.tpl');
$s->display('footer.tpl');

?>