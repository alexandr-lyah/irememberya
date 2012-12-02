<?php
require_once('common.php');
checkPermissions();

$lid= filter_input(INPUT_GET, 'lid', FILTER_SANITIZE_STRING);
		
$s->assign('showinvite', true);
$s->assign('confirminvitation', false);
			
	// Get User Data 
	$user = getUser($lid);

	if ($user == null){
		$s->display('header.tpl');
		$s->assign('error', 'User does not exist or is not a valid connection.');
		$s->display('error.tpl');
		$s->display('footer.tpl');		
	}
	else{
	$s->assign('user', $user);

	$s->assign('title','Top3Skills.com - '. $user['firstname'] . ' ' . $user['lastname'] . ' Profile');
	$s->display('header.tpl');
		
	$isfriend = isFriend($lid);	
	$s->assign('isfriend', $isfriend);
	if($isfriend){
		$sent = sentSkillsTo($_SESSION['userId'], $user['id']);	
		$s->assign('sentskills', $sent);	
	
		// Update if invitation sent
		if(isset($_GET['inv'])){		
			sendInvitation($lid, $user['firstname']);
			$s->assign('confirminvitation', true);
		}
		
		//Check if the user is using 3Skills (check if email is defined)
		// If it is not using 3Skills, check if we already sent an invitation
		// If not, show form to send invitation
		$res = invitationSent($lid);
		$invsent = !empty($res);
		if($user['email'] != '' || $invsent){
			$s->assign('showinvite', false);
		}

	}
	
	// Get Top Skills for Chart 
	// Get Top Skills and Generate graph
	$myTopSkills = getTopSkills($user['id']);
	$myTopSkillsString = '';
	
	$maxvalue = 0;		
	if (count($myTopSkills) > 0) {
	    $myTopSkillsString = "[";
	    foreach ($myTopSkills as $skill) {
	        $myTopSkillsString .= "['$skill[0]', $skill[1]],";
		    if($skill[1] > $maxvalue){
			        $maxvalue = $skill[1]; 
		    }	        
	    }
	    $myTopSkillsString = substr($myTopSkillsString, 0, -1);
	    $myTopSkillsString .= "]";
	}
	$s->assign('myTopSkills', $myTopSkillsString);
	$s->assign('chartticker',createChartTicker($maxvalue));
			
	// Get user top Skills, according to his connections opinion
	$receivedSkills = getSkillsReceived($user['id']);
	$s->assign('receivedSkills', $receivedSkills);
	$s->assign('writeback', false);
	$s->assign('myId', $_SESSION['linkedinId']);
	
		
	$s->display('profile.tpl');
	$s->display('footer.tpl');
}



?>