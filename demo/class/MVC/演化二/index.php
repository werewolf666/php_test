<?php
/**
 * Created by PhpStorm.
 * User: gatsby
 * Date: 19-1-12
 * Time: 下午3:58
 */

function __autoload($class_name){
    require __DIR__."/{$class_name}.class.php";
}

$config = array(
    'host'=>'127.0.0.1',
    'port'=>3306,
    'username'=>'root',
    'password'=>'root',
    'dbname'=>'project',
    'charset'=>'utf8'
);
$sql="select * from sline_member";
$db1=MYSQLDB::getInstance($config);
$rs=$db1->fetchAll($sql,'assoc');
require __DIR__."/showList.php";


