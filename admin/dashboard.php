<?php
    require '../connect.inc.php';
    require 'isLogin.php';
    ob_start();
?>
<!DOCTYPE html>
<html>
    <?php
        require 'head.php';
        $pageName = "Dashboard";
    ?>
    <body class="skin-blue">
        <?php require 'header.php'; ?>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <?php require 'sidebar.php'; ?>
            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">                
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1><?php echo $pageName; ?><small>Welcome to The<i><b><?php echo SITENAME; ?></b></i> Admin!</small></h1>
                </section>
                <!-- Main content -->
                <section class="content">
                    <p class="lead">This is the place where you can quickly access your site's all relative content.</p>
                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <?php
                            if(isset($_GET['opt']))
                            {
                                if($_GET['opt'] == 'edit')
                                {
                                    ?>
                                    <div class="col-xs-12">
                                        <div class="alert alert-success alert-dismissable">
                                            <i class="fa fa-check"></i>
                                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                            <b>Admin profile</b> has been <?php echo $_GET['opt']; ?> successfully.
                                        </div>
                                    </div>
                                    <?php
                                }
                                elseif ($_GET['opt'] == 'wrong')
                                {
                                    ?>
                                    <div class="col-xs-12">
                                        <div class="alert alert-danger alert-dismissable">
                                            <i class="fa fa-ban"></i>
                                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                            <strong>Oops!</strong> Something went wrong!<br />You are redirect this page because of wrong previous URL request.
                                        </div>
                                    </div>
                                    <?php
                                }
                            }
                        ?>
						
						<div class="col-md-4">
							<div class="box box-solid">
								<div class="box-header">
									<i class="fa fa-youtube-play"></i>
									<h3 class="box-title">3 Easy Step to Success!</h3>
								</div><!-- /.box-header -->
								<div class="box-body" style="line-height:25px;">
									<ul>
										<li><a href="#">Main Page <strong><i>(3 Easy Step to Success!)</i></strong></a></li>
										<li><a href="#">Step 1: Setting up your Auto-Responder</a></li>
										<li><a href="#">Step 2: Setting up your First Capture Page</a></li>
										<li><a href="#">Step 3: Getting Traffic NOW!</a></li>
									</ul>
								</div><!-- /.box-body -->
							</div><!-- /.box -->
						</div><!-- ./col -->
						<div class="col-md-4">
							<div class="box box-solid">
								<div class="box-header">
									<i class="fa fa-laptop"></i>
									<h3 class="box-title">System Resources</h3>
								</div><!-- /.box-header -->
								<div class="box-body" style="line-height:25px;">
									<ul>
										<li><a href="#">Main Page <strong><i>(System Resources)</i></strong></a></li>
										<li><a href="#">Join the community</a></li>
										<li><a href="#">eMail Marketing training</a></li>
										<li><a href="#">Marketing training</a></li>
									</ul>
								</div><!-- /.box-body -->
							</div><!-- /.box -->
						</div><!-- ./col -->
						<div class="col-md-4">
							<div class="box box-solid">
								<div class="box-header">
									<i class="fa fa-envelope"></i>
									<h3 class="box-title">Sales Funnel Center</h3>
								</div><!-- /.box-header -->
								<div class="box-body" style="line-height:25px;">
									<ul>
										<li><a href="#">Main Page <strong><i>(Sales Funnel Center)</i></strong></a></li>
										<li><a href="#">My Sales Funnel</a></li>
										<li><a href="#">eMail Marketing training</a></li>
										<li><a href="#">My Marketting Caimpaigns</a></li>
									</ul>
								</div><!-- /.box-body -->
							</div><!-- /.box -->
						</div><!-- ./col -->
						<div class="col-md-4">
							<div class="box box-solid">
								<div class="box-header">
									<i class="fa fa-bar-chart-o"></i>
									<h3 class="box-title">Marketing Training Center</h3>
								</div><!-- /.box-header -->
								<div class="box-body" style="line-height:25px;">
									<ul>
										<li><a href="#">Main Page <strong><i>(Marketing Training Center)</i></strong></a></li>
										<li><a href="#">Basic Marketing Methods</a></li>
										<li><a href="#">Intermediate Marketing Methods</a></li>
										<li><a href="#">Advance Marketing Methods</a></li>
										<li><a href="#">Live Webinars Tainings</a></li>
									</ul>
								</div><!-- /.box-body -->
							</div><!-- /.box -->
						</div><!-- ./col -->
						<div class="col-md-4">
							<div class="box box-solid">
								<div class="box-header">
									<i class="fa fa-users"></i>
									<h3 class="box-title">Manage Sponsors</h3>
								</div><!-- /.box-header -->
								<div class="box-body" style="line-height:25px;">
									<ul>
										<li><a href="#">List Sponsor</a></li>
										<li><a href="#">Add Sponsor</a></li>
									</ul>
								</div><!-- /.box-body -->
							</div><!-- /.box -->
						</div><!-- ./col -->
						
                    </div><!-- /.row -->
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->
        <!-- jQuery 2.0.2 -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="js/AdminLTE/app.js" type="text/javascript"></script>
    </body>
</html>