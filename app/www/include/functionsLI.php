<?php
// ------ major LI configs ---------------------------------------------------------------------------------------------
$liFilterFullUserData =
        "(id,first-name,last-name,picture-url,public-profile-url,headline,location,positions,skills:(id,skill,proficiency,years))";

//
function initLinkedin() {
    global $API_CONFIG;
    $OBJ_linkedin = new LinkedIn($API_CONFIG);
    $OBJ_linkedin->setTokenAccess($_SESSION['oauth']['linkedin']['access']);
    return $OBJ_linkedin;
}

function sendMessage($to_linkedin_id, $subject, $body) {
    global $production;

    if (!$production) {
        $to_linkedin_id = 'FV6FZF-lh3';
    }

    $OBJ_linkedin = initLinkedin();
    // send invite via LinkedIn ID
    $response = $OBJ_linkedin->message(array ($to_linkedin_id), $subject, $body, true);
    logLIMessage($_SESSION['userId'], $to_linkedin_id, $subject, $body);
}

function shareStart($name, $username) {
    $OBJ_linkedin = initLinkedin();
    // prepare content for sharing
    $content = array ();

    $content['title'] = "Top3Skills.com";
    $content['submitted-url'] = "http://Top3Skills.com/" . $username;
    $content['comment'] =
            "" . $name . " started using Top3Skills.com. Tell me what are my Top 3 Skills at http://Top3Skills.com/"
                    . $username . "";
    $private = FALSE;
    // share content
    $response = $OBJ_linkedin->share('new', $content, $private);
}

function getLinkedinUser($li = null) {
    global $liFilterFullUserData;
    if ($li == null) {
        $li = initLinkedin();
    }
    $response =
            $li->profile('~:' . $liFilterFullUserData);
    if ($response['success'] === TRUE) {
        $response['linkedin'] = new SimpleXMLElement($response['linkedin']);
        $user = $response['linkedin'];
        $user = parseLIUser($user);
        return $user;
    } else {
        echo"Error retrieving profile information:<br /><br />RESPONSE:<br /><br /><pre>" . print_r($response) .
                "</pre>";
        exit();
    }

}

function getLIFriends() {
    $li = initLinkedin();
    $response = $li->connections('~/connections:(id)?start=0');
    logXML($response['linkedin']);
    $connections = new SimpleXMLElement($response['linkedin']);

    $friends = array ();
    foreach ($connections->person as $person) {
        $friends[] = $person->id;
    }
    return $friends;
}

function getLIFriendsData($modifiedSince = -1) {
    global $liFilterFullUserData;
    $li = initLinkedin();

    if ($modifiedSince == -1) {
        $response =
                $li->connections('~/connections:' . $liFilterFullUserData . '?start=0');
    }
    else {
        $modifiedSince = $modifiedSince . "000";
        $response =
                $li->connections(
                    '~/connections:' . $liFilterFullUserData . '?modified-since=' . $modifiedSince . '');

    }
    logXML("modified since " . $modifiedSince);
    logXML($response['linkedin']);
    $connections = new SimpleXMLElement($response['linkedin']);

    $friends = array ();
    foreach ($connections->person as $person) {
        $person = parseLIUser($person);

        $friends[] = array ('linkedin_id' => $person->id, 'firstname' => $person->{'first-name'},
                            'lastname' => $person->{'last-name'}, 'pictureUrl' => $person->{'picture-url'},
                            'profile' => $person->{'public-profile-url'}, 'headline' => $person->headline,
                            'location' => $person->location->name, 'skills' => $person->skills,
                            'positions' => $person->positions);
    }
    return $friends;
}

?>