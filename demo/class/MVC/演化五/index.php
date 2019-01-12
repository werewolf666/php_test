<?php
/**
 * Created by PhpStorm.
 * User: gatsby
 * Date: 19-1-12
 * Time: 下午3:58
 */

function __autoload($class_name){
    // 自动加载类
    require __DIR__."/{$class_name}.class.php";
}

$c=isset($_GET['c'])?ucfirst($_GET['c']):'Member';   // 获取控制器,让首字母大写 ucfirst()
$a=isset($_GET['a'])?lcfirst($_GET['a']):'list';     //获取方法,让所有首字母小写 lcfirst()
$controller_name=$c.'Controller';           //拼接控制器名字
$action_name=$a.'Action';           //拼接方法名字
$controller=new $controller_name;   //实例化控制器
$controller->$action_name();        //调用方法

