<!DOCTYPE html>
<!--[if IE 9 ]><html class="ie ie9" lang="en" class="no-js"> <![endif]-->
<!--[if !(IE)]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->

<head>
	<title>Sistema Integral Gestión </title>
	<meta charset="utf-8" >
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
		Yii::app()->clientScript->registerCoreScript('jquery');
        $cs->registerCssFile($baseUrl.'/css/bootstrap.min.css');
        $cs->registerCssFile($baseUrl.'/css/font-awesome.min.css');
        $cs->registerCssFile($baseUrl.'/css/main.css');
        $cs->registerCssFile($baseUrl.'/css/main.css');
        $cs->registerCssFile($baseUrl.'/css/my-custom-styles.css');
        $cs->registerCssFile($baseUrl.'/css/jquery-confirm.css');
        $cs->registerCssFile($baseUrl.'/css/themes/alertify.core.css');
        $cs->registerCssFile($baseUrl.'/css/themes/alertify.default.css');
        
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
					<div class="col-md-2 ">
						<img src="<?php echo Yii::app()->request->baseUrl;?>/images/iems.png" alt="IEMS - SIGEDO" />
						<h1 class="sr-only">IEMS</h1>
					</div>
					<!-- end logo -->
					<div class="col-md-10">
						<div class="row">
							<div class="col-md-7">
								<!-- search box -->
								<div class="logged-user">
								<H4 style="color:white;">SISTEMA IINTEGRAL DE GESTION</h4>
								</div>
								<!-- end search box -->
							</div>
							<div class="col-md-5">
								<div class="top-bar-right">
									<!-- responsive menu bar icon -->
									<a href="#" class="hidden-md hidden-lg main-nav-toggle"><i class="fa fa-bars"></i></a>
									<!-- end responsive menu bar icon -->
								<div class="notifications">
										<ul>
											<!-- notification: inbox -->
											<li class="notification-item inbox">
												<!--<div class="btn-group">
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
												</div>-->
											</li>
											<!-- end notification: inbox -->
											<!-- notification: general -->
											<!--<li class="notification-item general">
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
											<!-- end notification: general 
										</ul>-->
									</div>
									<!-- logged user and the menu -->
									<div class="logged-user">
										<div class="btn-group">
											<a href="#" class="btn btn-link dropdown-toggle" data-toggle="dropdown">
												
												<span class="name"><?php

											  if (!Yii::app()->user->isGuest) {
												 echo Yii::app()->user->nombre;
												 $id_area = Yii::app()->user->id_area;


												  $sql = "SELECT 
				  count(documentos.id) as salidas
				FROM 
				  public.documentos, 
				  public.directorio
				WHERE 
				  documentos.remitente = directorio.id AND
				  directorio.status=1 AND
				  directorio.id_area =$id_area"; 
	    $salidas = Yii::app()->db->createCommand($sql)->queryRow();
	    $salidas = $salidas['salidas'];

	     $sqlin ="SELECT 
					  count(correspondencia.id) as entradas
					FROM 
					  public.correspondencia, 
					  public.directorio
					WHERE 
					  correspondencia.destinatario = directorio.id AND
					  directorio.status=1 AND
					  directorio.id_area = $id_area AND 
					  correspondencia.estado_acuse = 1";

  		$entradas = Yii::app()->db->createCommand($sqlin)->queryRow();
	    $entradas = $entradas['entradas'];

	    $sqlsin ="SELECT 
					  count(correspondencia.id) as sinconfirmar
					FROM 
					  public.correspondencia, 
					  public.directorio
					WHERE 
					  correspondencia.destinatario = directorio.id AND
					  directorio.status=1 AND
					  directorio.id_area = $id_area AND 
					  correspondencia.estado_acuse = 0";

  		$sinconfirmar = Yii::app()->db->createCommand($sqlsin)->queryRow();
	    $sinconfirmar = $sinconfirmar['sinconfirmar'];

	     $sqlturn ="SELECT 
					  count(turnos.id) as turnos
					FROM 
					  public.turnos, 
					  public.directorio
					WHERE 
					  turnos.remitente = directorio.id AND
					  directorio.status=1 AND
					  directorio.id_area = $id_area";

  		$turnos = Yii::app()->db->createCommand($sqlturn)->queryRow();
	    $turnos = $turnos['turnos'];


												 }else {
  $this->redirect(Yii::app()->homeUrl);
}
?></span> <span class="caret"></span>
											</a>
											<ul class="dropdown-menu" role="menu">
												<!--<li>
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
												</li>-->
												<li>
													<a href="<?php echo CController::createUrl('site/logout'); ?>">
														<i class="fa fa-power-off"></i>
														<span class="text">Salir</span>
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


					    	<?php 
 if (!Yii::app()->user->isGuest) {
$perfil = Yii::app()->user->perfil;
$id_area = Yii::app()->user->id_area;

if($perfil==4){
?>
						<!-- main-nav -->
						<nav class="main-nav">
							<ul class="main-menu">
								<li class="active">
									<a href="#" class="js-sub-menu-toggle">
										<i class="fa fa-dashboard fa-fw"></i><span class="text">INICIO (<?=$id_area?>)</span>
										<i class="toggle-icon fa fa-angle-down"></i>
									</a>
									<ul class="sub-menu open">
										<li class="active"><a href="<?php echo CController::createUrl('main/index'); ?>"><span class="text">Estadisticas</span></a></li>
									
									</ul>
								</li>
								<li>
									<a href="#" class="js-sub-menu-toggle">
										<i class="fa fa-clipboard fa-fw"></i><span class="text">CORRESPONDENCIA</span>
										<i class="toggle-icon fa fa-angle-left"></i>
									</a>
									<ul class="sub-menu ">
										<li><a href="<?php echo CController::createUrl('documentos/create'); ?>"><span class="text">Agregar </span></a></li>
										<li><a href="<?php echo CController::createUrl('documentos/circular'); ?>"><span class="text">Agregar Circular </span></a></li>
										
										
									</ul>
								</li>
								<li>
									<a href="#" class="js-sub-menu-toggle">
										<i class="fa fa-bar-chart-o fw"></i><span class="text">BANDEJA</span>
										<i class="toggle-icon fa fa-angle-left"></i>
									</a>
									<ul class="sub-menu ">
										<li><a href="<?php echo CController::createUrl('correspondencia/confirmar'); ?>"><span class="text">Bandeja por confirmar</span></a></li>
										<li><a href="<?php echo CController::createUrl('entradaView/admin'); ?>"><span class="text">Bandeja de Entrada</span></a></li>
										<li><a href="<?php echo CController::createUrl('salidaView/admin'); ?>"><span class="text">Bandeja de Salida</span></a></li>
										<li><a href="<?php echo CController::createUrl('turnosList/admin'); ?>"><span class="text">Bandeja de Turnos</span></a></li>
									</ul>
								</li>
								<li>
									<a href="#" class="js-sub-menu-toggle">
										<i class="fa fa-edit fw"></i><span class="text">INFORMES</span>
										<i class="toggle-icon fa fa-angle-left"></i>
									</a>
									<ul class="sub-menu ">
										<li><a href="<?php echo CController::createUrl('informes/index'); ?>"><span class="text">Informe Correspondencia por criterios</span></a></li>
										<!--<li><a href="<?php echo CController::createUrl('informes/area'); ?>"><span class="text">Informe correspondencia de Entrada</span></a></li>
										
										<!--<li><a href="<?php echo CController::createUrl('informes/turnos'); ?>"><span class="text">Informe correspondencia de Turnos</span></a></li>-->
										
									</ul>
								</li>
								
								<li>
									<a href="#" class="js-sub-menu-toggle">
										<i class="fa fa-list-alt fw"></i><span class="text">ADMINISTRACION</span>
										<i class="toggle-icon fa fa-angle-left"></i>
									</a>
									<ul class="sub-menu ">
										<li><a href="<?php echo CController::createUrl('adminFinal/admin'); ?>"><span class="text">Seguimiento Documento</span></a></li>
										<li><a href="<?php echo CController::createUrl('directorioView/admin'); ?>"><span class="text">Directorio</span></a></li>
										<li><a href="<?php echo CController::createUrl('areas/admin'); ?>"><span class="text">Areas</span></a></li>
										<li><a href="<?php echo CController::createUrl('usuarios/admin'); ?>"><span class="text">Usuarios</span></a></li>
										<li><a href="<?php echo CController::createUrl('datosPersonales/admin'); ?>"><span class="text">Datos Personales</span></a></li>
									</ul>
								</li>
								
								
								
								
							</ul>
						</nav>

						<?php
					}

					if($perfil==1){
?>
								<!-- main-nav -->
						<nav class="main-nav">
							<ul class="main-menu">
								<li class="active">
									<a href="#" class="js-sub-menu-toggle">
										<i class="fa fa-dashboard fa-fw"></i><span class="text">INICIO (<?=$id_area?>)></span>
										<i class="toggle-icon fa fa-angle-down"></i>
									</a>
									<ul class="sub-menu open">
										<li class="active"><a href="<?php echo CController::createUrl('main/index'); ?>"><span class="text">Estadisticas</span></a></li>
									
									</ul>
								</li>
								<li>
									<a href="#" class="js-sub-menu-toggle">
										<i class="fa fa-clipboard fa-fw"></i><span class="text">CORRESPONDENCIA</span>
										<i class="toggle-icon fa fa-angle-left"></i>
									</a>
									<ul class="sub-menu ">
										<li><a href="<?php echo CController::createUrl('documentos/create'); ?>"><span class="text">Agregar</span></a></li>
										
									</ul>
								</li>
								<li>
									<a href="#" class="js-sub-menu-toggle">
										<i class="fa fa-bar-chart-o fw"></i><span class="text">BANDEJA</span>
										<i class="toggle-icon fa fa-angle-left"></i>
									</a>
									<ul class="sub-menu ">
										<li><a href="<?php echo CController::createUrl('correspondencia/confirmar'); ?>"><span class="text">Bandeja por confirmar</span></a></li>
										<li><a href="<?php echo CController::createUrl('entradaView/admin'); ?>"><span class="text">Bandeja de Entrada</span></a></li>
										<li><a href="<?php echo CController::createUrl('salidaView/admin'); ?>"><span class="text">Bandeja de Salida</span></a></li>

		<li><a href="<?php echo CController::createUrl('turnosList/admin'); ?>"><span class="text">Bandeja de Turnos</span></a></li>
									

									<?php
									if($id_area==32 || $id_area==33 || $id_area==34 || $id_area==35  || $id_area==37 || $id_area==38 || $id_area==39 || $id_area==40 || $id_area==41 || $id_area==42  || $id_area==43 || $id_area==44 || $id_area==45 || $id_area==46  || $id_area==47  || $id_area==48 || $id_area==437  ||  $id_area==453){

										?>
										
								
									<?php
								} else {

									?>

									<?php
								}

								?>






									</ul>
								</li>

									<li>
									<a href="#" class="js-sub-menu-toggle">
										<i class="fa fa-edit fw"></i><span class="text">INFORMES</span>
										<i class="toggle-icon fa fa-angle-left"></i>
									</a>
									<ul class="sub-menu ">
										<li><a href="<?php echo CController::createUrl('informes/index'); ?>"><span class="text">Informe Correspondencia por criterios</span></a></li>
										<!--<li><a href="<?php echo CController::createUrl('informes/area'); ?>"><span class="text">Informe correspondencia de Entrada</span></a></li>
										
										<!--<li><a href="<?php echo CController::createUrl('informes/turnos'); ?>"><span class="text">Informe correspondencia de Turnos</span></a></li>-->
										
									</ul>
								</li>
								<!--<li>
									<a href="#" class="js-sub-menu-toggle">
										<i class="fa fa-edit fw"></i><span class="text">INFORMES</span>
										<i class="toggle-icon fa fa-angle-left"></i>
									</a>
									<ul class="sub-menu ">
										<li><a href="form-inplace-editing.html"><span class="text">Informe por Area</span></a></li>
										<li><a href="form-elements.html"><span class="text">Informe por Cargo</span></a></li>
										
									</ul>
								</li>

								-->
								
								
								
								
								
							</ul>
						</nav>
<?php
}
						}else {
  $this->redirect(Yii::app()->homeUrl);
}

                ?>
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

									<p><span class="tips">Nota: Al generar correspondencia utiliza tanto mayúsculas como minúsculas</span></p>
								</div>
							</div>
							<h5 class="label label-default"><i class="fa fa-info-circle"></i>Estadisticas</h5>
							<ul class="list-unstyled list-info-sidebar bottom-30px">
								<li class="data-row">
									<div class="data-name">Por Confirmar</div>
									<div class="data-value">
										<?=$sinconfirmar?>
										<div class="progress progress-xs">
											<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width: 10%">
												<span class="sr-only">10%</span>
											</div>
										</div>
									</div>
								</li>
								<li class="data-row">
									<div class="data-name">Entrada</div>
									<div class="data-value">
										<?=$entradas?>
										<div class="progress progress-xs">
											<div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="46" aria-valuemin="0" aria-valuemax="100" style="width: 46%">
												<span class="sr-only">46%</span>
											</div>
										</div>
									</div>
								</li>
								<li class="data-row">
									<div class="data-name">Salidas</div>
									<div class="data-value">
										<?=$salidas?>
										<div class="progress progress-xs">
											<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width: 10%">
												<span class="sr-only">10%</span>
											</div>
										</div>
									</div>
								</li>


									<?php
									if($id_area==32 || $id_area==33 || $id_area==34 || $id_area==35 || $id_area==36 || $id_area==37 || $id_area==38 || $id_area==39 || $id_area==40 || $id_area==41 || $id_area==42  || $id_area==43 || $id_area==44 || $id_area==45 || $id_area==46  || $id_area==47  || $id_area==48 || $id_area==437  ||  $id_area==453){

										?>
										
								
									<?php
								} else {

									?>
								<li class="data-row">
									<div class="data-name">Turnos</div>
									<div class="data-value">
										<?=$turnos?>
										<div class="progress progress-xs">
											<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width: 10%">
												<span class="sr-only">30%</span>
											</div>
										</div>
									</div>
								</li>

								<?php
							}

							?>
								
								
							</ul>
						</div>
						<div class="sidebar-content">
							
							<h5 class="label label-default"><i class="fa fa-info-circle"></i> Documentos</h5>
							<div align="center">
							<ul class="list-unstyled list-info-sidebar bottom-30px">
								<li class="data-row">Manual de Usuario <a href="<?php echo Yii::app()->request->baseUrl;?>/docto/Manual_UsuarioSig_2016.pdf" target='_blank'><div id="btnExport"><?php echo CHtml::image(Yii::app()->request->baseUrl . '/images/pdf.png')?></div></a></li>
							</ul>
							</div>

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
		&copy; 2014-2015 IEMS
	</footer>
	<!-- END FOOTER -->



	<!-- Javascript -->


            <?php

        //$cs->registerScriptFile($baseUrl.'/js/jquery-1.10.2.min.js');
        //$cs->registerScriptFile($baseUrl.'/js/jspdf/jquery-1.7.1.min.js');
       // $cs->registerScriptFile($baseUrl.'/js/jquery/jquery-2.1.0.min.js');
        $cs->registerScriptFile($baseUrl.'/js/bootstrap/bootstrap.min.js');
        $cs->registerScriptFile($baseUrl.'/js/plugins/bootstrap-tour/bootstrap-tour.custom.js');
        $cs->registerScriptFile($baseUrl.'/js/bootstrap/bootstrap.min.js');
        $cs->registerScriptFile($baseUrl.'/js/plugins/modernizr/modernizr.js');
        $cs->registerScriptFile($baseUrl.'/js/plugins/bootstrap-tour/bootstrap-tour.custom.js');
        $cs->registerScriptFile($baseUrl.'/js/menus.js');
       //$cs->registerScriptFile($baseUrl.'/js/king-common.js');
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
       // $cs->registerScriptFile($baseUrl.'/js/king-table.js'); 
        $cs->registerScriptFile($baseUrl.'/js/king-components.js');
        $cs->registerScriptFile($baseUrl.'/js/jquery-confirm.js');
         $cs->registerScriptFile($baseUrl.'/css/lib/alertify.js');



 


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