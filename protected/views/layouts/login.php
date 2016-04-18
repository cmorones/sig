<!DOCTYPE html>
<!--[if IE 9 ]><html class="ie ie9" lang="en" class="no-js"> <![endif]-->
<!--[if !(IE)]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->

<head>
	<title>Acceso | Sistema Integral de Gestión</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="description" content="KingAdmin Dashboard">
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
        $cs->registerCssFile($baseUrl.'/css/main2.css');
        $cs->registerCssFile($baseUrl.'/css/style-switcher.css');
        $cs->registerCssFile($baseUrl.'/css/my-custom-styles.css');
        
       ?>
</head>

<body>


<div class="wrapper full-page-wrapper page-auth page-login text-center">


        <div class="inner-page">
            
          
      
            <div class="login-box center-block">

             
<div class="row">
<div class="col-md-12" >

    <div align="center">
        <img src="<?php echo Yii::app()->request->baseUrl;?>/images/FIDEGAR1.png" class="img-responsive" />
    </div>

 
    
    
</div>

    <!-- <div class="col-lg-2" align="center">
        <img src="media/general/190aniosCDMX.png" />
        <a href="https://twitter.com/IEMS_CDMX" target="_blank"><img src="media/general/twitter.png"></a>
        <a href="https://www.facebook.com/pages/Instituto-de-Educaci%C3%B3n-Media-Superior-del-DF-P%C3%A1gina-Oficial/347888501978759" target="_blank"><img src="media/general/facebook.png"></a>
        <a href="http://www.youtube.com/iemsdf"><img src="media/general/youtube.png"></a>
    </div> -->


    
</div>



                
            </div>
             <?php echo $content; ?> 
        </div>

    </div>


    
   
 </body>

</html>