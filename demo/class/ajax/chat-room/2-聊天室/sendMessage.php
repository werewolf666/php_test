<?php
require './conn.php';
$color=$_POST['color'];
$biaoqing=$_POST['biaoqing'];
$receiver=$_POST['receiver'];
$msg=$_POST['msg'];
$sql="insert into message values (null,'$msg','争青小子','$receiver','$color','$biaoqing',now())";
echo mysql_query($sql);