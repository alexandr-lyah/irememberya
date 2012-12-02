<?php
require_once('common.php');
checkPermissions();

$type = null;

if (isset($_GET['type'])) {
    $type = filter_input(INPUT_GET, 'type', FILTER_SANITIZE_STRING);
}

switch ($type) {
    case "company":
        $companyId = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);
        $connections = getAllFriendsByCompany($_SESSION['linkedinId'], $companyId, false, 9, true);
        break;
    default:
        $connections = getAllFriends($_SESSION['linkedinId'], 9, true);
}

//echo json_encode($connections);

$s->assign('connections', $connections);
$s->display('connectionsBox.tpl');
?>