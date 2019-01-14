<?php
header('content-type:text/html;charset=utf-8');
$stu=array('name1'=>'tom','name2'=>'berry','name3'=>'ketty');
$str1=serialize($stu);	//将数组序列化
file_put_contents('c:\txt.txt',$str1);	//将序列化内容写到文本中
echo '<hr>';
$str2=file_get_contents('c:\txt.txt');	//从文本中获取序列化字符串
$array=unserialize($str2);	//反序列化
print_r($array);	//Array ( [name1] => tom [name2] => berry [name3] => ketty ) 


