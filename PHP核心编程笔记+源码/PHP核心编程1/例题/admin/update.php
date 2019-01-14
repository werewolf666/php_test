<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link rel="stylesheet" type="text/css" href="../style/common.css"/>
</head>

<body>
<?php
require '../inc/conn.php';
$id=(int)$_GET['id'];
//修改笑话的业务逻辑
if(isset($_POST['button'])){
	$type=$_POST['type'];
	$content=$_POST['content'];
	$author=$_POST['author'];
	$sql="update contents set title=$type,contents='$content',author='$author' where id=$id";
	if(mysql_query($sql))
		header('location:admin.php?titleid='.$type);
	else
		echo '修改失败';
	exit;
}
//取出笑话内容
$sql="select * from contents where id=$id";
$rs=mysql_query($sql);
if(mysql_num_rows($rs)==0)	//如果资源中没有记录就终止执行
	die('你是一个坏人');
$info=mysql_fetch_assoc($rs);
?>
<form id="form1" name="form1" method="post" action="" onsubmit="return check()">
  <table width="500" border="1">
    <tr>
      <th colspan="2">修改笑话</th>
    </tr>
    <tr>
      <td>类别：</td>
      <td><select name="type" id="type">
      <?php
      	$sql='select * from title';
		$rs=mysql_query($sql);
		while($rows=mysql_fetch_assoc($rs)):
		?>
        	<option value="<?php echo $rows['Id']?>" <?php if($rows['Id']==$info['Title']) echo 'selected'?>><?php echo $rows['Title']?></option>
        <?php
		endwhile;
	  ?>
      </select></td>
    </tr>
    <tr>
      <td>内容：</td>
      <td><textarea name="content" id="content" cols="45" rows="5"><?php echo $info['Contents']?></textarea></td>
    </tr>
    <tr>
      <td>作者：</td>
      <td><input type="text" name="author" id="author" value="<?php echo $info['Author']?>" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="button" id="button" value="修改笑话" />
      <input type="button" name="button2" id="button2" value="返回" onclick="location.href='admin.php'" /></td>
    </tr>
  </table>
</form>
</body>
</html>