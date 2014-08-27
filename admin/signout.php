<?php 
session_start();
if(count($_SESSION['adminMember']) > 0)
{   unset($_SESSION['adminMember']);
}
header("Location: index.php?opt=logout");
?>