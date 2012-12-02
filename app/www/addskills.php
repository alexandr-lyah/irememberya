<?php
require_once('common.php');

function addMyConnectionsBox($connections, $showCompanies = true) {
    global $s;
    $s->assign('connections', $connections);
    if ($showCompanies && isset($_SESSION['linkedinId']) && $_SESSION['linkedinId'] != '') {
        $s->assign('popularCompanies', getCompaniesPopularUser($_SESSION['linkedinId'], 5));
    }
}

function assignHintSkills($linkedin_id) {
    global $s;

    // get skills for hint input boxes
    $userLISkills = getSkillsLinkedIn($linkedin_id);

    if (empty($userLISkills) || count($userLISkills) < 3) {
        $userLISkills = getRandomSkillFromDefaults();
    }

    $s->assign('hintSkill1', $userLISkills[0]);
    $s->assign('hintSkill2', $userLISkills[1]);
    $s->assign('hintSkill3', $userLISkills[2]);
}

$guestview = false;
$_SESSION['redirect'] = '';

// If the user is already logged in, go with the normal flow - This is an exception
if (!isset($_SESSION['oauth'])
    || !isset($_SESSION['oauth']['linkedin'])
    || !isset($_SESSION['oauth']['linkedin']['authorized'])
    || $_SESSION['oauth']['linkedin']['authorized'] == false
    || !isset($_SESSION['userId'])
    || !isset($_SESSION['authorized'])
    || !$_SESSION['authorized']
) {
    $guestview = true;
    $s->assign('displayshare', true);
    $s->assign('currentPage', Pages::PUBLIC_PROFILE);
}
else {
    checkPermissions();
    $s->assign('currentPage', Pages::ADD_SKILLS);

}

