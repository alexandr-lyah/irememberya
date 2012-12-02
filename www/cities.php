<?php
require_once('common.php');
checkPermissions();

$q = filter_input(INPUT_GET , 'q', FILTER_SANITIZE_SPECIAL_CHARS);

$q = strtolower($q);
if (!$q) return;

$items = getDistinctCities($q);

foreach ($items as $item) {
	echo "$item[0]|$item[0]\n";
}

?>