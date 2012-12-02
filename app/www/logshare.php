<?php
require_once('common.php');

// AJAX called

if (!isset($_SESSION['userId']) || empty($_SESSION['userId'])){
    exit();
}

$type = filter_input(INPUT_GET, 'type', FILTER_SANITIZE_STRING);

switch(strtolower($type)){
    case strtolower(ShareType::LI):
    case strtolower(ShareType::TWITTER):
    case strtolower(ShareType::FACEBOOK):
        logShare($_SESSION['userId'], $type);
        break;
}
?>