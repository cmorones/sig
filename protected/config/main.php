<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'language'=>'es',
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Reporte Económico de la Ciudad de México',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
	),
            'aliases' => array(
            //If you used composer your path should be
            'xupload' => 'ext.vendor.asgaroth.xupload',
            //If you manually installed it
            'xupload' => 'ext.xupload'
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'sigedo09',
		),
		
	),
	

	// application components
	'components'=>array(
		'cache'=>array(
			'class'=>'CFileCache',

		),
		'ePdf' => array(
        'class'         => 'ext.yii-pdf.EYiiPdf',
        'params'        => array(
            'mpdf'     => array(
                'librarySourcePath' => 'application.vendor.mpdf.*',
                'constants'         => array(
                    '_MPDF_TEMP_PATH' => Yii::getPathOfAlias('application.runtime'),
                ),
                'class'=>'mpdf', // the literal class filename to be loaded from the vendors folder
                'defaultParams'     => array( // More info: http://mpdf1.com/manual/index.php?tid=184
                    'mode'              => '', //  This parameter specifies the mode of the new document.
                    'format'            => 'Legal', // format A4, A5, ...
                    'default_font_size' => 0, // Sets the default document font size in points (pt)
                    'default_font'      => '', // Sets the default font-family for the new document.
                    'mgl'               => 5, // margin_left. Sets the page margins for the new document.
                    'mgr'               => 5, // margin_right
                    'mgt'               => 5, // margin_top
                    'mgb'               => 5, // margin_bottom
                    'mgh'               => 5, // margin_header
                    'mgf'               => 5, // margin_footer
                    'orientation'       => 'L', // landscape or portrait orientation
                )
            ),
            'HTML2PDF' => array(
                'librarySourcePath' => 'application.vendor.html2pdf.*',
                'classFile'         => 'html2pdf.class.php', // For adding to Yii::$classMap
                'defaultParams'     => array( // More info: http://wiki.spipu.net/doku.php?id=html2pdf:en:v4:accueil
                    'orientation' => 'L', // landscape or portrait orientation
                    'format'      => 'Legal', // format A4, A5, ...
                    'language'    => 'en', // language: fr, en, it ...
                    'unicode'     => true, // TRUE means clustering the input text IS unicode (default = true)
                    'encoding'    => 'UTF-8', // charset encoding; Default is UTF-8
                    'marges'      => array(5, 5, 5, 5), // margins by default, in order (left, top, right, bottom)
                )
            )
        ),
    ),
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
		// uncomment the following to enable URLs in path-format
		
		'urlManager'=>array(
			'urlFormat'=>'path',
			'showScriptName'=>false,
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		
		/*'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),*/
		// uncomment the following to use a MySQL database
              /*		 'db'=>array(
		      'connectionString' => 'pgsql:host=localhost;dbname=sigedo',
                      //'connectionString' => 'pgsql:host=localhost;dbname=sigiems',
	        	'emulatePrepare' => true,
		        'username' => 'kylix',
        	    'password' => '2020kylix',
        	    'charset' => 'utf8',
		),*/

		  'db'=>array(
		      'connectionString' => 'pgsql:host=localhost;port=5432;dbname=sigedo',
                      //'connectionString' => 'pgsql:host=localhost;dbname=sigiems',
	        	'emulatePrepare' => true,
		        'username' => 'kylix',
        	    'password' => '2020kylix',
        	    'charset' => 'utf8',
		), 

		'errorHandler'=>array(
			// use 'site/error' action to display errors
            
            //'errorAction'=>'site/error',
        ),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),

				*/
				
			),
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['baserecm']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
		'uploads'=>'/uploads',
	    //'baserecm' => 'http://testrepor.sedecodf.gob.mx/sitio_pruebas/',
        
	),
);
