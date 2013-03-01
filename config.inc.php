<?php

//UC_CLIENT配置文件
//数据库相关 (mysql 连接时, 并且没有设置 UC_DBLINK 时, 需要配置以下变量)
define('UC_CONNECT', 'mysql');				// 连接 UCenter 的方式: mysql/NULL, 默认为空时为 fscoketopen()
// mysql 是直接连接的数据库, 为了效率, 建议采用 mysql

//数据库相关 (mysql 连接时, 并且没有设置 UC_DBLINK 时, 需要配置以下变量)
define('UC_DBHOST', '121.9.214.173');			// UCenter 数据库主机
define('UC_DBUSER', 'develop');				// UCenter 数据库用户名
define('UC_DBPW', 'dplady**$%');					// UCenter 数据库密码
define('UC_DBNAME', 'bbs');				// UCenter 数据库名称
define('UC_DBCHARSET', 'utf8');				// UCenter 数据库字符集
define('UC_DBTABLEPRE', 'bbs.cdb_uc_');			//



//$GLOBALS['db']->connect($dbhost, $dbuser, $dbpw, $dbname, $pconnect, true, $dbcharset);
$dbhost = "121.9.214.173";
$dbname = "bbs";
$dbuser = "develop";
$dbpw = "dplady**$%";
$table_pre = "bbs.cdb_uc_";
$dbcharset = "utf8";


//通信相关
define('UC_KEY', 'd999a67df0c960296f396fce515dadc6');
define('UC_API', 'http://bbs.lady8844.com/uc_server');
define('UC_CHARSET', 'utf-8');
define('UC_IP', '');
define('UC_APPID', '17');
define('UC_PPP', '20');

