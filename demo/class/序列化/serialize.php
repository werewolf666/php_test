<?php
/**
 * Created by PhpStorm.
 * User: gatsby
 * Date: 19-1-11
 * Time: 下午6:29
 */


echo '__DIR__:',__DIR__,'<br>';
echo '__FILE__:',__FILE__,'<br>';
echo 'dirname(__FILE__):',dirname(__FILE__),'<br>';
echo 'getcwd():',getcwd(),'<br>';
echo __DIR__.'/file_put_content.txt','<br>';

//$txt=10;
//file_put_contents(__DIR__.'/file_put_content.txt',$txt);

// 序列化PHP数据

$str=array('tom','alex','jack');
$str1=array(
    'name'=>'xiaoming',
    'age'=>19,
    'sex'=>'man');
$ret=serialize($str);
$ret1=serialize($str1);
file_put_contents(__DIR__.'/file_put_content.txt',$ret);
file_put_contents(__DIR__.'/file_put_content1.txt',$ret1);
echo $ret,'<br>';
var_dump($ret);