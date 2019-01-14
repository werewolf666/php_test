<?php
header('content-type:text/html;charset=utf-8');
require './13-Student.class.php';
$stu=new Student('李白','男',22);
$str1=serialize($stu);	//序列化
file_put_contents('c:/txt.txt',$str1);
echo $str1;