// This IF statement is triggered when the user clicks te SAVE AND CONTINUE button on the AddSkills page
if (isset($_GET['act']) && $_GET['act'] == "add" && !$guestview) {

    $linkedinId = filter_input(INPUT_POST, 'uid', FILTER_SANITIZE_STRING);
    $prevlinkedinId = filter_input(INPUT_POST, 'prevuid', FILTER_SANITIZE_STRING);
    $skill1 = filter_input(INPUT_POST, 'skill1', FILTER_SANITIZE_STRING);
    $skill2 = filter_input(INPUT_POST, 'skill2', FILTER_SANITIZE_STRING);
    $skill3 = filter_input(INPUT_POST, 'skill3', FILTER_SANITIZE_STRING);

    $error = '';
    $proceed = true;
    $myskills = false;
    $validconnection = false;
    $userInDb = null;

    $connections = getAllFriends($_SESSION['linkedinId']);

    // Check if it is the user itself or a valid connection directly from database
    if ($linkedinId == $_SESSION['linkedinId']) {
        $validconnection = true;
        $userInDb = getUser($_SESSION['linkedinId']);
        $myskills = true;
    }
    else {
        foreach ($connections as $connection) {
            if ($connection['linkedin_id'] == $linkedinId) {
                $validconnection = true;
                // Even if the user is in our database, retrieve the data directly from database
                $userInDb = $connection;
                break;
            }
        }
    }
    // Get Random Connection
    $nextconnection = '';
    $nextnextconnection = '';
    if (!empty($connections)) {
        shuffle($connections);
        $rand_keys = array_rand($connections, 1);
        $nextconnection = $connections[$rand_keys];
    }

    if ($userInDb != null && $validconnection) {
        // Check if 3 skills are all filled in
        if ($skill1 == '' || $skill2 == '' || $skill3 == '') {
            $error = "You need to fill the 3 skills";
            $proceed = false;
        }
            // Check if they are equal
        else {
            if (strtolower($skill1) == strtolower($skill2) || strtolower($skill1) == strtolower($skill3)
                || strtolower($skill2) == strtolower($skill3)
            ) {
                $error = "Skills must be different";
                $proceed = false;
            }
                // Check the size
            else {
                $maxSkills = 32;
                if (strlen($skill1) > $maxSkills || strlen($skill2) > $maxSkills || strlen($skill3) > $maxSkills) {
                    $error = "Each Skill can have a maximum of $maxSkills characters.";
                    $proceed = false;
                }
            }
        }

        $s->assign('skill1', $skill1);
        $s->assign('skill2', $skill2);
        $s->assign('skill3', $skill3);

        if ($proceed) {

            // Update on Skills Table
            if (!$myskills) {
                $skills = getSkills($_SESSION['userId'], $userInDb['id']);
                if ($skills != null) {
                    update("update skills set skill1 = ?, skill2=?, skill3 = ? where from_id = ? and to_id = ?",
                           array($skill1, $skill2, $skill3, $_SESSION['userId'], $userInDb['id']));
                }
                else {
                    // If not, add new skills
                    insert("insert into skills (from_id, to_id, skill1, skill2, skill3, createdAt) VALUES (?,?,?,?,?, NOW())",
                           array($_SESSION['userId'], $userInDb['id'], $skill1, $skill2, $skill3));

                    completeTask($_SESSION['userId'], $Write_Connections_Skills);
                    completeTask($userInDb['id'], $Receive_Skills);
                }

                // Always Update Skills History Table
                insert("insert into skills_history (from_id, to_id, skill1, skill2, skill3, createdAt) VALUES (?,?,?,?,?, NOW())",
                       array($_SESSION['userId'], $userInDb['id'], $skill1, $skill2, $skill3));
            }
                // Update on user table
            else {
                update("update users set skill1 = ?, skill2=?, skill3 = ? where id = ? ",
                       array($skill1, $skill2, $skill3, $_SESSION['userId']));
                completeTask($_SESSION['userId'], $Define_your_Top_3_Skills);
            }
            $user = getUserById($_SESSION['userId']);

            // If Send Message is checked
            if (isset($_POST['msg']) && !$myskills) {
                sendMessage($userInDb['linkedin_id'], 'Added 3 Skills to your Top3Skills.com profile',
                            "Hi  " . $userInDb['firstname'] . "
                        
                        I just added the skills \"$skill1\", \"$skill2\" and \"$skill3\" to your Top3Skills.com profile. 
                
                		Tell me what are my Top 3 Skills at http://Top3Skills.com/" . $user['username'] . " when you have the time.
                		
                		Best regards, 
                		" . $user['firstname']);
            }
            // Redirect to addSkills with new Random Connection
            header("Location: addskills.php?added=1&plid=" . $userInDb['linkedin_id'] . "&" . "lid=" .
                   $nextconnection['linkedin_id']);
            exit();

        }
        else {
            // there was a validation error
            // Get connections top Skills, according to user opinion
            $sentSkills = getSkillsSent($_SESSION['userId']);
            if (empty($sentSkills)) {
                $sentSkills = '';
            }

            $s->assign('sentSkills', $sentSkills);

            $s->assign('error', $error);
            $s->assign('success', '');
            $s->assign('prevconnection', $prevlinkedinId);
            $s->assign('nextconnection', $nextconnection);
            $s->assign('user', $userInDb);
            $s->assign('myskills', $myskills);
            addMyConnectionsBox($connections);
        }

        // assign hint skills
        assignHintSkills($userInDb['linkedin_id']);

        $s->assign('title',
                   'Top3Skills.com - ' . $userInDb['firstname'] . ' ' . $userInDb['lastname'] . ' Top 3 Skills');

        $s->display('header.tpl');
        $s->display('addskills.tpl');

    }
    else {
        $s->assign('error', 'User does not exist or is not a valid connection. ');
        $s->display('header.tpl');
        $s->display('error.tpl');
    }

}
    // We can get here from two points
    // top3skills.com/username which redirects to addskills?uid=username
    // or from addskills?lid=linkedin ID

else {

    $username = filter_input(INPUT_GET, 'uid', FILTER_SANITIZE_STRING);
    $linkedinId = filter_input(INPUT_GET, 'lid', FILTER_SANITIZE_STRING);
    $prevlinkedinId = filter_input(INPUT_GET, 'plid', FILTER_SANITIZE_STRING);
    $prevconnectionAddedSucess = filter_input(INPUT_GET, 'added', FILTER_SANITIZE_NUMBER_INT);
    $prevconnectionSkipped = filter_input(INPUT_GET, 'skipped', FILTER_SANITIZE_NUMBER_INT);

    $userInDb = null;

    if ($username != '') {
        $userInDb = getUserByUsername($username);
    }

    $validconnection = false;
    $myskills = false;

    // Grab the linkedin id if it is already in the database
    if ($userInDb != null && $userInDb['linkedin_id'] != '') {
        $linkedinId = $userInDb['linkedin_id'];
    }

    if ($guestview) {
        $validconnection = true;
        $s->assign('guestview', true);
        $connections = getAllFriends($userInDb['linkedin_id'], 9, true);
    }
    else {
        $connections = getAllFriends($_SESSION['linkedinId']);

        // Check if it is the user itself or a valid connection
        if ($linkedinId == $_SESSION['linkedinId']) {
            $validconnection = true;
            $userInDb = getUser($_SESSION['linkedinId']);
            $myskills = true;
        }
        else {
            foreach ($connections as $connection) {
                if ($connection['linkedin_id'] == $linkedinId) {
                    $validconnection = true;
                    // Even if the user is in our database, retrieve the data directly from database
                    $userInDb = $connection;
                    break;
                }
            }
        }


        // Get next Random Connection
        $nextconnection = '';
        if (!empty($connections)) {
            shuffle($connections);
            $rand_keys = array_rand($connections, 1);
            $nextconnection = $connections[$rand_keys];
        }
    }

    // Alert that the Skills were correctly added to the previous connection
    if ($prevconnectionAddedSucess == 1) {
        // Get User firstname
        $prevusername = '';
        if ($prevlinkedinId != '') {
            $prevuser = getUser($prevlinkedinId);
            if ($prevuser != null) {
                $prevusername = $prevuser['firstname'];
            }
            $s->assign('sucess', $prevusername . ' Top 3 Skills saved');

            // IF you just added your own skills
            if ($prevuser['linkedin_id'] == $_SESSION['linkedinId']) {
                $s->assign('longsucess', true);
                $s->assign('sucess', 'Skills saved. Now write your Connections Skills.');
            }
        }
    }

    if ($prevconnectionSkipped == 1) {
        if ($prevlinkedinId != '') {
            logSkip($_SESSION['userId'], getUserId($prevlinkedinId));
        }
    }

    if ($userInDb != null && $validconnection) {
        $s->assign('error', '');
        $s->assign('success', '');
        $s->assign('user', $userInDb);
        $s->assign('myskills', $myskills);
        $s->assign('sentSkills', '');
        $s->assign('nextconnection', '');
        $s->assign('prevconnection', '');
        addMyConnectionsBox($connections);
        $skills = array();


        if ((!$guestview)) {
            $s->assign('nextconnection', $nextconnection);
            $s->assign('prevconnection', $prevlinkedinId);


            // Get connections top Skills, according to user opinion
            $sentSkills = getSkillsSent($_SESSION['userId']);
            if (empty($sentSkills)) {
                $sentSkills = '';
            }

            $s->assign('sentSkills', $sentSkills);

            // Check if current user already given skills

            if ($myskills) {
                $skills = array('skill1' => $userInDb['skill1'], 'skill2' => $userInDb['skill2'],
                                'skill3' => $userInDb['skill3']);
                ;
            }
            else {
                $skills = getSkills($_SESSION['userId'], $userInDb['id']);
            }

        }
        else {
            // If you are in index.php you don't need any redirects
            $_SESSION['redirect'] = '' . $username;
        }

        if ($skills != null) {
            $s->assign('skill1', $skills['skill1']);
            $s->assign('skill2', $skills['skill2']);
            $s->assign('skill3', $skills['skill3']);
        }
        else {
            $s->assign('skill1', '');
            $s->assign('skill2', '');
            $s->assign('skill3', '');
        }

        // assign hint skills
        assignHintSkills($userInDb['linkedin_id']);

        $s->assign('title',
                   'Top3Skills.com - ' . $userInDb['firstname'] . ' ' . $userInDb['lastname'] . ' Top 3 Skills');

        $s->display('header.tpl');
        $s->display('addskills.tpl');
    }
    else {
        $userInDb = getUser($linkedinId);

        $s->display('header.tpl');

        // user is valid but is not a connection
        if ($userInDb != null && !$validconnection) {
            addMyConnectionsBox(getAllFriends($_SESSION['linkedinId'], 9, true), true);
            assignHintSkills($userInDb['linkedin_id']);

            $s->assign('user', $userInDb);
            $s->display('addskillsNotConnection.tpl');
        }
        else {
            // invalid user, user not found
            $s->assign('error',
                       '<p>User does not exist or is not a valid connection. </p> <p>You can only write the Top 3 Skills of your connections.</p>');
            $s->display('error.tpl');
        }
    }
}


$s->display('footer.tpl');

?>