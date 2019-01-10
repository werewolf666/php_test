<?php
/**
 * Created by PhpStorm.
 * User: gatsby
 * Date: 19-1-10
 * Time: 下午6:24
 */

//require "/var/www/html/test/demo/class/autoload/Books.class.php";

$book=new Books();
$phone=new Phones();
$book->setName('PHP宝典');
$phone->setName('iphone6s plus');
$book->getName();
$phone->getName();
/**
function __autoload($class_name){
    // 类文件在同一文件夹中
    echo $class_name;
   require "/var/www/html/test/demo/class/autoload/{$class_name}.class.php";
}*/

/**
function __autoload($class_name){
    //类名映射到数组中加载

    $class_map=array(
        'Books'=>'/var/www/html/test/demo/class/autoload/Books.class.php',
        'Goods'=>'/var/www/html/test/demo/class/autoload/Goods.class.php',
        'Phones'=>'/var/www/html/test/demo/class/autoload/Phones.class.php',
    );
    echo $class_name;
    require_once $class_map[$class_name];
//    echo $class_map[$class_name];
}*/


// 按照类名的规则加载


