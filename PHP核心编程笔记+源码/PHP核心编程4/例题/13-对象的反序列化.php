<?php
header('content-type:text/html;charset=utf-8');
require './13-Student.class.php';
$str=file_get_contents('c:\txt.txt');
$stu=unserialize($str);
var_dump($stu);