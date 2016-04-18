<!DOCTYPE html>
<!--[if IE 9 ]><html class="ie ie9" lang="en" class="no-js"> <![endif]-->
<!--[if !(IE)]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->

<head>
	<title>Sistema Institucional de Gestión Documental</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="description" content="Sistema Institucional de Gestión Documental">
	<meta name="author" content="The Develovers">

	<!-- CSS -->

	<!-- Fav and touch icons -->
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/kingadmin-favicon144x144.png">
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/kingadmin-favicon114x114.png">
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/kingadmin-favicon72x72.png">
	<link rel="apple-touch-icon-precomposed" sizes="57x57" href="assets/ico/kingadmin-favicon57x57.png">
	<link rel="shortcut icon" href="assets/ico/favicon.png">

	   <?php
        error_reporting(0);
        $baseUrl = Yii::app()->request->baseUrl; 
        $cs = Yii::app()->getClientScript();
        //Yii::app()->clientScript->registerCoreScript('jquery');
        $cs->registerCssFile($baseUrl.'/css/bootstrap.min.css');
        $cs->registerCssFile($baseUrl.'/css/font-awesome.min.css');
        $cs->registerCssFile($baseUrl.'/css/main.css');
        $cs->registerCssFile($baseUrl.'/css/main.css');
        $cs->registerCssFile($baseUrl.'/css/my-custom-styles.css');
        
       ?>
</head>

