<?php
require_once('common.php');
checkPermissions();

// Your Stats
if (!isset($_GET['t']) || $_GET['t'] == 1 || ($_GET['t'] < 1 || $_GET['t'] > 3)) {
    // Get User Data
    $user = getUser($_SESSION['linkedinId']);
    $s->assign('user', $user);


    $s->assign('registertime', relativeTime(strtotime($user['createdAt'])));

    $s->assign('numconns', count(getAllFriends($_SESSION['linkedinId'])));

    $sr = count(getSkillsReceived($_SESSION['userId']));
    $s->assign('numskillsreceived', $sr * 3);
    $s->assign('numconnectionsskillsreceived', $sr);

    $sg = count(getSkillsSent($_SESSION['userId']));
    $s->assign('numskillsgiven', $sg * 3);
    $s->assign('numconnectionsskillsgiven', $sg);

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

    // Get Shared skills
    //TODO: Check if there are Top Skills and if the friends have a connection
    $sharedSkills = getSharedSkillsGraph($myTopSkills, $_SESSION['linkedinId']);
    $sharedSkillsString = '';

    if (!empty($sharedSkills)) {

        $sharedSkillsString = '  {
	        "id": "1",
	        "name": "You",
	        "children": [';

        foreach ($sharedSkills as $skill) {

            $sharedSkillsString .= '{"id": "' . $skill['skill'] . '",
	            "name": "' . $skill['skill'] . '",';

            if (count($skill['conns']) > 0) {
                $sharedSkillsString .= '"children": [';
                foreach ($skill['conns'] as $conn) {
                    $sharedSkillsString .= '{
				           "id": "' . $skill['skill'] . $conn['linkedin_id'] . '",
	                		"name": "' . $conn['firstname'] . " " . $conn['lastname'] . '"
				        },';
                }
                $sharedSkillsString = substr($sharedSkillsString, 0, -1);
                $sharedSkillsString .= "]";

            }
            else {
                $sharedSkillsString .= '"children": []';
            }

            $sharedSkillsString .= "},";
        }

        $sharedSkillsString = substr($sharedSkillsString, 0, -1);
        $sharedSkillsString .= ']}';
    }

    $s->assign('treeSkills', $sharedSkillsString);

    // Get Top Skills Given and Generate graph
    $myTopSkillsGiven = getTopSkillsGiven($_SESSION['userId']);
    $myTopSkillsGivenString = '';

    $maxvalue = 0;
    if (count($myTopSkillsGiven) > 0) {
        $myTopSkillsGivenString = "[";
        foreach ($myTopSkillsGiven as $skill) {
            $myTopSkillsGivenString .= "['$skill[0]', $skill[1]],";
            if ($skill[1] > $maxvalue) {
                $maxvalue = $skill[1];
            }
        }
        $myTopSkillsGivenString = substr($myTopSkillsGivenString, 0, -1);
        $myTopSkillsGivenString .= "]";
    }
    else { // Get Random User to write the first skill
        $rf = getRandomFriend($_SESSION['linkedinId']);
        if (isset($rf[0]['linkedin_id']))
            $s->assign('randomFriend', $rf[0]['linkedin_id']);
        else
            $s->assign('randomFriend', '');
    }

    $s->assign('myTopSkills2', $myTopSkillsGivenString);
    $s->assign('chartticker2', createChartTicker($maxvalue));

    // Get connection Top Skills for "Skills Gap chart (Your Top Skills vs Connections Top Skills"
    $mixskills = array();

    // Final Format (Need to have the same elements):
    // s1 = [['Java',2], ['PHP',8], ['J2EE',14], ['JBOSS',20],['CEO', 0]];
    // s2 = [['Java',0], ['PHP',12], ['J2EE',0], ['JBOSS',0],['CEO', 23]];

    $connTopSkills = getConnectionsTopSkills($_SESSION['linkedinId']);
    $myString = '';
    $connString = '';

    // Grab all the elements
    if (count($connTopSkills) > 0 && count($myTopSkills) > 0) {
        foreach ($connTopSkills as $cskill) {
            $mixskills[] = $cskill['skill'];
        }
        foreach ($myTopSkills as $skill) {
            $mixskills[] = $skill['skill'];
        }
        // Create single entry
        $mixskills = array_unique($mixskills);
        // For each of the mixed skills, get my skills and connections top Skills
        $addedtomy = false;
        $addedtoconn = false;
        $myString = '[';
        $connString = '[';
        foreach ($mixskills as $mixskill) {
            foreach ($myTopSkills as $skill) {
                if ($skill['skill'] == $mixskill) {
                    $myString .= "['" . $skill['skill'] . "'," . $skill['count'] . "],";
                    $addedtomy = true;
                }
            }
            foreach ($connTopSkills as $skill) {
                if ($skill['skill'] == $mixskill) {
                    $connString .= "['" . $skill['skill'] . "'," . $skill['count'] . "],";
                    $addedtoconn = true;
                }
            }

            if (!$addedtomy) {
                $myString .= "['$mixskill', 0],";
            }
            if (!$addedtoconn) {
                $connString .= "['$mixskill', 0],";
            }
            $addedtomy = false;
            $addedtoconn = false;


        }
        $myString = substr($myString, 0, -1);
        $myString .= "]";
        $connString = substr($connString, 0, -1);
        $connString .= "]";
    }
    $s->assign('donutsinside', $myString);
    $s->assign('donutsoutside', $connString);

    // Assign Statistics Type
    $s->assign('statstype', 1);
    $s->assign('title', 'Top3Skills.com - Your Statistics');
}
    // Connections Stats
