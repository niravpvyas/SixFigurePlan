            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left info">
                            <p>&nbsp;</p>
                        </div>
                    </div>
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <li class="active">
                            <a href="dashboard.php">
                                <i class="fa fa-dashboard"></i> <span>Dashboard </span>
                            </a>
                        </li>
                        
                        <li class="treeview <?php if($currentFileName == '#') { echo 'active'; } ?>">
                            <a href="#">
                                <i class="fa fa-youtube-play"></i>
                                <span>3 Easy Step to success!</span>
                                <i class="fa <?php if($currentFileName == '#' OR $currentFileName == '#') { echo 'pull-right fa-angle-left'; } else { echo 'fa-angle-left pull-right'; } ?>"></i>
                            </a>
                            <ul class="treeview-menu" <?php if($currentFileName == '#' OR $currentFileName == '#') { echo 'style="display: block;"'; } ?>>
								<li><a href="#"><i class="fa fa-angle-double-right"></i> Main Page</a></li>
                                <li><a href="#"><i class="fa fa-angle-double-right"></i> Step 1</a></li>
								<li><a href="#"><i class="fa fa-angle-double-right"></i> Step 2</a></li>
								<li><a href="#"><i class="fa fa-angle-double-right"></i> Step 3</a></li>
                            </ul>
                        </li>
                        <li class="treeview <?php if($currentFileName == '#' OR $currentFileName == '#') { echo 'active'; } ?>">
                            <a href="#">
                                <i class="fa fa-laptop"></i>
                                <span>System Resources</span>
                                <i class="fa <?php if($currentFileName == '#' OR $currentFileName == '#') { echo 'pull-right fa-angle-left'; } else { echo 'fa-angle-left pull-right'; } ?>"></i>
                            </a>
                            <ul class="treeview-menu" <?php if($currentFileName == '#' OR $currentFileName == '#') { echo 'style="display: block;"'; } ?>>
                                <li><a href="#"><i class="fa fa-angle-double-right"></i> Join the community</a></li>
                                <li><a href="#"><i class="fa fa-angle-double-right"></i> eMail Marketing training</a></li>
								<li><a href="#"><i class="fa fa-angle-double-right"></i> Marketing training</a></li>
                            </ul>
                        </li>
						<li class="treeview <?php if($currentFileName == '#' OR $currentFileName == '#') { echo 'active'; } ?>">
                            <a href="#">
                                <i class="fa fa-envelope"></i>
                                <span>Sales Funnel Center</span>
                                <i class="fa <?php if($currentFileName == '#' OR $currentFileName == '#') { echo 'pull-right fa-angle-left'; } else { echo 'fa-angle-left pull-right'; } ?>"></i>
                            </a>
                            <ul class="treeview-menu" <?php if($currentFileName == '#' OR $currentFileName == '#') { echo 'style="display: block;"'; } ?>>
                                <li><a href="#"><i class="fa fa-angle-double-right"></i> My Sales Funnel</a></li>
                                <li><a href="#"><i class="fa fa-angle-double-right"></i> My Marketting Caimpaigns</a></li>
                            </ul>
                        </li>
						<li class="treeview <?php if($currentFileName == '#') { echo 'active'; } ?>">
                            <a href="#">
                                <i class="fa fa-bar-chart-o"></i>
                                <span>Marketing Training</span>
                                <i class="fa <?php if($currentFileName == '#' OR $currentFileName == '#') { echo 'pull-right fa-angle-left'; } else { echo 'fa-angle-left pull-right'; } ?>"></i>
                            </a>
                            <ul class="treeview-menu" <?php if($currentFileName == '#' OR $currentFileName == '#') { echo 'style="display: block;"'; } ?>>
								<li><a href="#"><i class="fa fa-angle-double-right"></i> Main Page</a></li>
                                <li><a href="#"><i class="fa fa-angle-double-right"></i> Basic Marketing Methods</a></li>
								<li><a href="#"><i class="fa fa-angle-double-right"></i> Intermediate Marketing Methods</a></li>
								<li><a href="#"><i class="fa fa-angle-double-right"></i> Advance Marketing Methods</a></li>
								<li><a href="#"><i class="fa fa-angle-double-right"></i> Live Webinars Tainings</a></li>
                            </ul>
                        </li>
						<li class="treeview <?php if($currentFileName == '#' OR $currentFileName == '#') { echo 'active'; } ?>">
                            <a href="#">
                                <i class="fa fa-users"></i>
                                <span>Manage Sponsors</span>
                                <i class="fa <?php if($currentFileName == '#' OR $currentFileName == '#') { echo 'pull-right fa-angle-left'; } else { echo 'fa-angle-left pull-right'; } ?>"></i>
                            </a>
                            <ul class="treeview-menu" <?php if($currentFileName == '#' OR $currentFileName == '#') { echo 'style="display: block;"'; } ?>>
                                <li><a href="#"><i class="fa fa-angle-double-right"></i> List Sponsors</a></li>
                                <li><a href="#"><i class="fa fa-angle-double-right"></i> Add Sponsor</a></li>
                            </ul>
                        </li>
						<li>
                            <a href="profile.php"><i class="fa fa-user"></i> <span>Edit Admin Profile</span></a>
                        </li>
                        <li>
                            <a href="signout.php"><i class="fa fa-sign-out"></i> <span>Sign Out</span></a>
                        </li>
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>