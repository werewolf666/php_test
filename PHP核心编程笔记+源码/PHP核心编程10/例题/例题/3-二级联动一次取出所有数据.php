<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>无标题文档</title>
</head>

<body>
<?php
//连接数据库
mysql_connect('localhost','root','aa');
mysql_query('use php4');
mysql_query('set names utf8');
//获取数据
$rs=mysql_query('select * from category order by sort_order');
//将资源转成二维数组
$array=array();
while($rows=mysql_fetch_assoc($rs)) {
	$array[]=$rows;	
}
//循环二维数组
echo '<ul>';
foreach($array as $rows1) {
	if($rows1['parentid']==0) {
		echo "<li>{$rows1['name']}</li>";
		echo '<ul>';
		foreach($array as $rows2) {
			if($rows2['parentid']==$rows1['id']){
				echo "<li>{$rows2['name']}</li>";
			}
		}
		echo '</ul>';
	}
}
echo '</ul>';
?>
</body>
</html>