<?php
require_once('common.php');
checkPermissions();

$result = retrieveRandomConnection($_SESSION['linkedinId']); 

echo $result; 

?>
