<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>无标题文档</title>
</head>

<body>
<?php
//方法一：
$path='aa.bb.cc.jpg';
echo strrchr($path,'.'),'<hr>';		//.jpg 
//方法二：
$path='f:/face.jpg';
$info=pathinfo($path);	//获取文件信息
echo '<pre>';
var_dump($info);
echo'<hr>';
echo $info['extension'];
?>
</body>
</html>