<?php
require '../connect.inc.php';
$usertype = $username = $password = "" ;
if(isset($_POST['signinForm']) && trim($_POST['signinForm']) == "1")
{
    $username = mysql_real_escape_string(stripslashes(trim($_POST['username'])));
    $password = mysql_real_escape_string(stripslashes(trim($_POST['password'])));
    $resultMember = mysql_query(" SELECT `id`, `email`, `good_name` FROM `member` WHERE `username` = '".$username."' AND `password` = '".md5($password)."' AND `status` = 1 AND `type` = 'admin' ");
    if(mysql_num_rows($resultMember) > 0)//Signin Successful
    {
        session_regenerate_id();//Regenerate session ID to prevent session fixation attacks
        while ($rowMember = mysql_fetch_object($resultMember))
        {
            $_SESSION['adminMember'] = array ();
            $_SESSION['adminMember'] = array (
                "id" => $rowMember->id,
                "email" => strtolower($rowMember->email),
                "name" => ucwords(strtolower($rowMember->good_name)));
            header("location: dashboard.php");
            exit;
        }
    }
    else
    {
        header("location: index.php?opt=error");
        exit;
    }
}
?>