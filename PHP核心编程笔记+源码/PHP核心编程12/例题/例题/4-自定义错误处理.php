<?php
header('content-type:text/html;charset=utf-8');
/**
*自定义错误
*@param $level 错误级别
*@param $msg 错误信息
*@param $file 错误的文件 
*@param $line 错误的行号
*/
function customerError($level,$msg,$file,$line) {
	switch($level) {
		case E_NOTICE:
		case E_USER_NOTICE:
			echo '将错误屏蔽掉<br>';
			break;
		case E_WARNING:
		case E_USER_WARNING:
			echo '发个邮件给管理员<br>';
			break;
		case E_ERROR:
		case E_USER_ERROR:
			echo '给管理员发信息<br>';
			break;
	}
	echo '文件错误信息'.$msg,'<br>';
	echo '错误的文件名'.$file,'<br>';
	echo '错误的行号'.$line,'<hr>';
	//return false;   //在自定义错误处理完毕后再交个PHP处理
}
set_error_handler('customerError');
echo $num;
trigger_error('警告你',E_USER_WARNING);
trigger_error('错误',E_USER_ERROR);