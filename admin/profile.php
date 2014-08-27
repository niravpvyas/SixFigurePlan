<?php
    require '../connect.inc.php';
    require 'isLogin.php';
    ob_start();
?>
<!DOCTYPE html>
<html>
    <?php
        require 'head.php';
        require 'commonFunction.php';
        $username = $email = $good_name = $status = $created_at = $updated_at = $errorBlock = "";
        $pageName = "Edit <strong>Admin Profile</strong>";
        $id = $_SESSION['adminMember']['id'];
        if(isset($id) AND $id > 0)// Fetch data in edit time
        {
            $resultMember = mysql_query(" SELECT `id`, `username`, `email`,`good_name`,`created_at`,`updated_at` FROM `member` WHERE `type` = 'admin' AND `id` = ".$id);
            if(mysql_num_rows($resultMember) > 0)
            {
                while ($showMember = mysql_fetch_object($resultMember))
                {
                    $id = $showMember->id;
                    $username = stripslashes($showMember->username);
                    $email = stripslashes($showMember->email);
                    $good_name = stripslashes($showMember->good_name);
                    $created_at = stripslashes($showMember->created_at);
                    $updated_at = stripslashes($showMember->updated_at);
                }
                mysql_free_result($resultMember);
            }
            else
            {
                header('Location: dashboard.php?opt=wrong');// redirect because id not found in database
                exit;
            }
        }
        if(isset($_POST['memberForm']) && trim($_POST['memberForm']) == "1")
        {
            $id = mysql_real_escape_string(trim($_POST['id']));
            $username = mysql_real_escape_string(addslashes(trim($_POST['username'])));
            $email = mysql_real_escape_string(addslashes(trim($_POST['email'])));
            $password = mysql_real_escape_string(addslashes(trim($_POST['password'])));
            $good_name = mysql_real_escape_string(addslashes(trim($_POST['good_name'])));
            
            /* Validation Part - start */
            if($username == "") { $errorBlock .= "<li>Username can't be empty!</li>"; }
            if($email == "") { $errorBlock .= "<li>Email can't be empty!</li>"; }
            $memberExists = checkExists('id','email',$email,$id,'member');
            if($memberExists > 0) { $errorBlock .= "<li>Email is already exists.</li>"; }
            if($password == "") { $errorBlock .= "<li>Password can't be empty!</li>"; }
            if($good_name == "") { $errorBlock .= "<li>Name can't be empty!</li>"; }
            /* Validation Part - end */
            
            if(($errorBlock == "") && ($id > 0))
            {
                mysql_query(" UPDATE `member` SET `username` = '".$username."', `email` = '".$email."', `password` = '".md5($password)."', good_name='".$good_name."', updated_at='".date('Y-m-d H:i:s')."' WHERE `type` = 'admin' AND `id` = ".$id);
                header('Location: dashboard.php?opt=edit');
                exit;
            }
        }
    ?>
    <body class="skin-blue">
        <?php require 'header.php'; ?>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <?php require 'sidebar.php'; ?>
            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <?php require 'breadcrumb.php'; ?>
                <!-- Main content -->
                <section class="content">
                    Please make sure that this profile changes will affect with new sign in process.
                    <hr />
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="box box-primary">
                                <?php
                                    if($errorBlock != "")
                                    {
                                        ?>
                                        <div class="callout callout-danger">
                                            <h4>There was a problem submitting this form:</h4>
                                            <ul><?php echo $errorBlock; ?></ul>
                                        </div>
                                        <?php
                                    }
                                ?>
                                <!-- form start -->
                                <form method="POST" action="profile.php">
                                    <div class="box-body">
                                        <p align="right"><i><?php echo REQUIRE_SIGN; ?> Sign are required field(s)</i></p>
                                        <div class="form-group">
                                            <label>Username</label><?php echo REQUIRE_SIGN; ?> <i>(Underscore sign, Alphabet and Numeric characters Only)</i>
                                            <input type="text" name="username" id="username" value="<?php echo $username; ?>" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Email</label><?php echo REQUIRE_SIGN; ?>
                                            <input type="text" name="email" id="email" value="<?php echo $email; ?>" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label><?php echo REQUIRE_SIGN; ?> <i>(7 - 20 characters long)</i>
                                            <input type="password" name="password" id="password" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Confirm Password</label><?php echo REQUIRE_SIGN; ?>
                                            <input type="password" name="confirm_password" id="confirm_password" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Name</label><?php echo REQUIRE_SIGN; ?>
                                            <input type="text" name="good_name" id="good_name" value="<?php echo $good_name; ?>" class="form-control">
                                        </div>
                                        <?php                                        
                                            if($id)
                                            {
                                                ?>
                                                <label>Create at</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
                                                    <input type="text" value="<?php echo $created_at; ?>" disabled="" class="form-control">
                                                </div>
                                                <?php
                                                if($updated_at > 0)
                                                {
                                                    ?>
                                                        <br />
                                                        <label>Updated at</label>
                                                        <div class="input-group">
                                                            <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
                                                            <input type="text" value="<?php echo $updated_at; ?>" disabled="" class="form-control">
                                                        </div>
                                                    <?php
                                                }
                                            }
                                        ?>
                                    </div><!-- /.box-body -->
                                    <div class="box-footer">
                                        <input type="hidden" name="memberForm" value="1" />
                                        <input type="hidden" name="id" value="<?php echo $id; ?>" />
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <a href="dashboard.php"><button class="btn btn-default" type="button">Cancel</button></a>
                                    </div>
                                </form>
                                <script type="text/javascript">
                                    var username = new LiveValidation( 'username', {onlyOnSubmit: true } );
                                    username.add( Validate.Presence );
                                    var email = new LiveValidation( 'email', {onlyOnSubmit: true } );
                                    email.add( Validate.Email ).add( Validate.Presence );
                                    var password = new LiveValidation( 'password', {onlyOnSubmit: true } );
                                    password.add( Validate.Presence ).add( Validate.Length, { minimum: 7, maximum: 20 } );
                                    var confirm_password = new LiveValidation('confirm_password');
                                    confirm_password.add( Validate.Confirmation, { match: 'password' } );
                                    var good_name = new LiveValidation( 'good_name', {onlyOnSubmit: true } );
                                    good_name.add( Validate.Presence );
                                </script>
                            </div><!-- /.box -->
                            <!-- Form Element sizes -->
                            <!-- Input addon -->
                            <!-- /.box -->
                        </div><!--/.col (left) -->
                        <!-- right column -->
                    </div>   <!-- /.row -->
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->
        <!-- jQuery 2.0.2 -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="js/AdminLTE/app.js" type="text/javascript"></script>
        <script type="text/javascript" lang="javascript">
            jQuery('#username').keyup(function () { 
                this.value = this.value.replace(/[^A-Za-z0-9_\.]/g,'');
            });
        </script>
    </body>
</html>