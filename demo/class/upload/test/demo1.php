<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>demo</title>
<body>
<?php
if (isset($_POST['submit'])){
    echo '<pre>';
    var_dump($_FILES['file']);
}
?>
<form method="post" enctype="multipart/form-data" name="">
    选择文件<input type="file" name="file"/> <br/>
    <input type="submit" name="submit" value="上传"/>
</form>
</body>