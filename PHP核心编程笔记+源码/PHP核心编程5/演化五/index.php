<?php
//自动加载类
function __autoload($class_name) {
	require "./{$class_name}.class.php";
}
$c=isset($_GET['c'])?$_GET['c']:'Products';	//获取控制器
$a=isset($_GET['a'])?$_GET['a']:'list';		//获取方法
$controller_name=$c.'Controller';	//拼接控制器名
$action_name=$a.'Action';			//拼接方法名
$controller=new $controller_name();	//实例化控制器
$controller->$action_name();		//调用方法
