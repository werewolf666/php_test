<?php
echo ini_get('display_errors'),'<br>';
ini_set('display_errors',0);
echo ini_get('display_errors'),'<br>';
echo $aa;

include './aa.php';
require './aa.php';

echo 1;
$age=200;
if ($age>100)
    trigger_error('年龄超过100',E_USER_WARNING); //显示级别是notice
    trigger_error('年龄超过100',E_USER_WARNING); //显示级别是notice
    trigger_error('年龄超过100',E_USER_ERROR); //显示级别是notice

echo 'a';