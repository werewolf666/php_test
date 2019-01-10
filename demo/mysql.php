<?php
/**
 * Created by PhpStorm.
 * User: gatsby
 * Date: 19-1-8
 * Time: 下午4:39
 */
echo $_SERVER['DOCUMENT_ROOT'],'<br>';

require_once $_SERVER['DOCUMENT_ROOT'].'/test/demo/config.php';
echo 'require sussful','<br/>';

$link=@mysql_connect('127.0.0.1:3306','root','root') or die('error');

mysql_query('use project');

mysql_query('set names utf8') or die('set names utf8 error');

$sql='select * from my_goods';

$re=mysql_query($sql,$link);
//var_dump($re);
//echo '<bt/>';

//$fetch=mysql_fetch_row($re);
//
//echo $fetch[0].'-'.$fetch[1].$fetch[2].$fetch[3],'<br/>';
//echo $fetch[1].'-'.$fetch[2],'<br/>';


var_dump($s=mysql_fetch_array($re));echo '<br/>';
var_dump($a=mysql_fetch_assoc($re));echo '<br/>';
echo $s[0],$s[1],'<br/>';
echo $s['name'],$s['price'],'<br/>';
echo $a['name'],$a['price'],'<br/>';





