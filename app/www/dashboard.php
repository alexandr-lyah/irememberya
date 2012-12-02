<?php
require_once('common.php');
checkPermissions();

if (isset($_SESSION['redirect']) && $_SESSION['redirect'] != '') {
    header("Location: " . $_SESSION['redirect']);
    exit();
}
$li = initLinkedin();

$response =
        $li->profile('~:(id,first-name,last-name,picture-url,public-profile-url,headline,industry,location,skills:(id,skill,proficiency,years),positions)');
if ($response['success'] === TRUE) {
    $response['linkedin'] = new SimpleXMLElement($response['linkedin']);
    $user = $response['linkedin'];
    $user = parseLIUser($user);
} else {
    echo"Error retrieving profile information:<br /><br />RESPONSE:<br /><br /><pre>" . print_r($response) .
            "</pre>";
    exit();
}

// Get Connections and Skills Given by the user to his friends
$randomconnections = getAllFriendsAndSkillsGiven($_SESSION['linkedinId'], 20, true);

if (empty($randomconnections)) {
    $randomconnections = '';
}

$s->assign('randomconnections', $randomconnections);

$firstfriend = '';
if (!empty($randomconnections)) {
    $firstfriend = $randomconnections[0];
    $s->assign('firstfriend', $firstfriend);
}

// Get User Data
$userData = getUserById($_SESSION['userId']);
$s->assign('user', $userData);

$s->assign('title', 'Top3Skills.com - ' . $userData['firstname'] . ' ' . $userData['lastname'] . ' Dashboard');

// Get user Top Skills, defined by himself

$myOwnSkills = '';
if ($userData['skill1'] != '') {
    $myOwnSkills =
            array ('skill1' => $userData['skill1'], 'skill2' => $userData['skill2'], 'skill3' => $userData['skill3']);
}

$s->assign('myOwnSkills', $myOwnSkills);

// Get Top Skills and Generate graph
$myTopSkills = getTopSkills($_SESSION['userId']);
$myTopSkillsString = '';

$maxvalue = 0;
if (count($myTopSkills) > 0) {
    $myTopSkillsString = "[";
    foreach ($myTopSkills as $skill) {
        $myTopSkillsString .= "['$skill[0]', $skill[1]],";
        if ($skill[1] > $maxvalue) {
            $maxvalue = $skill[1];
        }
    }
    $myTopSkillsString = substr($myTopSkillsString, 0, -1);
    $myTopSkillsString .= "]";
}
$s->assign('myTopSkills', $myTopSkillsString);
$s->assign('chartticker', createChartTicker($maxvalue));

// Get user top Skills, according to his connections opinion
$receivedSkills = getSkillsReceived($_SESSION['userId']);
$s->assign('receivedSkills', $receivedSkills);
$s->assign('writeback', true);

// Get connections top Skills, according to user opinion
$sentSkills = getSkillsSent($_SESSION['userId']);

if (empty($sentSkills)) {
    $sentSkills = '';
}

$ic = incompleteTasks($_SESSION['userId']);
$ct = completeTasks($_SESSION['userId']);

$num_ic = count($ic);
$num_ct = count($ct);

if($ic == ''){
	$num_ic = 0;
}

$completeness = round(($num_ct/($num_ic + $num_ct))*100);


$s->assign('completeness', $completeness);

$s->assign('sentSkills', $sentSkills);
$s->assign('itasks', $ic);
$s->assign('ctasks', $ct);

$shareMsg = $lang['shareMsg'] .
        $userData['username'];
$s->assign('shareMsg', urlencode($shareMsg));


$s->assign('currentPage', Pages::DASHBOARD);
$s->display('header.tpl');
$s->display('dashboard.tpl');
$s->display('footer.tpl');

?>