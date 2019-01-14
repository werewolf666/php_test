<?php
ini_set('session.save_handler','user');	//自定义会话存储
/**
*打开会话
*/
function open() {
	//echo 'open<br>';
	mysql_connect('localhost:3306','root','aa');
	mysql_query('set names utf8');
	mysql_query('use php4');
}
/**
*关闭会话
*/
function close() {
	//echo 'close<br>';
}
/**
*读取会话
*@param $sess_id string 会话编号
*/
function read($sess_id) {
	//echo 'read<br>';
	$sql="select sess_value from sess where sess_id='$sess_id'";
	$rs=mysql_query($sql);
	if($rows=mysql_fetch_row($rs))
		return $rows[0];
}
/**
*写入会话
@param $sess_id string 会话编号
@param $sess_value string 会话值
*/
function write($sess_id,$sess_value) {
	//echo 'write<br>';
	$time=time();
	$sql="insert into sess values ('$sess_id','$sess_value',$time) on duplicate key update sess_value='$sess_value'";
	return mysql_query($sql);
}
/**
*销毁会话，销毁自己的会话
*/
function destroy($sess_id) {
	//echo 'destroy<br>';
	$sql="delete from sess where sess_id='$sess_id'";
	return mysql_query($sql);
}
/**
*垃圾回收，所有的过期会话
*/
function gc($maxlifetime) {
	//echo 'gc';
	$time=time()-$maxlifetime;
	$sql="delete from sess where sess_expires<$time";
	return mysql_query($sql);
}
//更改会话存储
session_set_save_handler(
	'open',
	'close',
	'read',
	'write',
	'destroy',
	'gc'
);
//开启会话
session_start();
//session_destroy();
$_SESSION['name']='tom';
$_SESSION['sex']='男';
echo $_SESSION['name'];
$_SESSION['name']='berry';


