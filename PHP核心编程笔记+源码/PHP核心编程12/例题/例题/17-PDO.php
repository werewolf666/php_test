<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>无标题文档</title>
</head>

<body>
<?php
$pdo=new PDO('mysql:host=localhost;port=3306;dbname=php4','root','aa');	//pdo驱动见帮助文档
$pdo->exec('set names utf8');
if(isset($_POST['button'])) {
	$name=$_POST['name'];
	$pwd=$_POST['pwd'];
	$ip=ip2long($_SERVER['REMOTE_ADDR']);
	$time=time();
	
	$sql="insert into admin values (null,'$name','$pwd',$ip,$time)";
	echo $pdo->exec($sql),'<br>';	//返回受影响的记录数
	echo '生成的自动增长编号：'.$pdo->lastInsertId(),'<br>';
}
//显示所有管理员
$rs=$pdo->query('select * from admin');
//var_dump($rs);	//PDOStatement
?>
<table>
	<tr>
		<th>编号</th> <th>姓名</th> <th>密码</th> <th>最后登录IP</th> <th>最后登录时间</th>
	</tr>
<?php foreach($rs as $rows):?>
<tr>
	<td><?php echo $rows['id']?></td>
	<td><?php echo $rows['name']?></td>
	<td><?php echo $rows['pwd']?></td>
	<td><?php echo long2ip($rows['last_login_ip'])?></td>
	<td><?php echo date('Y-m-d H:i:s',$rows['last_login_time'])?></td>
</tr>
<?php endforeach;?>
</table>
<form method="post" action="">
	用户名： <input type="text" name="name"> <br />
	密码: <input type="text" name="pwd"> <br />
	<input type="submit" name="button" value="添加管理员">
</form>
</body>
</html>