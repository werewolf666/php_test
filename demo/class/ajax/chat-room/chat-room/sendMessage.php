<?php
/**
 * 接受发送对象
 *
 */
require 'inc.php';
$color=$_POST['color'];
$biaoqing=$_POST['biaoqing'];
$receiver=$_POST['receiver'];
$msg=$_POST['msg'];
$time=date('Y-m-d h:m:s',time());
$sql="insert into `message` values (null,'$msg','gatsby','$receiver','$color','$biaoqing','$time')";
echo mysql_query($sql);