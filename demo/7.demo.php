<?php
/**
 * Created by PhpStorm.
 * User: gatsby
 * Date: 18-12-17
 * Time: 下午6:30
 */
//数据库的链接
$rs=mysqli_connect('127.0.0.1','root','root') or die('defalut');
echo 'ok<br>';

mysqli_select_db($rs,'mytest') or die('2');
echo 'ok1';

echo mysqli_query($rs,'show databases');

//选择数据库

//var_dump($_SERVER['DOCUMENT_ROOT']);

