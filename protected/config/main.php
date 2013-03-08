<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
    'language'=>'zh_cn',	//new by lizhen
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'试用装后台',


    'defaultController'=>'main/Index/home',
	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'111111',
		 	// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('192.168.*.*','::1'),
		),
	),

	// application components
	'components'=>array(
        'debug' => true,
        'user' => array(
            // enable cookie-based authentication
            'allowAutoLogin'=>true,
            'class' => 'WebUser',
        ),
		// uncomment the following to enable URLs in path-format
		'urlManager'=>array(
			'urlFormat'=>'path',
            'showScriptName' => false,
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		// uncomment the following to use a MySQL database
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=try_lady8844',
			'emulatePrepare' => true,
			'username' => 'lizhen',
			'password' => '',
			'charset' => 'utf8',
		),
		'errorHandler'=>array(
			// use 'site/error' action to display errors
            'errorAction'=>'site/error',
        ),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
                /*
				array(
					'class'=>'CWebLogRoute',
				),
                */
			),
		),
        'session' => array (
            'class' => 'system.web.CDbHttpSession',
            'connectionID' => 'db',
            'sessionTableName' => 'try_lady8844_sessions',
            'timeout' => 86400,
            'autoStart' => true,
        ),
        'cache'=>array(
            'class'=>'CMemCache',
            'servers'=>array(
                array('host'=>'127.0.0.1', 'port'=>11211, 'weight'=>100),
            ),
        ),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
        //后台账号介入soap设置
        'soap_setting' => array(
            //soap server 地址
            'server_url' => 'http://app.lady8844.com/ladygroup/o/main/api/',
            'group_name' => 'try_aimama',
            'group_secret' => '795721997a8a659671e7787437ec3e33',
        ),
        //论坛介入soap设置
        'bbs_soap_setting' => array(
            'location' => 'http://bbs.imeimama.com/web_service/WebServer.php',
            'url' => 'WebServer.php'
        ),
        //发帖配置
        'bbs_thread_publish' => array(
            'username' => 'arigatuo',
            'uid' => 419358,
            'fid' => 10,
        ),
        //是否同步到论坛:1同步， 0不同步
        'bbs_sync' => 1,
        'roles' => array(
            'admin' => 'admin',
            'superAdmin' => 'superAdmin',
        ),
		// this is used in contact page
		//'adminEmail'=>'webmaster@example.com',
        //缓存时间设置
        'cacheTime' => array(
            'min' => 60,
            '5min' => 5 * 60,
            'hour' => 60 * 60,
            '6hour' => 3600 * 6,
            '12hour' => 3600 * 12,
            'day' => 3600 * 24,
        ),
	),
);