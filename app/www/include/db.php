<?php

$lastDb = null;

function initDb() {
    global $dbHost, $dbPass, $dbUser, $dbName, $dbType;


    try {
        $dbh = new PDO("$dbType:host=$dbHost;dbname=$dbName", $dbUser, $dbPass, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        return $dbh;
    }
    catch (PDOException $e)
    {
        echo $e->getMessage();
    }
}

function query($type, $sql, $params = array()) {
    global $lastDb;

    try {
        $db = initDb();
        $lastDb = $db;
        //echo $sql;
        //print_r($params);
        // echo "<hr>";
        
        if ($type === "SELECT") {
            if (count($params) > 0) {
                $stm = $db->prepare($sql);
                $stm->execute($params);
                return $stm->fetchAll();
            } else {
                $stm = $db->query($sql);
                return $stm->fetchAll();
            }
        } else if ($type === "SET"){
            $stm = $db->exec($sql);
            return;
        } else {
            if (count($params) > 0) {
                $stm = $db->prepare($sql);
                $stm->execute($params);
                return $stm->rowCount();
            }
            else {
                return $db->exec($sql);
            }
        }
    }
    catch (PDOException $e) {
        exit();
    }

    return null;
}

function select($sql, $params = array()) {
    return query("SELECT", $sql, $params);
}

function insert($sql, $params = array()) {
    return query("INSERT", $sql, $params);
}

function update($sql, $params = array()) {
    return query("INSERT", $sql, $params);
}

function delete($sql, $params = array()){
    return query("INSERT", $sql, $params);
}

function lastInsertedId(){
    global $lastDb;
    if ($lastDb != null){
       return $lastDb->lastInsertId();
    }
    return null;
}

?>