<body class="dashboard">
	<!-- WRAPPER -->
	<div class="wrapper">
		<!-- TOP BAR -->
		<div class="top-bar">
			<div class="container">
				<div class="row">
					<!-- logo -->
					<div class="col-md-2 logo">
						<a href="index.html"><img src="assets/img/kingadmin-logo-white.png" alt="KingAdmin - Admin Dashboard" /></a>
						<h1 class="sr-only">KingAdmin Admin Dashboard</h1>
					</div>
					<!-- end logo -->
					<div class="col-md-10">
						<div class="row">
							<div class="col-md-3">
								<!-- search box -->
								<div id="tour-searchbox" class="input-group searchbox">
									<input type="search" class="form-control" placeholder="enter keyword here...">
									<span class="input-group-btn">
										<button class="btn btn-default" type="button"><i class="fa fa-search"></i></button>
									</span>
								</div>
								<!-- end search box -->
							</div>
							<div class="col-md-9">
								<div class="top-bar-right">
									<!-- responsive menu bar icon -->
									<a href="#" class="hidden-md hidden-lg main-nav-toggle"><i class="fa fa-bars"></i></a>
									<!-- end responsive menu bar icon -->
									<button type="button" id="start-tour" class="btn btn-link"><i class="fa fa-refresh"></i> Start Tour</button>
									<button type="button" id="global-volume" class="btn btn-link btn-global-volume"><i class="fa"></i></button>
									<div class="notifications">
										<ul>
											<!-- notification: inbox -->
											<li class="notification-item inbox">
												<div class="btn-group">
													<a href="#" class="dropdown-toggle" data-toggle="dropdown">
														<i class="fa fa-envelope"></i><span class="count">2</span>
														<span class="circle"></span>
													</a>
													<ul class="dropdown-menu" role="menu">
														<li class="notification-header">
															<em>You have 2 unread messages</em>
														</li>
														<li class="inbox-item clearfix">
															<a href="#">
																<div class="media">
																	<div class="media-left">
																		<img class="media-object" src="assets/img/user1.png" alt="Antonio">
																	</div>
																	<div class="media-body">
																		<h5 class="media-heading name">Antonius</h5>
																		<p class="text">The problem just happened this morning. I can't see ...</p>
																		<span class="timestamp">4 minutes ago</span>
																	</div>
																</div>
															</a>
														</li>
														<li class="inbox-item unread clearfix">
															<a href="#">
																<div class="media">
																	<div class="media-left">
																		<img class="media-object" src="assets/img/user2.png" alt="Antonio">
																	</div>
																	<div class="media-body">
																		<h5 class="media-heading name">Michael</h5>
																		<p class="text">Hey dude, cool theme!</p>
																		<span class="timestamp">2 hours ago</span>
																	</div>
																</div>
															</a>
														</li>
														<li class="inbox-item unread clearfix">
															<a href="#">
																<div class="media">
																	<div class="media-left">
																		<img class="media-object" src="assets/img/user3.png" alt="Antonio">
																	</div>
																	<div class="media-body">
																		<h5 class="media-heading name">Stella</h5>
																		<p class="text">Ok now I can see the status for each item. Thanks! :D</p>
																		<span class="timestamp">Oct 6</span>
																	</div>
																</div>
															</a>
														</li>
														<li class="inbox-item clearfix">
															<a href="#">
																<div class="media">
																	<div class="media-left">
																		<img class="media-object" src="assets/img/user4.png" alt="Antonio">
																	</div>
																	<div class="media-body">
																		<h5 class="media-heading name">Jane Doe</h5>
																		<p class="text"><i class="fa fa-reply"></i> Please check the status of your ...</p>
																		<span class="timestamp">Oct 2</span>
																	</div>
																</div>
															</a>
														</li>
														<li class="inbox-item clearfix">
															<a href="#">
																<div class="media">
																	<div class="media-left">
																		<img class="media-object" src="assets/img/user5.png" alt="Antonio">
																	</div>
																	<div class="media-body">
																		<h5 class="media-heading name">John Simmons</h5>
																		<p class="text"><i class="fa fa-reply"></i> I've fixed the problem :)</p>
																		<span class="timestamp">Sep 12</span>
																	</div>
																</div>
															</a>
														</li>
														<li class="notification-footer">
															<a href="#">View All Messages</a>
														</li>
													</ul>
												</div>
											</li>
											<!-- end notification: inbox -->
											<!-- notification: general -->
											<li class="notification-item general">
												<div class="btn-group">
													<a href="#" class="dropdown-toggle" data-toggle="dropdown">
														<i class="fa fa-bell"></i><span class="count">8</span>
														<span class="circle"></span>
													</a>
													<ul class="dropdown-menu" role="menu">
														<li class="notification-header">
															<em>You have 8 notifications</em>
														</li>
														<li>
															<a href="#">
																<i class="fa fa-comment green-font"></i>
																<span class="text">New comment on the blog post</span>
																<span class="timestamp">1 minute ago</span>
															</a>
														</li>
														<li>
															<a href="#">
																<i class="fa fa-user green-font"></i>
																<span class="text">New registered user</span>
																<span class="timestamp">12 minutes ago</span>
															</a>
														</li>
														<li>
															<a href="#">
																<i class="fa fa-comment green-font"></i>
																<span class="text">New comment on the blog post</span>
																<span class="timestamp">18 minutes ago</span>
															</a>
														</li>
														<li>
															<a href="#">
																<i class="fa fa-shopping-cart red-font"></i>
																<span class="text">4 new sales order</span>
																<span class="timestamp">4 hours ago</span>
															</a>
														</li>
														<li>
															<a href="#">
																<i class="fa fa-edit yellow-font"></i>
																<span class="text">3 product reviews awaiting moderation</span>
																<span class="timestamp">1 day ago</span>
															</a>
														</li>
														<li>
															<a href="#">
																<i class="fa fa-comment green-font"></i>
																<span class="text">New comment on the blog post</span>
																<span class="timestamp">3 days ago</span>
															</a>
														</li>
														<li>
															<a href="#">
																<i class="fa fa-comment green-font"></i>
																<span class="text">New comment on the blog post</span>
																<span class="timestamp">Oct 15</span>
															</a>
														</li>
														<li>
															<a href="#">
																<i class="fa fa-warning red-font"></i>
																<span class="text red-font">Low disk space!</span>
																<span class="timestamp">Oct 11</span>
															</a>
														</li>
														<li class="notification-footer">
															<a href="#">View All Notifications</a>
														</li>
													</ul>
												</div>
											</li>
											<!-- end notification: general -->
										</ul>
									</div>
									<!-- logged user and the menu -->
									<div class="logged-user">
										<div class="btn-group">
											<a href="#" class="btn btn-link dropdown-toggle" data-toggle="dropdown">
												<img src="assets/img/user-avatar.png" alt="User Avatar" />
												<span class="name">Stacy Rose</span> <span class="caret"></span>
											</a>
											<ul class="dropdown-menu" role="menu">
												<li>
													<a href="#">
														<i class="fa fa-user"></i>
														<span class="text">Profile</span>
													</a>
												</li>
												<li>
													<a href="#">
														<i class="fa fa-cog"></i>
														<span class="text">Settings</span>
													</a>
												</li>
												<li>
													<a href="#">
														<i class="fa fa-power-off"></i>
														<span class="text">Logout</span>
													</a>
												</li>
											</ul>
										</div>
									</div>
									<!-- end logged user and the menu -->
								</div>
								<!-- /top-bar-right -->
							</div>
						</div>
						<!-- /row -->
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /top -->
		<!-- BOTTOM: LEFT NAV AND RIGHT MAIN CONTENT -->
		<div class="bottom">
			<div class="container">
				<div class="row">
					<!-- left sidebar -->
					<div class="col-md-2 left-sidebar">
						<!-- main-nav -->
						<nav class="main-nav">
							<ul class="main-menu">
								<li class="active">
									<a href="#" class="js-sub-menu-toggle">
										<i class="fa fa-dashboard fa-fw"></i><span class="text">Dashboard</span>
										<i class="toggle-icon fa fa-angle-down"></i>
									</a>
									<ul class="sub-menu open">
										<li class="active"><a href="index.html"><span class="text">Dashboard v1</span></a></li>
										<li><a href="index-dashboard-v2.html"><span class="text">Dashboard v2 <span class="badge element-bg-color-blue">New</span></span></a></li>
									</ul>
								</li>
								<li>
									<a href="#" class="js-sub-menu-toggle">
										<i class="fa fa-clipboard fa-fw"></i><span class="text">Pages</span>
										<i class="toggle-icon fa fa-angle-left"></i>
									</a>
									<ul class="sub-menu ">
										<li><a href="page-profile.html"><span class="text">Profile</span></a></li>
										<li><a href="page-invoice.html"><span class="text">Invoice</span></a></li>
										<li><a href="page-knowledgebase.html"><span class="text">Knowledge Base</span></a></li>
										<li><a href="page-inbox.html"><span class="text">Inbox</span></a></li>
										<li><a href="page-new-message.html"><span class="text">New Message</span></a></li>
										<li><a href="page-view-message.html"><span class="text">View Message</span></a></li>
										<li><a href="page-search-result.html"><span class="text">Search Result</span></a></li>
										<li><a href="page-submit-ticket.html"><span class="text">Submit Ticket</span></a></li>
										<li><a href="page-file-manager.html"><span class="text">File Manager <span class="badge element-bg-color-blue">New</span></span></a></li>
										<li><a href="page-projects.html"><span class="text">Projects <span class="badge element-bg-color-blue">New</span></span></a></li>
										<li><a href="page-project-detail.html"><span class="text">Project Detail <span class="badge element-bg-color-blue">New</span></span></a></li>
										<li><a href="page-faq.html"><span class="text">FAQ <span class="badge element-bg-color-blue">New</span></span></a></li>
										<li><a href="page-register.html"><span class="text">Register</span></a></li>
										<li><a href="page-login.html"><span class="text">Login</span></a></li>
										<li><a href="page-404.html"><span class="text">404</span></a></li>
										<li><a href="page-blank.html"><span class="text">Blank Page</span></a></li>
									</ul>
								</li>
								<li>
									<a href="#" class="js-sub-menu-toggle">
										<i class="fa fa-bar-chart-o fw"></i><span class="text">Charts &amp; Statistics</span>
										<i class="toggle-icon fa fa-angle-left"></i>
									</a>
									<ul class="sub-menu ">
										<li><a href="charts-statistics.html"><span class="text">Charts</span></a></li>
										<li><a href="charts-statistics-interactive.html"><span class="text">Interactive Charts</span></a></li>
										<li><a href="charts-statistics-real-time.html"><span class="text">Realtime Charts</span></a></li>
										<li><a href="charts-d3charts.html"><span class="text">D3 Charts</span></a></li>
									</ul>
								</li>
								<li>
									<a href="#" class="js-sub-menu-toggle">
										<i class="fa fa-edit fw"></i><span class="text">Forms</span>
										<i class="toggle-icon fa fa-angle-left"></i>
									</a>
									<ul class="sub-menu ">
										<li><a href="form-inplace-editing.html"><span class="text">In-place Editing</span></a></li>
										<li><a href="form-elements.html"><span class="text">Form Elements</span></a></li>
										<li><a href="form-layouts.html"><span class="text">Form Layouts</span></a></li>
										<li><a href="form-bootstrap-elements.html"><span class="text">Bootstrap Elements</span></a></li>
										<li><a href="form-validations.html"><span class="text">Validation</span></a></li>
										<li><a href="form-file-upload.html"><span class="text">File Upload</span></a></li>
										<li><a href="form-text-editor.html"><span class="text">Text Editor</span></a></li>
									</ul>
								</li>
								<li>
									<a href="#" class="js-sub-menu-toggle">
										<i class="fa fa-list-alt fw"></i><span class="text">UI Elements</span>
										<i class="toggle-icon fa fa-angle-left"></i>
									</a>
									<ul class="sub-menu ">
										<li><a href="ui-elements-general.html"><span class="text">General Elements</span></a></li>
										<li><a href="ui-elements-tabs.html"><span class="text">Tabs</span></a></li>
										<li><a href="ui-elements-buttons.html"><span class="text">Buttons</span></a></li>
										<li><a href="ui-elements-icons.html"><span class="text">Icons <span class="badge element-bg-color-blue">Updated</span></span></a></li>
										<li><a href="ui-elements-flash-message.html"><span class="text">Flash Message</span></a></li>
									</ul>
								</li>
								<li>
									<a href="widgets.html">
										<i class="fa fa-puzzle-piece fa-fw"></i><span class="text">Widgets <span class="badge element-bg-color-blue">Updated</span></span>
									</a>
								</li>
								<li>
									<a href="#" class="js-sub-menu-toggle">
										<i class="fa fa-gears fw"></i><span class="text">Components</span>
										<i class="toggle-icon fa fa-angle-left"></i>
									</a>
									<ul class="sub-menu ">
										<li><a href="components-wizard.html"><span class="text">Wizard (with validation)</span></a></li>
										<li><a href="components-calendar.html"><span class="text">Calendar</span></a></li>
										<li><a href="components-maps.html"><span class="text">Maps</span></a></li>
										<li><a href="components-gallery.html"><span class="text">Gallery</span></a></li>
										<li><a href="components-tree-view.html"><span class="text">Tree View <span class="badge element-bg-color-blue">New</span></span></a></li>
									</ul>
								</li>
								<li>
									<a href="#" class="js-sub-menu-toggle">
										<i class="fa fa-table fw"></i><span class="text">Tables</span>
										<i class="toggle-icon fa fa-angle-left"></i>
									</a>
									<ul class="sub-menu ">
										<li><a href="tables-static-table.html"><span class="text">Static Table</span></a></li>
										<li><a href="tables-dynamic-table.html"><span class="text">Dynamic Table</span></a></li>
									</ul>
								</li>
								<li><a href="typography.html"><i class="fa fa-font fa-fw"></i><span class="text">Typography</span></a></li>
								<li>
									<a href="#" class="js-sub-menu-toggle"><i class="fa fa-bars"></i>
										<span class="text">Menu Lvl 1 <span class="badge element-bg-color-blue">New</span></span>
										<i class="toggle-icon fa fa-angle-left"></i>
									</a>
									<ul class="sub-menu">
										<li class="">
											<a href="#" class="js-sub-menu-toggle">
												<span class="text">Menu Lvl 2</span>
												<i class="toggle-icon fa fa-angle-left"></i>
											</a>
											<ul class="sub-menu">
												<li><a href="#">Menu Lvl 3</a></li>
												<li><a href="#">Menu Lvl 3</a></li>
												<li><a href="#">Menu Lvl 3</a></li>
											</ul>
										</li>
										<li>
											<a href="#">
												<span class="text">Menu Lvl 2</span>
											</a>
										</li>
									</ul>
								</li>
							</ul>
						</nav>
						<!-- /main-nav -->
						<div class="sidebar-minified js-toggle-minified">
							<i class="fa fa-angle-left"></i>
						</div>
						<!-- sidebar content -->
						<div class="sidebar-content">
							<div class="panel panel-default">
								<div class="panel-heading">
									<h5><i class="fa fa-lightbulb-o"></i> Tips</h5>
								</div>
								<div class="panel-body">
									<p>You can do live search to the widget at search box located at top bar. It's very useful if your dashboard is full of widget.</p>
								</div>
							</div>
							<h5 class="label label-default"><i class="fa fa-info-circle"></i> Server Info</h5>
							<ul class="list-unstyled list-info-sidebar bottom-30px">
								<li class="data-row">
									<div class="data-name">Disk Space Usage</div>
									<div class="data-value">
										274.43 / 2 GB
										<div class="progress progress-xs">
											<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width: 10%">
												<span class="sr-only">10%</span>
											</div>
										</div>
									</div>
								</li>
								<li class="data-row">
									<div class="data-name">Monthly Bandwidth Transfer</div>
									<div class="data-value">
										230 / 500 GB
										<div class="progress progress-xs">
											<div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="46" aria-valuemin="0" aria-valuemax="100" style="width: 46%">
												<span class="sr-only">46%</span>
											</div>
										</div>
									</div>
								</li>
								<li class="data-row">
									<span class="data-name">Database Disk Space</span>
									<span class="data-value">219.45 MB</span>
								</li>
								<li class="data-row">
									<span class="data-name">Operating System</span>
									<span class="data-value">Linux</span>
								</li>
								<li class="data-row">
									<span class="data-name">Apache Version</span>
									<span class="data-value">2.4.6</span>
								</li>
								<li class="data-row">
									<span class="data-name">PHP Version</span>
									<span class="data-value">5.3.27</span>
								</li>
								<li class="data-row">
									<span class="data-name">MySQL Version</span>
									<span class="data-value">5.5.34-cll</span>
								</li>
								<li class="data-row">
									<span class="data-name">Architecture</span>
									<span class="data-value">x86_64</span>
								</li>
							</ul>
						</div>
						<!-- end sidebar content -->
					</div>
					<!-- end left sidebar -->
					<!-- top general alert -->
					<div class="alert alert-danger top-general-alert">
						<span>If you <strong>can't see the logo</strong> on the top left, please reset the style on right style switcher (for upgraded theme only).</span>
						<button type="button" class="close">&times;</button>
					</div>
					<!-- end top general alert -->
				
					 <?php echo $content; ?>
				</div>
				<!-- /row -->
			</div>
			
			<!-- /container -->
		</div>
		<!-- END BOTTOM: LEFT NAV AND RIGHT MAIN CONTENT -->
	</div>
	<!-- /wrapper -->

	<!-- FOOTER -->
	<footer class="footer">
		&copy; 2014-2015 The Develovers
	</footer>
	<!-- END FOOTER -->

	<!-- STYLE SWITCHER -->
	<div class="del-style-switcher">
		<div class="del-switcher-toggle toggle-hide"></div>
		<form>
			<section class="del-section del-section-skin">
				<h5 class="del-switcher-header">Choose Skins:</h5>
				<ul>
					<li><a href="#" title="Slate Gray" class="switch-skin slategray" data-skin="assets/css/skins/slategray.css">Slate Gray</a></li>
					<li><a href="#" title="Dark Blue" class="switch-skin darkblue" data-skin="assets/css/skins/darkblue.css">Dark Blue</a></li>
					<li><a href="#" title="Dark Brown" class="switch-skin darkbrown" data-skin="assets/css/skins/darkbrown.css">Dark Brown</a></li>
					<li><a href="#" title="Light Green" class="switch-skin lightgreen" data-skin="assets/css/skins/lightgreen.css">Light Green</a></li>
					<li><a href="#" title="Orange" class="switch-skin orange" data-skin="assets/css/skins/orange.css">Orange</a></li>
					<li><a href="#" title="Red" class="switch-skin red" data-skin="assets/css/skins/red.css">Red</a></li>
					<li><a href="#" title="Teal" class="switch-skin teal" data-skin="assets/css/skins/teal.css">Teal</a></li>
					<li><a href="#" title="Yellow" class="switch-skin yellow" data-skin="assets/css/skins/yellow.css">Yellow</a></li>
				</ul>
				<button type="button" class="switch-skin-full fulldark" data-skin="assets/css/skins/fulldark.css">Full Dark</button>
				<button type="button" class="switch-skin-full fullbright" data-skin="assets/css/skins/fullbright.css">Full Bright</button>
			</section>
			<label class="fancy-checkbox">
				<input type="checkbox" id="fixed-top-nav"><span>Fixed Top Navigation</span>
			</label>
			<p><a href="#" title="Reset Style" class="del-reset-style">Reset Style</a></p>
		</form>
	</div>
	<!-- END STYLE SWITCHER -->

	<!-- Javascript -->


            <?php

        //$cs->registerScriptFile($baseUrl.'/js/jquery-1.10.2.min.js');
        //$cs->registerScriptFile($baseUrl.'/js/jspdf/jquery-1.7.1.min.js');
        $cs->registerScriptFile($baseUrl.'/js/jquery/jquery-2.1.0.min.js');
        $cs->registerScriptFile($baseUrl.'/js/bootstrap/bootstrap.min.js');
        $cs->registerScriptFile($baseUrl.'/js/plugins/bootstrap-tour/bootstrap-tour.custom.js');
        $cs->registerScriptFile($baseUrl.'/js/bootstrap/bootstrap.min.js');
        $cs->registerScriptFile($baseUrl.'/js/plugins/modernizr/modernizr.js');
        $cs->registerScriptFile($baseUrl.'/js/plugins/bootstrap-tour/bootstrap-tour.custom.js');
        $cs->registerScriptFile($baseUrl.'/js/king-common.js');
        $cs->registerScriptFile($baseUrl.'/js/deliswitch.js');
        $cs->registerScriptFile($baseUrl.'/js/plugins/stat/jquery.easypiechart.min.js');
        $cs->registerScriptFile($baseUrl.'/js/plugins/raphael/raphael-2.1.0.min.js');
        $cs->registerScriptFile($baseUrl.'/js/plugins/stat/flot/jquery.flot.min.js');
        $cs->registerScriptFile($baseUrl.'/js/plugins/stat/flot/jquery.flot.resize.min.js');
        $cs->registerScriptFile($baseUrl.'/js/plugins/stat/flot/jquery.flot.time.min.js');
        $cs->registerScriptFile($baseUrl.'/js/plugins/stat/flot/jquery.flot.pie.min.js');
        $cs->registerScriptFile($baseUrl.'/js/plugins/stat/flot/jquery.flot.tooltip.min.js');
        $cs->registerScriptFile($baseUrl.'/js/plugins/jquery-sparkline/jquery.sparkline.min.js'); 
        $cs->registerScriptFile($baseUrl.'/js/plugins/jquery-sparkline/jquery.sparkline.min.js'); 
        $cs->registerScriptFile($baseUrl.'/js/plugins/datatable/jquery.dataTables.min.js'); 
        $cs->registerScriptFile($baseUrl.'/js/plugins/datatable/dataTables.bootstrap.js'); 
        $cs->registerScriptFile($baseUrl.'/js/plugins/jquery-mapael/jquery.mapael.js'); 
        $cs->registerScriptFile($baseUrl.'/js/plugins/raphael/maps/usa_states.js'); 
        $cs->registerScriptFile($baseUrl.'/js/king-chart-stat.js'); 
        $cs->registerScriptFile($baseUrl.'/js/king-table.js'); 
        $cs->registerScriptFile($baseUrl.'/js/king-components.js'); 


     /* 
         $cs->registerScriptFile($baseUrl.''); 
        $cs->registerScriptFile($baseUrl.'/js/highcharts.js');
        $cs->registerScriptFile($baseUrl.'/js/modules/exporting.js');
        $cs->registerScriptFile($baseUrl.'/js/jspdf/jspdf.js');
        $cs->registerScriptFile($baseUrl.'/js/jspdf/libs/Deflate/adler32cs.js');
        $cs->registerScriptFile($baseUrl.'/js/jspdf/libs/FileSaver.js/FileSaver.js');
        $cs->registerScriptFile($baseUrl.'/js/jspdf/libs/Blob.js/BlobBuilder.js');
        $cs->registerScriptFile($baseUrl.'/js/jspdf/jspdf.plugin.addimage.js');
        $cs->registerScriptFile($baseUrl.'/js/jspdf/jspdf.plugin.standard_fonts_metrics.js');
        $cs->registerScriptFile($baseUrl.'/js/jspdf/jspdf.plugin.split_text_to_size.js');
        $cs->registerScriptFile($baseUrl.'/js/jspdf/jspdf.plugin.from_html.js');
        $cs->registerScriptFile($baseUrl.'/js/jspdf/jspdf.plugin.cell.js');
        

    $cs->registerScriptFile($baseUrl.'/js/plugins/jquery.sparkline.js');
    $cs->registerScriptFile($baseUrl.'/js/plugins/jquery.flot.min.js');
    $cs->registerScriptFile($baseUrl.'/js/plugins/jquery.flot.pie.min.js');
    $cs->registerScriptFile($baseUrl.'/js/charts.js');
    $cs->registerScriptFile($baseUrl.'/js/plugins/jquery.knob.js');
    $cs->registerScriptFile($baseUrl.'/js/plugins/jquery.masonry.min.js');
    $cs->registerScriptFile($baseUrl.'/js/styleswitcher.js');
       $cs->registerScriptFile($baseUrl.'/js/jquery.dataTables.min.js');
       $cs->registerScriptFile($baseUrl.'/js/dataTables.bootstrap.js');
        $cs->registerScriptFile($baseUrl.'/js/entradas.js');
         $cs->registerScriptFile($baseUrl.'/js/jquery-confirm.js');
   
   */
  ?>
	
</body>

</html>