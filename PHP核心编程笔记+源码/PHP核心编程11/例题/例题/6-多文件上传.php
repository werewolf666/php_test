<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>无标题文档</title>
</head>

<body>
<?php
if(isset($_POST['button'])) {
	foreach($_FILES['image']['name'] as $index=>$name) {
		$path='./uploads/'.uniqid('',true).strrchr($name,'.');
		if(move_uploaded_file($_FILES['image']['tmp_name'][$index],$path))
			echo $name.'上传成功<br>';
	}
}
?>
<form method="post" enctype="multipart/form-data">
	文件1：<input type="file" name="image[]" /> <br />
	文件2：<input type="file" name="image[]" /> <br />
	文件3：<input type="file" name="image[]" /> <br />
	<input type="submit" name="button" value="上传">
</form>
</body>
</html>