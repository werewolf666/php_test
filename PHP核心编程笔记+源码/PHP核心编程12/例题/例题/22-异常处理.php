<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>无标题文档</title>
</head>

<body>
<?php
if(isset($_POST['button'])) {
	try
	{
		$num1=$_POST['num1'];
		$num2=$_POST['num2'];
		if(!is_numeric($num1))
			throw new Exception('第一个不是数字');
		elseif(!is_numeric($num2))
			throw new Exception('第二个不是数字');
		elseif($num2==0)
			throw new Exception('除数不能为零');
		else {
			echo $num1/$num2;
		}
	}
	catch(Exception $e){
		echo $e->getMessage(),'<br>';
		echo '行号:'.$e->getLine();
	}
}
?>
<form method="post" action="">
	第一个数： <input type="text" name="num1"> <br />
	第二个数： <input type="text" name="num2"> <br />
	<input type="submit" name="button" value="求商">
</form>
</body>
</html>