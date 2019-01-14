<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>无标题文档</title>
</head>

<body>
<?php
$pdo=new PDO('mysql:host=localhost;port=3306;dbname=php4','root','aa');
$pdo->exec('set names utf8');
if(isset($_POST['button'])) {
	$sql="insert into admin values (null,?,?,?,?)";	//?是位置占位符
	$stmt=$pdo->prepare($sql);	//预处理语句
	$ip=ip2long($_SERVER['REMOTE_ADDR']);
	$time=time();
	//var_dump($stmt);	//object(PDOStatement)
	$stmt->bindParam(1,$_POST['name']);	//在第一个位置上绑定name的值
	$stmt->bindParam(2,$_POST['pwd']);
	$stmt->bindParam(3,$ip);
	$stmt->bindParam(4,$time);
	echo $stmt->execute()?'成功':'失败';	//执行预处理
}
?>
<form method="post" action="">
	用户名： <input type="text" name="name"> <br />
	密码: <input type="text" name="pwd"> <br />
	<input type="submit" name="button" value="添加管理员">
</form>
</body>
</html>