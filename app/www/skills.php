<?php

$q = filter_input(INPUT_GET , 'q', FILTER_SANITIZE_SPECIAL_CHARS);

$q = strtolower($q);
if (!$q) return;

require_once('../skillsHint.php');

$items2 = array();
foreach($itemsbig as $item){
	 if(substr_count(strtolower($item), $q)>0)
 		$items2[$item] = $item;
}
foreach ($items2 as $item2) {
	echo "$item2|$item2\n";
}

?>