elseif ($_GET['t'] == 2) {

    // Get Connections Stats
    $numconns = count(getAllFriends($_SESSION['linkedinId']));
    $numactiveconns = count(getAllActiveFriends($_SESSION['linkedinId']));
    $s->assign('numconns', $numconns);
    $s->assign('numactiveconns', $numactiveconns);
    $s->assign('numnonactiveconns', $numconns - $numactiveconns);

    $numskillsreceived = count(getAllConnectionsSkills($_SESSION['linkedinId']));
    $s->assign('numskillsreceived', $numskillsreceived * 3);
    $s->assign('numskillsreceivedfrom', $numskillsreceived);
    $numskillssent = count(getAllConnectionsSkillsSent($_SESSION['linkedinId']));
    $s->assign('numskillssent', $numskillssent * 3);
    $s->assign('numskillssentto', $numskillssent);

    // Get Top Skills for Pie chart
    $myTopSkills2 = getConnectionsTopSkills($_SESSION['linkedinId']);
    $myTopSkillsString2 = '';

    if (count($myTopSkills2) > 0) {
        $myTopSkillsString2 = "[";
        foreach ($myTopSkills2 as $skill) {
            $myTopSkillsString2 .= "['$skill[0]', $skill[1]],";
        }
        $myTopSkillsString2 = substr($myTopSkillsString2, 0, -1);
        $myTopSkillsString2 .= "]";
    }
    else { // Get Random User to write the first skill
        $rf = getRandomFriend($_SESSION['linkedinId']);
        if (isset($rf[0]['linkedin_id']))
            $s->assign('randomFriend', $rf[0]['linkedin_id']);
        else
            $s->assign('randomFriend', '');
    }

    $s->assign('pieTopSkills', $myTopSkillsString2);

    // Get Connections Top Skills and Generate graph
    $myTopSkills = $myTopSkills2; // Re-use
    $myTopSkillsString = '';

    $maxvalue = 0;
    if (count($myTopSkills) > 0) {
        $myTopSkillsString = "[";
        foreach ($myTopSkills as $skill) {
            $myTopSkillsString .= "['$skill[0]', $skill[1]],";
            if ($skill[1] > $maxvalue)
                $maxvalue = $skill[1];
        }
        $myTopSkillsString = substr($myTopSkillsString, 0, -1);
        $myTopSkillsString .= "]";
    }

    $s->assign('myTopSkills', $myTopSkillsString);
    $s->assign('chartticker', createChartTicker($maxvalue));


    // Get Top Skills for Connections Graph
    //TODO: Check if there are Top Skills and if the friends have a connection
    $sharedSkills = getSharedSkillsGraph($myTopSkills, $_SESSION['linkedinId']);
    $sharedSkillsString = '';

    if (!empty($sharedSkills)) {
        $sharedSkillsString = '  {
	        "id": "1",
	        "name": "Top Skills",
	        "children": [';

        foreach ($sharedSkills as $skill) {

            $sharedSkillsString .= '{"id": "' . $skill['skill'] . '",
	            "name": "' . $skill['skill'] . '",';

            if (count($skill['conns']) > 0) {
                $sharedSkillsString .= '"children": [';
                foreach ($skill['conns'] as $conn) {
                    $sharedSkillsString .= '{
				           "id": "' . $skill['skill'] . $conn['linkedin_id'] . '",
	                		"name": "' . $conn['firstname'] . " " . $conn['lastname'] . '"
				        },';
                }
                $sharedSkillsString = substr($sharedSkillsString, 0, -1);
                $sharedSkillsString .= "]";

            }
            else {
                $sharedSkillsString .= '"children": []';
            }

            $sharedSkillsString .= "},";
        }
        $sharedSkillsString = substr($sharedSkillsString, 0, -1);
        $sharedSkillsString .= ']}';
    }
    $s->assign('treeSkills', $sharedSkillsString);

    // Get Most Referenced Connections
    $myTopSkills2 = mostReferencedConnections($_SESSION['linkedinId']);
    $myTopSkillsString2 = '';

    $maxvalue = 0;
    if (count($myTopSkills2) > 0) {
        $myTopSkillsString2 = "[";
        foreach ($myTopSkills2 as $skill) {
            $myTopSkillsString2 .= "['$skill[0]', $skill[1]],";
            if ($skill[1] > $maxvalue) {
                $maxvalue = $skill[1];
            }

        }
        $myTopSkillsString2 = substr($myTopSkillsString2, 0, -1);
        $myTopSkillsString2 .= "]";
    }

    $s->assign('myTopSkills2', $myTopSkillsString2);
    $s->assign('chartticker2', createChartTicker($maxvalue));

    $s->assign('connreferences', $myTopSkills2);


    $s->assign('statstype', 2);
    $s->assign('title', 'Top3Skills.com - Your Connections Statistics');
}
    // Top3Skills.com Stats
