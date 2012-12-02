<?php
require_once('common.php');
checkPermissions(); // Login is called here!! 
Hooks::user_registered_endOK();

        header("Location: dashboard.php");
        exit();
        
?>