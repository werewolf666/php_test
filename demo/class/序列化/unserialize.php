<?php
/**
 * Created by PhpStorm.
 * User: gatsby
 * Date: 19-1-11
 * Time: 下午7:05
 */

$str=file_get_contents(__DIR__.'/file_put_content.txt');
$str1=file_get_contents(__DIR__.'/file_put_content1.txt');

$ret=unserialize($str);
$ret1=unserialize($str1);

print_r($ret);
echo '<br>';
print_r($ret1);