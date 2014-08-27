<?php
require '../connect.inc.php';
if(((isset($_SESSION['adminMember'])) AND count($_SESSION['adminMember']) > 0))
{
    header("Location: dashboard.php");
    exit();
}
?>
<!DOCTYPE html>
<html class="bg-black">
    <head>
        <meta charset="UTF-8">
        <title><?php echo SITENAME; ?> | Sign in</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="css/AdminLTE.css" rel="stylesheet" type="text/css" />
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
        <link href="css/style.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="../third_party/validation/livevalidation_standalone.compressed.js"></script>
    </head>
    <body class="bg-black">
        <div class="form-box" id="login-box">
            <h1><p align="center"><strong><i><?php echo SITENAME; ?></i></strong></p></h1>
            <div class="header">Sign In</div>
            <form method="POST" action="checkLogin.php">
                <div class="body bg-gray">
                    <?php
                    if(isset($_GET['opt']))
                    {
                        ?><div class="clearfix"><br /></div><?php
                        if(trim($_GET['opt']) == 'logout')
                        {
                            ?>
                                <div class="alert alert-success alert-dismissable">
                                    <i class="fa fa-check"></i>
                                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                    <strong>Well done!</strong> You are successfully signout with <strong><?php echo SITENAME; ?>'s</strong> admin control site.
                                </div>
                            <?php
                        }
                        else if(trim($_GET['opt']) == 'error')
                        {
                            ?>
                            <div class="alert alert-danger alert-dismissable">
                                <i class="fa fa-ban"></i>
                                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                <strong>Oops!</strong> Wrong Username or Password.<br />Please try submitting again.
                            </div>
                            <?php
                        }
                    }
                    ?>
                    <div class="form-group">
                        <input type="text" name="username" id="username" class="form-control" placeholder="Username"/>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" id="password" class="form-control" placeholder="Password"/>
                    </div>          
                </div>
                <div class="footer">
                    <input type="hidden" name="signinForm" value="1" />
                    <input type="submit" class="btn bg-olive btn-block" value="Sign in me" />
                </div>
            </form>
            <script type="text/javascript">
                var username = new LiveValidation( 'username', {onlyOnSubmit: true } );
                username.add( Validate.Presence );
                var password = new LiveValidation( 'password', {onlyOnSubmit: true } );
                password.add( Validate.Presence );
            </script>
        </div>
        <!-- jQuery 2.0.2 -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <script language="javascript" type="text/javascript">  
            $(document).ready(function(){ $("#username").focus(); });
        </script>
    </body>
</html>