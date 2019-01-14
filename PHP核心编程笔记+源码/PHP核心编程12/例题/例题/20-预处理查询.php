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
$sql="select * from admin order by id desc limit 0,:n";
$stmt=$pdo->prepare($sql);
$stmt->bindParam(':n',$n);
$n=3;
$stmt->execute();
?>
<table>
	<tr>
		<th>编号</th> <th>姓名</th> <th>密码</th> <th>最后登录IP</th> <th>最后登录时间</th>
	</tr>
	<?php
	while($rows=$stmt->fetch(PDO::FETCH_NUM)) {
	?>
	<tr>
		<td><?php echo $rows[0]?></td>
		<td><?php echo $rows[1]?></td>
		<td><?php echo $rows[2]?></td>
		<td><?php echo $rows[3]?></td>
	</tr>
	<?php
	}
	?>
</table>
</body>
</html>