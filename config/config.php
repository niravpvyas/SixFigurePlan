<?php
    ob_start(); 
    ini_set('display_errors',1);
    ini_set('display_startup_errors',1);
    $actual_link = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
    $currentFileName = basename($actual_link);
    
    define('DB_SERVER', 'mysql');
    if ($_SERVER['HTTP_HOST'] == 'sixfigureplan.impexdirectory.com')
    {
        define('DB_HOST', 'localhost');
        define('DB_USER', 'wethe5_sixfigure');
        define('DB_PASSWORD', 'sixfigureplan');
        define('DB_DATABASE', 'wethe5_sixfigureplan');
    }
    else //local svipl lab.
    {
        define('DB_HOST', 'localhost');
        define('DB_USER', 'svs');
        define('DB_PASSWORD', 'svs');
        define('DB_DATABASE', 'man_sixfigureplan');
    }
    DEFINE("SITENAME", " SixFigurePlan");
    DEFINE ("REQUIRE_SIGN", " <spam class='LV_invalid'>*</spam>");
?>