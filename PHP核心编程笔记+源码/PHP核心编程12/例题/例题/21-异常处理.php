<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>无标题文档</title>
</head>

<body>
<?php
if(isset($_POST['button'])) {
	try{
		$age=$_POST['age'];
		if($age>100)
			throw new Exception('年龄不能超过100'); //抛出异常对象
		echo "你的年龄是：{$age}<br>";
	}catch(Exception $e){  //捕获异常
		echo $e->getMessage();
	}
}
?>
<form method="post" action="">
	请输入年龄： <input type="text" name="age"> <br />
	<input type="submit" name="button" value="提交">
</form>
</body>
</html>
