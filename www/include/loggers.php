<?php

function logXML($xml) {
    $myFile = "xml_log.txt";
    $fh = fopen($myFile, 'a') or die("can't open file");
  /*
    $doc = new DOMDocument();
    $doc->preserveWhiteSpace = false;
    $doc->formatOutput = true;
    $doc->loadXML($xml);

    $a = $doc->saveXML();
   * 
   */
    fwrite($fh, "\n\n||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||\n" . date(DATE_RFC822));
    fwrite($fh, $xml);
    fclose($fh);
}

function logShare($userId, $type){
    insert('INSERT INTO logshares (`from`, type) VALUES (?,?)', array($userId, $type));
}

function logLIMessage($from, $to, $subject, $body){
    $toUser = getUser($to); // convert li_id to id
    insert('INSERT INTO logmessages (`from`, `to`, subject, text) VALUES (?,?,?,?)',
            array($from, $toUser['id'], $subject, $body));
}

function logAppError($msg){
    $myFile = "../app_error.log";
    $fh = fopen($myFile, 'a') or die("can't open file");
    fwrite($fh, date(DATE_RFC822)  . " || " . $msg);
    fclose($fh);
}

function logAction($actionType, $userId, $arg1 = null, $arg2 = null, $notes = null){
    insert('INSERT INTO logactions (user_id, `action`, arg1, arg2, notes) VALUES (?,?,?,?,?)',
            array($userId, $actionType, $arg1, $arg2, $notes));
}

function logSkip($userId, $userSkipped){
    logAction(Actions::SKIP_ADD_SKILLS_CONNECTION, $userId, $userSkipped);
}
?>