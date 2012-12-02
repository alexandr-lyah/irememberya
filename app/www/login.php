<?php
require_once('common.php');


// user initiated LinkedIn connection, create the LinkedIn object
$API_CONFIG['callbackUrl'] =
        'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['PHP_SELF'] . '?' . LINKEDIN::_GET_TYPE . '=initiate&' .
                LINKEDIN::_GET_RESPONSE . '=1';
if (isset($_GET['nextu']) && !empty($_GET['nextu'])) {
    $API_CONFIG['callbackUrl'] .= '&nextu=' . $_GET['nextu'];
}

$OBJ_linkedin = new LinkedIn($API_CONFIG);

// check for response from LinkedIn
$_GET[LINKEDIN::_GET_RESPONSE] = (isset($_GET[LINKEDIN::_GET_RESPONSE])) ? $_GET[LINKEDIN::_GET_RESPONSE] : '';
if (!$_GET[LINKEDIN::_GET_RESPONSE]) {
    // LinkedIn hasn't sent us a response, the user is initiating the connection

    // send a request for a LinkedIn access token
    $response = $OBJ_linkedin->retrieveTokenRequest();
    if ($response['success'] === TRUE) {
        // split up the response and stick the LinkedIn portion in the user session
        $_SESSION['oauth']['linkedin']['request'] = $response['linkedin'];

        // redirect the user to the LinkedIn authentication/authorisation page to initiate validation.
        //echo $API_CONFIG['callbackUrl'];
        header('Location: ' . LINKEDIN::_URL_AUTH . $_SESSION['oauth']['linkedin']['request']['oauth_token']);
    } else {
        /*
        // bad token request
        echo"Request token retrieval failed:<br /><br />RESPONSE:<br /><br /><pre>" . print_r($response, TRUE) .
                "</pre><br /><br />LINKEDIN OBJ:<br /><br /><pre>" . print_r($OBJ_linkedin, TRUE) . "</pre>";

         */
        error_log("Request token retrieval failed:<br /><br />RESPONSE:<br /><br /><pre>" . print_r($response, TRUE) .
                "</pre><br /><br />LINKEDIN OBJ:<br /><br /><pre>" . print_r($OBJ_linkedin, TRUE) . "</pre>");
        header("Location: index.php");
    }
} else {
    // LinkedIn has sent a response, user has granted permission, take the temp access token, the user's secret and the verifier to request the user's real secret key
    $response = $OBJ_linkedin->retrieveTokenAccess(
        $_GET['oauth_token'], $_SESSION['oauth']['linkedin']['request']['oauth_token_secret'], $_GET['oauth_verifier']);
    if ($response['success'] === TRUE) {
        // the request went through without an error, gather user's 'access' tokens
        $_SESSION['oauth']['linkedin']['access'] = $response['linkedin'];

        // set the user as authorized for future quick reference
        $_SESSION['oauth']['linkedin']['authorized'] = TRUE;

        // get user id
        $response = $OBJ_linkedin->profile('~:(id)');
        if ($response['success'] === TRUE) {
            $response['linkedin'] = new SimpleXMLElement($response['linkedin']);
            $_SESSION['linkedinId'] = (string) $response['linkedin']->id;
        } else {
            // profile retrieval failed
            /*
                   echo "Error retrieving profile information:<br /><br />RESPONSE:<br /><br /><pre>" . print_r($response) .
                           "</pre>";

            */
            error_log(
                "Error retrieving profile information:<br /><br />RESPONSE:<br /><br /><pre>" . print_r($response) .
                        "</pre>");
            header("Location: index.php");
            exit();
        }

        Hooks::user_login_endOK($OBJ_linkedin);

        if (!empty($_SESSION['user']['email'])) {
            if (isset($_GET['nextu']) && !empty($_GET['nextu'])) {
                $nextu = filter_input(INPUT_GET, 'nextu', FILTER_SANITIZE_STRING);
                $nextu = base64_decode($nextu);
                $nextu = substr($nextu, strlen($salt));
                $a = preg_match('/[a-zA-Z0-9]+/', $nextu, $filepart);
                if ($a > 0) $filepart = $filepart[0] . '.php';

                if ($nextu != '' && whitelistFile($filepart)) {
                    header('Location: ' . urldecode($nextu));
                    exit();
                }
            }
            header('Location: dashboard.php');
            exit();
        }
        else {
            header('Location: register.php');
        }
    } else {
        // bad token access
        error_log("Access token retrieval failed:<br /><br />RESPONSE:<br /><br /><pre>" . print_r($response, TRUE) .
                "</pre><br /><br />LINKEDIN OBJ:<br /><br /><pre>" . print_r($OBJ_linkedin, TRUE) . "</pre>");
        header('Location: index.php');
        /*
        echo "Access token retrieval failed:<br /><br />RESPONSE:<br /><br /><pre>" . print_r($response, TRUE) .
                "</pre><br /><br />LINKEDIN OBJ:<br /><br /><pre>" . print_r($OBJ_linkedin, TRUE) . "</pre>";

         */
    }
}
?>