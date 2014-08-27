<?php
if(!isset($_SESSION)){
    session_start();
}
if((!isset($_SESSION['adminMember'])) OR count($_SESSION['adminMember']) == 0)
{
    header("location: index.php?opt=error");
    exit;
}
?>