<?php

//ini_set('session.save_handler','user');

/**
 * 打开回话
 */
function open(){
    echo 'open<br>';}

/**
 * 关闭回话
 */
function close(){echo 'close<br>';}

/**
 * @param $session_id string
 * 读取文化
 */
function read($session_id){echo 'read<br>';}

/**
 * @param $sesion_id string
 * 写入回话
 */
function write($sesion_id,$session_value){echo 'write<br>';}

/**
 * @param $sesion_id string
 * 销毁会话
 */
function destory($sesion_id){echo 'destory<br>';}

/**
 * @param $maxlifetime string
 * 垃圾回收
 */
function gc($maxlifetime=1440){echo 'gc<br>';}


session_set_save_handler(open(),close($session_id),read(),write($session_id,$session_value),destory($session_id),gc());

session_start();
$_SESSION['name']='tom';

var_dump($_SESSION);