elseif ($_GET['t'] == 3) {

    $count = countActiveUsers();
    $s->assign('activeusers', $count[0]['count']);

    $count = countConnections();
    $s->assign('totalconns', $count[0]['count']);

    $count = countTotalSkills();
    $s->assign('totalskills', $count[0]['count'] * 3);

    $count = countDifferentSkills();
    $s->assign('diffskills', $count[0]['count']);

    $count = countDifferentCities();
    $s->assign('diffcities', $count[0]['count']);


    // Get System Skills for Pie chart
    $myTopSkills2 = getSystemTopSkills();
    $myTopSkillsString2 = '';


    if (count($myTopSkills2) > 0) {
        $myTopSkillsString2 = "[";
        foreach ($myTopSkills2 as $skill) {
            $myTopSkillsString2 .= "['$skill[0]', $skill[1]],";
        }
        $myTopSkillsString2 = substr($myTopSkillsString2, 0, -1);
        $myTopSkillsString2 .= "]";
    }

    // Get Top Skills and Generate graph
    $myTopSkills = $myTopSkills2;
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

    $s->assign('pieTopSkills', $myTopSkillsString2);

    $s->assign('statstype', 3);
    $s->assign('title', 'Top3Skills.com - Top3Skills.com Statistics');
}

completeTask($_SESSION['userId'], $Visit_Statistics);

$s->assign('currentPage', Pages::STATS);

$s->display('header.tpl');
$s->display('statistics.tpl');
$s->display('footer.tpl');


function relativeTime($timestamp) {
    $difference = time() - $timestamp;
    $periods = array("sec", "min", "hour", "day", "week", "month", "years", "decade");
    $lengths = array("60", "60", "24", "7", "4.35", "12", "10");

    if ($difference > 0) { // this was in the past 
        $ending = "ago";
    } else { // this was in the future 
        $difference = -$difference;
        $ending = "to go";
    }
    for ($j = 0; $difference >= $lengths[$j]; $j++) $difference /= $lengths[$j];
    $difference = round($difference);
    if ($difference != 1) $periods[$j] .= "s";
    $text = "$difference $periods[$j] $ending";
    return $text;
}

?>