<?php
session_start();//开启回话
$_SESSION['name']=array('name'=>'tom','age'=>'man');
$_SESSION['bool']=true;
echo '回话编号'.session_id(),'<br>';
?>

<a href="session-get.php">跳转</a>
