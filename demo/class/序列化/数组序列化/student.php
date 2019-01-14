<?php
/**
 * Created by PhpStorm.
 * User: gatsby
 * Date: 19-1-11
 * Time: 下午7:13
 */

require __DIR__.'/Student.class.php';
$stu=new Student('alex','man',10);

$ret=serialize($stu);
file_put_contents(__DIR__.'/file_put_content.txt',$ret);
echo 'serialize is ok';