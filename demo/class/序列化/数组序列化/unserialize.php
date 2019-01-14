<?php
/**
 * Created by PhpStorm.
 * User: gatsby
 * Date: 19-1-11
 * Time: 下午7:19
 */

require __DIR__.'/Student.class.php';
$str=file_get_contents(__DIR__.'/file_put_content.txt');
$ret=unserialize($str);

var_dump($ret);
echo '<br>';

$r1=new Student('alex','man',18);
$r1->show();
