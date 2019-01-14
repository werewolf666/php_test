<?php
/**
 * Created by PhpStorm.
 * User: gatsby
 * Date: 18-12-17
 * Time: 下午3:17
 */

$arr=range(1,10);

print_r($arr);

echo '</br>';

$arr=array_merge(range("a",'z'),range(1,10),array('__'));

print_r($arr);

