<?php
    session_start();
    require_once 'config/config.php';
    $con = mysql_connect(DB_HOST,DB_USER,DB_PASSWORD);
    if (!$con){
      die('Could not connect: ' . mysql_error());
    }
    $db_selected = mysql_select_db(DB_DATABASE);
    if (!$db_selected) {
        die ('Can\'t use database : ' . mysql_error());
    }
?>