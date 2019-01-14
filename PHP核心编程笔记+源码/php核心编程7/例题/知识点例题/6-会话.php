<?php
header('content-type:text/html;charset=utf-8');
session_start();	//开启会话
$_SESSION['name']=true;	//将tom保存在会话中

echo '会话编号：'.session_id(),'<br>';
echo '会话名称：'.session_name(),'<br>';

?>
<a href="6-demo2.php">跳转</a>

