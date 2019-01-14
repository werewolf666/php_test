<?php
//自动加载类
function __autoload($class_name) {
	require "./{$class_name}.class.php";
}
//获取数据
$config=array(
	'host'	=>	'127.0.0.1',
	'user'	=>	'root',
	'pwd'	=>	'aa',
	'dbname'=>	'php4'
);
$db=MySQLDB::getInstance($config);
$rs=$db->fetchAll("select *  from products");
require './showList.html';