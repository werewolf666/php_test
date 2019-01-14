<?php
ini_set('display_errors','on');
//ini_set('error_reporting',(E_ALL | E_STRICT) & ~E_NOTICE);  //系统的提示错误不显示
//ini_set('error_reporting',(E_ALL | E_STRICT) & ~E_NOTICE & ~ E_USER_NOTICE); //所有的提示错误都不显示
//ini_set('error_reporting',E_ERROR | E_USER_ERROR); //只显示致命错误信息
ini_set('error_reporting',(E_ALL | E_STRICT) & ~E_ERROR & ~ E_USER_ERROR); //致命性错误不显示
echo $aa;
trigger_error('myerror');
include './aa.php';
mysql_co();

/*
11111
01111  &


01111
*/

