#!/usr/bin/env php
<?php

if(file_exists("/home/dotcloud/environment.json")) {
    /* configuration on dotCloud */
    require('env.php');
    
    $dsn = "mysql:host=$host;port=$port";
}
else {
    /* your local configuration */
    $dsn = 'mysql:dbname=irememberya;host=127.0.0.1;';
    $user = 'root';
    $password = 'root';
    $dbname = 'irememberya';
    $host = "localhost";
}

$dbType = 'mysql';   // what driver to use to connect
$dbName = $dbname;
$dbUser = $user;
$dbPass = $password;
$dbHost = $host;

?>