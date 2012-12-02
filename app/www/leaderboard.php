<?php
require_once('common.php');
checkPermissions();

$s->assign('leaderboard','');
$s->assign('skill','');
$s->assign('loc','');
$s->assign('people','all');
$s->assign('error','');
$s->assign('noresults',false);
$s->assign('hideform',false);
	
// Do Search
if (isset($_GET['act']) && $_GET['act'] == "generate") {
    $skill = filter_input(INPUT_GET, 'skill', FILTER_SANITIZE_STRING);
    $location = filter_input(INPUT_GET, 'loc', FILTER_SANITIZE_STRING);
    $people = filter_input(INPUT_GET, 'people', FILTER_SANITIZE_STRING);
    
    
   	$skill = substr($skill, 0, 22);
   	$location = substr($location, 0, 100);
   	
    // Check if we are just searching for connections
	$connsonly = false;	
    if ($people == 'conn') {
		$connsonly = true; 
	}
    
	$msg = '';
	if($skill == ''){
		$msg.= "All Skills";
	}
	else{
		$msg.= $skill;		 
	}
	if($location == ''){
		$msg.= " / All Locations";
	}
	else{
		$msg.= " / ".$location;
	}
	if($connsonly){
		$msg.= " / My Connections";
	}
	else{
		$msg.= " / All Users";
	}

	$s->assign('msg',$msg);

	    	
    $leaderboard = '';
    $leaderboard = doSearch($skill,$location,$connsonly,$_SESSION['linkedinId']);
    if(empty($leaderboard)){ 
    		$s->assign('noresults',true);
    }    
    else{
    	$s->assign('hideform',true);
    }
    
    $s->assign('leaderboard',$leaderboard);
    $s->assign('skill',$skill);
	$s->assign('loc',$location);
	
	

		
	if($connsonly)
		$s->assign('people','conn');
	else	
    	$s->assign('people','all');
}
else{
	$s->assign('msg',"All Skills / All Locations / All Users");

	$skill = '';
	$location = '';
	$connsonly = '';	    	
    $leaderboard = '';
    $leaderboard = doSearch($skill,$location,$connsonly,$_SESSION['linkedinId']);
    if(empty($leaderboard)){
    		$s->assign('noresults',true);
    }    
    else{
    	$s->assign('hideform',true);
    }
    
    $s->assign('leaderboard',$leaderboard);
    $s->assign('skill',$skill);
	$s->assign('loc',$location);
}

	$s->assign('title','Top3Skills.com - Leaderboard');

completeTask($_SESSION['userId'], $Visit_Leaderboards);	

$s->assign('currentPage', Pages::LEADERBOARD);

// Show normal 
$s->display('header.tpl');
$s->display('leaderboards.tpl');
$s->display('footer.tpl'); 


?>