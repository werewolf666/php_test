<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>无标题文档</title>
</head>

<body>
<script type="text/javascript">
//当第一级选项发生变化的时候跳转
	function jump() {
		location.href='?firstid='+document.getElementById('first').value;
	}
</script>


<?php
//连接数据库
mysql_connect('localhost','root','aa');
mysql_select_db('php4');
mysql_query('set names utf8');

$firstid=isset($_GET['firstid'])?$_GET['firstid']:'';	//获取提交的firstid
?>
<!--获取第一级-->
<select id='first' onchange='jump()'>
	<option value="">---请选择---</option>
	<?php
		$sql='select * from category where parentid=0';
		$rs=mysql_query($sql);
		while($rows=mysql_fetch_assoc($rs)):
	?>
		<option value="<?php echo $rows['id']?>" <?php echo $rows['id']==$firstid?'selected':''?>><?php echo $rows['name']?></option>
	<?php
		endwhile;
	?>
</select>
<!--获取第二级-->
<?php
	$sql="select * from category where parentid=$firstid";
	$rs=mysql_query($sql);
?>
<select id='second'>
	<option value="">---请选择---</option>
	<?php while($rows=mysql_fetch_assoc($rs)): ?>
	<option value="<?php echo $rows['id']?>"><?php echo $rows['name']?></option>
	<?php endwhile;	?>
</select>
</body>
</html>