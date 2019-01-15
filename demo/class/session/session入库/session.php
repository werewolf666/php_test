<?php

session_start();
$_SESSION['name']='tom';
$_SESSION['sex']='男';
$_SESSION['age']='18';
$_SESSION['name']='alex';

$sess_id=$_SESSION;
$sess_value=$_SESSION['name'];
function write($sess_id,$sess_value){
    $time=time();
    $sql="insert into sess values ('$sess_id','$sess_value',$time) on duplicate key update sess_value='$sess_value'";
    echo 'ok';
    $link=mysql_connect('localhost:3306','root','root');
    mysql_query('use project');
    $rs=mysql_query($sql);
    return $rs;
}

write($sess_id,$sess_value);
?>

<a href="禁用cookie1.php">跳转</a>

