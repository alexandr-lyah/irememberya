<?php
// load Smarty library
require('Smarty.class.php');

class Smarty3s extends Smarty {

	 function __construct() {
	 	global $path, $template_dir, $production;

        // Class Constructor.
        // These automatically get set with each new instance.
   		parent::__construct(); 

        $this->template_dir = $template_dir;
        $this->compile_dir = "$template_dir/tpl_c";
        $this->config_dir = "$template_dir/configs";
        $this->cache_dir = "$template_dir/cache";

        $this->caching = false;

        if ($production == false)
            $this->force_compile = true;
        //$this->debugging = true;

        global $lang;
        $this->assign('app_name', '3 Skills');
        /*
      $this->register_modifier("bold", "bold");
      $this->register_modifier("adaptfontsize", "adaptfontsize");
      $this->register_modifier("convertemes", "convertemes");
      $this->register_modifier("datetotext", "datetotext");
      $this->register_modifier("megafy", "megafy");
      $this->register_function("convertCountry", "convertCountry");
      $this->register_modifier("humanReadableTime", "humanReadableTime");
      */

        

    }

}

function megafy($string) {
    return round($string / 1024, 2);
}

function bold($string) {
    return '<strong>' . $string . '</strong>';
}

function datetotext($string) {
    $day = substr($string, 0, 2);
    $month = substr($string, 3, 2);
    $year = substr($string, 6, 4);
    $hour = substr($string, 11, 2);
    $minute = substr($string, 14, 2);

    $date = mktime($hour, $minute, 0, $month, $day, $year);

    $today = strtotime("today");
    $yesterday = strtotime("-1 day");

    if ($date > $today) {
        return "Hoje, " . $hour . ":" . $minute;
    }
    if ($date > $yesterday) {
        return "Ontem, " . $hour . ":" . $minute;
    }

    return $string;
}


function humanReadableTime($timestamp){
    $difference = time() - $timestamp;
    $periods = array("sec", "min", "hour", "day", "week", "month", "years", "decade");
    $lengths = array("60","60","24","7","4.35","12","10");

    if ($difference >= 0) { // this was in the past
        $ending = "ago";
    } else { // this was in the future
        $difference = -$difference;
        $ending = "to go";
    }
    for($j = 0; $difference >= $lengths[$j]; $j++) $difference /= $lengths[$j];
    $difference = round($difference);
    if($difference != 1) $periods[$j].= "s";
    $text = "$difference $periods[$j] $ending";
    return $text;
}

?>